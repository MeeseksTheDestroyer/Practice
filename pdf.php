<?php
    print_r($_POST);
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
		if( isset($_POST['submit']) ){
			echo "sdfdfd";
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
			if(CheckAllValues($POSTS_TAB, $RegExps) and $_SESSION["PRICE"] > 0 and $_SESSION["PRICE"] < 9000){
				
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