<?php
	include("session.php");

	$usuario = new Usuario;

	if ( $_POST['envio'] == "1" ) {
		$msg 	= "Usuário cadastrado com sucesso.";
		$campo 	= array(
			"nome" 	=> $_POST['Nome'],
			"email" => $_POST['Email'],
			"senha" => md5($_POST['Senha'])
		);

		$usuario->insert("Usuarios", $campo);
	}

	$dados = $usuario->getUsuarios();

	$HEADER = <<<HTML
		<script>
			$(function() {
				$("form[name='frmCadastrar']").submit(function() {
					return valida(['Nome', 'Email'], [], [], [], ['Senha'], [], [], 'frmCadastrar');
				});
HTML;

	if ( $msg != "" ) {
		$HEADER .= <<<HTML
			$.prompt("{$msg}", {
				'close': function() {
					location.href = "usuarios.php";
				}
			});
HTML;
	}

	$HEADER .= <<<HTML
			});
		</script>
HTML;

	$CONTENT = <<<HTML
		<div class="span12">
			<h4 class="titulo">Listar Usuários</h4>

			<div class="span12 sem-margin-left">
				<div class="top-bar">
					<h3><i class="icon-user"></i> Adicionar novo usuário</h3>
				</div>
				<div class="well no-padding">
					<form class="form-horizontal" name="frmCadastrar" method="post">
						<div class="control-group span6">
							<label class="control-label">Nome:</label>
							<div class="controls">
								<input type="text" class="input-block-level" name="Nome">
							</div>
						</div>
						<div class="control-group span6">
							<label class="control-label">E-mail:</label>
							<div class="controls">
								<input type="text" class="input-block-level" name="Email">
							</div>
						</div>
						<div class="control-group span6 sem-margin-left">
							<label class="control-label">Senha:</label>
							<div class="controls">
								<input type="password" class="input-block-level" name="Senha">
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary"> Cadastrar</button>
							<input type="hidden" name="envio" value="1">
						</div>
					</form>
				</div>
			</div>

			<div class="top-bar">
				<h3><i class="icon-group"></i> Usuários</h3>
			</div>
			<div class="well no-padding">
					
				<table class="data-table">
					<thead>
						<tr>
							<th width="35%">Nome</th>
							<th width="35%">E-mail</th>
							<th width="20%">Senha</th>
							<th class="center">Opções</th>
						</tr>
					</thead>
					<tbody>
HTML;

	for ($i=0; $i < $dados['total']; $i++) {
		$CONTENT .= <<<HTML
			<tr>
				<td>{$dados[$i]['nome']}</td>
				<td>{$dados[$i]['email']}</td>
				<td>{$dados[$i]['senha']}</td>
				<td class="center">
					<a href="usuarios.php?c={$dados[$i]['codigo']}" title="Editar" class="edit"><i class="icon-2x icon-edit-sign edit-pronatec"></i></a>
				</td>
			</tr>
HTML;
	}

	$CONTENT .= <<<HTML
					</tbody>
					<tfoot>
						<tr>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Senha</th>
							<th class="center">Opções</th>
						</tr>
					</tfoot>
				</table>

			</div>
		</div>
HTML;

	include("modelo.inc.php");
?>