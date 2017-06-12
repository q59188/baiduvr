<?php
	require 'sus.php';
	$m = new su();
	$url = $_GET['url'];
	if(count($url)){
		$page = $m->index($url);
		echo '<script>window.location.href="http://vrs.iuc.me/vrzx.php?url='.$page.'";</script>';
	}else{
		$page = $m->index('http://www.vrrb.cn/kuaixun/index.html');
		echo '<script>window.location.href="http://vrs.iuc.me/vrzx.php?url='.$page.'";</script>';
	}
	