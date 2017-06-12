<?php
	include __DIR__ . '/start.php';
	require 'vendor/autoload.php';
	use QL\QueryList;
  	use Qiniu\Auth;
  	use Qiniu\Storage\UploadManager;
	use Illuminate\Database\Capsule\Manager as db;
	
	class vr
	{
		public $typeid;
		public function index($url,$typeid){
			$this->typeid = $typeid;
			$rules = array(
				'listUrl' => array("#content .pic-item strong a",'href')
			);
			$listUrls = QueryList::Query($url,$rules)->data;
			foreach($listUrls as $url){
				$this->getCon($url['listUrl']);
			}
		}

		function getCon($page){
			
			$title = QueryList::Query($page,array(
				"title"=>array('h1.arc-tit','text')
			))->data;
			$con = QueryList::Query($page,array(
				"con"=>array('.arc-body','html','-div.audio-read')
			))->data;
			$title = $title[0]['title'];
			$con = $con[0]['con'];
			if(!count(DB::table('su')->where('title', $title)->get())){
				if($title != ''){
					DB::table('su')->insert(array(
						array('title'=>$title,'content'=>$con,'typeid'=>$this->typeid,'su'=>1)
					));
				}
			}
		}
	}