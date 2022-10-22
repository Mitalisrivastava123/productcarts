<?php
session_start();

?>
<?php
if (!isset($_SESSION['carts'])) {
    $_SESSION['carts'] = [];
}
?>
<?php include 'config.php'; ?>
<?php
$y = $_POST['x'];
// echo $y;

if (isset($y)) {
    $flag = 0;
    foreach ($_SESSION['carts'] as $k2 => $v2) {
        if ($v2['id'] == $y) {
            $flag = 1;
        }
    }
    if ($flag == 0) {
        foreach ($products as $k => $v) {
            if ($v['id'] == $y) {

                array_push($_SESSION['carts'], $v);
            }
        }
    } else {
        foreach ($_SESSION['carts'] as $k3 => $v3)
            if ($v3['id'] == $y) {
                $_SESSION['carts'][$k3]["quantity"] += 1;
            }
    }
}

echo json_encode($_SESSION['carts']);



?>