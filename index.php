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
        <div id="category-menu">
            <ul>
              <li><a href="?category1=1">Meat&seafood</a>
                <ul>
                  <li><a href="?category2=Seafood">Seafood</a></li>
                  <li><a href="?category2=Meat">Beef</a></li>
                  <li><a href="?category2=Chicken">Chicken</a></li>
                </ul>
              </li>
              <li><a href="?category1=2">Daily Necessities</a>
                <ul>
                  <li><a href="?category2=Medicine">Medicine</a></li>
                  <li><a href="?category2=Cleaning">Cleaning</a></li>
                  <li><a href="?category2=Beauty">Beauty&Personal Care</a></li>
                </ul>
              </li>
              <li><a href="?category1=3">Friut&Veg</a>
                <ul>
                  <li><a href="?category2=Friut">Fruit</a></li>
                  <li><a href="?category2=Vegetable">Vegetables</a></li>
                  <li><a href="?category2=Salad">Salad</a></li>
                </ul>
              </li>
              <li><a href="?category1=4">Snacks&Drinks</a>
                <ul>
                  <li><a href="?category2=Snacks">Snack</a></li>
                  <li><a href="?category2=icecream">Ice cream</a></li>
                  <li><a href="?category2=Tea&Coffee">Tea&Coffee</a></li>
                </ul>
              </li>
              <li><a href="?category1=5">Pet food</a>
                <ul>
                  <li><a href="?category2=DogFood">Dog Food</a></li>
                  <li><a href="?category2=BirdFood">Bird Food</a></li>
                  <li><a href="?category2=CatFood">Cat Food</a></li>
                  <li><a href="?category2=FishFood">Fish Food</a></li>
                </ul>
              </li>
            </ul>
          </div>
	</header>

	<main>
  <form method="GET" class = "search">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" placeholder= "keyword of the name of product">
    <button class="button-68">Go</button>
  </form>

  <br>
      <?php include 'list_items.php'; ?>
	</main>
	<footer>
  <div id="cart"></div>
  <button id="open-cart-btn" disabled>Comfirm</button>

  <div id="cart-popup" style = 'overflow-y: auto; position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);width: 80%; height: 80%;padding: 20px;background-color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); z-index: 1000; display: none;'>

  <h2>Confirmation</h2>
  <div id="comfirm"></div>

  <div class="order-form-container">
  
  <form id="order-form" method="POST" action="checkout.php">
    <table>
      <tr>
        <td><label for="name">Name<span class="required">*</span></label></td>
        <td><input type="text" id="name" placeholder= "Your full name" name="name" required></td>
      </tr>
      <tr>
        <td><label for="address">Address<span class="required">*</span></label></td>
        <td><input type="text" id="address" placeholder= "Your shipping Address" name="address" required></td>
      </tr>
      <tr>
        <td><label for="suburb">Suburb<span class="required">*</span></label></td>
        <td><input type="text" id="suburb" placeholder= "Your suburb of address" name="suburb" required></td>
      </tr>
      <tr>
        <td><label for="state">State<span class="required">*</span></label></td>
        <td><input type="text" id="state" placeholder= "State" name="state" required></td>
      </tr>
      <tr>
        <td><label for="country">Country<span class="required">*</span></label></td>
        <td><input type="text" id="country" placeholder= "Country" name="country" required></td>
      </tr>
      <tr>
        <td><label for="email">Email<span class="required">*</span></label></td>
        <td><input type="email" id="email" placeholder= "XXX@XXX.com" name="email" required></td>
      </tr>
    </table>
    <input type="submit" value="Place Order" name="goButton">
  </form>

  <p id="order-details"></p>

  </div>
  <button id="confirm-cart-btn" class="button-68">Close</button>
  </div>

  <div id="overlay" style = 'position: fixed;top: 0;left: 0;width: 100%;height: 100%;background-color: rgba(0, 0, 0, 0.5);z-index: 999;display: none;'></div>
	</footer>
</body>
</html>

<script>
var cart = JSON.parse(localStorage.getItem('cart')) || [];

function addToCart(productId) {
    var quantity = document.getElementById("quantity_" + productId).value;
    var unitQuantity = document.getElementById("unit_" + productId).innerText;
    var unitPrice = parseFloat(document.getElementById("price_" + productId).innerHTML.replace("$", ""));
    var productName = document.getElementById("name_" + productId).innerHTML;

    if (quantity >= 20) {
      alert("The maximum quantity is 20");
        quantity = 20;
    }

    
    for (var i = 0; i < cart.length; i++) {
        if (cart[i].product_id == productId) {
            cart[i].quantity = parseInt(cart[i].quantity) + parseInt(quantity);
            updateCart();
            return;
        }
    }
    // add a new item to the cart
    cart.push({
        product_id: productId,
        quantity: quantity,
        unit_quantity: unitQuantity,
        unit_price: unitPrice,
        product_name: productName
    });
    updateCart();

    localStorage.setItem('cart', JSON.stringify(cart));
}

