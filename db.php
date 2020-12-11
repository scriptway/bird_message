<?php
$host = '127.0.0.1:3306';
$user = 'root';
$pwd = 'root';
$dbname = 'test';
$con = mysqli_connect($host,$user,$pwd,$dbname);
if(!$con){
    echo "错误信息：" . mysqli_connect_error($con);
    die;
}
