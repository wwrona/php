<?php
//utworzenie krótkich nazw zmiennych.
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>

<html>
<head>
	<title>Części samochodowe Janka - zamówienia klientów</title>
</head>

<body>
<h1>Części samochodowe Janka</h1>
<h2>Zamówienia klientów</h2>

<?php>
$wp = fopen("$DOCUMENT_ROOT/../zamowienia/zamowienia.txt", 'rb');

	if (!$wp) {
	echo "<p><strong>Brak zamówień. Proszę spróbować później</p></strong></body></html>";
	exit;
	}
/* Otwarcie pliku przy użyciu fgets	
	while (!feof($wp)) {
		$zamowienie = fgets($wp, 999);
		echo $zamowienie . "<br />";
	}
*/

/* Otwarcie pliku przy użyciu readfile (pomija znaki podziału wierszy, nie nadaje się)
readfile("$DOCUMENT_ROOT/../zamowienia/zamowienia.txt");
	fclose($wp);
*/

/* Owarcie pliku przy użyciu fpassthru (tak samo jak readfile nie oddziela wierszy)
$wp = fopen("$DOCUMENT_ROOT/../zamowienia/zamowienia.txt", 'rb');
fpassthru($wp);
*/

/* Otwarcie pliku przy użyciu funkcji file - uzyskujemy tylko "Array" :(
$tablicapliku = file("$DOCUMENT_ROOT/../zamowienia/zamowienia.txt");
echo $tablicapliku;
*/

/*Otwarcie pliku przy użyciu file_get_contents
echo file_get_contents("$DOCUMENT_ROOT/../zamowienia/zamowienia.txt");
*/

/* Otwarcie pliku przy użyciu fgetc - nie polecane, ale na końcu fajna sztuczka z łamaniem tekstu
while (!feof($wp)) {
	$znak = fgetc($wp);
	if (!feof($wp))
		echo ($znak=="\n" ? "<br />" : $znak);
}
*/

$wp = fopen("$DOCUMENT_ROOT/../zamowienia/zamowienia.txt", 'rb');
flock($wp, LOCK_EX); //blokada zapisu w trakcie przetwarzania
//przetwarzanie pliku
echo nl2br(fread($wp, filesize("$DOCUMENT_ROOT/../zamowienia/zamowienia.txt")));
echo '<p> Końcowa pozycja wskaźnika pliku wynosi ' .ftell($wp);
echo '<br />';
rewind($wp);
echo 'Po przewinięciu pozycja wynosi: ' . ftell($wp);
echo '<br />';
flock($wp, LOCK_UN); //zdjęcie blokady
fclose($wp);

?>
</body>
</html>