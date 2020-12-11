<?php
session_start();
require 'db.php';

//已经登录 返回首页
if (@$_SESSION['user']) {
    header('location:message.php');
}

//注册
if (@$_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $time = time();
    $sql = "insert into lyb2_user values (null, '$username', '$password',$time,null)";
    $rs = mysqli_query($con,$sql);
    if ($rs){
        header('location:login.php');
    }
}


//注册成功后执行登录操作


require './view/header.html';
require './view/register.html';
require './view/footer.html';
