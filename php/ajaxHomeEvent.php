<?php
try{
    require_once("connectCd104g1.php");
    $sql = "
    select 
    m.name as 'memName',
    mha.activity_id as 'activity_id',
    mha.activity_type_id as 'activity_type_id',
    mha.title as 'title', 
    mha.name as 'name', 
    mha.desc_image01_path as 'imgPath', 
    mha.hold_date as 'date', 
    mha.description as 'desc', 
    mha.max_people as 'max_people',
    s.store_id as 'store_id',
    s.name as 'store'

    from member_hold_activity mha 
        JOIN member m ON mha.member_id = m.member_id
        JOIN store s ON mha.store_id = s.store_id
    order by mha.hold_date desc
    limit 10
    ";
    $memAct = $pdo->query($sql);
    $actItem = "";
    while($e = $memAct->fetchObject()){
        $e = json_encode($e);
        $actItem .= $e."|";
    };
    echo substr($actItem,0,-1);
}catch(PDOException $e){
  echo "error";
}
?>