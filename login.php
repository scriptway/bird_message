<?php
session_start();
require 'db.php';

//已经登录 返回首页
if (@$_SESSION['user']) {
    header('location:message.php');
}

//登录
if(@$_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select * from lyb2_user where username='$username' and password='$password'";
    $rs = mysqli_query($con,$sql);
    $user = mysqli_fetch_assoc($rs);
    if ($user){
        $_SESSION['user'] = $user;
        header('location:message.php');
    }
}

//登出
if (@$_GET['action'] == 'logout'){
    unset($_SESSION['user']);
}

require './view/header.html';
require './view/login.html';
require './view/footer.html';