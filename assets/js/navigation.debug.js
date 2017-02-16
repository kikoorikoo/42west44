/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, links, subMenus, i, len, eventTime, lastEvent[];
	lastEvent = {
		'time'=>Date().now(),
		'type'=>'null'
	};

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );
//console.log ("links: " + [].slice.call(links).map(function(el){return el.value;}).join(', ') );



	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		// links[i].addEventListener( 'touchstart', toggleFocusTouch, true );
		// links[i].addEventListener( 'click', toggleFocus, true );
		// links[i].addEventListener( 'click', function(){alert("click triggered"); }, true );
		// links[i].addEventListener( 'focus', toggleFocusFocus, true );
		// links[i].addEventListener( 'blur', toggleFocusBlur, true );

		links[i].addEventListener( 'click', toggleFocusClick, true );
		links[i].
	}

	// Set menu items with submenus to aria-haspopup="true".
	for ( i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );

	//add onclick = "void(0)" to button for safari mobile compatibility
		subMenus[i].parentNode.setAttribute( 'onclick', 'void(0)');
		//subMenus[i].parentNode.setAttribute( 'onclick', 'alert("onclicked"); return true;');

		console.log("breakpoint");

		// see https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener
		// subMenus[i].parentNode.firstChild.removeEventListener( 'blur', toggleFocus );
		// subMenus[i].parentNode.firstChild.addEventListener( 'touchstart', toggleFocusTouch, true );

		// subMenus[i].parentNode.firstChild.removeEventListener( 'focus', toggleFocusFocus );
		// subMenus[i].parentNode.firstChild.removeEventListener( 'blur', toggleFocusBlur );
		// subMenus[i].parentNode.firstChild.addEventListener( 'touchstart', touchTrigger, true );

		// subMenus[i].parentNode.firstChild.addEventListener( 'click', function(){console.log("click triggered");} );

	}



	/**
	 * Sets or removes .focus class on an element.
	 */
	// function touchTrigger() {
	// 	var self = this;
	// 	console.log("Touch trigger function");

	// 	// Move up through the ancestors of the current link until we hit .nav-menu.
	// 	while ( -1 === self.className.indexOf( 'nav-menu' ) && doneOnce === false) {

	// 	console.log("self: " + self);

	// 		// On li elements toggle the class .focus.
	// 		if ( 'li' === self.tagName.toLowerCase() ) {
	// 			if ( -1 !== self.className.indexOf( 'focus' ) ) {
	// 				self.className = self.className.replace( ' focus', '' );
	// 				console.log("focus toggled off of " + self.tagName + " " + self.className);
	// 				doneOnce = true;
	// 			} else {
	// 				self.className += ' focus';
	// 				console.log("focus toggled on " + self.tagName + " " + self.className);
	// 				doneOnce = true;
	// 			}
	// 		}

	// 		self = self.parentElement;
	// 	}
	// }

	/**
	 * Sets or removes .focus class on an element.
	 */
	// function toggleFocusTouch() {
	// 	var self = this;
	// 	console.log("Touch toggle function");
	// 	var doneOnce = false;

	// 	// Move up through the ancestors of the current link until we hit .nav-menu.
	// 	while ( -1 === self.className.indexOf( 'nav-menu' ) && doneOnce === false) {

	// 	console.log("self: " + self);

	// 		// On li elements toggle the class .focus.
	// 		if ( 'li' === self.tagName.toLowerCase() ) {
	// 			if ( -1 !== self.className.indexOf( 'focus' ) ) {
	// 				self.className = self.className.replace( ' focus', '' );
	// 				console.log("focus toggled off of " + self.tagName + " " + self.className);
	// 				doneOnce = true;
	// 			} else {
	// 				self.className += ' focus';
	// 				console.log("focus toggled on " + self.tagName + " " + self.className);
	// 				doneOnce = true;
	// 			}
	// 		}

	// 		self = self.parentElement;
	// 	}
	// }

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocusFocus() {
		var self = this;
		// event.stopPropagation();
		lastEvent['time'] = Date.now();
		lastEvent['type'] = 'focus';
		console.log("Focus toggle function");
		console.log("self: "+ self);


		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
					console.log("focus toggled off of " + self.tagName + " " + self.className);
					// alert("focus toggled off");
				} else {
					self.className += ' focus';
					console.log("focus toggled on " + self.tagName + " " + self.className);
					// alert("focus toggled on");
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocusClick( event ) {
		var self = this;
		eventTime = Date.now();
		if (eventTime - lastEvent[time] < 500 && lastEvent['type'] === 'focus') //if less than 500, this is PROBABLY the post-focus click fired from a touch event, so return early to avoid double toggling
		{
			lastEvent['time'] = eventTime;
			lastEvent['type'] = 'click';
			return 0;
		}
		console.log("Click toggle function");
		console.log("self: "+ self);

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
					console.log("focus toggled off of " + self.tagName + " " + self.className);
					// alert("focus toggled off");
				} else {
					self.className += ' focus';
					console.log("focus toggled on " + self.tagName + " " + self.className);
					// alert("focus toggled on");
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocusBlur( event ) {
		var self = this;
		console.log("Blur toggle function");
		console.log("self: "+ self);

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
					console.log("focus toggled off of " + self.tagName + " " + self.className);
					// alert("focus toggled off");
				} else {
					self.className += ' focus';
					console.log("focus toggled on " + self.tagName + " " + self.className);
					// alert("focus toggled on");
				}
			}

			self = self.parentElement;
		}
	}


} )();
