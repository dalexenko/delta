<?
if (($id) && ($subid) && ($prodid))
{

$result_id = mysql_query("select caption from menu where id=$id");
$row_id = mysql_fetch_array($result_id);
$id_name = $row_id[0];
$result_subid = mysql_query("select subcategory_name from subcategories where subcategory_id=$subid");
$row_subid = mysql_fetch_array($result_subid);
$subid_name = $row_subid[0];
$result_prodid = mysql_query("select product_name from products where product_id=$prodid");
$row_prodid = mysql_fetch_array($result_prodid);
$prodid_name = $row_prodid[0];

$linkname = "<a class='top-menu' href='?id=".$id."'>".$id_name."</a>-><a class='top-menu' href='?id=".$id."&subid=".$subid."'>".$subid_name."</a>-><font size='1'>".$prodid_name."</font>";
}
elseif (($id) && ($subid))
{
$result_id = mysql_query("select caption from menu where id=$id");
$row_id = mysql_fetch_array($result_id);
$id_name = $row_id[0];
$result_subid = mysql_query("select subcategory_name from subcategories where subcategory_id=$subid");
$row_subid = mysql_fetch_array($result_subid);
$subid_name = $row_subid[0];
$result_prodid = mysql_query("select product_name from products where product_id=$prodid");
$row_prodid = mysql_fetch_array($result_prodid);
$prodid_name = $row_prodid[0];

$linkname = "<a class='top-menu' href='?id=".$id."'>".$id_name."</a>-><font size='1'>".$subid_name."</font>";
}
elseif ($id)
{
$linkname = $id_name;
}
else
{
$linkname = "";
}
?>
<!-- SECOND TABLE-->
<TABLE cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td ALIGN="left" VALIGN="top" width="125">
<div id="scroller1" class="menu-location">

<TABLE cellpadding="0" cellspacing="0" border="0" width="250">
<tr><td>
<img src="picts/logo1.gif"><br>
<?
put_menu($id);
?>
</td></tr><tr><td align="left" VALIGN="center">
<img src="picts/spacer.gif" HEIGHT="10" WIDTH="10"><br>
</td></tr></table>

</div>
<script language="JavaScript" src="menu_floating.js"></script>


<IMG SRC="picts/spacer.gif" HEIGHT="10" WIDTH="80" border="0"><br>


</td><td align="right" valign="top">

<TABLE cellpadding="0" ALIGN="RIGHT" cellspacing="0" border="0" width="95%">
<tr>
<td ALIGN="LEFT" VALIGN="TOP" colspan=2>
<?
echo $linkname;
?>
</td>
</tr>
</TABLE>
<center>
<br><br>
<TABLE cellpadding="0" cellspacing="0" border="0" width="450">
<td ALIGN="CENTER" VALIGN="TOP" width="">
<td valign="top" class="just">
<?
if ($find)
{
$query_find="SELECT * FROM products where product_name like '%".$find."%' or product_description like '%".$find."%' ";
$result_find = mysql_query($query_find);
   		while ($row_find = mysql_fetch_array($result_find))
		{
		
		$query_id="SELECT category_id FROM subcategories where subcategory_id='".$row_find[2]."'";
		$result_id = mysql_query($query_id);
		while ($row_id = mysql_fetch_array($result_id))
		{
		$id=$row_id[0];
		}
		
		echo "<a href='?id=".$id."&subid=".$row_find[2]."&prodid=".$row_find[0]."'>".$row_find[1]."</a><br>";
		echo $row_find[3]."<br>";
		echo "<hr>";		
}

}
else
{


if ($id)
{
	mysql_connect("db.biz.ua", "delta", "q1wzes");
	mysql_select_db("delta_deltadb");
	$result = mysql_query("select * from menu where id=$id");
   	while ($row = mysql_fetch_array($result))
	{
	if ($row[1]==3)
	{
		if($subid)
		{
			if($prodid)
				{

    			$result_prod_info = mysql_query("select * from products where product_id=$prodid");
   		
				echo "<table class='Table-Left'><tr><td valign='top'>";
				while ($row_prod_info = mysql_fetch_array($result_prod_info))
				{
				echo "<IMG border='2' SRC='products/photo".$row_prod_info[0].".jpg' ALT='photo".$row_prod_info[0].".jpg'> ";
				echo "</td><td valign='top'><font class='BigText'>".$row_prod_info[1]."</font><br><br>";
				//echo $row_prod_info[2]."<br>";
				echo $row_prod_info[3]."<br>";
				echo $row_prod_info[4]."<br>";
				}
				echo "</td></tr></table>";
				}
				else
				{
				$result_prod = mysql_query("select * from products where product_subcatid=$subid");
   				while ($row_prod = mysql_fetch_array($result_prod))
				{
				echo "<a class='left-menu' href='?id=".$id."&subid=".$row_prod[2]."&prodid=".$row_prod[0]."'>".$row_prod[1]."</a><br>";
				}
				}
		}		
		else
		{
		$result_subcat = mysql_query("select * from subcategories where category_id=$row[0]");
   		while ($row_subcat = mysql_fetch_array($result_subcat))
		{
		echo "<a class='left-menu' href='?id=".$id."&subid=".$row_subcat[0]."'>".$row_subcat[1]."</a><br>";
		}
		}
		}
		else 
		{
		include("includes/".$row[3].".inc");
		}
		}
}
else 
{
include("includes/main.inc");
}

}
?>
</td>
</tr>
</table>





