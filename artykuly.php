
  
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

  <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@1&display=swap" rel="stylesheet">
  <title>Product Quantity Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      padding: 0;
      margin: 0;
    }

    .product-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .product-form {
      display: flex;
      align-items: center;
      background-color: #fff;
      padding: 10px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      margin-bottom: 10px;
      width: 350px;
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
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .add-to-cart-btn:hover {
      background-color: #45a049;
    }
  </style>
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
            <a class="hover-underline-animation"  href="http://localhost/Practice#o-nas">Strona główna</a>
            <svg class="icon-menu" height="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
        </nav>
    </header>
    <form action="" method="POST">
      <div class="product-container">

        <?php
          $filePath = 'Artykuły-przeglądanie_20230516.csv';
          $CHECK = true;
          $header = null;
          $all_data = array();
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
                if($data[2] > 0){
                  ECHO "<div class='product-form'>
                  <div class='product-info'>
                    <div class='product-name'>$nazwa</div>
                    <div class='product-price'>$cena zł</div>
                  </div>
                  <div class='quantity-input'>
                    <div  onclick='decreaseQuantity()'>-</div>
                    <input type='number' id='quantity' value='0' min='0' max='$ilosc'>
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

          echo ($all_data[0][0]);
    
    ?>
      <div class="product-form">
        <div class="product-info">
          <div class="product-name">Product 2</div>
          <div class="product-price">$14.99</div>
        </div>
        <div class="quantity-input">
          <div type="button" onclick="decreaseQuantity()">-</div>
          <input type="number" id="quantity" value="0" min="0">
          <div type="button" onclick="increaseQuantity()">+</div>
        </div>
      </div>

      <div class="product-form">
        <div class="product-info">
          <div class="product-name">Product 3</div>
          <div class="product-price">$19.99</div>
        </div>
        <div class="quantity-input">
          <div type="button" onclick="decreaseQuantity()">-</div>
          <input type="number" id="quantity" value="0" min="0">
          <div type="button" onclick="increaseQuantity()">+</div>
        </div>
      </div>
    </div>
    </form>


  <button class="add-to-cart-btn" type="submit">Add to Cart</button>
  <section class="przelewy24">
        <img src="assets/images/przelewy24.png">
    </section>
    <footer><a>ZPOZDROWIENIEM.PL© | 2023</a><a href="#"> Polityka prywatności</a><a href="#">Regulamin</a></footer>
    <script src="assets/scripts/script.js"></script>
  <script>
    function decreaseQuantity() {
      const quantityInput = event.target.nextElementSibling;
      let quantity = parseInt(quantityInput.value);
      if (quantity >= 1) {
        quantity--;
        quantityInput.value = quantity;
      }
    }

    function increaseQuantity() {
      const quantityInput = event.target.previousElementSibling;
      let quantity = parseInt(quantityInput.value);
      quantity++;
      quantityInput.value = quantity;
    }
  </script>
</body>
</html>
