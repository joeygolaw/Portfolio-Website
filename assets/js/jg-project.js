$(document).ready(function() {

	// Define Variables
	var $screenWidth = $(window).width();
	var $pageMain = $(".portfolio-main");
	var $pagePortfolio = $(".page-portfolio");


	var $pageSidebar = $(".portfolio-sidebar");
	if ($pageSidebar.length && ($screenWidth > 1000)) {
		jQuery.data($pageSidebar, '$sidebarWidthOG', (parseInt($pageSidebar.css("width")) / parseInt($pageSidebar.parent().css("width"))));
		var $sidebarWidth = $pageSidebar.parent().width() * jQuery.data($pageSidebar, '$sidebarWidthOG') + "px";
		};

	var $pageNav = $(".portfolio-nav");
	if ($pageNav.length) {
		jQuery.data($pageNav, "navMarginLeftOG", parseInt($pageNav.css("marginLeft")))
		};


	function updatePortfolio($topWindow) {
		if ($pageNav.length) {
			// Adjust portfolio content…
			if ($pagePortfolio.offset().top < ($topWindow + 20)) {
				$pagePortfolio.addClass("scrolled");
				}
			// …Otherwise, undo adjustments from above
			else {
				$pagePortfolio.removeClass("scrolled");
				}
			}
		};// END updatePortfolio


	function updatePortfolioSidebar($topWindow,$sidebarWidth) {
		if ($pageSidebar.length && ($screenWidth > 1000)) {
			// Adjust portfolio content…
			if ($pagePortfolio.offset().top < ($topWindow + 20)) {
				$pageSidebar.css("width", $sidebarWidth);
				}
			// …Otherwise, undo adjustments from above
			else if ($pagePortfolio.offset().top > ($topWindow + 20)) {
				$pageSidebar.removeAttr('style');
				}
			}
		};// END updatePortfolioSidebar


	function updatePortfolioNav($topWindow,$screenWidth) {
		if ($pageNav.length) {
			// Define $nav X position
			var $navPositionX = Math.ceil($screenWidth - ($pageMain.offset().left + $pageMain.width()) - $pageNav.width() - jQuery.data($pageNav, 'navMarginLeftOG'));
			// Adjust portfolio content…
			if ($pagePortfolio.offset().top < ($topWindow + 20)) {
				$pageNav.css("right", $navPositionX);
				}
			// …Otherwise, undo adjustments from above
			else if ($pagePortfolio.offset().top > ($topWindow + 20)) {
				$pageNav.removeAttr('style');
				}
			}
		};// END $updatePortfolioNav


	function updateZoomToggle($screenWidth) {
		// Show zoom toggle below 520px
		if ($screenWidth < 520) {
			$('.zoom-toggle').parents('.portfolio-hardware').addClass('hovered');
			}
		else {
			$('.zoom-toggle').parents('.portfolio-hardware').removeClass('hovered');
			}
		};// END $updateZoomToggle


	// On Scroll
	$(document).scroll(function() {
		var $screenWidth = $(window).width();
		var $offset = 0;
		var $topWindow = $(window).scrollTop();
		var $sidebarWidth = Math.round($pageSidebar.parent().width() * jQuery.data($pageSidebar, '$sidebarWidthOG')) + "px";

		updatePortfolioSidebar($topWindow,$sidebarWidth);
		updatePortfolioNav($topWindow,$screenWidth);
		updatePortfolio($topWindow);
		});// END On scroll


	// On Resize
	$(document).resize(function() {
		var $screenWidth = $(window).width();
		var $topWindow = $(window).scrollTop();
		var $sidebarWidth = Math.round($pageSidebar.parent().width() * jQuery.data($pageSidebar, '$sidebarWidthOG')) + "px";

		updatePortfolioSidebar($topWindow,$sidebarWidth);
		updateZoomToggle($screenWidth);
		});// END On Resize


	// Project Portfolio Image Zoom Togggle
	$pageMain.on('click', '.zoom-toggle', function() {
		// Remove "zoomed" class from toggles
		$pageMain.find('.zoom-toggle').parent().removeClass('zoomed');
		// Add "zoomed" class to clicked button
		$(this).parent().addClass('zoomed');
		});
	// Remove "zoomed" class on click of element
	$pageMain.on('click', '.zoomed', function() {
		$(this).removeClass('zoomed');
		});
	// Show zoom toggle below 520
	if ($screenWidth < 520) {
		$('.zoom-toggle').parents('.portfolio-hardware').addClass('hovered');
		};


	});// END document.ready