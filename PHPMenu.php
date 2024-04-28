<!DOCTYPE html>



<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu with PHP </title>

    <link rel="stylesheet" href="css/mystyles.css" />
    <script type="text/javascript" src="js/myjs.js"></script>

</head>
    <?php include("db_connection.php"); ?>



<body bgcolor="#fff">
    <img class="logo" src="img/jbulogo.png" />

    <br><br><br>
    <center>
        <h1> JBU's Online store </h1>
    </center>

    <ul>

        <li class="menu-item">
            <a href="#" class="drp">Books </a>
            <div class="menu-content">
                <a href="add_book.php">Add Book</a><br>
                <a href="remove_book.php">Remove Book</a><br>
                <a href="display_books.php">Display all Books</a><br>
            </div>

        </li>

        <li class="menu-item">
            <a href="#" class="drp">Clothing </a>
            <div class="menu-content">
                <a href="add_book.php">Sweaters</a><br>
                <a href="remove_book.php">Pants</a><br>
                <a href="display_books.php">Hats</a><br>
            </div>

        </li>

        <li class="menu-item">
            <a href="#" class="drp">Users </a>
            <div class="menu-content">
                <a href="add_user.php">Add User</a><br>
                <a href="remove_user.php">Remove User</a><br>
                <a href="display_users.php">Display all Users</a><br>
            </div>
        </li>
        <li>
            <div>
                <img id="cartImg" src="img/cart.jpg" onclick="showcart()" />
            </div>
            <div id="dcart" style="display: none;">
                <strong>Cart Items:</strong>
                <ul id="cartItems" style="height: 350px;"></ul>

            </div>
        </li>
    </ul>
    <p align="center"> Welcome to JBU's Online store - open for faculty/staff and students!</p>

    <table align="center" width="80%">
        <tr>
        <?php
                $count = 1;
                $sql_product = "SELECT * FROM product_tab";
                $result_product = $connect->query($sql_product);
                while ($row_product = $result_product->fetch_assoc()){
        ?>
            <td align="center">
                <?php echo "<img src='" . $row_product["product_image"] . "' /><br>"; ?>
                <a href="javascript:void(0)" onclick="popupfunction('<?php echo $row_product["sid"]; ?>')"> <?php echo $row_product["product_name"]; ?> </a><br><br>
                <button onclick="javascript:additem('<?php echo $row_product["product_name"] . "', '" . $row_product["unit_price"]; ?>')"> Add To Cart </button>
            </td>

	
		
            <?php
            if ($count % 5 == 0) { 
            echo "</tr><tr>"; 
        }
        $count++; 
    }
            ?>

    </tr>
</table>
			
    <table align="center">
    <tr>
        <?php
        $result_product->data_seek(0); 
        $count = 1;
        while ($row_product = $result_product->fetch_assoc()) {
        ?>
            <td align="center">
                <div id="fade<?php echo $count; ?>" class="black_content"></div>
                <div id="popup<?php echo $count; ?>" class="white_content" style="display: none;">
                    <img src='<?php echo $row_product["product_image"]; ?>' width="20%" /><br>
                    <?php echo $row_product["product_name"]; ?><br>
                    <?php echo $row_product["unit_price"]; ?><br>
                    <a href="javascript:void(0)" onclick="popupclose('<?php echo $count; ?>')" class="linktext">Close Window</a>
                </div>
            </td>
        <?php
            $count++;
        }
        ?>
    </tr>
</table>


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

        document.addEventListener('DOMContentLoaded', function () {
            var cartImg = document.getElementById('cartImg');
            var dcart = document.getElementById('dcart');


            window.showcart = function () {
                dcart.style.display = dcart.style.display === 'none' ? 'block' : 'none';
            };


            document.addEventListener('click', function (event) {
                var isClickInsideCartImg = cartImg.contains(event.target);
                var isClickInsideCart = dcart.contains(event.target);

                if (!isClickInsideCartImg && !isClickInsideCart && dcart.style.display === 'block') {
                    dcart.style.display = 'none';
                }
            });
        });

        function additem(productName, price) {
            var cartItems = document.getElementById('cartItems');
            var entry = document.createElement('li');
            entry.textContent = productName + " - " + price;
            cartItems.appendChild(entry);
        }

    </script>
</body>
</html>




