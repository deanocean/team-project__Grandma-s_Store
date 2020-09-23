<?php
session_start();
$upload_dir = "../img/head/";
if( ! file_exists($upload_dir ))
  mkdir($upload_dir);
$img = $_POST['hidden_data'];
// $img = $_REQUEST['data_url'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace('data:image/gif;base64,', '', $img);
$data = base64_decode($img);
$t=time();
date_default_timezone_set("Asia/Taipei");
// $nt="member".date("Y-m-d_H-i-s",$t);
$nt="member_no_".$_SESSION["member_id"]."_headpic";
// $fileName = "cd104";
// $file = $upload_dir .$nt. ".png";
$file = $upload_dir .$nt. ".jpg";
$success = file_put_contents($file, $data);
echo $success ? $file : '無法存取圖片.';
?>