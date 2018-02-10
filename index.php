<?php

use App\Http\Controllers\PageController;

require './vendor/autoload.php';


define('ROOT_PATH', __DIR__);
echo '<a href="/index.php?page=index">创建首页</a>'.'<br>';
echo '<a href="/index.php?page=list">创建列表页</a>'.'<br>';
echo '<a href="/index.php?page=detail">创建详情页</a>'.'<br>';
if(isset($_GET['page'])&&!empty($_GET['page'])){

	$page =  new PageController();

	$page->create();
}





