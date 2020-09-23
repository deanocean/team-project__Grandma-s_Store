<?php
session_start();
if( isset($_SESSION['account']) === true ){
    echo json_encode($_SESSION);
}else{
    echo "Not logging in";
}
?>