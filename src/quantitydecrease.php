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
                if($v2['quantity']>1 && $v2['id']==$y)
                {
                $_SESSION['carts'][$k2]["quantity"]-= 1;
                }
                else if($v2['quantity']<=1 && $v2['id']==$y)
                {
                  
                    array_splice($_SESSION['carts'],$k2,1);
                  }
                }
    
            echo json_encode ($_SESSION['carts']);
