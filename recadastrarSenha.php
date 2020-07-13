<?php 
        session_start();?>
<html>
        <head>
        <meta http-equiv=Content-Type content=text/html; charset=UTF-8>
        	<title>Login</title>
        	<link href="style.css" rel="stylesheet">
                <link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        </head>
        <body style='background-color: rgba(255, 209, 194, .6);'>
        <div class='container'> 
                <div class='row justify-content-center'> 
                        <div class='col-lg-4'> 
                        <div class='jumbotron mt-5' style='background-color: rgba(255, 209, 194, .8);' >
                                <form method=POST action=/CONTROL/Control.php>
                                <input type = hidden value =<?=$_SESSION['idUsuario']?> name = f_id>
                		<label>Email:</label>
                		<input class = 'form-control' type=text name=f_mail value=<?= $_SESSION['email']?> disabled>
                		<label>Redefinir Senha:</label>
                		<input class = 'form-control' type=password name=f_senha>
                	        <button class = 'btn btn-outline-dark f-16 mt-4' type=submit name = atualizarSenha value=Salvar>Salvar</button>
                		<input type=hidden name=acao value=novaSenha >
                		</form>
                        </div>
	               </div>
                </div> 
	</div> 
	</body>
</html>
