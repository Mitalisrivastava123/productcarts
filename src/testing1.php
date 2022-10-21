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
echo $y;

if(isset($y))
{
foreach($products as $k => $v)
{
    // echo $k;
   if($v['id'] == $y)
   { 
    array_push($_SESSION['carts'],$v);
   }
}


echo json_encode ($_SESSION['carts']);

//     foreach($_SESSION['carts'] as $k=>$v)
//     {
//         if($v['id']==$y)
//         {
//             $flag=1;
//         }
//     }


// if($flag  == 0){
//     foreach($_SESSION['products'] as $k => $v)
//     {
//     if ($v['id'] == $y) { 
//      array_push($_SESSION['carts'],$v);
//      }
//     }
//     }



// else
// {
//     foreach($_SESSION['carts'] as $k => $v)
//     {
    
//         if($v['id']== $y)
//         {
//             $v["quantity"]++;
//         }
//     }
// }


// echo $y;



}




?>