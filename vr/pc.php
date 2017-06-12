<?php
	require 'su.php';
	$m = new vr();
	$url = $_GET['url'];
	if(count($url)){
		preg_match_all("/\/([0-9]*).html/",$url,$matches);
		$page = $matches[1][0] - 1;
		$page = "http://ivr.baidu.com/gamepc/".$page.".html";
		$m->index($url,4);
		echo '<script>window.location.href="http://vrs.iuc.me/pc.php?url='.$page.'";</script>';
	}else{
		$url = 'http://ivr.baidu.com/gamepc/710.html';
		preg_match_all("/\/([0-9]*).html/",$url,$matches);
		$page = $matches[1][0] - 1;
		$page = "http://ivr.baidu.com/gamepc/".$page.".html";
		$m->index($url,4);
		echo '<script>window.location.href="http://vrs.iuc.me/pc.php?url='.$page.'";</script>';
	}