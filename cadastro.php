<?php
	require_once ($_SERVER['DOCUMENT_ROOT'].'/DAO/usuariosDAO.php');
	require_once ($_SERVER['DOCUMENT_ROOT'].'/DAO/perfisDAO.php');
	session_start();
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Cadastro de Usuários</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="style.css" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
	<body>
	<style>
		body{
			overflow-x: hidden;
		}
	</style>
	
	<?php
	    $perfis = new PerfisDAO();
	    $usuDAO = new usuariosDAO();
	    $v_usuario = new usuarios();
	    $arrUsu = $usuDAO->load();
	    if(isset($_POST['f_selecao'])){ 
	        $selecao = $_POST['f_selecao']; 
	        if($selecao == 'Excluir'){
	            $v_usuario->setId($_POST['f_id']);
	            $usuDAO->delete($_POST['f_id']);?>
	            
	            <div class = 'container my-5'>
				    <div class = 'row justify-content-center'>
					    <div class = 'col-4'>
						    <div class = 'card p-3'>
							    <form method=POST action="<?= $_SERVER['PHP_SELF']; ?> ">
								    <input type = hidden name = f_selecao value = Incluir>
								    <div class = 'form-row'>
									    <div class = 'col-12'>
										    <labeL>Nome:</label>
										    <input class = form-control type=text name=f_nome>
									    </div>
									    <div class = 'col-12'>
										    <label>Email:</label>
										    <input class = form-control type=text name=f_mail>
									    </div>
									    <div class = 'col-12'>
										    <label>Senha:</label>
										    <input class = form-control type=password name=f_senha>
									    </div>
									    <div class = 'col-12'>
										    <select name=perfil id=perfil class='my-4'>
										    <?php  foreach($perfis->findAll() as $key=>$value):  ?>
										        <option value=<?=$value->id; ?> > <?= $value->nome; ?> </option>
										    <?php endforeach; ?>
										    </select>
									    </div>
										    <div class = 'text-center col-12 my-3'>
										    <button class =' btn btn-outline-dark 'type=submit value=Enviar>Enviar</button>
									    </div>
								    </div>
							    </form>
						   	</div>
					    </div>
				    </div>
		        </div>    
	        <?php  }else if($selecao == 'Atualizar'){?>
	            <div class = 'container my-5'>
				    <div class = 'row justify-content-center'>
					    <div class = 'col-4'>
						    <div class = 'card p-3'>
							    <form method=POST action=atualizar.php>
								    <div class = 'form-row'>
									    <div class = 'col-12'>
										    <labeL>Nome:</label>
										    <input class = 'form-control' type=text name=f_nome value = "<?=$_POST['f_nome'];?>">
									    </div>
									    <div class = col-12>
										    <label>Email:</label>
										    <input class = 'form-control' type=text name=f_mail  value =" <?=$_POST['f_mail']?> ">
									    </div>
									    <div class = col-12>
									   		<input class = 'form-control' type=hidden name=f_id value ="<?=$_POST['f_id']?> ">
									    </div>
									    <div class = 'col-12 text-center'>
										    <select name=perfil id=perfil class='my-4'>
										   <?php  foreach($perfis->findAll() as $key=>$value):
										            if ($_POST['f_perfil'] == $value->id){ ?>
										                <option  value=<?= $value->id; ?>  selected ><?= $value->nome; ?> </option>
										           <?php   }else{?>
										                <option  value=<?= $value->id; ?> > <?= $value->nome ?> </option>    
										           <?php   }
										            
										        endforeach;?>
									    </select>
									    </div>
										    <div class = 'col-12 my-3 text-center'>
										    <button class =' btn btn-outline-dark 'type=submit value=Atualiza>Atualiza</button>
									    </div>
								    </div>
							    </form>
						    </div>
					    </div>
				    </div>
		        </div>
		    <?php  }else if($selecao == 'resetar'){
		        $v_usuario->setId($_POST['f_id']);
		        $v_usuario->setSenha('123456');
		        $usuDAO->_construct($v_usuario);
		        $usuDAO->resetSenha();?>
		    <div class = 'container my-5'>
			    <div class = 'row justify-content-center'>
				    <div class = 'col-4'>
					    <div class = 'card p-3'>
						    <form method=POST action=" <?= $_SERVER['PHP_SELF']; ?> ">
							    <input type = hidden name = f_selecao value = Incluir>
							    <div class = 'form-row'>
								    <div class = col-12>
									    <labeL>Nome:</label>
									    <input class = form-control type=text name=f_nome>
								    </div>
								    <div class = 'col-12'>
									    <label>Email:</label>
									    <input class = form-control type=text name=f_mail>
								    </div>
								    <div class = 'col-12'>
									    <label>Senha:</label>
									    <input class = form-control type=password name=f_senha>
								    </div>
									    <div class = 'col-12 my-3'>
									    <button class =' btn btn-outline-dark 'type=submit value=Envivar>Enviar</button>
								    </div>
							    </div>
						    </form>
				    	</div>
				    </div>
			    </div>
	        </div>
	       <?php  }else{ 
	            $v_usuario->setNome($_POST['f_nome']);
		        $v_usuario->setEmail($_POST['f_mail']);
		        $v_usuario->setSenha($_POST['f_senha']);
		        $v_usuario->setIdPerfil($_POST['perfil']);
		        $usuDAO->_construct($v_usuario);
		        $usuDAO->insert();?>
	            <div class = 'container my-5'>
				    <div class = 'row justify-content-center'>
					    <div class = 'col-4'>
						    <div class = 'card p-3'>
							    <form method=POST action=" <?= $_SERVER['PHP_SELF']; ?>  >">
								    <input type = hidden name = f_selecao value = Incluir>
								    <div class = 'form-row'>
									    <div class = 'col-12'>
										    <labeL>Nome:</label>
										    <input class = 'form-control' type=text name=f_nome>
									    </div>
									    <div class = 'col-12'>
										    <label>Email:</label>
										    <input class = 'form-control' type=text name=f_mail>
									    </div>
									    <div class = 'col-12'>
										    <label>Senha:</label>
										    <input class = 'form-control' type=password name=f_senha>
									    </div>
									    <div class = 'col-12 text-cente'>
										    <select name=perfil id=perfil class='my-4'>
										    <?php  foreach($perfis->findAll() as $key=>$value):  ?>
										        <option value=<?= $value->id;?> ><?= $value->nome;?> </option>
										    <?php  endforeach;?>
									    	</select>
									    </div>
										    <div class = 'col-12 my-3 text-center'>
										    <button class =' btn btn-outline-dark 'type=submit value=Enviar>Enviar</button>
									    </div>
								    </div>
							    </form>
						    </div>
					    </div>
				    </div>
		        </div>    
	        }
	    <?php  }}else{ ?>
         	<div class = 'container my-5'>
				<div class = 'row justify-content-center'>
					<div class = 'col-4'>
						<div class = 'card p-3'>
							<form method=POST action="  <?= $_SERVER['PHP_SELF']?> ">
								<input type = hidden name = f_selecao value = Incluir>
								<div class = 'form-row'>
									<div class = 'col-12'>
									<labeL>Nome:</label>
										<input class = 'form-control' type=text name=f_nome>
										</div>
									<div class = 'col-12'>
										<label>Email:</label>
										<input class = 'form-control' type=text name=f_mail>
									</div>
									<div class =' col-12'>
										<label>Senha:</label>
										<input class = 'form-control' type=password name=f_senha>
									</div>
									<div class = 'col-12 text-center'>
										<select name=perfil id=perfil class='my-4'>
										<?php foreach($perfis->findAll() as $key=>$value):   ?>
										    <option value= <?= $value->id ?> > <?= $value->nome?> </option>
										<?php endforeach; ?>
										</select>
									</div>
										<div class =' col-12 my-3 text-center'>
										<button class =' btn btn-outline-dark 'type=submit value=Enviar>Enviar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
		    </div>
	  <?php  } ?>

	
		<h1 class="my-5 text-center">Cadastro de Usuários</h1>
	    
		
			
		<div class = "container">
		<div class="row justify-content-center">
	        <a class='btn btn-outline-dark' href="criarPDF.php">Gerar Relatório</a>	    
		</div>
			<div class = "row justify-content-center my-5">
			
				<div class = "col-10 my-3">
				
					<table class = "table">
		
						<tr>
							<th>Nome:</th>
							<th>Email:</th>
							<th>Perfil</th>
							<th></th>
						    <th></th>
						    <th></th>
						</tr>
						<?php foreach($arrUsu as $usu): ?>
						<tr>
							<center><td><?= $usu->getNome(); ?></td></center>
							<center><td><?= $usu->getEmail(); ?></td></center>
							<?php
							   $grupo = $perfis->buscarNome($usu->getIdPerfil());
							?>
							<center><td><?= $grupo; ?></td></center>
						    <td>
						        <form method= "POST" action  = "<?= $_SERVER['PHP_SELF']; ?>">
						            <input type ="hidden"  name= "f_selecao" value ="Atualizar">
						            <input class = "btn btn-outline-dark" type="submit" value="Atualizar">
						            <input type = "hidden" type="text" name="f_nome" value = "<?= $usu->getNome(); ?>">
						            <input type = "hidden" type="text" name="f_mail" value = "<?= $usu->getEmail(); ?>">
						            <input type  = "hidden" type = "text" name="f_perfil" value = "<?= $usu->getIdPerfil();?>">
						             <input type = "hidden" name = "f_id" value = "<?= $usu->getId();  ?>">
						        </form>      
						    </td>
						    <td>
						        <form method= "POST" action ="<?= $_SERVER['PHP_SELF']; ?>">
						            <input type = "hidden" name = "f_selecao" value = "Excluir">
						            <input class = "btn btn-outline-dark" type="submit" value="Excluir">
						            <input type = "hidden" name = "f_id" value = "<?= $usu->getId();  ?>">
						        </form>
						    </td>
						    <td>
						       <form method= "POST" action ="<?= $_SERVER['PHP_SELF']; ?>">
						            <input type = "hidden" name = "f_selecao" value = "resetar">
						            <input class = "btn btn-outline-dark" type="submit" value="Resetar">
						            <input type = "hidden" name = "f_id" value = "<?= $usu->getId();  ?>">
						        </form>     
						    </td> 
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	</body>
</html>