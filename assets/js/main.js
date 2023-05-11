/*	-----------------------------------------------------------------------------------------------
	Namespace
--------------------------------------------------------------------------------------------------- */

var infor = infor || {};

var headerEl = document.querySelector('[data-header]');
var prevScrollPos = 0;

/*	-----------------------------------------------------------------------------------------------
	Helpers
--------------------------------------------------------------------------------------------------- */

function scrollY() {

  return window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;

}

/*	-----------------------------------------------------------------------------------------------
	Sticky header
--------------------------------------------------------------------------------------------------- */

infor.stickyHeader = {

	scrollHandler(el) {

    // get current position
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > 0) {

      if (scrollTop > prevScrollPos) { // downwards scroll

        el.classList.remove('--sticky')

        if (scrollTop > el.offsetHeight) {
          el.classList.add('--hidden')
        } else {
          el.classList.remove('--hidden')
        }

      } else { // upwards scroll

        el.classList.add('--sticky')
        el.classList.remove('--hidden')

      }
      prevScrollPos = scrollTop <= 0 ? 0 : scrollTop

    } else {

      el.classList.remove('--sticky')

    }

  }

};

/*	-----------------------------------------------------------------------------------------------
	Header Toggles
--------------------------------------------------------------------------------------------------- */

infor.headersToggles = {

	init: function() {

		var menuEl = document.querySelector('[data-menu]');
		var menuToggleEl = document.querySelector('[data-menu-toggle]');

		if (menuEl) {
			this.toggleMenu(menuEl, menuToggleEl);
			this.toggleSubMenus(menuEl);
		}

	},


	toggleMenu: function(el, toggleEl) {

		toggleEl.addEventListener('click', function(ev) {
			if (toggleEl.classList.contains('is-active')) {
				toggleEl.classList.remove('is-active');
				el.classList.remove('is-active');
				document.body.classList.remove('menu-is-active');
			} else {
				toggleEl.classList.add('is-active');
				el.classList.add('is-active');
				document.body.classList.add('menu-is-active');
			}
		})

	},

	toggleSubMenus: function(el) {
	
		var menuItemEls = el.querySelectorAll('.menu-item-has-children');

		for (var i = 0; i < menuItemEls.length; i++) {

			var itemEl = menuItemEls[i];
			var toggleEl = itemEl.querySelector('.menu-item-title [data-toggle-target]');
			var subMenuEl = itemEl.querySelector(toggleEl.getAttribute('data-toggle-target'));
			
			itemEl.querySelector('.menu-item-title [data-toggle-target]').addEventListener('click', function(ev) {
				var targetEl = ev.target;
				var targetSubMenuEl = el.querySelector(targetEl.getAttribute('data-toggle-target'));

				if (targetEl.classList.contains('is-active')) {
					targetEl.classList.remove('is-active');
					targetEl.setAttribute('aria-expanded', true);
					targetSubMenuEl.classList.remove('is-active');
				} else {
					targetEl.classList.add('is-active');
					targetEl.setAttribute('aria-expanded', true);
					targetSubMenuEl.classList.add('is-active');
				}
			});

			if (itemEl.classList.contains('current-page-ancestor') || itemEl.classList.contains('current-menu-parent')) {
				toggleEl.classList.add('is-active');
				toggleEl.setAttribute('aria-expanded', true);
				subMenuEl.classList.add('is-active');
			}
			
		}

	}

};


/*	-----------------------------------------------------------------------------------------------
	Sidebar
--------------------------------------------------------------------------------------------------- */

infor.Sidebar = {

	init: function() {

		var sidebarMenuEl = document.querySelector('[data-sidebar-menu]');

		if (sidebarMenuEl) {
			this.toggleSubMenus(sidebarMenuEl);
		}

	},


	toggleSubMenus: function(el) {
	
		var menuItemEls = el.querySelectorAll('.menu-item-has-children');

		for (var i = 0; i < menuItemEls.length; i++) {

			var itemEl = menuItemEls[i];
			var toggleEl = itemEl.querySelector('.menu-item-title [data-toggle-target]');
			var subMenuEl = itemEl.querySelector(toggleEl.getAttribute('data-toggle-target'));
			
			itemEl.querySelector('.menu-item-title [data-toggle-target]').addEventListener('click', function(ev) {
				var targetEl = ev.target;
				var targetSubMenuEl = el.querySelector(targetEl.getAttribute('data-toggle-target'));

				if (targetEl.classList.contains('is-active')) {
					targetEl.classList.remove('is-active');
					targetEl.setAttribute('aria-expanded', true);
					targetSubMenuEl.classList.remove('is-active');
				} else {
					targetEl.classList.add('is-active');
					targetEl.setAttribute('aria-expanded', true);
					targetSubMenuEl.classList.add('is-active');
				}
			});

			if (itemEl.classList.contains('current-page-ancestor') || itemEl.classList.contains('current-menu-parent')) {
				toggleEl.classList.add('is-active');
				toggleEl.setAttribute('aria-expanded', true);
				subMenuEl.classList.add('is-active');
			}
			
		}

	}

};

/**
 * Is the DOM ready?
 *
 * This implementation is coming from https://gomakethings.com/a-native-javascript-equivalent-of-jquerys-ready-method/
 *
 * @param {Function} fn Callback function to run.
 */
function inforDomReady( fn ) {
	if ( typeof fn !== 'function' ) {
		return;
	}

	if ( document.readyState === 'interactive' || document.readyState === 'complete' ) {
		return fn();
	}

	document.addEventListener( 'DOMContentLoaded', fn, false );
}

inforDomReady( function() {
	
	infor.headersToggles.init(); 
	infor.Sidebar.init(); 

	// glider init
	var gliderEl = document.querySelector('[data-slider]');
	if (gliderEl) {
		new Glider(gliderEl, {
			slidesToShow: 1.25,
			slidesToScroll: 1,
			itemWidth: 250, 
			scrollLock: true,
			draggable: true,
			dots: false,
			arrows: {
				prev: '.slider__control--prev',
				next: '.slider__control--next'
			},
			responsive: [
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2.25,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 900,
					settings: {
						slidesToShow: 3.25,
						slidesToScroll: 1,
						itemWidth: 320,
						exactWidth: true
					}
				},
				{
					breakpoint: 1200,
					settings: {
						slidesToShow: 5,
						slidesToScroll: 5,
						exactWidth: false
					}
				}
			]
		})
	}

	window.addEventListener('scroll', function() {

		if (headerEl) {
			infor.stickyHeader.scrollHandler(headerEl); 
		}

	});



});


/**
 * Traverses the DOM up to find elements matching the query.
 *
 * @param {HTMLElement} target
 * @param {string} query
 * @return {NodeList} parents matching query
 */
function inforFindParents( target, query ) {
	var parents = [];

	// Recursively go up the DOM adding matches to the parents array.
	function traverse( item ) {
		var parent = item.parentNode;
		if ( parent instanceof HTMLElement ) {
			if ( parent.matches( query ) ) {
				parents.push( parent );
			}
			traverse( parent );
		}
	}

	traverse( target );

	return parents;
}
