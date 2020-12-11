<?php
session_start();
require 'db.php';

//已经登录 返回首页
if (@$_SESSION['user']) {
    header('location:message.php');
}

$sql = "select * from lyb2_user join lyb2_message l2m on lyb2_user.uid = l2m.uid order by write_time desc limit 5";
$rs = mysqli_query($con,$sql);
$messages = mysqli_fetch_all($rs,MYSQLI_ASSOC);

require './view/header.html';
echo '<h1 style="text-align: center; margin-top: 80px"> 不登录可以查看5条最近留言</h1>';
require './view/list.html';
require './view/footer.html';

