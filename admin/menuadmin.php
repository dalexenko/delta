<?php
	error_reporting(E_ERROR);
	
	mysql_connect("db.biz.ua", "delta", "q1wzes");
	mysql_select_db("delta_deltadb");

	if ($HTTP_POST_VARS["edit"])
	{
		mysql_query("update menu set caption = '".$HTTP_POST_VARS["caption"]."', href = '".$HTTP_POST_VARS["href"]."' where id = ".$HTTP_POST_VARS["edit"]);
		header("Location: ?");
		die;
	}
	if ($HTTP_GET_VARS["addsub"])
	{
		$result = mysql_query("select ifnull(max(sort), 0) + 1 from menu where parent_id ".($HTTP_GET_VARS["addsub"] == "null" ? "is null" : "= ".$HTTP_GET_VARS["addsub"]));
		$row = mysql_fetch_array($result, MYSQL_NUM);
		mysql_query("insert into menu (parent_id, sort) values (".$HTTP_GET_VARS["addsub"].", ".$row[0].")");
		header("Location: ?");
		die;
	}
	if ($HTTP_GET_VARS["delete"])
	{
		$result = mysql_query("select sort, parent_id from menu where id = ".$HTTP_GET_VARS["delete"]);
		$row = mysql_fetch_array($result, MYSQL_NUM);
		mysql_query("update menu set sort=sort-1 where sort > ".$row[0]." and parent_id ".($row[1] == "" ? "is null" : "= ".$row[1]));
		mysql_query("delete from menu where id = ".$HTTP_GET_VARS["delete"]);
		$result = mysql_query("select m1.id from menu m1 left join menu m2 on m1.parent_id = m2.id where m2.id is null and m1.parent_id is not null");
		while ($row = mysql_fetch_array($result, MYSQL_NUM))
			mysql_query("delete from menu where id = ".$row[0]);
		header("Location: ?");
		die;
	}
	if ($HTTP_GET_VARS["up"])
	{
		$result = mysql_query("select m1.id, m2.sort, m1.sort from menu m1, menu m2 where m1.sort = m2.sort-1 and ifnull(m1.parent_id, 0) = ifnull(m2.parent_id, 0) and m2.id = ".$HTTP_GET_VARS["up"]);
		if ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			mysql_query("update menu set sort = ".$row[2]." where id = ".$HTTP_GET_VARS["up"]);
			mysql_query("update menu set sort = ".$row[1]." where id = ".$row[0]);
		}
		header("Location: ?");
		die;
	}
	if ($HTTP_GET_VARS["down"])
	{
		$result = mysql_query("select m1.id, m2.sort, m1.sort from menu m1, menu m2 where m1.sort = m2.sort+1 and ifnull(m1.parent_id, 0) = ifnull(m2.parent_id, 0) and m2.id = ".$HTTP_GET_VARS["down"]);
		if ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			mysql_query("update menu set sort = ".$row[2]." where id = ".$HTTP_GET_VARS["down"]);
			mysql_query("update menu set sort = ".$row[1]." where id = ".$row[0]);
		}
		header("Location: ?");
		die;
	}
	if ($HTTP_GET_VARS["levelup"])
	{
		$result = mysql_query("select m1.parent_id, m2.parent_id, m2.sort from menu m1, menu m2 where m1.id = m2.parent_id and m2.id = ".$HTTP_GET_VARS["levelup"]);
		if ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			mysql_query("update menu set sort=sort-1 where parent_id = ".$row[1]." and sort > ".$row[2]);
			$result1 = mysql_query("select ifnull(max(sort), 0)+1 from menu where parent_id ".($row[0] == "" ? "is null" : "= ".$row[0]));
			$row1 = mysql_fetch_array($result1, MYSQL_NUM);
			mysql_query("update menu set parent_id = ".($row[0] == "" ? "null" : $row[0]).", sort = ".$row1[0]." where id = ".$HTTP_GET_VARS["levelup"]);
		}
		header("Location: ?");
		die;
	}
	if ($HTTP_GET_VARS["leveldown"])
	{
		$result = mysql_query("select m1.id, m2.parent_id, m2.sort from menu m1, menu m2 where m1.sort = m2.sort-1 and ifnull(m1.parent_id, 0) = ifnull(m2.parent_id, 0) and m2.id = ".$HTTP_GET_VARS["leveldown"]);
		if ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			mysql_query("update menu set sort=sort-1 where parent_id ".($row[1] == "" ? "is null" : "= ".$row[1])." and sort > ".$row[2]);
			$result1 = mysql_query("select ifnull(max(sort), 0)+1 from menu where parent_id = ".$row[0]);
			$row1 = mysql_fetch_array($result1, MYSQL_NUM);
			mysql_query("update menu set parent_id = ".$row[0].", sort = ".$row1[0]." where id = ".$HTTP_GET_VARS["leveldown"]);
		}
		header("Location: ?");
		die;
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Menu</TITLE>
<META NAME="Author" CONTENT="Max Satula">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=Windows-1251">
<META HTTP-EQUIV="Expires" CONTENT="Mon, 26 Jul 1997 00:00:00 GMT">
</HEAD>
<body bgcolor="#FFFFCC" text="#000000" link="#006699" vlink="#003366" alink="#CCCCCC" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<TABLE>
<TR><TD colspan=7><TD>
<A HREF="?addsub=null"><IMG BORDER=0 SRC="../pics/new.gif"></A>
<?php
function put_menu($id, $level = 0)
{
	$result = mysql_query("select id, caption, href, sort from menu where parent_id ".($id ? "= ".$id : "is null")." order by sort");
	if (!mysql_num_rows($result))
		return;
	$prev = null;
	$cnt = 0;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$cnt++;
		echo "<TR><TD><FORM METHOD=POST STYLE=\"margin:0\">".str_repeat("&nbsp;", $level*3).$row["sort"]."<INPUT STYLE=\"border: 1px solid\" TYPE=\"text\" NAME=\"caption\" VALUE=\"".$row["caption"]."\"> <INPUT STYLE=\"border: 1px solid\" TYPE=\"text\" NAME=\"href\" VALUE=\"".$row["href"]."\"> <INPUT STYLE=\"border: 1px solid\" TYPE=\"hidden\" NAME=\"edit\" VALUE=\"".htmlspecialchars($row["id"])."\"><TD><INPUT TYPE=\"image\" SRC=\"../pics/save.gif\"><TD><A HREF=\"?delete=".$row["id"]."\"><IMG BORDER=0 SRC=\"../pics/delete.gif\"></A><TD>".($cnt > 1 ? "<A HREF=\"?up=".$row["id"]."\"><IMG BORDER=0 SRC=\"../pics/but23.gif\"></A>" : "")."<TD>".($cnt < mysql_num_rows($result) ? "<A HREF=\"?down=".$row["id"]."\"><IMG BORDER=0 SRC=\"../pics/but20.gif\"></A>" : "")."<TD>".($level ? "<A HREF=\"?levelup=".$row["id"]."\"><IMG BORDER=0 SRC=\"../pics/but21.gif\"></A>" : "")."<TD>".($prev ? "<A HREF=\"?leveldown=".$row["id"]."\"><IMG BORDER=0 SRC=\"../pics/but22.gif\"></A>" : "")."<TD>"."<A HREF=\"?addsub=".$row["id"]."\"><IMG BORDER=0 SRC=\"../pics/new.gif\"></A></FORM>";
		put_menu($row["id"], $level + 1);
		$prev = $row["id"];
	}
}

	put_menu(null);
?>
</BODY>
</HTML>




