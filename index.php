<?php include "usuarios.php";
session_start();
    unset($_SESSION['idUsuario']);
    unset($_SESSION['email']); 
    $usuario =  new usuarios();
    if (isset($_POST['email']) AND isset($_POST['senha'])){
        
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);
        $resultado = $usuario->login();
        if($resultado > 0){
            $_SESSION['idUsuario'] = $resultado;
            $_SESSION['email'] = $_POST['email'];
            if ($_POST['senha'] == '123456'){
                Header("Location:recadastrarSenha.php");
            }else{
                Header("Location:cadastro.php");
            }
        }else{
           exibe_pagina('Redigite a senha!!!'); 
        }
        
    }else{
        exibe_pagina('');
    }
 ?>   
    <?php
    function exibe_pagina($mensagem){?>
        
        <html>
            <head>
                <meta http-equiv=Content-Type content=text/html; charset=UTF-8>
    		    <title>Login</title>
    		    <link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css>
                <link rel=stylesheet href=style.css>
            </head>
            <body style="background-color: rgba(255, 209, 195, .3);">
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-lg-4"></div> 
                            <div class="col-lg-4"> 
                            </br>
                            </br>
                            <div class="form-login mt-40" >
                           <?php   if (isset($_GET['msg'])){?>
                                <h3>Realize o login antes de entrar na página de cadastro</h3>
                           <?php  }?> 
                            <h3><p><?=  $mensagem?></p></h3> 
                            <form class="pl-6" method=POST action=<?php $_SERVER['PHP_SELF']; ?>>
                            
                    		    <input class = "form-control mb-4 input" type=text name=email placeholder="Email">
                    		    <input class = "form-control pb-4 input" type=password name=senha placeholder="Senha">
                    		    <center><input class = "btn btn-outline-dark botao" type=submit value=Login></center>

                		    </form>
                		    </div>
            		    </div>
                    </div>  
    		    </div> 
    		</body>
		</html>
    <?php
    }
    ?>