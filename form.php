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
	
</head>
<body>
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
			<label for="input-range">Kwota wypiski<span style="color:red;">*</span>:</label>
			<div id="double">
				
				<input type="range" id="input-range" name="input-range" min="1" max="100" value="50">
				<div>
					<input type="number" id="input-number" name="input-number" min="50" max="5000" value="2500">
					<span>zł</span>
				</div>
				
			</div>
			
		</div>
		
		<div class="form-section">
			<h2>Odbiorca wypiski (osoba osadzona)</h2>
			<label for="name_">Imie<span style="color:red;">*</span>:</label>
			<input type="text" id="name_" name="name_" pattern="[A-Za-z\s]{2,50}" required>

			<label for="surname_">Nazwisko<span style="color:red;">*</span>:</label>
			<input type="text" id="surname_" name="surname_" pattern="[A-Za-z\s]{2,50}" required>

			<label for="father_name">Imie ojca<span style="color:red;">*</span>:</label>
			<input type="text" id="father_name" name="father_name" pattern="[A-Za-z\s]{2,50}" required>
			<label for="miasto">Zakład karny / areszt śledczy<span style="color:red;">*</span>:</label>

				
			<input style="margin-bottom: 0; border-radius: 0;"type="text" id="miasto" name="city_" required>
			<div id="wyniki" class="not-visible">
			</div><br>
			<div style="margin:5px;"><span style="color:red;">*</span> - pole obowiązkowe do wypełnienia</div>
			<br><br>
			<div class="more">

				<input style="font-size: 22px; background-color: #2196F3;" name="submit" class="more-submit" type="submit" value='Zamawiam'>
			
		</div>
		</div>


		
	</form>
	<section class="przelewy24">
        <img src="assets/images/przelewy24.png">
    </section>
    <footer><a>ZPOZDROWIENIEM.PL© | 2023</a><a href="#"> Polityka prywatności</a><a href="#">Regulamin</a></footer>
    <script src="assets/scripts/script.js"></script>
	<?php
		include_once 'super_global_config.php';
		$conn = mysqli_connect($db_host, $db_user , $db_password , $db_name);

		if (!mysqli_connect_errno()) {
			$arr = array(

			);
			$SQL_QUERY_CHECKER = "SELECT opis FROM zaklady";
			$response = mysqli_query($conn, $SQL_QUERY_CHECKER);
			if(mysqli_num_rows($response) > 0){
				
				while($row = mysqli_fetch_assoc($response)){
					$arr[] = $row['opis'];
				}
			}
	

			
		}
		mysqli_close($conn);
	?>
	<script>
			  let miasta = <?php echo json_encode($arr); ?>;
			  console.log(miasta);
			function ClickOn(text){
				document.querySelector("#wyniki").style.display = "none";
					document.querySelector("#miasto").value = text;
					console.log("sf");
			}
            const inputRange = document.querySelector('#input-range');
            const inputNumber = document.querySelector('#input-number');

            inputRange.addEventListener('input', (event) => {
            inputNumber.value = parseInt(event.target.value) * 50;
            });

            inputNumber.addEventListener('input', (event) => {
            		inputRange.value = parseInt(event.target.value) / 50;
					console.log(inputRange.value);
            });

			document.querySelector("#miasto").addEventListener("input", function(){
				document.querySelector("#wyniki").innerHTML = '';
				
				if(this.value.length > 2){
					document.querySelector("#wyniki").style.display = "block";
					for(let i=0; i<miasta.length; i++){
						if (miasta[i].toLocaleLowerCase().includes(this.value.toLocaleLowerCase())){
							console.log(miasta[i]);
							document.querySelector("#wyniki").innerHTML += `<div onclick='ClickOn("${miasta[i]}")'>${miasta[i]}</div>`;
						}
					}
				}
				
			})

				

	</script>
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

		function CheckRegPrison($WhereExp){
			$conn = mysqli_connect('localhost', 'root' , "", 'practice_tst');

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
			if(CheckAllValues($POSTS_TAB, $RegExps) and (int)$_POST['input-number'] > 0 and (int)$_POST['input-number'] < 9000 and CheckRegPrison($_POST['city_'])){
				
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
