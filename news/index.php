<?php
	require 'su.php';
	$m = new su();
	$url = $_GET['url'];
	if(count($url)){
		$page = $m->index($url);
		echo '<script>window.location.href="http://news.iuc.me?url='.$page.'";</script>';
	}else{
		$page = $m->index('http://news.91.com/apple/');
		echo '<script>window.location.href="http://news.iuc.me?url='.$page.'";</script>';
	}
	
