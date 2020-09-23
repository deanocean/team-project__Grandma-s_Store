<?php
session_start();
$upload_dir = "images/";
if( ! file_exists($upload_dir ))
  mkdir($upload_dir);
$img = $_POST['hidden_data'];
$img = str_replace('data:image/png;base64,', '', $img);
$data = base64_decode($img);
$t=time();
date_default_timezone_set("Asia/Taipei");
$nt="Apo".date("Y-m-d_H-i-s",$t);
// $fileName = "cd104";
$file = $upload_dir .$nt. ".png";
$success = file_put_contents($file, $data);
echo $success ? $file : '無法存取圖片.';
?>