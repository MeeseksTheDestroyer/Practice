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

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dlaosadzonych</title>
    <link rel="stylesheet" href="assets/styles/font/style.css">
    <link rel="stylesheet" href="assets/styles/form.css">
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@1&display=swap" rel="stylesheet">
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

    <form id="form" action="artykuly.php" method="POST">

        <div class="form-section">
        <h2 style="text-align:center;">Wyślij paczke dla osadzonego</h2><br>
        <label for="name">Zaklad karny: </label>
        <input placeholder="Nazwa miasta / ulicy / zaklady karnego" style="margin-bottom: 0; border-radius: 0;"type="text" id="miasto" name="city_" required>
			<div id="wyniki" class="not-visible">
			</div><br>
        </div>

</form>

    <section class="przelewy24">
        <img src="assets/images/przelewy24.png">
    </section>
    <footer><a>ZPOZDROWIENIEM.PL© | 2023</a><a href="#"> Polityka prywatności</a><a href="#">Regulamin</a></footer>

    <script src="assets/scripts/script.js"></script>
    <script>
			  let miasta = <?php echo json_encode($arr); ?>;
			  console.log(miasta);
			function ClickOn(text){
				document.querySelector("#wyniki").style.display = "none";
					document.querySelector("#miasto").value = text;
                    document.querySelector("#form").submit();
					console.log("sf");
			}
    

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
    <script>
        alert("Nie jest to finalna wersja strony, rzeczy do zrobienia w pliku Do_zrobienia.txt");
    </script>
    
    
    <!--
            Do zrobienia:
                    - Płatności
                    - Wypełanienie strony sesownymi danymi
                    - Regulaminy itd.
    -->
</body>
</html>