function loadProducts() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "products.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById("productList").innerHTML = xhr.responseText;
        } else {
            alert("Error loading products.");
        }
    };
    xhr.send();
}
