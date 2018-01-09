<?php snippet('header') ?>

<?php snippet('nav') ?>

<main id="page-main" class="info-main row margin-spaced" role="main">
	<div class="row-lining">

		<!--Contact-->
		<div class="third column">
			<div class="info-image">
<?php
	if($page->hasImages()):
	foreach($page->images() as $image):
	?>
				<img src="/kirby/assets/images/pixel.gif" data-original="<?php echo $image->url() ?>" class="lazy-load" alt="<?php echo $image->name() ?>"/>
				<a href="https://www.instagram.com/niiightmoves/" title="Chris Harned on Instagram"><em class="image-caption"><?php echo preg_replace('/_/', "&nbsp;&nbsp;", $image->name()) ?></em></a>
<?php endforeach ?>
<?php endif ?>
			</div><!--.info-image-->

			<div class="info-contact row">
				<div class="contact-email column">
					<a href="mailto:<?php echo $site->contact_email()->html() ?>" alt="Send Joey Golaw an Email">Work Inquiries</a>
				</div>
				<ul class="contact-social column pull-right">
					<li class="twitter"><a href="https://twitter.com/<?php echo $page->jg_twitter()->html() ?>" alt="<?php $site->title()->html() ?> on Twitter"><span>Twitter</span></a>
					<li class="instagram"><a href="https://instagram.com/<?php echo $page->jg_instagram()->html() ?>" alt="<?php $site->title()->html() ?> on Instagram"><span>Instagram</span></a>
					<li class="tumblr"><a href="http://<?php echo $page->jg_instagram()->html() ?>.tumblr.com" alt="<?php $site->title()->html() ?> on Tumblr"><span>tumblr</span></a>
				</ul><!--.contact-social-->
			</div><!--.info-contact-->
		</div>

		<!--About-->
		<div class="third column">
			<div class="info-tagline">
				<?php echo $site->find("work")->about()->html() ?>
			</div>
			<div class="info-about">
				<?php echo $page->about()->kirbytext() ?>
			</div>
<?php /*
			<div class="info-tools">
				<h2>Tools</h2>
				<?php echo $page->tools()->html() ?>
			</div>
*/ ?>
		</div>

		<!--Services-->
		<div class="third column">
			<div class="info-services">
				<h2>Services</h2>
				<div class="service">
					<h4><a href="<?php echo $site->find("work")->url() ?>?filter=identity">Identity Design</a></h4>
					<p><?php echo $page->identity_tagline()->html() ?></p>
					<p><small><em><?php echo $page->identity_about()->html() ?></em></small></p>
				</div>
				<div class="service">
					<h4><a href="<?php echo $site->find("work")->url() ?>?filter=interface">Interface Design</a></h4>
					<p><?php echo $page->interface_tagline()->html() ?></p>
					<p><small><em><?php echo $page->interface_about()->html() ?></em></small></p>
				</div>
				<div class="service">
					<h4><a href="<?php echo $site->find("work")->url() ?>?filter=illustration">Illustration</a></h4>
					<p><?php echo $page->illustration_tagline()->html() ?></p>
					<p><small><em><?php echo $page->illustration_about()->html() ?></em></small></p>
				</div>
		</div>
	</div>
</main>

<?php snippet('footer') ?>