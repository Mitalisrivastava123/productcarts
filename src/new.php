<?php 
session_start();
if(!isset($_SESSION['carts']))
{
    $_SESSION['carts']=[];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<?php include 'header.php';?>

<?php include 'config.php';?>

<table id="table1"> </table>
<table id="table2"></table>
<script>
	var prod = <?php echo json_encode($products); ?>
	// console.log(prod);
	display1();
function display1() 
{
var str1 ="";
prod.forEach(element => {
    str1 += "<div id = 'product-101' + class='product'>" + "<img src=" + element.image + "><h3 class='title'><a href='#'>Product" + element.id + "</a><h3><span>Price "+ element.price + "<span><a class='add-to-cart' id = " + element.id  +  " onclick='add1(id)' href='#'>Add to Cart</a></div>";

	$("#table1").html(str1);
});
}
			function add1(x)
			{
				// alert("hello");
				var y=x;
				// alert(y);
	            $.ajax({
                url: "testing1.php",
                type: 'POST',
                data:"x=" +y,
			    dataType:"Text",
              }).done(function(res){
				// json.parse(res);
			$("#table2").html(res);
		  })
		}


		</script>
			<?php include 'footer.php';?>

</body>
</html>