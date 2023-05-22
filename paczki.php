

<?php session_start(); ?>
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
			
			header("Location: artykuly.php");
		}
	?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8" />
	<title>Dlaosadzonych</title>
	<link rel="stylesheet" href="assets/styles/form.css">
	<link rel="stylesheet" href="assets/styles/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
</head>
<body>
    <style>
        
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
           .summary{
      margin: 10px;
      margin-top: 50px;
      margin-left: 30px;
      width: 350px;
      display: block;
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
    #combined-form{
    min-height: 72vh;
    width: 100%;
    display: flex;
    justify-content: center;
    flex-wrap:wrap;
}

.price{
    display: flex;
    justify-content: space-between;
}

.form-section{
    width: 40vw;
}


canvas{
	background-color: #e3e2de;
	border-radius: 20px;
}
    </style>
	<div class="menu">
        <div class="list">
			<a  href="http://localhost/Practice#o-nas">O nas</a>
            <a  href="http://localhost/Practice/wypiska">Wpłać wypiskę</a>
            <a  href="http://localhost/Practice#top">Kontakt</a>
            <a  href="http://localhost/Practice#o-nas">Strona główna</a>
        </div>
    </div>
    <section class="top" id="top">
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


	<form id="combined-form" action="" method="post">
        <div>
		<div class="form-section">
			<h2>Osoba wspierajaca</h2>
			<label for="name">Imie<span style="color:red;">*</span>:</label>
			<input type="text" id="name" name="name" pattern="[A-Za-z]{2,50}" required>

			<label for="surname">Nazwisko<span style="color:red;">*</span>:</label>
			<input type="text" id="surname" name="surname" pattern="[A-Za-z\s]{2,50}" required>

			<label for="postnum">Numer pocztowy<span style="color:red;">*</span>:</label>
			<input type="text" id="postnum" name="postnum" pattern="\d{2}-\d{3}" required>

			<label for="city">Miasto<span style="color:red;">*</span>:</label>
			<input type="text" id="city" name="city" pattern="[A-Za-z\s]{2,50}" required>

			<label for="phone">Numer telefonu<span style="color:red;">*</span>:</label>
			<input type="text" id="phone" name="phone" pattern="\d{9}" required>

			<label for="email">Email<span style="color:red;">*</span>:</label>
			<input type="email" id="email" name="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,}" required>

			
		</div>
		
		<div class="form-section">
			<h2>Odbiorca wypiski (osoba osadzona)</h2>
			<label for="name_">Imie<span style="color:red;">*</span>:</label>
			<input type="text" id="name_" name="name_" pattern="[A-Za-z\s]{2,50}" required>

			<label for="surname_">Nazwisko<span style="color:red;">*</span>:</label>
			<input type="text" id="surname_" name="surname_" pattern="[A-Za-z\s]{2,50}" required>

			<label for="father_name">Imie ojca<span style="color:red;">*</span>:</label>
			<input type="text" id="father_name" name="father_name" pattern="[A-Za-z\s]{2,50}" required>
	
			<div style="margin:5px;"><span style="color:red;">*</span> - pole obowiązkowe do wypełnienia</div>
			

		</div>

		<div  class="form-section">
			<label>Wprowadź swój podpis<span style="color:red;">*</span>:</label><br>
			<input type="hidden" name="canvasData" id="canvasData">
			<canvas id="canvas" width="500" height="300"></canvas>
		</div>

        </div>
        <div class="summary">
      <div class='product-name' style="font-size: 23px;">Podsumowanie</div><br>
      <div class='product-price'>Metoda płatności - Przelewy24<br>
        Szybki przelew / BLIK / karta płatnicza <br>
      </div><br>
        <div class="price">
        <div class='product-name'>Do zapłaty</div><div class='product-name' id="cena"><?php 
        if(isset($_SESSION["PRICE"])){
            echo $_SESSION["PRICE"];
        } else echo -1;
         ?>zł</div>
      </div>
      <button class="add-to-cart-btn" type="submit">Add to Cart</button>      
    </div>

		
	</form>
	<section class="przelewy24">
        <img src="assets/images/przelewy24.png">
    </section>
    <footer><a>ZPOZDROWIENIEM.PL© | 2023</a><a href="#"> Polityka prywatności</a><a href="#">Regulamin</a></footer>
	<script>

		function isCanvasEmpty(canvas) {
		var context = canvas.getContext("2d");

		// Get the pixel data from the canvas
		var imageData = context.getImageData(0, 0, canvas.width, canvas.height);
		var pixelData = imageData.data;

		// Check if all pixel values are transparent or have an alpha value of 0
		for (var i = 0; i < pixelData.length; i += 4) {
			var alpha = pixelData[i + 3];
			if (alpha !== 0) {
			return false;
			}
		}

		return true;
		}



		let canvasElement = document.getElementById('canvas');
		let context = canvasElement.getContext('2d');

		// Variables to track mouse movements
		let isDrawing = false;
		let lastX = 0;
		let lastY = 0;

		// Event listeners for drawing functionality
		canvasElement.addEventListener('mousedown', startDrawing);
		canvasElement.addEventListener('mousemove', draw);
		canvasElement.addEventListener('mouseup', stopDrawing);
		canvasElement.addEventListener('mouseout', stopDrawing);

		// Function to start drawing
		function startDrawing(e) {
		isDrawing = true;
		[lastX, lastY] = [e.offsetX, e.offsetY];
		}

		// Function to draw on the canvas
		function draw(e) {
		if (!isDrawing) return;

		context.beginPath();
		context.moveTo(lastX, lastY);
		context.lineTo(e.offsetX, e.offsetY);
		context.stroke();
		[lastX, lastY] = [e.offsetX, e.offsetY];
		}

		function stopDrawing() {
		isDrawing = false;
		}

		const formSe = document.getElementById('combined-form');
		formSe.addEventListener('submit', function(){
				event.preventDefault();
				var canvas = document.getElementById("canvas");
			var dataURL = canvas.toDataURL();
			if(!isCanvasEmpty(canvas)){
				
				console.log(dataURL);
		
				createPDFWithImage(canvas);
				document.querySelector("#canvasData").value = dataURL;
				this.submit;
			}

		

		});

		function createPDFWithImage(src) {
  const doc = new jsPDF();

  // Load the Base64 image
  const img = new Image();
  img.src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAArwAAAH0CAYAAADfWf7fAAAAAXNSR0IArs4c6QAAIABJREFUeF7t3QuwrWdZH/C/TmdaLtICUghOgSLUgRRFCihpQ0sRZIqAsXYEC15mCERAWxWGWyCEW4OCvUgAgSoqlXhrEEzFC6U1I5TLMFRKUgWUpjYBFKwXZOx0TOcl76Irh33O2Xuvd+/9fO/3WzNr9iFZ613P83tecv7nO9/6vi+KBwECBAgQIECAAIGJBb5o4t60RoAAAQIECBAgQCACr01AgAABAgQIECAwtYDAO/V4NUeAAAECBAgQICDw2gMECBAgQIAAAQJTCwi8U49XcwQIECBAgAABAgKvPUCAAAECBAgQIDC1gMA79Xg1R4AAAQIECBAgIPDaAwQIECBAgAABAlMLCLxTj1dzBAgQIECAAAECAq89QIAAAQIECBAgMLWAwDv1eDVHgAABAgQIECAg8NoDBAgQIECAAAECUwsIvFOPV3MECBAgQIAAAQICrz1AgAABAgQIECAwtYDAO/V4NUeAAAECBAgQICDw2gMECBAgQIAAAQJTCwi8U49XcwQIECBAgAABAgKvPUCAAAECBAgQIDC1gMA79Xg1R4AAAQIECBAgIPDaAwQIECBAgAABAlMLCLxTj1dzBAgQIECAAAECAq89QIAAAQIECBAgMLWAwDv1eDVHgAABAgQIECAg8NoDBAgQIECAAAECUwsIvFOPV3MECBAgQIAAAQICrz1AgAABAgQIECAwtYDAO/V4NUeAAAECBAgQICDw2gMECBAgQIAAAQJTCwi8U49XcwQIECBAgAABAgKvPUCAAAECBAgQIDC1gMA79Xg1R4AAAQIECBAgIPDaAwQIECBAgAABAlMLCLxTj1dzBAgQIECAAAECAq89QIAAAQIECBAgMLWAwDv1eDVHgAABAgQIECAg8NoDBAgQIECAAAECUwsIvFOPV3MECBAgQIAAAQICrz1AgAABAgQIECAwtYDAO/V4NUeAAAECBAgQICDw2gMECBAgQIAAAQJTCwi8U49XcwQIECBAgAABAgKvPUCAAAECBAgQIDC1gMA79Xg1R4AAAQIECBAgIPDaAwQIECBAgAABAlMLCLxTj1dzBAgQIECAAAECAq89QIAAAQIECBAgMLWAwDv1eDVHgAABAgQIECAg8NoDBAgQIECAAAECUwsIvFOPV3MECBAgQIAAAQICrz1AgAABAgQIECAwtYDAO/V4NUeAAAECBAgQICDw2gMECBAgQIAAAQJTCwi8U49XcwQIECBAgAABAgKvPUCAAAECBAgQIDC1gMA79Xg1R4AAAQIECBAgIPDaAwQIECBAgAABAlMLCLxTj1dzBAgQIECAAAECAq89QIAAAQIECBAgMLWAwDv1eDVHgAABAgQIECAg8NoDBAgQIECAAAECUwsIvFOPV3MECBAgQIAAAQICrz1AgAABAgQIECAwtYDAO/V4NUeAAAECBAgQICDw2gMECBAgQIAAAQJTCwi8U49XcwQIECBAgAABAgKvPUCAAAECBAgQIDC1gMA79Xg1R4AAAQIECBAgIPDaAwQIECBAgAABAlMLCLxTj1dzBAgQIECAAAECAq89QIAAAQIECBAgMLWAwDv1eDVHgAABAgQIECAg8NoDBAgQIECAAAECUwsIvFOPV3MECBAgQIAAAQICrz1AgAABAgQIECAwtYDAO/V4NUeAAAECBAgQICDw2gMECBAgQIAAAQJTCwi8U49XcwQIECBAgAABAgKvPUCAAAECBAgQIDC1gMA79Xg1R4AAAQIECBAgIPDaAwQIECBAgAABAlMLCLxTj1dzBAgQIECAAAECAq89QIAAAQIECBAgMLWAwDv1eDVHgAABAgQIECAg8NoDBAgQIECAAAECUwsIvFOPV3MECBAgQIAAAQICrz1AgAABAgQIECAwtYDAO/V4NUeAAAECBAgQICDw2gMECBAgQIAAAQJTCwi8U49XcwQIECBAgAABAgKvPUCAAAECBAgQIDC1gMA79Xg1R4AAAQIECBAgIPDaAwQIECBAgAABAlMLCLxTj1dzBAgQIECAAAECAq89QIAAAQIECBAgMLWAwDv1eDVHgAABAgQIECAg8NoDBAgQIECAAAECUwsIvFOPV3MECBAgQIAAAQICrz1AgAABAgQIECAwtYDAO/V4NUeAAAECBAgQICDw2gMECBAgQIAAAQJTCwi8U49XcwQIECBAgAABAgKvPUCAAAECBAgQIDC1gMA79Xg1R4AAAQIECBAgIPDaAwQIECBAgAABAlMLCLxTj1dzBAgQIECAAAECAq89QIAAAQIECBAgMLWAwDv1eDVHgAABAgQIECAg8NoDBAgQIECAAAECUwsIvFOPV3MECBAgQIAA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fVrCEbRiSQIE1ipwFP/RWqulvgkQIECAAAECBAoKCLwFh6IkAgQIECBAgACBcQIC7zhLKxEgQIAAAQIECBQUEHgLDkVJBAgQIECAAAEC4wQE3nGWViJAgAABAgQIECgoIPAWHIqSCBAgQIAAAQIExgkIvOMsrUSAAAECBAgQIFBQQOAtOBQlESBAgAABAgQIjBPspP41AAAN70lEQVQQeMdZWokAAQIECBAgQKCggMBbcChKIkCAAAECBAgQGCcg8I6ztBIBAgQIECBAgEBBAYG34FCURIAAAQIECBAgME5A4B1naSUCBAgQIECAAIGCAgJvwaEoiQABAgQIECBAYJyAwDvO0koECBAgQIAAAQIFBQTegkNREgECBAgQIECAwDgBgXecpZUIECBAgAABAgQKCgi8BYeiJAIECBAgQIAAgXECAu84SysRIECAAAECBAgUFBB4Cw5FSQQIECBAgAABAuMEBN5xllYiQIAAAQIECBAoKCDwFhyKkggQIECAAAECBMYJCLzjLK1EgAABAgQIECBQUEDgLTgUJREgQIAAAQIECIwTEHjHWVqJAAECBAgQIECgoIDAW3AoSiJAgAABAgQIEBgnIPCOs7QSAQIECBAgQIBAQQGBt+BQlESAAAECBAgQIDBOQOAdZ2klAgQIECBAgACBggICb8GhKIkAAQIECBAgQGCcgMA7ztJKBAgQIECAAAECBQUE3oJDURIBAgQIECBAgMA4AYF3nKWVCBAgQIAAAQIECgoIvAWHoiQCBAgQIECAAIFxAgLvOEsrESBAgAABAgQIFBQQeAsORUkECBAgQIAAAQLjBATecZZWIkCAAAECBAgQKCgg8BYcipIIECBAgAABAgTGCQi84yytRIAAAQIECBAgUFBA4C04FCURIECAAAECBAiMExB4x1laiQABAgQIECBAoKCAwFtwKEoiQIAAAQIECBAYJyDwjrO0EgECBAgQIECAQEEBgbfgUJREgAABAgQIECAwTkDgHWdpJQIECBAgQIAAgYICAm/BoSiJAAECBAgQIEBgnIDAO87SSgQIECBAgAABAgUFBN6CQ1ESAQIECBAgQIDAOAGBd5yllQgQIECAAAECBAoKCLwFh6IkAgQIECBAgACBcQIC7zhLKxEgQIAAAQIECBQUEHgLDkVJBAgQIECAAAEC4wQE3nGWViJAgAABAgQIECgoIPAWHIqSCBAgQIAAAQIExgkIvOMsrUSAAAECBAgQIFBQQOAtOBQlESBAgAABAgQIjBMQeMdZWokAAQIECBAgQKCggMBbcChKIkCAAAECBAgQGCcg8I6ztBIBAgQIECBAgEBBAYG34FCURIAAAQIECBAgME5A4B1naSUCBAgQIECAAIGCAgJvwaEoiQABAgQIECBAYJyAwDvO0koECBAgQIAAAQIFBQTegkNREgECBAgQIECAwDgBgXecpZUIECBAgAABAgQKCgi8BYeiJAIECBAgQIAAgXECAu84SysRIECAAAECBAgUFBB4Cw5FSQQIECBAgAABAuMEBN5xllYiQIAAAQIECBAoKCDwFhyKkggQIECAAAECBMYJCLzjLK1EgAABAgQIECBQUEDgLTgUJREgQIAAAQIECIwTEHjHWVqJAAECBAgQIECgoIDAW3AoSiJAgAABAgQIEBgnIPCOs7QSAQIECBAgQIBAQQGBt+BQlESAAAECBAgQIDBOQOAdZ2klAgQIECBAgACBggICb8GhKIkAAQIECBAgQGCcgMA7ztJKBAgQIECAAAECBQUE3oJDURIBAgQIECBAgMA4AYF3nKWVCBAgQIAAAQIECgoIvAWHoiQCBAgQIECAAIFxAgLvOEsrESBAgAABAgQIFBQQeAsORUkECBAgQIAAAQLjBATecZZWIkCAAAECBAgQKCgg8BYcipIIECBAgAABAgTGCQi84yytRIAAAQIECBAgUFBA4C04FCURIECAAAECBAiMExB4x1laiQABAgQIECBAoKCAwFtwKEoiQIAAAQIECBAYJyDwjrO0EgECBAgQIECAQEEBgbfgUJREgAABAgQIECAwTkDgHWdpJQIECBAgQIAAgYICAm/BoSiJAAECBAgQIEBgnIDAO87SSgQIECBAgAABAgUFBN6CQ1ESAQIECBAgQIDAOAGBd5yllQgQIECAAAECBAoKCLwFh6IkAgQIECBAgACBcQIC7zhLKxEgQIAAAQIECBQUEHgLDkVJBAgQIECAAAEC4wQE3nGWViJAgAABAgQIECgoIPAWHIqSCBAgQIAAAQIExgkIvOMsrUSAAAECBAgQIFBQQOAtOBQlESBAgAABAgQIjBMQeMdZWokAAQIECBAgQKCggMBbcChKIkCAAAECBAgQGCcg8I6ztBIBAgQIECBAgEBBAYG34FCURIAAAQIECBAgME5A4B1naSUCBAgQIECAAIGCAgJvwaEoiQABAgQIECBAYJyAwDvO0koECBAgQIAAAQIFBQTegkNREgECBAgQIECAwDgBgXecpZUIECBAgAABAgQKCgi8BYeiJAIECBAgQIAAgXECAu84SysRIECAAAECBAgUFBB4Cw5FSQQIECBAgAABAuMEBN5xllYiQIAAAQIECBAoKCDwFhyKkggQIECAAAECBMYJCLzjLK1EgAABAgQIECBQUEDgLTgUJREgQIAAAQIECIwTEHjHWVqJAAECBAgQIECgoIDAW3AoSiJAgAABAgQIEBgnIPCOs7QSAQIECBAgQIBAQQGBt+BQlESAAAECBAgQIDBOQOAdZ2klAgQIECBAgACBggICb8GhKIkAAQIECBAgQGCcgMA7ztJKBAgQIECAAAECBQUE3oJDURIBAgQIECBAgMA4AYF3nKWVCBAgQIAAAQIECgoIvAWHoiQCBAgQIECAAIFxAgLvOEsrESBAgAABAgQIFBQQeAsORUkECBAgQIAAAQLjBATecZZWIkCAAAECBAgQKCgg8BYcipIIECBAgAABAgTGCQi84yytRIAAAQIECBAgUFBA4C04FCURIECAAAECBAiMExB4x1laiQABAgQIECBAoKCAwFtwKEoiQIAAAQIECBAYJyDwjrO0EgECBAgQIECAQEEBgbfgUJREgAABAgQIECAwTkDgHWdpJQIECBAgQIAAgYICAm/BoSiJAAECBAgQIEBgnIDAO87SSgQIECBAgAABAgUFBN6CQ1ESAQIECBAgQIDAOAGBd5yllQgQIECAAAECBAoKCLwFh6IkAgQIECBAgACBcQIC7zhLKxEgQIAAAQIECBQUEHgLDkVJBAgQIECAAAEC4wQE3nGWViJAgAABAgQIECgoIPAWHIqSCBAgQIAAAQIExgkIvOMsrUSAAAECBAgQIFBQQOAtOBQlESBAgAABAgQIjBMQeMdZWokAAQIECBAgQKCggMBbcChKIkCAAAECBAgQGCcg8I6ztBIBAgQIECBAgEBBAYG34FCURIAAAQIECBAgME5A4B1naSUCBAgQIECAAIGCAgJvwaEoiQABAgQIECBAYJyAwDvO0koECBAgQIAAAQIFBQTegkNREgECBAgQIECAwDgBgXecpZUIECBAgAABAgQKCgi8BYeiJAIECBAgQIAAgXECAu84SysRIECAAAECBAgUFBB4Cw5FSQQIECBAgAABAuMEBN5xllYiQIAAAQIECBAoKCDwFhyKkggQIECAAAECBMYJCLzjLK1EgAABAgQIECBQUEDgLTgUJREgQIAAAQIECIwTEHjHWVqJAAECBAgQIECgoIDAW3AoSiJAgAABAgQIEBgnIPCOs7QSAQIECBAgQIBAQQGBt+BQlESAAAECBAgQIDBOQOAdZ2klAgQIECBAgACBggICb8GhKIkAAQIECBAgQGCcgMA7ztJKBAgQIECAAAECBQUE3oJDURIBAgQIECBAgMA4AYF3nKWVCBAgQIAAAQIECgoIvAWHoiQCBAgQIECAAIFxAgLvOEsrESBAgAABAgQIFBQQeAsORUkECBAgQIAAAQLjBATecZZWIkCAAAECBAgQKCgg8BYcipIIECBAgAABAgTGCQi84yytRIAAAQIECBAgUFBA4C04FCURIECAAAECBAiMExB4x1laiQABAgQIECBAoKCAwFtwKEoiQIAAAQIECBAYJyDwjrO0EgECBAgQIECAQEEBgbfgUJREgAABAgQIECAwTkDgHWdpJQIECBAgQIAAgYICAm/BoSiJAAECBAgQIEBgnIDAO87SSgQIECBAgAABAgUFBN6CQ1ESAQIECBAgQIDAOAGBd5yllQgQIECAAAECBAoKCLwFh6IkAgQIECBAgACBcQIC7zhLKxEgQIAAAQIECBQUEHgLDkVJBAgQIECAAAEC4wQE3nGWViJAgAABAgQIECgoIPAWHIqSCBAgQIAAAQIExgkIvOMsrUSAAAECBAgQIFBQQOAtOBQlESBAgAABAgQIjBMQeMdZWokAAQIECBAgQKCggMBbcChKIkCAAAECBAgQGCcg8I6ztBIBAgQIECBAgEBBAYG34FCURIAAAQIECBAgME5A4B1naSUCBAgQIECAAIGCAgJvwaEoiQABAgQIECBAYJyAwDvO0koECBAgQIAAAQIFBQTegkNREgECBAgQIECAwDgBgXecpZUIECBAgAABAgQKCgi8BYeiJAIECBAgQIAAgXECAu84SysRIECAAAECBAgUFBB4Cw5FSQQIECBAgAABAuMEBN5xllYiQIAAAQIECBAoKCDwFhyKkggQIECAAAECBMYJCLzjLK1EgAABAgQIECBQUEDgLTgUJREgQIAAAQIECIwTEHjHWVqJAAECBAgQIECgoIDAW3AoSiJAgAABAgQIEBgnIPCOs7QSAQIECBAgQIBAQQGBt+BQlESAAAECBAgQIDBOQOAdZ2klAgQIECBAgACBggICb8GhKIkAAQIECBAgQGCcgMA7ztJKBAgQIECAAAECBQX+Hx5wIiIE5Lf/AAAAAElFTkSuQmCC";

  // Set the image size and position
  const imageWidth = 100; // adjust the width as needed
  const imageHeight = (img.height * imageWidth) / img.width;
  const xPos = 50; // adjust the X position as needed
  const yPos = 50; // adjust the Y position as needed

  // Add the image to the PDF document
  doc.addImage(img, 'PNG', xPos, yPos, imageWidth, imageHeight);
	console.log(doc);
  // Save the PDF document
  doc.save('document.pdf');
};
	</script>
    <script src="assets/scripts/script.js"></script>


	<?php
		$db_name = 'practice_tst';
		$db_password = '';
		$db_user = 'root';
		$db_host = 'localhost';
		$RegExps = [
			'/^(?=.*[A-Za-z])[A-Za-z\s]{2,50}$/', 
			'/^(?=.*[A-Za-z])[A-Za-z\s]{2,50}$/', 
			'/^(?=.*[A-Za-z])[A-Za-z\s]{2,50}$/',
			'/^(?=.*[A-Za-z])[A-Za-z\s]{2,50}$/', 
			'/^(?=.*[A-Za-z])[A-Za-z\s]{2,50}$/',
			'/^\d{2}-\d{3}$/',
			'/^(?=.*[A-Za-z])[A-Za-z\s]{2,50}$/',
			'/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/',
			'/^(?=.*\d)\d{9}$/'
		];



		function CheckAllValues($POSTS, $REGEXPS){
			for($i=0; $i<count($POSTS); $i++){
				if(!preg_match($REGEXPS[$i], $POSTS[$i])){
					return false;
				}
			}
			return true;
		}
		if(isset($_POST['submit'])){
			$POSTS_TAB = [
				$_POST['name'], 
				$_POST['name_'], 
				$_POST['surname'], 
				$_POST['surname_'], 
				$_POST['father_name'], 
				$_POST['postnum'],
				$_POST['city'],
				$_POST['email'], 
				$_POST['phone']

			];
			if(CheckAllValues($POSTS_TAB, $RegExps) and $_SESSION["PRICE"] > 0 and $_SESSION["PRICE"] < 9000 and CheckRegPrison($_GET['city_'])){
				
				//Json_config - json do wysłania
				$json_config['imie'] = $_POST['name'];
				$json_config['imie_wypiska'] = $_POST['name_'];
				$json_config['nazwisko'] = $_POST['surname'];
				$json_config['nazwisko_wypiska'] = $_POST['surname_'];
				$json_config['imie_ojca'] = $_POST['father_name'];
				$json_config['kod_pocztowy'] = $_POST['postnum'];
				$json_config['miasto'] = $_POST['city'];
				$json_config['email'] = $_POST['email'];
				$json_config['telefon'] = $_POST['phone'];
				echo    "<script>
				alert('Sukces');
				</script>";
			}
			else 	echo    "<script>
			alert('Błędny formularz');
			</script>";

	
		}
	?>

<!--
		Do zrobienia:
				- Płatności
				- Wypełanienie strony sesownymi danymi
				- Regulaminy itd.
-->

</body>
</html>
