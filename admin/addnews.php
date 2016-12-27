<?
include('../includes/func.inc');
if ($today=='ДА')
{
$newsdate=date('Y').date('m').date('d');
}
else
{
$newsdate=$newsyear.$newsmnth.$newsday;
}
$flds="newsdate, newstext, news_theme";
$ins="'".$newsdate."','".$newstext."','".$newstheme."'";
$query="INSERT INTO sitenews  (".$flds.") VALUES (".$ins.")"; 
$mysql_qv = mysql_query ($query, $conn) or die("Invalid query");  
massage($mysql_qv);
echo "<center><button  onclick='window.close()'>закрыть окно</button></center>";
?>