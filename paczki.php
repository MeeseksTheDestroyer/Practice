

<?php session_start(); ?>
<?php
		require 'vendor/autoload.php';
		use Mpdf\Mpdf;
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
			$CITY_FLOP = $_POST['city_'];
		} else{
			// Redirect to a specific URL
			
			header("Location: zamowienie");
			exit();
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
			<a class="hover-underline-animation"  href="http://localhost/Practice/paczki">Paczki</a>
            <a class="hover-underline-animation"  href="http://localhost/Practice#o-nas">Strona główna</a>
            <svg class="icon-menu" height="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
        </nav>
    </header>


	<form id="combined-form" action="pdf.php" method="POST">
        <div>
		<div class="form-section">
			<h2>Osoba wspierajaca</h2>
			<input type="hidden" name="city_" value="<?php echo $CITY_FLOP ?>">
			<label for="name">Imie<span style="color:red;">*</span>:</label>
			<input type="text" id="name" name="name" pattern="^(?=.*[\p{L}])[A-Za-z\p{L}\s]{2,50}$" required>

			<label for="surname">Nazwisko<span style="color:red;">*</span>:</label>
			<input type="text" id="surname" name="surname" pattern="^(?=.*[\p{L}])[A-Za-z\p{L}\s]{2,50}$" required>

			<label for="postnum">Numer pocztowy<span style="color:red;">*</span>:</label>
			<input type="text" id="postnum" name="postnum" pattern="\d{2}-\d{3}" required>

			<label for="city">Miasto<span style="color:red;">*</span>:</label>
			<input type="text" id="city" name="city" pattern="^(?=.*[\p{L}])[A-Za-z\p{L}\s]{2,50}$" required>

			<label for="phone">Numer telefonu<span style="color:red;">*</span>:</label>
			<input type="text" id="phone" name="phone" pattern="\d{9}" required>

			<label for="email">Email<span style="color:red;">*</span>:</label>
			<input type="email" id="email" name="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,}" required>
			<label for="family">Kim jesteś dla osoby osadzonej<span style="color:red;">*</span>:</label>
			<input type="text" id="family" name="family" pattern="[\p{L}]{3,50}" placeholder="np. żona, mąż, brat" required>
			<label for="adres">Adres zamieszkania<span style="color:red;">*</span>:</label>
			<input type="text" id="adres" name="adres" pattern="^[\p{L}\d\s.,-]{3,}$" placeholder="np. Poznańska, 13" required>
			
		</div>
		
		<div class="form-section">
			<h2>Odbiorca wypiski (osoba osadzona)</h2>
			<label for="name_">Imie<span style="color:red;">*</span>:</label>
			<input type="text" id="name_" name="name_" pattern="[A-Za-z\s]{2,50}" required>

			<label for="surname_">Nazwisko<span style="color:red;">*</span>:</label>
			<input type="text" id="surname_" name="surname_" pattern="[A-Za-z\s]{2,50}" required>

			<label for="father_name">Imie ojca<span style="color:red;">*</span>:</label>
			<input type="text" id="father_name" name="father_name" pattern="[A-Za-z\s]{2,50}" required>
	
			<label for="birthday">Data urodzenia<span style="color:red;">*</span>:</label>
			<input type="date" id="birthday" name="birthday" required>
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
      <input class="add-to-cart-btn" type="submit" name="sub">      
    </div>

		
	</form>
	<section class="przelewy24">
        <img src="assets/images/przelewy24.png">
    </section>
    <footer><a>ZPOZDROWIENIEM.PL© | 2023</a><a href="#"> Polityka prywatności</a><a href="#">Regulamin</a></footer>
	<script>

		function isCanvasEmpty(canvas) {
		let context = canvas.getContext("2d");

		// Get the pixel data from the canvas
		let imageData = context.getImageData(0, 0, canvas.width, canvas.height);
		let pixelData = imageData.data;

		// Check if all pixel values are transparent or have an alpha value of 0
		for (let i = 0; i < pixelData.length; i += 4) {
			let alpha = pixelData[i + 3];
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

		let formSe = document.getElementById('combined-form');
		formSe.addEventListener('submit', function(event){
				event.preventDefault();
				let canvas = document.getElementById("canvas");
			let dataURL = canvas.toDataURL();
			if(!isCanvasEmpty(canvas)){
				document.querySelector("#canvasData").value = dataURL;
				console.log(dataURL);
		
				console.log(this);
				
				this.submit();
				
			}
			else alert("Nie ma zad");

		

		});


	</script>
    


	<?php
		$db_name = 'practice_tst';
		$db_password = '';
		$db_user = 'root';
		$db_host = 'localhost';
		$RegExps = [
			'/^(?=.*[\p{L}])[A-Za-z\p{L}\s]{2,50}$/u', 
			'/^(?=.*[\p{L}])[A-Za-z\p{L}\s]{2,50}$/u', 
			'/^(?=.*[\p{L}])[A-Za-z\p{L}\s]{2,50}$/u',
			'/^(?=.*[\p{L}])[A-Za-z\p{L}\s]{2,50}$/u', 
			'/^(?=.*[\p{L}])[A-Za-z\p{L}\s]{2,50}$/u',
			'/^\d{2}-\d{3}$/',
			'/^(?=.*[\p{L}])[A-Za-z\p{L}\s]{2,50}$/u',
			'/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/',
			'/^(?=.*\d)\d{9}$/',
			'/^[\p{L}]{3,50}$/u'
		];



		function CheckAllValues($POSTS, $REGEXPS){
			for($i=0; $i<count($POSTS); $i++){
				if(!preg_match($REGEXPS[$i], $POSTS[$i])){
					return false;
				}
			}
			return true;
		}
		if(isset($_POST['name'])){
			echo "<script>alert('Maka paka fa');</script>";
			$POSTS_TAB = [
				$_POST['name'], 
				$_POST['name_'], 
				$_POST['surname'], 
				$_POST['surname_'], 
				$_POST['father_name'], 
				$_POST['postnum'],
				$_POST['city'],
				$_POST['email'], 
				$_POST['phone'],
				$_POST['family']
			];
			if(CheckAllValues($POSTS_TAB, $RegExps) and $_SESSION["PRICE"] > 0 and $_SESSION["PRICE"] < 9000 and CheckRegPrison($_POST['city_']) and str_starts_with($_POST["canvasData"], "data:image/png;base64")){
				
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
				$url = $_POST["canvasData"];
				$arr = [["Mleko", "2", "3", "34.44", "wart", "23"]];
				$waga = 0.0;
				$sum = 0.0;
				$ccc = 0;
				$tds = "";
				for ($i = 0; $i < 25; $i++) {
					$tds .= "<tr>";
					$cc = $ccc + 1;
					$tds .= "<td style='text-align:center; border: 2px solid black; padding: 3px;'>$cc</td>";
					for ($j = 0; $j < 6; $j++) {
						if ($i < count($arr)) {
							$tmp = $arr[$i][$j];
							$tds .= "<td style='text-align:center; border: 2px solid black; padding: 3px;'>$tmp</td>";
							if($j == 3){
								$sum+=(float)$tmp;
							}
							if($j == 5){
								$waga+=(float)$tmp;
							}
						} else {
							$tds .= "<td style='text-align:center; border: 2px solid black; padding: 3px;'></td>";
						}
						
					}
					$ccc += 1;
					$tds .= "</tr>";
				}
				
				
				
				   

						$html = "
						<!DOCTYPE html>
						<html lang='pl'>
						<head>
							<meta charset='UTF-8'>
							<meta http-equiv='X-UA-Compatible' content='IE=edge'>
							<meta name='viewport' content='width=device-width, initial-scale=1.0'>
							<title>Document</title>
							<style>
				 
					*{
						line-height:90%;
						font-size:90%;
					}
				
								body{
									padding-left: 50px;
									padding-right: 50px;
								}
				
								.bolder{
									font-weight: bolder;
								}
							</style>
						</head>
						<body>
							<h1 style='text-decoration: underline; text-align: center;'>ZAMÓWIENIE NA PACZKĘ</h1>
							<div style='padding: 5px 0px 5px 0px;'>realizowaną w punkcie sprzedaży prowadzonym przy <strong class='bolder'>Zakładzie Karnym we Wronkach</strong></div>
							<div  style='padding: 5px 0px 5px 0px; display:flex; align-items:center;'>Numer konta punktu sprzedaży:<h4 style='font-weight: 600;'>63 1610 1146 2000 0120 5871 0004</h4></div>
							<div  style='padding: 5px 0px 5px 0px;'>Bank Spółdzielczy SGB - Spółdzielcza Grupa Bankowa</div>
							<h4 style='text-align: center; height: 30pt;'>(Tytuł: ZK Wronki – paczka żywnościowa dla: [imię, nazwisko, imię ojca, data urodzenia)</h4>
							<h4 style='text-align: center;'>E-mail: epaczki.wronki@pomet-wronki.com.pl</h4>
							Dane sporządzającego zamówienie (osoba najbliższa dla skazanego):
						</body>
						</html>
						";
				
				
						
				
						// Create a new mPDF instance
						$mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
				
						$wronki = "Zakładzie Karnym we Wronkach";
						// Set PDF content
						$mpdf->WriteHTML("<h1 style='text-decoration: underline;  line-height: 0.1; text-align: center;'>ZAMÓWIENIE NA PACZKĘ</h1>
						<div style=' height:1mm;'>realizowaną w punkcie sprzedaży prowadzonym przy <strong class='bolder'>$wronki</strong></div>
						<div  style='height:0.25cm;'>Numer konta punktu sprzedaży: <strong >63 1610 1146 2000 0120 5871 0004</strong></div>
						<div  style=' height:0.25cm;'>Bank Spółdzielczy SGB - Spółdzielcza Grupa Bankowa</div>
						<h4 style='text-align: center;  line-height: 0.3'>(Tytuł: ZK Wronki – paczka żywnościowa dla: [imię, nazwisko, imię ojca, data urodzenia)</h4>
						<h4 style='text-align: center;  line-height: 0.3; '>E-mail: epaczki.wronki@pomet-wronki.com.pl</h4>
						<p style='text-align:center; line-height: 0.1;'>Dane sporządzającego zamówienie (osoba najbliższa dla skazanego):</p>
						<table style='border-collapse: collapse; width:100%;'>
						<tr>
							<td style='text-align:center; border: 2px solid black; padding: 5px;'>Imię</td>
							<td style='text-align:center; border: 2px solid black; padding: 5px;'>Nazwisko</td>
							<td style='text-align:center; border: 2px solid black; padding: 5px;'>Imię ojca</td>
							<td style='text-align:center; border: 2px solid black; padding: 5px;'>Stopień pokrewieństwa</td>
						</tr>
						<tr>
							<td style='border: 2px solid black; text-align:center; padding: 5px;'>Row 1, Column 1</td>
							<td style='border: 2px solid black; text-align:center; padding: 5px;'>Row 1, Column 2</td>
							<td style='border: 2px solid black; text-align:center; padding: 5px;'>Row 1, Column 3</td>
							<td style='border: 2px solid black; text-align:center; padding: 5px;'>Row 1, Column 4</td>
						</tr>
						<tr>
							<td colspan='3' style='border: 2px solid black; border-right-width: 1px; padding: 3px;'>Adres zamieszkania:</td>
							<td style='border: 2px solid black; padding: 3px;'>Nr telefonu (opcjonalne)</td>
						</tr>
						<tr>
							<td colspan='3' style='border: 1px solid black; border-right-width: 1px; padding: 3px;'>Adres zamieszkania:</td>
							<td style='border: 1px solid black; padding: 3px;text-align:center;'>Row 3, Column 4</td>
						</tr>
					</table><br>
					<p style='text-align:center; line-height: 0.05;'>Dane obiorcy paczki (skazany):</p>
					<table style='border-collapse: collapse; width:100%;'>
						<tr>
						<td style='text-align:center; border: 1px solid black; padding: 3px;'>Imię</td>
						<td style='text-align:center; border: 1px solid black; padding: 3px;'>Nazwisko</td>
						<td style='text-align:center; border: 1px solid black; padding: 3px;'>Imię ojca</td>
						<td style='text-align:center; border: 1px solid black; padding: 3px;'>Data urodzenia</td>
						</tr>
				
						<tr>
						<td style='text-align:center;   border: 1px solid black; padding: 3px;'>Imię</td>
						<td style='text-align:center;   border: 1px solid black; padding: 3px;'>Nazwisko</td>
						<td style='text-align:center;  border: 1px solid black; padding: 3px;'>Imię ojca</td>
						<td style='text-align:center; border: 1px solid black; padding: 3px;'>Data urodzenia</td>
						</tr>
					</table><br>
					<p style='text-align:center; line-height: 0.05;'>Lista produktów:</p>
					<table style='border-collapse: collapse; width: 100%;'>
					<tr>
						<td style='text-align:center; border: 1px solid black; padding: 3px;'>L.p.</td>
						<td style='text-align:center; border: 1px solid black; padding: 3px;'>Nazwa produktu</td>
						<td style='text-align:center; border: 1px solid black; padding: 3px;'>Pozycja<br>katalog.</td>
						<td style='text-align:center; border: 1px solid black; padding: 3px;'>Ilość</td>
						<td style='text-align:center; border: 1px solid black; padding: 3px;'>Cena<br>brutto</td>
				
						<td style='text-align:center; border: 1px solid black; padding: 3px;'>Wartość</td>
						<td style='text-align:center; border: 1px solid black; padding: 3px;'>Waga</td>
					</tr>
				
						$tds
					<tr>
						<td colspan='4' style='border:none; padding: 3px;'></td>
						<th style='border:none; padding: 3px;text-align:center;'>Razem</th>
						<th style='border: 2px solid black; padding: 3px;text-align:center;'>$sum</th>
						<th style='border: 2px solid black; padding: 3px;text-align:center;'>$waga</th>
					</tr>
				
				
				</table>
					<div style='text-align:right; width:100%;'>
					<div style='width: 55%; float:left; visibility:hidden;'>fd</div>
					<div style='width:45%  ;float:left; text-align:right; padding: 20px 0px 40px 0px; border-bottom: 2px dotted black;'>Data i podpis Zamawiającego</div>
				
					</div>
					<div style='margin:40px 0px 0px 0px; border-top: 2px solid black; padding: 20px 0px 20px 0px; text-align:center;'>
							Potwierdzenie odbioru paczki
					</div>
					<div style='text-align:right; width:100%;'>
					<div style='width: 55%; float:left; visibility:hidden;'>fd</div>
					<div style='width:45%  ;float:left; text-align:right; padding: 20px 0px 40px 0px; border-bottom: 2px dotted black;'>Otzrymałem paczkę zgodną z zamówieniem</div>
					<div style='width:100%  ; text-align:right; padding: 0px 0px 40px 0px; '>(data i podpis skazanego)</div>
					<h4 style='text-align:left;'>Pouczenie dla zamawiającego paczkę:</h4>    
					<ol style='text-align: left;'>
					<li> Skazany tymczasowo aresztowany i ukarany, zwany dalej „skazanym”, ma prawo otrzymać paczkę żywnościową, zwana dalej „paczką”, na zasadach określonych 
					w ustawie z dnia 6 czerwca 1997r.-Kodeks karny wykonawczy (Dz. U Nr 90. poz. 557 z późn. zm.) i przepisach Ministra Sprawiedliwości w sprawie regulaminu 
					organizacyjno-porządkowego wykonywania tymczasowego aresztowania i regulaminu organizacyjno-porządkowego wykonywania kary pozbawienia wolności.
					</li>
					<li>Zamówienie na paczkę należy dostarczyć:<br>
						<a style='padding: 0px 0px 0px 5px;'>   1. Droga pocztową: <strong>Zakład Karny we Wronkach ul. Partyzantów 1, 64-510 Wronki</strong></a>
					</li>
				
					<li>
					Zamówienie sporządza się na podstawie listy produktów obowiązującej dla Zakładu Karnego we Wronkach. Paczka. Osoba zamawiająca paczkę żywnościową 
					winna uwzględnić zapis art. 110 a §3 kkw, zgodnie z którym, osadzony może posiadać w celi mieszkalnej artykuły żywnościowe o ciężarze nie przekraczającym 
					6 kg + 9 l napojów.
					</il>
					<li>Zamówienie zostanie zrealizowane po w ciągu 5 dni roboczych od wpłynięcia zapłaty na konto bankowe i wpłynięciem zamówienia na paczkę. Zamówienie jest 
					kompletne po spełnieniu tych dwóch warunków.</li>
				
					<li>Zapłata za zamówioną paczkę złożoną przez osobę wskazaną na wykazie osób uprawnionych może być pokryte w trakcie składania zamówienia bezpośrednio w 
					punkcie sprzedaży lub wpłacone na konto punktu sprzedaży – w takim przypadku przesyłając zamówienie droga pocztową należy dołączyć do niego dowód wpłaty.
					</li>
					<li>
					W przypadku braku możliwości zrealizowania z przyczyn niezależnych od administracji jednostki penitencjarnej, środki pieniężne wpłacone na zrealizowanie 
					paczki zostaną zwrócone w kwocie pomniejszonej o koszt przelewu lub przekazu pocztowego przez punkt sprzedaży, zgodnie z niżej oświadczeniem, wraz z 
					informacją o przyczynach odmowy realizacji zamówienia.
					</li>
					</ol>
					<h4 style='text-decoration:underline; text-align:center;'>Oświadczenie zamawiającego</h4>
					<div style='text-align:left;'>W przypadku braku możliwości zrealizowania zamówienia z przyczyn niezależnych od administracji jednostki penitencjarnej środki pieniężne wpłacone na 
					zrealizowanie paczki proszę zwrócić:</div>
					<div style='padding-left: 20px;width: 100%; text-align:left;'>
						<h4  style='text-decoration:underline; text-align:left;'>Przekazem pocztowym na adres:</h4>
						<div style='border-bottom: 2px dotted black;  width: 75%; text-align: left;'>
							fdfd
						</div>
						(Imię i nazwisko)<br><br>
						<div style='border-bottom: 2px dotted black;  width: 75%; text-align: left;'>
						fdfd
						</div>
						(Dokładny adres, kod pocztowy, nazwa ulicy, numer domu, numer mieszkania)<br>
						<h4  style='text-decoration:underline; text-align:left;'>Przelewem na konto bankowe:</h4>
						<div style='border-bottom: 2px dotted black;  width: 75%; text-align: left;'>
							fdfd
						</div>
						(Numer konta bankowego)<br>
						<img width='200px' height='100px' style='float: right;' src='$url'>
				
					</div>
					<div style='text-align:right;'>
						(Podpis zamawiającego)
					</div>
					<h4 style='text-align:center; text-decoration: underline; padding: 4px 0px 0px 0px; width:100%; border-top: 2px solid black;'>Adnotacje pracownika SW</h4>
					<div style='text-align: right; padding: 5px 0px 5px 0px;'>Skazany posiada uprawnienie do otrzymania paczki.</div>
					<ol style='text-align:left;'>
								<li>
									Skazany nie posiada uprawnienia do otrzymania paczki z powodu …………………………………<br>
									……………………………………………………………………………………………………………………….....
								</li>
								<li>
									Osoba składająca zamówienie odnotowana jest w systemie Noe.NET jako osoba najbliższa.
				
								</li>
					</ol>
					<div style='text-align:right; width:100%;'>……………………….…………………………………….</div>
					<div style='text-align:right; width:100%;'>(Data i podpis)</div>
					<h4 style='text-align:center; text-decoration: underline; padding: 4px 0px 0px 0px; width:100%; border-top: 2px solid black;'>Adnotacje przedstawiciela punktu sprzedaży</h4>
					
					<ol style='text-align:left;'>
								<li>
								Data przygotowania i wydania paczki osadzonemu ………………………………….
								</li>
								<li>
								Data przekazania paczki funkcjonariuszowi celem wydania osadzonemu ………………………………………
				
								</li>
								<li>
									Data zwrotu środków pieniężnych osobie zamawiającej paczkę …………………………………
				
								</li>
					</ol>
					<div style='text-align:right; width:100%;'>……………………….…………………………………….</div>
					<div style='text-align:right; width:100%;'>(Data i podpis)</div>
					");
					
					// Wywołanie funkcji generującej plik PDF
					$mpdf->Output('output.pdf', 'D');
					
						// Output or save the PDF
						
						
				

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
<script src="assets/scripts/script.js"></script>
</body>
</html>
