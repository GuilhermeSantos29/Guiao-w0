$db=new sqlite('loja.sqlite');
if($db){
	echo "Erro ...";
	Exit;
}
$q="Insert into encomendasvalues (";
$q.="'".$_Get['Nome']."'";
$q.="'".$_Get['Morada']."'";
$q.=    $_Get['Cod']."'";
$q.=    $_Get['Quant'].")";

$Res=$db->exec($q);
if(!$Res){
	echo "Erro:".$db->lastErrorMsg();
	exit;
}
$db->close();
echo "Encomenda Registada";
