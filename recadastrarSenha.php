<?php include "usuarios.php";
$usuarios = new usuarios();
session_start();
if(isset($_POST['atualizarSenha'])){
    $usuarios->setId($_POST['id']);
    $usuarios->setSenha($_POST['senha']);
    $usuarios->trocaSenha();
    Header("Location:index.php");
}else{
    recadastro();
}
?>
<?php    
    function recadastro( ){?>
        <html>
            <head>
                <meta http-equiv=Content-Type content=text/html; charset=UTF-8>
        		<title>Login</title>
        		<link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css>
                <link rel=stylesheet href=style.css>
            </head>
            <body style=background-color: #0CF>
                <div class="container"> 
                    <div class="col-lg-4"></div> 
                        <div class="col-lg-4"> 
                            </br>
                            </br>
                        <div class="form-login">
                            <form method=POST action='<?php $_SERVER['PHP_SELF']; ?>'>
                                <input type = hidden value ="<?= $_SESSION['idUsuario'];?>" name =id>
                        		<label>Email:</label>
                        		<input class = "form-control mb-4" type=text name=email value='<?= $_SESSION['email'];?>' disabled>
                        		<!-- <label>Redefinir Senha:</label> -->
                        		<input class = "form-control " type=password name=senha placeholder="Senha">
                        	    <center><input class = "btn btn-outline-dark my-4 botao" type=submit name = atualizarSenha value=Salvar></center>
                    		</form>
                		</div>
            	    </div>
        		</div> 
    		</body>
		</html>
    <?php }
?>