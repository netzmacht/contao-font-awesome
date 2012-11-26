/**
 * Icon Replacer handles dynamic icon replacing to tet Font Awesome icons work
 * 
 * @param string css selector
 * @param bool set true if icon should contain a space character 
 */
function IconReplacer(target, addSpace)
{
	// init vars
	var self = this;
	var target = target;
	var addSpace = (addSpace !== null) ? addSpace : false;
	var styleIcons = new Array();
	var imageIcons = new Array();
	
	
	/**
	 * add a replacement of an image icon
	 * 
	 * @param string class of new icon
	 * @param string test paremeter to test against the src 
	 * @param string optional adding a class to the new icon
	 * @param bool option set true if old icon should not be deleted. neccessary to handle contao js image handling without getting an error
	 */
	self.addImageIcon = function(iconClass, test, options) //addClass, onlyHide
	{
		var opt = new Object();
		opt.addClass = (options && typeof options.addClass != 'undefined') ? options.addClass : null;
		opt.onlyHide = (options && typeof options.onlyHide != 'undefined') ? options.onlyHide : null;
		opt.size = (options && typeof options.onlyHide != 'undefined') ? options.size : 'large';
		
		imageIcons.push(new Array(iconClass, test, opt));
	};
	
	
	/**
	 * add a replacement of an css styled background icon
	 * 
	 * @param string target class name of selector
	 * @param string class of new icon
	 * @param position where should the icon be injected
	 * @param string shall a class be removed from the target 
	 */
	self.addStyleIcon = function(targetClass, iconClass, options) //position, removeClass
	{
		var opt = new Object();
		opt.addClass = (options && typeof options.addClass != 'undefined') ? options.addClass : null;
		opt.position = (options && typeof options.position != 'undefined') ? options.position : null;
		opt.removeClass = (options && typeof options.removeClass != 'undefined') ? options.position : null;
		opt.size = (options && typeof options.onlyHide != 'undefined') ? options.size : 'large';
		
		styleIcons.push(new Array(targetClass, iconClass, opt));	
	};
	
	
	/**
	 * use this to let the icon replace listen to events
	 * 
	 * @param Element the element which triggers the event
	 * @param string the event name
	 */
	self.listenTo = function(obj, event)
	{
		obj.addEvent(event, self.run);
	};
	
	
	/**
	 * run the icon replacement
	 * 
	 */
	self.run = function()
	{				
		var elements = $$(target);
		
		// loop through each found element
		elements.each(function(element) 
		{
			
			// check if an icon already exists
			var icon = element.getElement('i');
			
			if(icon === null) {
				icon = element.getNext('i');
			}
			
			if(icon !== null) {
				return;
			}
			
			
			// replace image icons
			for(var i=0; i < imageIcons.length; i++)
			{
				// icon exists and the corresponding image is not hidden
				if(icon !== null && !imageIcons[i][2].onlyHide) {
					break;
				}
				
				// test param is set
				if(imageIcons[i][1] !== null) 
				{
					if(element.get('tag') != 'img') {
						var image = element.getElement('img');
						
						if(image === null) {
							continue;
						}
					}
					else {
						image = element;
					}
					
					if(!new String(image.get('src')).test(imageIcons[i][1], 'i')) {
						continue;
					}
					
					
					// icon already exists so we have to update it
					if(icon !== null) {
						console.log('icon updated ' + imageIcons[i][0]);
						icon.set('class', 'icon-' + imageIcons[i][0]);
						icon.addClass('icon-' + imageIcons[i][2].size);
						
						if(imageIcons[i][2].addClass) {
							icon.addClass(imageIcons[i][2].addClass);
						}
					}
					else {										
						createIcon(imageIcons[i][0], imageIcons[i][2]).inject(image, 'after');
						element.addClass('icon');
					}
					
					// hide or destroy
					if(imageIcons[i][2].onlyHide) {
						image.hide();
					}
					else {
						image.destroy();	
					}
														
					break;
										
				}
				
				// check if element as an image inside
				var img = element.getElement('img');
				
				if(img !== null) {					
					createIcon(imageIcons[i][0], imageIcons[i][2]).inject(element, 'after');
					img.destroy();
				}
				break;
			}
			
			// replace style icons
			for(var i=0; i < styleIcons.length; i++) {
				if(!element.hasClass(styleIcons[i][0])) {
					continue;
				}
				
				if(styleIcons[i][2].removeClass !== null) {
					element.removeClass(styleIcons[i][2].removeClass);
				}
				
				createIcon(styleIcons[i][1], styleIcons[i][2]).inject(element, styleIcons[i][2].position ? styleIcons[i][2].position : 'top');
				element.addClass('icon');
				break;
			}
		});	
	};
	
	
	/**
	 * private method to create a new icon
	 * 
	 * @param string class name of new icon
	 * @param string add a specific class to the icon
	 */
	var createIcon = function(className, options)
	{
		var icon = new Element('i');			
		icon.addClass('icon-' + className);		
		
		if(addSpace) {
			icon.set('html', '&nbsp;');
		}
		
		if(options.addClass) {
			icon.addClass(options.addClass);
		}
		
		if(!options.size) {
			icon.addClass('icon-large');
		}
		else {
			icon.addClass('icon-' + options.size);
		}
		
		return icon;			
	};
}


/**
 * now lets register all icons which are set by the config
 */
window.addEvent('domready', function() {
	Object.each(replaceIconsConfig, function(config, key) {
		var replacer = new IconReplacer(config.target, config.addSpace);
		
		config.imageIcons.each(function(image) {
			replacer.addImageIcon(image[0], image[1], image[2]);
		});
		
		config.styleIcons.each(function(style) {
			// we replaced order of style settings in icons.php
			// so we have to do the changes in the javascript add order
			replacer.addStyleIcon(style[1], style[0], style[2]);
		});
		
		config.listenTo.each(function(listen) {
			if(listen[0] == 'window') {
				replacer.listenTo(window, listen[1]);
			}
			else if(listen[0] == 'document') {
				replacer.listenTo(document, listen[1]);
			}
			else {
				replacer.listenTo($$(listen[0]), listen[1]);
			}
		});
	});
	
	// handle icon toggling of plus/minus icons of navigation
	$$('#tl_navigation .tl_level_1_group').addEvent('click', function() 
	{
		var icon = this.getElement('i');	
		
		if(icon.hasClass('icon-plus-sign')) {
			icon.addClass('icon-minus-sign');
			icon.removeClass('icon-plus-sign');
		}
		else {
			icon.removeClass('icon-minus-sign');
			icon.addClass('icon-plus-sign');
		}		
	});
	
	$$('#tl_navigation .tl_level_1_group').each(function(group) 
	{
		var icon = group.getElement('i');	
		
		if(new String(icon.getPrevious('img').get('src')).test('Minus')) {
			icon.addClass('icon-minus-sign');
			icon.removeClass('icon-plus-sign');
		}
		else {
			icon.removeClass('icon-minus-sign');
			icon.addClass('icon-plus-sign');
		}		
	});
});