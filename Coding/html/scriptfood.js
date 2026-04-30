let cart = [];
let total = 0;

function addToCart(item, price) {
  cart.push({ item, price });
  total += price;
  updateCart();
}

function updateCart() {
  const cartItems = document.getElementById("cart-items");
  const totalDisplay = document.getElementById("total");

  cartItems.innerHTML = "";
  cart.forEach(({ item, price }) => {
    const li = document.createElement("li");
    li.textContent = `${item} - $${price}`;
    cartItems.appendChild(li);
  });

  totalDisplay.textContent = total.toFixed(2);
}

function checkout() {
  if (cart.length === 0) {
    alert("Your cart is empty!");
    return;
  }
  alert(`Order placed! Total: $${total.toFixed(2)}`);
  cart = [];
  total = 0;
  updateCart();
}
