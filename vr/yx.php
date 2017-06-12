<?php
	require 'su.php';
	$m = new vr();
	$url = $_GET['url'];
	if(count($url)){
		preg_match_all("/\/([0-9]*).html/",$url,$matches);
		$page = $matches[1][0] - 1;
		$page = "http://ivr.baidu.com/gamenews/".$page.".html";
		$m->index($url,2);
		echo '<script>window.location.href="http://vrs.iuc.me/yx.php?url='.$page.'";</script>';
	}else{
		$url = 'http://ivr.baidu.com/gamenews/710.html';
		preg_match_all("/\/([0-9]*).html/",$url,$matches);
		$page = $matches[1][0] - 1;
		$page = "http://ivr.baidu.com/gamenews/".$page.".html";
		$m->index($url,2);
		echo '<script>window.location.href="http://vrs.iuc.me/yx.php?url='.$page.'";</script>';
	}