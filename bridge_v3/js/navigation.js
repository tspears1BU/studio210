/**
* navigation.js
* Licensed under the GPLv2 license.
* Handles toggling the navigation menu for small screens.
*/

( function() {

	var container, button, menu, holder;

	container = document.getElementById( 'navigation' );
	if ( ! container )
		return;

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button )
		return;

	menu = container.getElementsByTagName( 'ul' )[0];

	holder = container.getElementsByTagName( 'div' )[0];
	if ( 'undefined' === typeof holder )
		return;

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	button.onclick = function() {
		if ( -1 == menu.className.indexOf( 'mobile-menu' ) )
			menu.className = 'menu';

		if ( -1 != button.className.indexOf( 'toggled-on' ) ) {
			button.className = button.className.replace( ' toggled-on', '' );
			menu.className = menu.className.replace( ' toggled-on', '' );
			menu.className = menu.className.replace( 'mobile-menu', 'menu' );
			holder.className = holder.className.replace( 'mobile-menu', 'menu' );
			container.className = container.className.replace( 'main-small-navigation', 'navigation-main' );
		} else {
			button.className += ' toggled-on';
			menu.className += ' toggled-on';
			menu.className = menu.className.replace( 'menu', 'mobile-menu' );
			holder.className = holder.className.replace( 'menu', 'mobile-menu' );
			container.className = container.className.replace( 'navigation-main', 'main-small-navigation' );
		}
	};

	// Untoggle menu on screen resize.
	window.addEventListener("resize", function() {
		if ( window.innerWidth > 767  && -1 != button.className.indexOf( 'toggled-on' ) ) {
			button.className = button.className.replace( ' toggled-on', '' );
			menu.className = menu.className.replace( ' toggled-on', '' );
			menu.className = menu.className.replace( 'mobile-menu', 'menu' );
			holder.className = holder.className.replace( 'mobile-menu', 'menu' );
			container.className = container.className.replace( 'main-small-navigation', 'navigation-main' );
		}
	});

} )();
