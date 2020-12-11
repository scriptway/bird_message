<?php
//需要已登录
require 'session.php';
require 'db.php';
require './view/header.html';

//默认查询自己的所有留言
$sql = "select * from lyb2_user join lyb2_message l2m on lyb2_user.uid = l2m.uid where lyb2_user.uid={$_SESSION['user']['uid']} order by write_time desc";

//搜索执行
if (@$message = $_POST['message']){
    $sql = "select * from lyb2_user join lyb2_message l2m on lyb2_user.uid = l2m.uid where title like '%{$message}%' or message like '%{$message}%' order by write_time desc";
}

//全部留言
if (@$_GET['action'] == 'all'){
    $sql = "select * from lyb2_user join lyb2_message l2m on lyb2_user.uid = l2m.uid order by write_time desc";
}

$rs = mysqli_query($con,$sql);
$messages = mysqli_fetch_all($rs,MYSQLI_ASSOC);

require './view/list.html';
require './view/footer.html';