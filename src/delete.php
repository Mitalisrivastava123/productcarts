<?php
session_start();
$y = $_POST['x'];


foreach($_SESSION['carts'] as $k => $v)
{
    if($v['id'] == $y)
    {
        array_splice($_SESSION['carts'],$k,1);
    }
}
echo json_encode ($_SESSION['carts']);

?>