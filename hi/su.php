<?php
	include __DIR__ . '/start.php';
	require 'vendor/autoload.php';
	use QL\QueryList;
	use Illuminate\Database\Capsule\Manager as db;
	class su
	{

		public function index($url){
			$datas = QueryList::Query($url,array(
				"url"=>array('.box strong a','href')
				))->data;
			$page = QueryList::Query($url,array(
				"next"=>array('.pages li a:contains(下一页)','href')
				))->data;
			foreach ($datas as $data) {
				$this->getCon($data['url']);
			}
			return "http://news.hiapk.com".$page[0]['next'];
		}
		function getCon($page){
			$title = QueryList::Query($page,array(
				"title"=>array('h1.article_title','text')
			),'','utf-8','utf-8')->data;
			$con = QueryList::Query($page,array(
				"con"=>array('.article_con','html')
			),'','utf-8','utf-8')->data;
			$title = $title[0]['title'];
			$con = $con[0]['con'];
			if(!count(DB::table('su')->where('title', $title)->get())){
				DB::table('su')->insert(array(
					array('title'=>$title,'content'=>$con,'typeid'=>1,'su'=>1)
				));
			}else{
				exit();	
			}
		}
	}
