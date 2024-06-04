<!DOCTYPE html>
<html>
<head>
	<title>Grocery Store</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Welcome to Grocery Store</h1>
        <div>
          <a href="index.php">
            <img class="logo" src="logoImage.png" alt="logo">
          </a>
        </div>
	</header>

	<main>
    <div id="cart"></div>
    <p>We will send the comfirmation to your email. Thanks to shopping in our shop</p>
    <br>
    <strong>Your Shipping and Information</strong>
    <br>
    <br>
    <strong>Your Name:</strong> <?php echo $_POST['name'];?>
    <br>
    <strong>Address:</strong> <?php echo $_POST['address'];?>
    <br>
    <strong>Suburb:</strong> <?php echo $_POST['suburb'];?>
    <br>
    <strong>State:</strong> <?php echo $_POST['state'];?>
    <br>
    <strong>Country:</strong> <?php echo $_POST['country'];?>
    <br>
    <strong>Your Email:</strong> <?php echo $_POST['email'];?>
	</main>
	<footer>

	</footer>
</body>
</html>

<script>
var cart = JSON.parse(localStorage.getItem('cart')) || [];

function updateCart() {
    var cartHtml = "<h2>Your Order is successful</h2>";
    var totalPrice = 0;
    cartHtml += "<div class = 'table'>";
    for (var i = 0; i < cart.length; i++) {
        cartHtml += "<div style='border: 1px solid black; padding: 10px; display: inline-block; margin-right: 10px; margin-bottom: 10px;'>";
        cartHtml += "<p style='margin: 0;'><strong>Product:</strong> " + cart[i].product_name + "</p>";
        cartHtml += "<p style='margin: 0;'><strong>Quantity:</strong>" + cart[i].quantity + cart[i].unit_quantity + "</p>";
        cartHtml += "<p style='margin: 0;'><strong>Unit Price:</strong> $" + cart[i].unit_price + "</p>";
        var total = cart[i].quantity * cart[i].unit_price;
        cartHtml += "<p style='margin: 0;'><strong>Total Price:</strong> $" + total + "</p>";
        cartHtml += "</div>";
        totalPrice += total;
    }
    cartHtml += "</div>";
    cartHtml += "<h3>Total Price: $" + totalPrice.toFixed(2) + "</h3>";
    document.getElementById("cart").innerHTML = cartHtml;
}

window.onload = function() {
    updateCart();
    var cart = [];
    localStorage.setItem('cart', JSON.stringify(cart));
};
</script>
