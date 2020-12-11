<?php
//需要已登录
require 'session.php';
require 'db.php';
require './view/header.html';

//修改
if($_GET['a'] == 'update'){
    $mid = $_GET['id'];
    $sql = "select * from lyb2_message where mid=$mid";
    $rs = mysqli_query($con,$sql);
    $message = mysqli_fetch_assoc($rs);
    require './view/update.html';
}
//执行更新
if (@$_POST){
    $mid = $_POST['mid'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $time = time();
    $sql = "update lyb2_message set title='$title',message='$message',write_time=$time where mid=$mid";
    $rs = mysqli_query($con,$sql);
    if ($rs){
        header('location:list.php');
    }else{
        echo '<h1 style="text-align: center; margin-top: 80px"> 修改的留言格式有误</h1>';
    }
}

//删除
if($_GET['a'] == 'del'){
    $mid = $_GET['id'];
    $sql = "delete from lyb2_message where mid={$mid}";
    if(mysqli_query($con,$sql))
        header('location:list.php');
}

require './view/footer.html';