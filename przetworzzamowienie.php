
<?php
// Utworzenie krótkich nazw zmiennych
$iloscopon = $_POST['iloscopon'];
$iloscoleju = $_POST['iloscoleju'];
$iloscswiec = $_POST['iloscswiec']; 
$jak = $_POST['jak'];
$adres = $_POST['adres'];
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$data = date('H:i. jS F Y');
/*
echo 'isset($iloscopon): '.isset($iloscopon).'<br />';
echo 'isset($niema): '. isset($niema). '<br />';
echo 'empty($iloscopon): '.empty($iloscopon).'<br />';
echo 'empty($niema): '.empty($niema).'<br />';
*/
?>

<html>
 <meta charset="UTF-8"> 
<head>
      <title>Części samochodowe Janka - wyniki zamówienia</title>
</head>
<body>
<h1>Części samochodwe Janka</h1>
<h2>Wyniki zamówienia</h2>

<?php
echo '<p>Zamówienie przyjęte o ' . $data.'</p>';
echo '<p> Zamówienie wygląda następująco:</p>';

$ilosc = 0;
$ilosc = $iloscopon + $iloscoleju + $iloscswiec;
echo 'Zamówionych części:  '.$ilosc. '<br />';
	if ($ilosc == 0) {
		echo '<p style="color:red">';
		echo 'Na poprzedniej stronie nie zostało złozone żadne zamówienie! <br />';
		echo '</p>';
	}
	else {
		if ($iloscopon > 0)
			echo $iloscopon. ' opon<br />' ;
		if ($iloscoleju > 0 )
			echo $iloscoleju. ' butelek oleju<br />' ;
		if ($iloscswiec > 0 )
			echo $iloscswiec. ' Świec zapłonowych<br />' ;
	}
//Utworzenie tablicy. Dodatkowo kluczem (id) będzie nazwa produktu, a wartością jego cena
$produkty = array('Opony'=>100, 'Olej'=>10, 'Świece zapłonowe'=>4);
echo '<p>' . "$produkty[0] $produkty[1]" . '</p>';

// Czwarty produkt zdefiniowany jako kolejna iteracja wygląda tak:
$produkty[4] = 'Bezpieczeniki'; 
echo '<p>' . $produkty[4] . '</p>';
echo '<br />';

//Ale my chcemy, żeby kluczem była nazwa, więc tworzymy tablicę ceny:
$ceny = array('Opony'=>100);
$ceny['Olej'] = 10; // A teraz do tablicy jednoelementowej dodajemy kolejne elementy
$ceny['Świece'] = 4;
echo '<br />';


//A teraz wyświetlamy tablicę za pomocą pętli for:
for ($i = 0; $i <3; $i++)	{
	echo $produkty[$i] . " ";
}
echo '<br />';

//A teraz pętla foreach (stworzona do tablic - nie trzeba deklarować liczby iteracji!):
foreach($produkty as $biezacy) {
	echo $biezacy . " ";
}
echo '<br />';
echo '<br />';

// Pętla foreach wyświetaljaca obiekty wraz z przypisanymi wartościami:
// foreach ($ceny as $klucz => $wartosc) {
// echo "UNO " . $klucz. " - ". $wartosc . "<br />";
// }


/* CZEMU TO NIE DZIAŁA?
while($element = each($ceny)) {
	echo "DUO " . $element['klucz'];
	echo " - ";
	echo $element['wartosc'];
	echo "<br />";
}
*/

// Wyświetlenie tablicy przy pomocy list
while (list($produkt, $cena) = each($ceny)) {
	echo "NEO - $produkt - $cena<br />";
}

// Ponowne zastosowanie funkcji each bez resetu nie zadziała, bo tablica zapamięta element bieżący i nie przejdzie ponownie przez całość
reset($ceny);
while (list($produkt, $cena) = each($ceny)) {
	echo "DUO - $produkt - $cena<br />";
}

// Tworzenie tablicy dwuwymiarowej:
$produkty2 = array(array('OPO', 'Opony', '100'),
					array('OLE', 'Oleje', '10'),
					array('SWI', 'Świece', '4'));
					//A teraz wyświetlanie zawartości - podajemy identyfikator wiersza i kolumny:
					echo '|' . $produkty2[0][0] . '|' . $produkty2[0][1] . '|' . $produkty2[0][2] . '|<br />';
					echo '|' . $produkty2[1][0] . '|' . $produkty2[1][1] . '|' . $produkty2[1][2] . '|<br />';
					
					//To samo możemy osiągnać za pomocą pętli for:
					for ($rzad = 0; $rzad <3; $rzad++) {
						for ($kolumna = 0; $kolumna <3; $kolumna++) {
							echo '|' . $produkty2[$rzad][$kolumna];
						}
						echo '<br />';
					}

