<?php
session_start();
if (!isset($_SESSION['carts'])) {
	$_SESSION['carts'] = [];
}

?>
<!-- html start -->
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
	<?php include 'header.php'; ?>

	<?php include 'config.php'; ?>




	<div id="main">
		<div id="products">
		</div>
	</div>
	<h1 style="display:none;" id="pro">ADD To CART</h1>
	<table id="table2" style="background:pink;border:1px solid black;">

	</table>
	<table id="table3"></table>
	<!-- script start -->
	<script>
		var p2 = <?php echo json_encode($products); ?>
		// console.log(prod);
		display1(p2);

		function display1(p2) {
			var str1 = "";
			p2.forEach(element => {
				str1 += "<div id = 'product-101' + class='product'>" + "<img src=" + element.image + "><h3 class='title'><a href='#'>Product" + element.id + "</a><h3><span>Price " + element.price + "<span><a class='add-to-cart' id = " + element.id + "  onclick='add(id)' href='#'>Add to Cart</a></div>";

				$("#products").html(str1);

			});
		}

		function add(x) {

			// alert("hello");
			var y = x;
			// alert(y);
			$.ajax({
				url: "addproducts.php",
				type: 'POST',
				data: "x=" + y,
				dataType: "json",
			}).done(function(res) {
				// json.parse(res);
				$("#pro").css('display', 'block');
				display_cart(res);
				// console.log(res);
				//  $("#table2").html(res);
			})
		}

		function del1(x1) {
			// console.log($m);
			// alert("hello");
			var y = x1;
			$.ajax({
				url: "delete.php",
				type: 'POST',
				data: "x=" + y,
				dataType: "json",
			}).done(function(res420) {
				console.log(res420);
				if (confirm("Are you sure you want to remove this product ")) {
					display_cart(res420);
				}
				return false;
			})
		}

		function plus(x1) {
			var y = x1;
			// console.log(y);
			$.ajax({
				url: "quantityincrease.php",
				type: 'POST',
				data: "x=" + y,
				dataType: "json",
			}).done(function(res420) {
				console.log(res420);
				display_cart(res420);
			})
		}

		function del(x1) {
			var y = x1;
			// console.log(y);
			$.ajax({
				url: "quantitydecrease.php",
				type: 'POST',
				data: "x=" + y,
				dataType: "json",
			}).done(function(res420) {
				console.log(res420);

				display_cart(res420);

			})
		}

		function emptycart() {
			// console.log(y);
			$.ajax({
				url: "emptycart.php",
				type: 'POST',
				dataType: "json",
			}).done(function(res420) {
				// console.log(res420);
				display_cart(res420);
			})
		}

		function display_cart(res) {
			// alert("hello");
			var str1 = "";

			if (res == []) {
				str1 = "";
			} else {
				res.forEach(element => {
					str1 += "<tr><td>" + element.id + "</td><td>" + element.name + "</td><td>" + "<img src=" + element.image + "></td><td>" + element.price + "</td><td><td><button type='button'   onclick='del(id)' id=" + element.id + " >-</button></td><td>" + element.quantity + "</td></td><td><button type='button' onclick='plus(id)' id=" + element.id + ">+</button></td><td><button type='button' style='background:black;padding:10px;color:#fff;border:none;' class='delete' onclick='del1(" + element.id + ")'  value='" + element + "' id = " + element.id + " >delete</button><td></tr>";
				});
			}
			var empty1 = "<button type='submit' id='btn1' onclick='emptycart()' style='background:#3e9cbf;border:none;color:#fff;padding:10px;'>Empty Cart</button>";
			$("#table3").html(empty1);
			$("#table2").html(str1);
		}
	</script>
	<script src="script.js"></script>
	<?php include 'footer.php'; ?>

</body>

</html>