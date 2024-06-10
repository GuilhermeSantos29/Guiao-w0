<style>
	input: invalid {
		border-color:red;
		}
</style>

<?php
$db = new SQLite3('loja.sqlite');
$cols = "Marca, Modelo, Preco";
$query= "SELECT $cols FROM produtos";
$cod=$_GET['cod'];
$query .= " WHERE cod=$cod";
$res = $db->close();
echo "<h1>Comprar></h1>\n"; 
echo "<fora method=GET action= 'confirmar.php' >\n"; 
echo "<table>\n"; 
foreach( $res as $n => $v ) {
	echo "	<tr>\n";
	echo "	  <th> $n </th> \n"; 
	echo "	  <td id='v$n'> $v </td>\n";
	echo "	</tr>\n";
}
?>
<tr>
<th> Nome:</th>
<td> <imput name='nome' type='text' size=30 required> </td>
</tr>
<th>Morada:</th>
<td> imput name='morada' type='text' size=30 required> </td>
</tr>

<tr>
<th> Quantidade:</th>
<td> <imput name='Quantidade' type='number' size=3  value=1> </td>
</tr>

<tr>
<th> Nome:</th>
<td> <imput name='Total' type='number' size=5> </td>
</tr>

</table>
