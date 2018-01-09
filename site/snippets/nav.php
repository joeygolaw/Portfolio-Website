<header id="page-header" class="row">
	<div class="row-lining">
		<div class="third column">
			<h1 id="site-logo"><a href="<?php echo url() ?>/work"><?php echo $site->title()->html() ?></a></h1>
	<?php echo ($page==$pages->find('work') || $page==$pages->find('art')) ? "\t\t".'<p id="page-about">'.$page->about().'</p>'."\n" : ""; ?>
			<span id="menu-toggle"></span>
		</div>

		<nav id="page-menu" class="third column" role="navigation">
			<ul class="main-menu" role="menubar">
	<?php

	// Main Project Categories
	foreach($pages->visible() as $p): ?>
				<li<?php e($p->isOpen(), ' class="current"') ?> role="presentation"><a class="menu-item" href="<?php echo $p->url() ?>" role="menuitem"><?php echo $p->title()->html() ?></a><?php

		// Display sub menu
		if($p->hasVisibleChildren() && $p->isActive()) {

			// Fetch all page tags
			$tags = $page->children()->visible()->sortBy('title','desc')->pluck('tags', ',', true);

			// Create Sub-Menu List
			echo "\n\t\t\t\t".'<ul id="project-filters" class="sub-menu" role="menu">';

			// Create "All (x)" filter-button
			// echo '<li role="presentation"><span class="menu-item filter-button" role="menuitem" data-filter=".project-wrapper">All '.$p->title()->html().'</span></li>';

			// Start Sub-Menu List Items
			foreach($tags as $p) {
				// Skip photos
				if ($p == 'photos') {}
				else {
					echo "\n\t\t\t\t\t"; ?><li role="presentation"><span class="menu-item filter-button" role="menuitem" data-filter=".<?php echo $p ?>"><?php echo $p ?></span></li><?php
					};
				}
			echo "\n\t\t\t\t</ul>\n\t\t\t";// END Sub-Menu List
			}// END if
	?></li>
	<?php endforeach ?>
			</ul>
		</nav>
	</div>
</header>
