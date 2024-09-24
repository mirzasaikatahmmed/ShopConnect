function loadOrderHistory() 
{
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "order_history.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById("orderHistory").innerHTML = xhr.responseText;
        } else {
            alert("Error loading order history.");
        }
    };
    xhr.send();
}
