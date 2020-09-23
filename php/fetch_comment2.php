<!-- fetch_comment.php -->

<?php
require_once('connectCd104g1.php');

$sql = "
SELECT * FROM product_msg a 
join member m on a.member_id= m.member_id 
order by message_datetime desc limit 6
";



$stmt = $pdo->query($sql);
// $stmt = $pdo->prepare($sql);
// $stmt->execute();

$result = $stmt->fetchAll();
$output = '';

foreach ($result as $row ) {
    $output .="
    <div class=comment>
         <div class='profile'>
            <img src='".$row['image_path']."' class='profile-pic'>
        </div>
        
        <div class='commentContent'>
            <input type='hidden' name='message_id' value='".$row['message_id']."'>
            <span class='memName'>".$row['name']."</span>
            <p>".$row['inner_text']."</p>
            <span class='time'>".$row['message_datetime']."</span>
            <button onclick='updateReport(".$row['message_id'].")' type='button' class='btn report'>檢舉</button>
        </div>
    </div>
    ";
}
echo $output;
?>