<?php
    if ($pagina == 'login'){
        Header("Location:/index.php");
    }else if ($pagina == 'logado'){
        Header("Location:/cadastro.php");
    }else if ($pagina == 'excluido'){
        Header("Location:/cadastro.php");
    }else if($pagina == 'atualizar'){
        Header("Location:/cadastro.php");
    }else if($pagina == 'incluir'){
        Header("Location:/cadastro.php");
    }else if($pagina == 'resetar'){
        Header("Location:/cadastro.php");
    }else if($pagina == 'resetarSenha'){
        Header("Location:/recadastrarSenha.php");
    }



?>