//Zamiast wartości numerycznych w tabeli dwuwymiarowej możemy też zastosowac oznaczenia wyrazowe:
$produkty3 = array (array ('Kod' => 'OPO', 'Opis' => 'Opony', 'Cena' => 100),
					array ('Kod' => 'OLE', 'Opis' => 'Oleje', 'Cena' => 10));
					//Jeśli jednak skorzystamy z takiej możliwości to nie będziemy mogli użyć pętli for (patrz wyżej). Zamiast tego, np:
					for ($rzad = 0; $rzad <3; $rzad++) {
						echo '|TRE' . $produkty3[$rzad]['Kod'] . '|' . $produkty3[$rzad]['Opis'] . '|' . $produkty3[$rzad]['Cena'] . '|<br />';
					}
					

// A teraz tablica trójwymiarowa: części te same ale do różnych kategorii pojazdów:
$kategorie = array( array( array('OSO_OPO', 'Opony', 100).
							array('OSO_OLE', 'Oleje', 10),
							array('OSO_SWI', 'Swiece', 4)
								),
				    array (array('VAN_OPO', 'Opony', 120),
							array('VAN_OLE', 'Oleje', 12),
							array('VAN_SWI', 'Swiece', 5)
								),
					array (array('CIE_OPO', 'Opony', 150),
							array('CIE_OLE', "Oleje", 15),
							array('CIE_SWI', 'Swiece', 6)
								));
	//wyświetlamy zawartość tablicy przy użyciu pętli for (bo ma indeksy numeryczne - nie zmienialiśmy nic):
	for ($warstwa = 0; $warstwa < 3; $warstwa++) {
		echo "Warstwa $warstwa<br />";
		for ($rzad = 0; $rzad < 3; $rzad++) {
			for ($kolumna = 0; $kolumna < 3; $kolumna++) {
				echo '|'.$kategorie[$warstwa][$rzad][$kolumna];
			}
			echo '|<br />';
			}
		}

//
$wartosc = 0.00;
define ('CENAOPON', 100);
define ('CENAOLEJU', 10);
define ('CENASWIEC', 4);
$wartosc = $iloscopon * CENAOPON
			+ $iloscoleju * CENAOLEJU
			+ $iloscswiec * CENASWIEC;
			
			

// System zniżek
	if ($iloscopon < 10)
		$znizka = 0.00;
	elseif ($iloscopon >= 10 && $iloscopon <= 49)
	$znizka = 0.05;
	elseif ($iloscopon >= 50 && $iloscopon <= 99)
	$znizka = 0.10;
	elseif ($iloscopon >= 100)
	$znizka = 0.15;

	//CENA
			echo 'Cena netto: '.number_format($wartosc, 2). ' PLN<br />';
				$stawkavat = 0.23; //VAT równy 23%
			$wartosc = $wartosc * (1 + $stawkavat);
			echo 'Cena brutto wynosi: '.number_format($wartosc, 2). ' PLN<br />';
			$wartoscpoznizkach = $wartosc * (1 - $znizka);
			echo 'Cena po zniżkach wynosi: '.number_format($wartoscpoznizkach, 2).' PLN</br />';
			echo '<p>Adres wysyłki: ' .$adres .'</p>';
			
/*			
//Wyniki ankiety #1
if ($jak == "a") {
	echo '<p>Stały klient</p>';
} elseif ($jak == "b") {
	echo "<p>Reklama TV</p>";
} elseif ($jak =="c") {
	echo "<p>Książka telefoniczna</p>";
} elseif ($jak =="d") {
	echo '<p>Znajomi</p>';
} else {
	echo '<p>Źródło nieznane</p>';
}

//Wyniki ankiety #2
echo '<p style="color:red">Źródło wiedyz o sklepie:</p> ';
	switch($jak) {
		case "a":
			echo "<p>Stały klient</p>";
			break;
		case "b":
			echo '<p>Reklama TV</p>';
			break;
		case "c":
			echo '<p>Ksiązka telefoniczna</p>' ;
			break;
		case "d":
			echo '<p>Znajomi</p>';
		default :
			echo '<p>Źródło nieznane</p>';
			break;
	}
*/

//Ciąg wyjściowy:
			$ciagwyjsciowy = $data . "\t" . $iloscopon . " opon \t" . $iloscoleju . " butelek oleju \t" . $iloscswiec . " swiec \t" . $wartosc . " PLN \t" . $adres . " \n";

//Otwarcie pliku, żeby dopisać do niego zamówienia:
@ $wp = fopen("$DOCUMENT_ROOT/../zamowienia/zamowienia.txt", 'ab');
flock($wp, LOCK_EX); //blokada zapisu pliku - otwarcie na wyłączoność

if (!$wp) {
	echo '<p><strong>Zamówienie nie może być przyjęte. Prosimy spróbować później.</strong></p></body></html>';
	exit;
}

fwrite($wp, $ciagwyjsciowy, strlen($ciagwyjsciowy));
flock($wp, LOCK_UN); //zdjęcie blokady zapisu
fclose($wp);

echo '<p>Zamówienie przyjęte i zapisane. </p>';
?>

</body>
</html>