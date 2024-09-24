document.getElementById("orderForm").addEventListener("submit", function() {
    e.preventDefault();
    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "order_product.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert("Order placed successfully");
        } else {
            alert("Error placing order");
        }
    };
    xhr.send(formData);
});
