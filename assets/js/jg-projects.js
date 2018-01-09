$(document).ready(function() {


	// Define variables
	var $screenWidth = $(window).width();
	var $topWindow = $(window).scrollTop();
	var $lastScrollTop = 0;

	var $nav = $('#page-header');
	var $navHeight = $nav.height();
		jQuery.data($nav, '$navHeightOG', $nav.height());// Store original height data to be retrieved

	var $pageHeader = $('#page-header');
	var $menuToggle = $('#menu-toggle');
	var $pageMain = $('#page-main');
	var $pageFooter = $('#page-footer');

	var $pageProjects = $('.page-projects');
	var $projectFilters = $('#project-filters');


	/* Add padding equal to height of header */
	$pageMain.add($pageFooter).css({"top": $navHeight});


	/* LazyLoad */
	$('.lazy-load').lazyload({
		threshold: 400,
		effect: "fadeIn"
		});


	/* Touch Hover Effect */
	function touchHover() {
		var $link = $(this);
		if ($link.hasClass("hovered")) {
			return true;
			}
		else {
			$link.addClass("hovered");
			$('.project-link').not(this).removeClass("hovered");
			return false;
			}
		};
	$('.project-link', $pageProjects).on("touchstart", touchHover);



	/* Toggle Header */
	$(document).scroll(function() {
		
		var $st = $(this).scrollTop();// Define scrollTop
		var $navHeight = $nav.height();// Redefine $navHeight
		if ($st < $navHeight) {$st = 0};// Prevent "bounce-back" scrolling on iOS

		// .condensed
		if ($st < $navHeight) {
			$nav.removeClass('condensed').removeClass('hidden').css({"top": 0});
			}
		else if ($st > $navHeight) {
			$nav.css({"top": -$navHeight});

			// .hidden
			if ($st < $lastScrollTop) {
				$nav.removeClass('hidden').addClass('condensed').css({"top": 0});
				}
			else {
				$nav.addClass('hidden').removeClass('show-menu');
				};
			};

		$lastScrollTop = $st;// Redefine last position w/ current one
		});// END .scroll



	/* Isotope */
	// Get and define portfolio $nav left position if it exists
	if ($pageProjects.length) {

		// Define container
		var $container = $pageProjects.isotope({
			});

		// Setup filter buttons
		function filterButtons() {

			var $filterValue = $(this).attr('data-filter');// Define filter HTML attr

			$projectFilters.find('.filter-button').removeClass('toggled');// Remove "toggled" class from all buttons
			$(this).addClass('toggled');// Add "toggled" class to selected button

			// Isotope
			$container.isotope({
				layoutMode: 'fitRows',
				itemSelector: '.project-wrapper',
				filter: $filterValue,
				transitionDuration: '320ms'
				});

			$pageProjects.find('.project-wrapper').removeClass(function(index, css) {return (css.match(/(^|\s|["'])\S+-active($|\s|["'])/g) || []).join(' ');});// Remove all “-active” classes from all project wrappers
			$pageProjects.find(".project-wrapper" + $filterValue).addClass($filterValue.replace(".","") + '-active');// Add class for active project covers

			};
		$projectFilters.on('click', '.filter-button', filterButtons);


		// Define query variable
		function getQueryVariable($variable) {
			var $query = window.location.search.substring(1);
			var $vars = $query.split("&");

			// Split variables
			for (var $i=0; $i < $vars.length; $i++) {
				var $pair = $vars[$i].split("=");
				if($pair[0] == $variable) {
					return $pair[1];
					}// END if
				}// END for

			return false;
			};


		// Define filter, click button
		var $filterFromURL = getQueryVariable('filter');
		if ($filterFromURL.length) {
			$('*[data-filter=".' + $filterFromURL  + '"]').click();
			};
		};// END Isotope


	// Site Menu toggle
	function showMenu(e) {
		$pageHeader.toggleClass('show-menu');
		e.preventDefault();
		};
	$menuToggle.on('click touchstart', showMenu);
	});// END doc ready