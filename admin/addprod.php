<?
include('../includes/func.inc');
if ($prodname)
{
$query="INSERT INTO products (product_name, product_subcatid, product_description) VALUES ('".$prodname."', '".$subcatid."', '".$proddescription."')"; 
$mysql_qv = mysql_query ($query, $conn) or die("Invalid query");  
massage($mysql_qv);

$query_f="SELECT max(product_id) from products";
$mysql_f = mysql_query ($query_f, $conn);  
$row_f = mysql_fetch_array($mysql_f);
$num_next=$row_f[0];
$foto_name = "photo".$num_next.".jpg";
$destination_file=$foto_name;

$ftp_server = "localhost";
$ftp_user = "damien";
$ftp_pass = "oxygen";

// set up a connection or die
$conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server"); 

// try to login
if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {
    
} else {
    echo "Couldn't connect";
}

$u=ftp_chdir($conn_id, 'delta');
$upload = ftp_put($conn_id, $destination_file, $userfile, FTP_BINARY);
echo "<center>";
if ($upload==1)
{
echo "Фото успешно сохранено на сервере";
}
else
{
echo "ОШИБКА сохранения фото на сервере";
}
echo "<center><button  onclick='window.close()'>закрыть окно</button></center>";
}
else
{

}
?>