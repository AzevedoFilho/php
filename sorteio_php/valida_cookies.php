<?
$username = $_COOKIE['username'];
$senha = $_COOKIE['senha'];
 if( (!empty($username)) AND (!empty($senha)) )
{
include "config.php";
$sql ="SELECT * FROM $tb2 where login='$username';";
$resultado = mysql_query($sql, $conexao);

if(mysql_num_rows($resultado)==1)
{
if($username!=mysql_result($resultado,0,"login"))
{
if($senha!=mysql_result($resultado,0,"senha"))
{
setcookie("username",$username,time()+3600); setcookie("senha",$senha,time()+3600);
echo "Voc� n�o efetuou o login. username e senha errados <a href=index.php> Logar </a>"; exit;
}
}
}
else
{
setcookie("username",$username,time()+3600); setcookie("senha",$senha,time()+3600);
echo "Voc� n�o efetuou o login. - 1 <a href=index.php> Logar </a><meta http-equiv='refresh' content='2;URL=index.php'>";
exit;
}
}
else
{
echo "Voc� n�o efetuou o login. - 2 <a href=index.php> Logar </a><meta http-equiv='refresh' content='2;URL=index.php'>";
exit;
}
mysql_close($conexao);
?>
