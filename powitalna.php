<?php
$obrazki = array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png');
shuffle($obrazki);
?>

<html>
<head>
	<title> Strona powitalna</title>
</head>

<body>
<h1>Części samochodwe</h1>
<div align="center">
<table width = 100%>
<tr>
<?php
/* Poniższe wkłada obrazki w tabelę
	for ($i = 0; $i <3; $i++) {
	echo "<td align=\"center\"><img src=\"";
	echo $obrazki[$i];
	echo "\"/></td>";
	}
*/
// A teraz to samo, tylko przy użyciu concatenation:
for ($i = 0; $i < 4; $i++) {
echo "<td align=\"center\"><img src=\"" . $obrazki[$i] . "\"/></td>";
}
?>