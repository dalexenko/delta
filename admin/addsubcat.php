<?
include('../includes/func.inc');
if ($subcatname)
{
$query="INSERT INTO subcategories (subcategory_name, category_id) VALUES ('".$subcatname."', '".$catid."')"; 
$mysql_qv = mysql_query ($query, $conn) or die("Invalid query");  
massage($mysql_qv);
echo "<center><button  onclick='window.close()'>закрыть окно</button></center>";
}
else
{

}
?>