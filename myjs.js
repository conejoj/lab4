<script>
    function popupfunction(x) {
        document.getElementById('popup' + x).style.display = 'block';
    document.getElementById('fade' + x).style.display = 'block';
        }

    function popupclose(x) {
        document.getElementById('popup' + x).style.display = 'none';
    document.getElementById('fade' + x).style.display = 'none';
        }

    const cartItems = document.getElementById('cartItems');

    function showcart() {
    var x = document.getElementById("dcart");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

    function additem(productName, price) {
        var cartItems = document.getElementById('cartItems');
        var entry = document.createElement('li');
        entry.textContent = productName + " - " + price;
        cartItems.appendChild(entry);
        }
   
</script>