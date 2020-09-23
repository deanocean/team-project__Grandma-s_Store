
<!-- add_comment.php -->
<?php
session_start();
require_once('connectCd104g1.php');

$member_id = $_SESSION['member_id'];
$product_id = $_SESSION['product_id'];


$error = '';
$comment_name = '';
$comment_content = '';


if(empty($_POST['comment_content'])){
    $error .= '<p>需留言才可送出!</p>';
}else{
    // $comment_content = $_POST['comment_content'];
    $comment_content = $_POST['comment_content'];
}

if($error == ''){
    $sql = "
    insert into product_msg
    (member_id,product_id,title,inner_text,message_datetime)
    values(:member_id,:product_id,:title,:inner_text,now())";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":member_id", $member_id);
    $stmt->bindValue(":product_id", $product_id);
    $stmt->bindValue(":title","");
    $stmt->bindValue(":inner_text", $comment_content);
    $stmt->execute();

    $error = '<p>留言新增成功!</p>';
}

$data = array( 'error' => $error);

echo json_encode($data);
?>