function updateCart() {
  if (cart.length == 0) {
  document.getElementById("open-cart-btn").disabled = true;
} else {
  document.getElementById("open-cart-btn").disabled = false;
}
    var cartHtml = "<h2>Shopping Cart</h2>" + "<button class='button-68' onclick='clearCart()'>Clear Cart</button>";
    var totalPrice = 0;
    cartHtml += "<div style='display:grid; grid-template-columns: repeat(5, 20%);grid-gap: 10px;'>";
    for (var i = 0; i < cart.length; i++) {
        cartHtml += "<div style='border: 1px solid black; padding: 10px; display: inline-block; margin-right: 10px; margin-bottom: 10px;'>";
        cartHtml += "<p style='margin: 0;'><strong>Product:</strong> " + cart[i].product_name + "</p>";
        cartHtml += "<p style='margin: 0;'><strong>Quantity:</strong> <input type='number' min='1' value='" + cart[i].quantity + "' onchange='updateQuantity(" + i + ", this.value)'> <br>" + cart[i].unit_quantity + "</p>";
        cartHtml += "<p style='margin: 0;'><strong>Unit Price:</strong> $" + cart[i].unit_price + "</p>";
        var total = cart[i].quantity * cart[i].unit_price;
        cartHtml += "<p style='margin: 0;'><strong>Total Price:</strong> $" + total + "</p>";
        cartHtml += "<button class='button-68' onclick='removeFromCart(" + cart[i].product_id + ")'>Remove</button>";
        cartHtml += "</div>";
        totalPrice += total;
    }
    cartHtml += "</div>";
    cartHtml += "<h3>Total Price: $" + totalPrice.toFixed(2) + "</h3>";
    document.getElementById("cart").innerHTML = cartHtml;

    var comfirmHtml = "<div style='display:grid; grid-template-columns: repeat(5, 20%);grid-gap: 10px;'>"
    for (var i = 0; i < cart.length; i++) {
      comfirmHtml += "<div style='border: 1px solid black; padding: 10px; display: inline-block; margin-right: 10px; margin-bottom: 10px;'>";
      comfirmHtml += "<p style='margin: 0;'><strong>Product:</strong> " + cart[i].product_name + "</p>";
      comfirmHtml += "<p style='margin: 0;'><strong>Unit Price:</strong> $" + cart[i].unit_price + "</p>";
      comfirmHtml += "<p style='margin: 0;'><strong>Quantity:</strong>"+ cart[i].quantity + "</p>"
      var total = cart[i].quantity * cart[i].unit_price;
      comfirmHtml += "<p style='margin: 0;'><strong>Total Price:</strong> $" + total + "</p>";
      comfirmHtml += "<button class='button-68' onclick='removeFromCart(" + cart[i].product_id + ")'>Remove</button>";
      comfirmHtml += "</div>";
    }
    if(cart.length == 0){
      comfirmHtml += "<p>Your cart is empty</p>";
    }
    comfirmHtml += "</div>";
    comfirmHtml += "<h3>Total Price: $" + totalPrice.toFixed(2) + "</h3>";
    document.getElementById("comfirm").innerHTML = comfirmHtml;
    localStorage.setItem('cart', JSON.stringify(cart));
}

function updateQuantity(index, quantity) {
  if (quantity >= 20) {
      alert("The maximum quantity is 20");
      quantity = 20;
    }
    cart[index].quantity = parseInt(quantity);
    updateCart();
    localStorage.setItem('cart', JSON.stringify(cart));
}

function removeFromCart(productId) {
    for (var i = 0; i < cart.length; i++) {
        if (cart[i].product_id == productId) {
            cart.splice(i, 1);
            updateCart();
            localStorage.setItem('cart', JSON.stringify(cart));
            return;
        }
    }
}

function clearCart() {
  cart = [];
  updateCart();
  localStorage.removeItem('cart');
}

window.onload = function() {
    updateCart();
    localStorage.setItem('cart', JSON.stringify(cart));
};

const openCartBtn = document.getElementById("open-cart-btn");
const cartPopup = document.getElementById("cart-popup");
const confirmCartBtn = document.getElementById("confirm-cart-btn");
const overlay = document.getElementById("overlay");

openCartBtn.addEventListener("click", function () {
  cartPopup.style.display = "block";
  overlay.style.display = "block";
});

confirmCartBtn.addEventListener("click", function () {
  cartPopup.style.display = "none";
  overlay.style.display = "none";
});

overlay.addEventListener("click", function () {
  cartPopup.style.display = "none";
  overlay.style.display = "none";
});

function validateForm() {
  var name = document.forms["order-form"]["name"].value;
  var address = document.forms["order-form"]["address"].value;
  var suburb = document.forms["order-form"]["suburb"].value;
  var state = document.forms["order-form"]["state"].value;
  var country = document.forms["order-form"]["country"].value;
  var email = document.forms["order-form"]["email"].value;
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (name == "" || address == "" || suburb == "" || state == "" || country == "" || email == "") {
    alert("Please fill in all required fields.");
    return false;
  }
  
  if (!emailRegex.test(email)) {
    alert("Please enter a valid email address.");
    return false;
  }
  
  return true;
}
</script>