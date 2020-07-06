<?php  
    session_start();
    unset($_SESSION['idUsuario']);
    unset($_SESSION['email']);
    require_once ($_SERVER['DOCUMENT_ROOT'].'/Classes/usuarios.php');
    require_once ($_SERVER['DOCUMENT_ROOT'].'/DAO/usuariosDAO.php');
    $usuarios = new usuarios();
    if (isset($_POST['f_mail']) AND isset($_POST['f_senha'])){
        $usuarios->setEmail($_POST['f_mail']);
        $usuarios->setSenha($_POST['f_senha']);
        $usuariosDAO = new usuariosDAO();
        $usuariosDAO->_construct($usuarios);
        $resultado = $usuariosDAO->login($_POST['f_mail'], $usuarios->getSenha());
        if($resultado > 0){
            $_SESSION['idUsuario'] = $resultado;
            $_SESSION['email'] = $_POST['f_mail'];
            if ($_POST['f_senha'] == '123456'){
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
    
    
    function exibe_pagina($mensagem){ ?>
        <html>
            <head>
                <meta http-equiv=Content-Type content=text/html; charset=UTF-8>
    		    <title>Login</title>
    		    <link href="style.css" rel="stylesheet">
    		    <link rel=stylesheet href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    		    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            </head>
            <style>
                *{
                    font-size:16px;
                }
                .form-control{
                    font-size:16px;
                }
            </style>
            <body style='background-color: rgba(255, 209, 194, .6);'>
                <div class='container'>
                    <div class='row justify-content-center'>
                        <div class='col-md-4'>
                            <div class='jumbotron mt-5' style='background-color: rgba(255, 209, 194, .8);' >
                            <?php if (isset($_GET['msg'])){ ?>
                                <h3>Realize o login antes de entrar na página de cadastro</h3>
                            <?php } ?>
                            <h3><p><?= $mensagem; ?> </p></h3> 
                            <form method=POST action=<?=  $_SERVER['PHP_SELF']; ?> >
                    		    <label>Email:</label>
                    		    <input class = 'form-control' type=text name=f_mail>
                    		    <label>Senha:</label>
                    		    <input class = 'form-control 'type=password name=f_senha>
                    		    <button class = 'btn btn-outline-dark my-3' type=submit value=Login>Login</button>
                		    </form>
            		    </div>
        		    </div>
    		    </div>
    		</body>
        </html>
    <?php } ?>
    