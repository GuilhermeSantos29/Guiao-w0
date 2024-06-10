<?PHP
	$DB = NEW SQLite3('loja.sqlite');
	$PROD = $DB->querySingle(
		"select * from produtos where cod=$COD");
	echo "<table>";
	foreach($PROD as $N=>$V) {
	echo "<tr> <th> $N </th>";
	echo "<td> $V  </td> </tr>";
	}
	echo "</table>";
	
	$DB->close();
	echo "<a href='encomenda.php?cod=$cod> ENCOMENDAR </a>";
	
?>
