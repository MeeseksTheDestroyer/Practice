<?php
session_start();
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
    	require 'vendor/autoload.php';
		use Mpdf\Mpdf;
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
			'/^[\p{L}]{3,50}$/u',
			'/^[\p{L}\d\s.,-]{3,}$/u'
		];



		function CheckAllValues($POSTS, $REGEXPS){
			for($i=0; $i<count($POSTS); $i++){
				if(!preg_match($REGEXPS[$i], $POSTS[$i])){
					return false;
				}
			}
			return true;
		}
		if(isset($_POST['birthday']) and isset($_POST['adres']) and isset($_POST['city_']) and isset($_POST['canvasData']) and isset($_POST['family']) and isset($_POST['phone']) and isset($_POST['email']) and isset($_POST['city']) and isset($_POST['name']) and isset($_POST['name_']) and isset($_POST['surname']) and isset($_POST['surname_']) and isset($_POST['father_name']) and isset($_POST['postnum'])){
			$postnum = $_POST['postname'];
			$city=$_POST['city'];
			$name = $_POST['name'];
			$sur = $_POST['surname'];
			$father = $_POST['father_name'];
			$family = $_POST['family'];
			$tel = $_POST['phone'];
			$adr = $_POST['adres'];
			$name_ = $_POST['name_'];
			$sur_ = $_POST['surname_'];
			$brd_ = $_POST['birthday'];
			$prison = $_POST['city_'];
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
				$_POST['family'],
				$_POST['adres']
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
				
				
				
				   

				
				
						
				
						// Create a new mPDF instance
						$mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
						$date = date('d-m-Y');
						$wronki = "Zakładzie Karnym we Wronkach";
						// Set PDF content
						$mpdf->WriteHTML("<h1 style='text-decoration: underline;  line-height: 0.1; text-align: center;'>ZAMÓWIENIE NA PACZKĘ</h1>
						<div style=' height:1mm;'>realizowaną w punkcie sprzedaży prowadzonym przy <strong class='bolder'>$prison</strong></div>
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
							<td style='border: 2px solid black; text-align:center; padding: 5px;'>$name</td>
							<td style='border: 2px solid black; text-align:center; padding: 5px;'>$sur</td>
							<td style='border: 2px solid black; text-align:center; padding: 5px;'>$father</td>
							<td style='border: 2px solid black; text-align:center; padding: 5px;'>$family</td>
						</tr>
						<tr>
							<td colspan='3' style='border: 2px solid black; border-right-width: 1px; padding: 3px;'>Adres zamieszkania:</td>
							<td style='border: 2px solid black; padding: 3px;'>Nr telefonu (opcjonalne)</td>
						</tr>
						<tr>
							<td colspan='3' style='border: 1px solid black; border-right-width: 1px; padding: 3px;'>$adr</td>
							<td style='border: 1px solid black; padding: 3px;text-align:center;'>$tel</td>
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
						<td style='text-align:center;   border: 1px solid black; padding: 3px;'>$name_</td>
						<td style='text-align:center;   border: 1px solid black; padding: 3px;'>$sur_</td>
						<td style='text-align:center;  border: 1px solid black; padding: 3px;'>$father</td>
						<td style='text-align:center; border: 1px solid black; padding: 3px;'>$brd_</td>
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
					<div style='width:45%  ;float:left; text-align:right; padding: 20px 0px 5px 0px; '>Data i podpis Zamawiającego</div>

					</div>
					<div style='float: left; text-align:right;'>$date</div>
					<img width='200px' height='100px' style='float: right;' src='$url'>
					
					<div style='margin:80px 0px 0px 0px; border-top: 2px solid black; padding: 20px 0px 20px 0px; text-align:center;'>
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
						<a style='padding: 0px 0px 0px 5px;'>   1. Droga pocztową: <strong>$prison</strong></a>
					</li>
				
					<li>
					Zamówienie sporządza się na podstawie listy produktów obowiązującej dla $prison. Paczka. Osoba zamawiająca paczkę żywnościową 
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
							$name $sur
						</div>
						(Imię i nazwisko)<br><br>
						<div style='border-bottom: 2px dotted black;  width: 75%; text-align: left;'>
						$adr $postnum $city
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