<?php
session_start();

if (!isset($_SESSION['carts'])) {
	$_SESSION['carts'] = [];
}

$y = $_POST['x'];
// echo $y;

    foreach($_SESSION['carts'] as $k2 => $v2)
    if($v2['id']== $y)
            {
                $_SESSION['carts'][$k2]["quantity"]+= 1;
            }
    
            echo json_encode ($_SESSION['carts']);

   
?>