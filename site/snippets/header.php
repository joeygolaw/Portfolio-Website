<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo html($site->title()) ?>: <?php echo html($site->work_title()) ?> / <?php echo html($page->title()) ?></title>

	<!--Meta-->
	<meta charset="utf-8" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="user-scalable=no, width=device-width, maximum-scale=1" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="apple-mobile-web-app-capable" content="no" />
	<meta name="description" content="<?php
		if ($page==$pages->find('work')) {
			echo "I'm an independent designer and developer " . lcfirst ($pages->find('work')->about());
			}
		elseif ($page==$pages->find('art')) {
			echo "I'm an artist and musician " . lcfirst ($pages->find('art')->about());
			}
		elseif ($page==$pages->find('info')) {
			echo preg_replace( "/\r|\n/", "", $pages->find('info')->about());
			}
		elseif ($page->text() != "") {
			echo truncate(html($page->text()));
			}
		else {
			echo preg_replace( "/\r|\n/", "", $pages->find('info')->about());
			};
		?>" />
	<meta name="keywords" content="<?php echo html($site->meta_keywords()) ?>" />
	<meta name="copyright" content="<?php echo html($site->meta_copyright()).date('Y')." ".html($site->title().". All Rights Reserved."); ?>" />

	<!--JS-->
	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<script type="text/javascript" src="//use.typekit.net/tiv0iyf.js"></script>
	<script type="text/javascript">/*Typekit*/try{Typekit.load();}catch(e){};</script>

	<!--CSS-->
	<?php echo css('assets/css/style.css?v=1.0') ?>


	<!--Twitter-->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@<?php echo html($site->contact_twitter()) ?>" />
	<meta name="twitter:title" content="<?php echo html($page->title()) ?>" />
	<meta name="twitter:description" content="<?php

		// Truncate function for Twitter cards
		function truncate($string,$length=280,$append="…") {
			$string = preg_replace('/\*/', '', $string);
			$string = trim($string);

			if(strlen($string) > $length) {
			$string = wordwrap($string, $length);
			$string = explode("\n", $string, 2);
			$string = $string[0] . $append;
			}

			return $string;
			}

		if ($page==$pages->find('work')) {
			echo truncate("I'm an independent designer and developer " . lcfirst ($pages->find('work')->about()));
			}
		elseif ($page==$pages->find('art')) {
			echo truncate("I'm an artist and musician " . lcfirst ($pages->find('art')->about()));
			}
		elseif ($page==$pages->find('info')) {
			echo preg_replace( "/\r|\n/", "", $pages->find('info')->about());
			}
		elseif ($page->text() != "") {
			echo truncate(html($page->text()));
			}
		else {
			echo preg_replace( "/\r|\n/", "", $pages->find('info')->about());
			};

			?>" />
	<meta name="twitter:image" content="<?php

		// If page has images
		if($tCover=$page->files()->find('cover&twitter.jpg')) {
			echo $tCover->url();// find twitter cover
			}

		else {
			echo url('assets/images/jg-twitter-default-image.gif');
			}

			?>" />
	<meta name="twitter:url" content="<?php echo html($page->url()) ?>" />

	<!--Misc-->
	<link rel="icon" type="image/x-icon" href="http://www.joeygolaw.com/assets/images/favicon.ico" />
	<link rel="shortcut icon" type="image/x-icon" href="http://www.joeygolaw.com/assets/images/favicon.ico" />
</head>

<body<?php
	echo ($page->isHomePage()) ? ' id="home"' : '' ;
	echo ($page==$pages->find('work')) ? ' id="work"' : '';
	echo ($page==$pages->find('art')) ? ' id="art"' : '';
	echo ($page==$pages->find('info')) ? ' id="info"' : '';
	echo (! $page->hasChildren()) ? ' id="project"' : '';
	?>>
<div id="page-wrapper">
