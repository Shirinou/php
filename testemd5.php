<html>
<head>
<title>Teste MD5</title>
</head>
<body><b>
<h1>Teste MD5</h1>
<div align=center>
<form method=POST action=<?php $_SERVER['PHP_SELF'];?>>
<H2>String em texto plano: <input type=text name=strqquer></H2><br/>
<input type=submit value=Enviar>
</form>
</div>
<div>
<?php
if(isset($_POST['strqquer'])){
	$str_post = $_POST['strqquer'];
	$str_md5 = md5($str_post);
	echo "<p>String digitada: ".$str_post."</p>";
	echo "<p>String criptografada: ".$str_md5."</p>";
}
?>
</div>
</b>
</body>
</html>

