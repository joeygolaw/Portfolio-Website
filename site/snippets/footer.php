<footer id="page-footer" class="row" role="contentinfo">
	<div class="row-lining">
		<div id="footer-title" class="third column">
			<strong><?php echo $site->title() ?></strong>
			<br>
			<?php echo $site->work_title()->kirbytext() ?>
		</div>
		<div id="site-contact" class="third column">
			<strong>Contact</strong>
			<br>
			<a href="mailto:<?php echo $site->contact_email()->html() ?>" alt="Send Joey Golaw an Email">Work Inquiries</a>
			<br>
			<a href="https://twitter.com/<?php echo $site->contact_twitter()->html() ?>" alt="Find Joey Golaw on Twitter">Twitter</a>
		</div>
		<div id="site-colophon" class="third column">
			<?php echo $site->copyright()->kirbytext() ?>
			<?php echo $site->colophon()->kirbytext() ?>
		</div>
	</div>
</footer>

<!--JS-->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<?php echo js('assets/js/isotope.min.js') ?>
<?php echo js('assets/js/lazyload.min.js') ?>
<?php echo js('assets/js/jg-projects.js') ?>
<?php if(!$page->hasChildren()) {echo js('assets/js/jg-project.js');} ?>

</body>
</html>