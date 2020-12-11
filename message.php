<?php
//需要已登录
require 'session.php';
require 'db.php';
require './view/header.html';
//如果有post
if (@$_POST){
    $uid = $_SESSION['user']['uid'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $time = time();
    $sql = "insert into lyb2_message values (null,$uid,'$title','$message',$time)";
    $rs = mysqli_query($con,$sql);
    if ($rs){
        echo '<h1 style="text-align: center; margin-top: 80px"> 添加成功</h1>';
    }else{
        echo '<h1 style="text-align: center; margin-top: 80px"> 添加的留言格式有误</h1>';
    }
}

require './view/message.html';
require './view/footer.html';