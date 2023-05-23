
<?php
session_start();
?>
<?php
		function CheckRegPrison($WhereExp){
			$conn = mysqli_connect('localhost', 'root' , "zsk", 'practice_tst');

			if (!mysqli_connect_errno()) {
				$WhereExp = mysqli_real_escape_string($conn, $WhereExp);
				$SQL_QUERY_CHECKER = "SELECT ID, opis FROM zaklady where opis = '$WhereExp'";
				$response = mysqli_query($conn, $SQL_QUERY_CHECKER);
				if(mysqli_num_rows($response) == 1){
					mysqli_close($conn);
					return true;
				}
				else{
					mysqli_close($conn);
					return false;
				} 

				
			}
			mysqli_close($conn);

		}
		if(isset($_POST['city_']) and CheckRegPrison($_POST['city_'])){
			
		} else{
			// Redirect to a specific URL
			
			header("Location: paczki");
		}
	?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/styles/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@1&display=swap" rel="stylesheet">
  <title>Product Quantity Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      padding: 0;
      margin: 0;
    }

    form{
      width: 100%;
      display:flex;
      justify-content: center;
      
      flex-wrap: wrap;
      min-height: 100vh;
    }

    .product-container {
      display: flex;
      overflow: hidden;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100%;

    }

    .product-form {
      display: flex;
      align-items: center;
      background-color: #fff;
      padding: 10px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      margin-bottom: 10px;
      width: 85%;
    }

    .product-info {
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }

    .product-name {
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .product-price {
      font-size: 14px;
      color: #888;
    }

    .quantity-input {
      display: flex;
      align-items: center;
    }

    .quantity-input input {
      width: 40px;
      text-align: center;
      margin: 0 5px;
      border: none;
      border-radius: 3px;
      background-color: #f1f1f1;
      font-size: 14px;
      padding: 5px;
    }

    .quantity-input div {
      border: none;
      color: blue;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      cursor: pointer;
    }

    .add-to-cart-btn {
      margin-top: 10px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 3px;
      cursor: pointer;
      width: 100%;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .summary{
      margin: 10px;
      margin-left: 30px;
      width: 350px;
    }

    .add-to-cart-btn:hover {
      background-color: #45a049;
    }

    .price{
      width: 100%;
      display: flex;
      justify-content: space-between;
    }
  </style>
  <script>

    $(document).ready(function(){
      let productIDs = [];
        let quantities = [];

        $('.quantity').each(function() {
          let productName = $(this).attr("name");
          let quantity = parseInt($(this).val());

          // Add the product ID and quantity to the arrays
          productIDs.push(productName);
          quantities.push(quantity);
        });
        console.log(productIDs);

        // Create an object to send to the server
        var data = {
          productIDs: productIDs,
          quantities: quantities
        };

        // Send the data to the server
        $.ajax({
          type: 'POST',
          url: 'kosz.php', // Specify the server-side script URL
          data: data,
          dataType: 'json',
          success: function(response) {
            // Retrieve the calculated total price from the server response
            let totalPrice = response.totalPrice;


            // Display the total price
            $('#cena').text(totalPrice + 'zł');
          },
          error: function(xhr, status, error) {
            // Handle the error case
            console.log('Error:', error);
          }
        });
      }
    )
  </script>
</head>
<body>
<div class="menu">
        <div class="list">
        <a  href="http://localhost/Practice#o-nas">O nas</a>
            <a   href="http://localhost/Practice/wypiska">Wpłać wypiskę</a>
            <a   href="http://localhost/Practice#top">Kontakt</a>
            <a   href="http://localhost/Practice#o-nas">Strona główna</a>
        </div>
    </div>
    <section class="top">
        <div>Serwis dla rodzin osób osadzonych</div>
        <div><a href="mailto:kontakt@gmail.com">kontakt@gmail.com</a></div>
    </section>
    <header>
        <div>
            <a href="http://localhost/Practice/">
            <img height="60px" src="https://www.zpozdrowieniem.pl/wp-content/themes/zpozdrowieniem.dev/images/logo.png">
            </a>
        </div>
        <nav>
        <a class="hover-underline-animation" href="http://localhost/Practice#o-nas">O nas</a>
            <a class="hover-underline-animation"  href="http://localhost/Practice/wypiska">Wpłać wypiskę</a>
            <a class="hover-underline-animation"  href="http://localhost/Practice#top">Kontakt</a>
            <a class="hover-underline-animation"  href="http://localhost/Practice/paczki">Paczki</a>
            <a class="hover-underline-animation"  href="http://localhost/Practice#o-nas">Strona główna</a>
            <svg class="icon-menu" height="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
        </nav>
    </header>
    <form action="zamow" method = "POST">
      <div class="product-container">

        <?php
        $zaklad = $_POST['city_'];
        echo "<input type='hidden' name='city_' value='$zaklad' >";
          $filePath = 'Artykuły-przeglądanie_20230516.csv';
          $CHECK = true;
          $header = null;
          $all_data = array();
          $prices_arr = array();
          if (($handle = fopen($filePath, 'r')) !== false) {
            while (($data = fgetcsv($handle)) !== false) {
              if($CHECK){
                $header = $data;
                $CHECK = false;
              }
              else{
                $all_data[] = $data;
                $ilosc = $data[2];
                $cena = $data[15];
                $nazwa = $data[0];

                $prices_arr[$nazwa] = (float)$cena;

                if($data[2] > 0){
                  ECHO "<div class='product-form'>
                  <div class='product-info'>
                    <div class='product-name'>$nazwa</div>
                    <div class='product-price'>$cena zł</div>
                  </div>
                  <div class='quantity-input'>
                    <div  onclick='decreaseQuantity()'>-</div>
                    <input type='number' name='$nazwa' class='quantity' value='0' min='0' max='$ilosc'>
                    <div onclick='increaseQuantity()'>+</div>
                  </div>
                </div>";
                }

              } 
              
            }
            fclose($handle);
          } else {
            echo "Failed to open the file: $filePath";
          }

         
    
    ?>
    </div> 
    <div class="summary">
      <div class='product-name' style="font-size: 23px;">Podsumowanie</div><br>
      <div class='product-price'>Metoda płatności - Przelewy24<br>
        Szybki przelew / BLIK / karta płatnicza <br>
      </div><br>
        <div class="price">
        <div class='product-name'>Do zapłaty</div><div class='product-name' id="cena">0 zł</div>
      </div>
      <button class="add-to-cart-btn" type="submit">Add to Cart</button>      
    </div>
    </form>


  
  <section class="przelewy24">
        <img src="assets/images/przelewy24.png">
    </section>
    <footer><a>ZPOZDROWIENIEM.PL© | 2023</a><a href="#"> Polityka prywatności</a><a href="#">Regulamin</a></footer>
    <script src="assets/scripts/script.js"></script>
  <script>
    var price = 0;
    function decreaseQuantity() {
      const quantityInput = event.target.nextElementSibling;
      let quantity = parseInt(quantityInput.value);
      if (quantity >= 1) {
        quantity--;
        quantityInput.value = quantity;

        
        let productIDs = [];
        let quantities = [];

        $('.quantity').each(function() {
          let productName = $(this).attr("name");
          let quantity = parseInt($(this).val());

          // Add the product ID and quantity to the arrays
          productIDs.push(productName);
          quantities.push(quantity);
        });
        console.log(productIDs);

        // Create an object to send to the server
        var data = {
          productIDs: productIDs,
          quantities: quantities
        };

        // Send the data to the server
        $.ajax({
          type: 'POST',
          url: 'kosz.php', // Specify the server-side script URL
          data: data,
          dataType: 'json',
          success: function(response) {
            // Retrieve the calculated total price from the server response
            let totalPrice = response.totalPrice;
            price = totalPrice;
            // Display the total price
            $('#cena').text(totalPrice + 'zł');
          },
          error: function(xhr, status, error) {
            // Handle the error case
            console.log('Error:', error);
          }
        });
      }
      }
    

    function increaseQuantity() {
      const quantityInput = event.target.previousElementSibling;
      let quantity = parseInt(quantityInput.value);
      if(quantity+1 <= quantityInput.max) 
      {
        quantity++;
        quantityInput.value = quantity;
        let productIDs = [];
        let quantities = [];

        $('.quantity').each(function() {
          let productName = $(this).attr("name");
          let quantity = parseInt($(this).val());

          // Add the product ID and quantity to the arrays
          productIDs.push(productName);
          quantities.push(quantity);
        });
        console.log(productIDs);

        // Create an object to send to the server
        var data = {
          productIDs: productIDs,
          quantities: quantities
        };

        // Send the data to the server
        $.ajax({
          type: 'POST',
          url: 'kosz.php', // Specify the server-side script URL
          data: data,
          dataType: 'json',
          success: function(response) {
            // Retrieve the calculated total price from the server response
            let totalPrice = response.totalPrice;
            price = totalPrice;
            // Display the total price
            $('#cena').text(totalPrice + 'zł');
          },
          error: function(xhr, status, error) {
            // Handle the error case
            console.log('Error:', error);
          }
        });
      }

    }

    document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault(); // Zapobiega domyślnemu zachowaniu formularza

    if (price > 0) {
      this.submit();
    } 
  });

    
  </script>
</body>
</html>
