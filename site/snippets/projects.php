<ul class="page-projects row margin-spaced">
<?php foreach($page->children()->visible()->flip() as $project) {
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

		// Print cover HTML if filename contains "cover-" and not "twitter"
		if ((strpos($c->name(),$cPrefix) !== false) && (strpos($c->name(),'twitter') == false)) {

			// Replace non-alpha-numeric characters and ampersands w/ spaces, define classes
			$classes = preg_replace('/^[^[a-zA-Z0-9]|&|]+$/', ' ', $c->name());
			?>
			<div class="<?php echo $classes ?>"><a href="<?php echo $project->url() ?>"><img src="<?php echo url('assets/images/pixel.gif'); ?>" data-original="<?php

				// If is a interface phone cover reduce image size/qualit
				if (strpos($c->name(),'&phone') !== false) {
					echo thumb($c, array('width'=>400,'crop'=>false,'quality'=>20))->url();
					}

				// Else just echo image url
				else {
					echo $c->url();
					};
				?>" class="lazy-load" alt="<?php echo $project->title()->html() ?>"></a></div>
<?php		}// END if
		}// END foreach
	}// END if
?>
		</div>
		<style>.<?php echo $project->uid() ?> .covers:after{background-color:<?php echo $project->cover_color()->html() ?> !important;}</style>
	</li>


<?php }// END endforeach ?>
</ul>
