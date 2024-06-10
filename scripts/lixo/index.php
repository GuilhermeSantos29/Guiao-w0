<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="styles/estilo.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/ebLogo.png">
	<title> Bilhetes </title>
</head>
<body bgcolor="#a0a0a0">
		<a href="index.html">
			<img align="left" src="images/eventbox75.png">
		</a>
		<a href="login.html">
			<img align="right" src="images/user75.png">
		</a>
		<br> 
		<p align="right"> Iniciar sessão </p>
		<br>
	<hr>
	<h1> Bem-vindo à EventBOX </h1>
	
	

<table>
	<tr> <th> ... </th> </tr>
	<?PHP
		$DB = NEW SQLite3('loja.sqlite');
		$LISTA = $DB-> query('select * from produtos');
			while ($ROW = $LISTA -> fetchArray()){
				echo '<tr>';
				foreach ($ROW as $V) 
					echo "<td>$V</td>";
					echo "<td> <a href='produto.php?cod=".$ROW[0]."'> +info</a>";
					echo"</tr>";
			}
			$DB->close();
	?>
</table>
	
	
	
</body>
</html>
