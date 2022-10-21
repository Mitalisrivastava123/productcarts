<?php
session_start();
$flag  = 0;
?>
<?php
if(!isset($_SESSION['carts']))
{
    $_SESSION['carts']=[];
}
?>
<?php include 'config.php'; ?>
<?php 
$y = $_POST['x'];
// echo $y;

if(isset($y))
{

$flag = 0 ;
foreach($products as $k => $v)
{
    // echo $k;
   if($v['id'] == $y)
   {
    array_push($_SESSION['carts'],$v);
   }
}



    foreach($_SESSION['carts'] as $k=>$v)
    {
        if($v['id']==$y)
        {
            $flag=1;
        }
    }


if($flag  == 0){
    foreach($_SESSION['products'] as $k => $v)
    {
        if($v['id']== $y)
        {
            $_SESSION['carts'][$k]["quantity"]+= 1;
        }
    }
    }

}
echo json_encode ($_SESSION['carts']);

?>