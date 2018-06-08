<?php snippet('header') ?>
<?php snippet('nav') ?>

	<main id="page-main" class="row" role="main">
<?php


// Define Prefixes
$projectImages = $page->images();
$projectTags = $page->tags()->html();
?>

		<div class="page-portfolio">
			<div class="row-lining">
				<div class="portfolio-sidebar quarter column">
					<h1><?php echo $page->title()->html() ?></h1>

					<div class="about">
						<?php echo $page->text()->kirbytext() ?>
					</div>

					<ul class="meta">
						<li class="tags"><?php
							if($projectTags) {
								$splitTags = explode(", ", $projectTags);
								foreach($splitTags as $pT) {
									echo '<a href="'.$page->parent()->url().'?filter='.$pT.'">'.$pT.'</a> ';
									}// END foreach
								}// END if ?></li>
						<li class="client"><?php echo $page->client()->kirbytext() ?></li>
						<li class="year"><?php echo $page->year()->html() ?></li>
					</ul>
				</div><!--portfolio-sidebar-->

				<div class="portfolio-main col-23 column">
<?php

// IF HAS MUSIC FIELD
if ($page->music_embed() !== "") {
	echo "\t\t\t\t\t".$page->music_embed()."\n\n";
	}// IF HAS MSUIC


// IF PROJECT IMAGES
// *Prefixes and $projectImages are defined above
// Define project images if they exist
if($projectImages->sortBy('sort','asc')) {

	// Sort through images for filenames with "cover-" in them
	foreach($projectImages as $c) {

			// Replace non-alpha-numeric characters and ampersands w/ spaces, define classes
			$classes = preg_replace('/^[^[a-zA-Z0-9]|&|]+$/', ' ', $c->name());
			?>
					<div class="row">
						<div class="<?php echo $classes ?> full-width column">
							<div class="portfolio-hardware">
								<div class="portfolio-image">
									<span class="zoom-toggle">+</span>
									<img src="/kirby/assets/images/pixel.gif" data-original="<?php echo $c->url() ?>" class="lazy-load" alt="<?php echo $page->title()->html() ?>">
								</div>
							</div>
						</div>
						<hr>
					</div>
<?php
		}// END foreach
	}// END if
?>
				</div><!--portfolio-main-->

				<nav class="portfolio-nav column" role="navigation">
					<?php if($next = $page->nextVisible()): ?><a class="next" href="<?php echo $next->url() ?>" role="menuitem"><span>&rarr;</span></a><?php endif ?>
					<?php if($prev = $page->prevVisible()): ?><a class="prev" href="<?php echo $prev->url() ?>" role="menuitem"><span>&larr;</span></a><?php endif ?>
				</nav>
			</div><!--row-lining-->
		</div><!--page-portfolio-->
	</main>

<?php snippet('footer') ?>
