<ul class="page-projects row margin-spaced">
<?php foreach($site->find('work')->children()->visible()->flip() as $project) {
?>
	<li class="project-wrapper third column <?php echo preg_replace('/^|,|$/', '', $project->tags()->html()) ?> <?php echo $project->uid() ?>" style="background-color:<?php echo $project->cover_color()->html() ?>;">
		<div class="info">
			<div class="meta">
				<h3><a href="<?php echo $project->url() ?>"><?php echo $project->title()->html() ?></a></h3>
				<div class="tags"><?php echo $project->tags()->html() ?></div>
			</div>
			<a href="<?php echo $project->url() ?>" class="project-link">
				<span href="<?php echo $project->url() ?>" class="white no-fill button">View <?php echo $page->title() ?></span>
			</a>
		</div>

		<div class="covers">
<?php

// Define 
$cPrefix = "cover";

// Define covers if project has images
if($covers = $project->images()->sortBy('filename','asc')) {

	// Sort through images for filenames with "cover-" in them
	foreach ($covers as $c) {

		// Print cover HTML if filename contains "cover-"
		if (strpos($c->name(),$cPrefix) !== false) {

			// Replace non-alpha-numeric characters and ampersands w/ spaces, define classes
			$classes = preg_replace('/^[^[a-zA-Z0-9]|&|]+$/', ' ', $c->name());
			?>
			<div class="<?php echo $classes ?>"><a href="<?php echo $project->url() ?>"><img src="/kirby/assets/images/pixel.gif" data-original="<?php echo $c->url() ?>" class="lazy-load" alt="<?php echo $project->title()->html() ?>"></a></div>
<?php		}// END if
		}// END foreach
	}// END if
?>
		</div>
		<style>.<?php echo $project->uid() ?> .covers:after{background-color:<?php echo $project->cover_color()->html() ?> !important;}</style>
	</li>


<?php }// END endforeach ?>
</ul>
