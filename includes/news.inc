<?
include('../includes/func.inc');
$query="SELECT * FROM sitenews where  news_theme='выставки' ORDER BY `news_id` DESC"; 
$mysql_qv = mysql_query ($query, $conn) or die("Invalid query"); 
$num_rows = mysql_num_rows($mysql_qv);
if ($num_rows>0)
{
while ($row = mysql_fetch_array($mysql_qv))
{
$newsdateyear=substr($row[0], 0, 4);
$newsdatemonth=substr($row[0], 4, 2);
$newsdateday=substr($row[0], 6);
$newsdate=$newsdateday.".".$newsdatemonth.".".$newsdateyear;
echo "<table border=0 width='99%' align=center  bordercolor='navy'><tr>";
echo "<td align=right class=subheader bgcolor='#CCCCCC'>".$newsdate."</td>";
echo "</tr><tr>";
echo "<td border=1 colspan=2 class=regular>".$row[1]."<br>";
echo "<tr><td></table><br>";

}
}
else
{
emptybase ();
}
?>
