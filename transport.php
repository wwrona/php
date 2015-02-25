<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF8" />
</head>

<body>
<table border="O" cellpading="3">
<tr>
<td bgcolor = "#CCCCCC" align="center">Odległość</td>
<td bgcolor = "#CCCCCC" align="center">Koszt</td>
</tr>
<?php
/*
$odleglosc = 50;
while ($odleglosc <= 250) {
echo "<tr>
<td align=\"right\">" . $odleglosc . "</td>
<td align=\"right\" >" . ($odleglosc / 10) . " </td>
</tr>";
$odleglosc += 50;
}
*/
for ($odleglosc = 50; $odleglosc <= 250; $odleglosc += 50) {
echo "<tr>
<td align=\"right\">" . $odleglosc . "</td>
<td align=\"right\" >" . ($odleglosc / 10) . " </td>
</tr>";
}

$cyfra = 100;
do {
	echo $cyfra. "<br />";
}
	while($cyfra < 1);


?>
</table>
</body>
</html>