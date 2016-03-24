<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>.:: SisPronatec ::.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Styles -->
	<link href="img/favicon.png" rel="shortcut icon" type="image/ico">
  	<link href='css/chosen.css' rel='stylesheet' type="text/css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/prism.css" rel="stylesheet/less" type="text/css">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet' type="text/css">
	<link href="css/jquery-impromptu.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,600,300' rel='stylesheet' type='text/css'>
	
	<!-- JavaScript/jQuery, Pre-DOM -->
	<script src="js/jquery.min.js"></script>
	<script src="js/charts/excanvas.min.js"></script>
	<script src="js/charts/jquery.flot.js"></script>
	<script src="js/jquery.jpanelmenu.min.js"></script>
	<script src="js/jquery.cookie.js"></script>
	<script src="js/avocado-custom-predom.js"></script>
	<script src='js/jquery.hotkeys.js'></script>
	<script src='js/calendar/fullcalendar.min.js'></script>
	<script src="js/jquery-ui-1.10.2.custom.min.js"></script>
	<script src="js/jquery.pajinate.js"></script>
	<script src="js/jquery.prism.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/charts/jquery.flot.time.js"></script>
	<script src="js/charts/jquery.flot.pie.js"></script>
	<script src="js/charts/jquery.flot.resize.js"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/bootstrap/bootstrap-wysiwyg.js"></script>
	<script src="js/bootstrap/bootstrap-typeahead.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/jquery.chosen.min.js"></script>
	<script src="js/avocado-custom.js"></script>
	<script src="js/jquery-impromptu.min.js"></script>
	<script src="js/functions.js"></script>

	<!-- HTML5, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<style type="text/css">
		body { padding-top: 70px; }
	</style>

	<?php echo $HEADER; ?>
</head>

<body>

	<?php if($LOGIN != 1) { ?>
	<!-- Top Fixed Bar -->
	<div class="navbar navbar-inverse navbar-fixed-top">

		<!-- Top Fixed Bar: Navbar Inner -->
		<div class="navbar-inner topo-pronatec">

			<!-- Top Fixed Bar: Container -->
			<div class="container">

				<!-- Mobile Menu Button -->
				<a href="#">
					<button type="button" class="btn btn-navbar mobile-menu">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</a>
				<!-- / Mobile Menu Button -->

				<!-- / Logo / Brand Name -->
				<a class="brand" href="principal.php"><img src="img/logo-negativo.png"></a>
				<!-- / Logo / Brand Name -->

				<!-- User Navigation -->
				<ul class="nav pull-right">

					<!-- User Navigation: Boas Vindas -->
					<li class="dropdown">
						<a class="dropdown-toggle alterar-campus back-topo-pronatec">
							<i class="icon-user icon-white icone-branco"></i>
							<span class="hidden-phone texto-topo-branco"> Olá, Anderson Maia </span>
						</a>
					</li>
					<!-- / User Navigation: Boas Vindas -->

					<!-- User Navigation: Alterar Senha -->
					<li class="dropdown">
						<a class="dropdown-toggle alterar-senha" style="cursor: pointer;">
							<i class="icon-key icon-white icone-branco"></i>
							<span class="hidden-phone texto-topo-branco"> Alterar Senha </span>
						</a>
					</li>
					<!-- / User Navigation: Alterar Senha -->

					<!-- User Navigation: Sair -->
					<li class="dropdown">
						<a href="logout.php" class="dropdown-toggle">
							<i class="icon-off icon-white icone-branco"></i> 
							<span class="hidden-phone texto-topo-branco">Sair</span>
						</a>
					</li>
					<!-- / User Navigation: Sair -->

				</ul>
				<!-- / User Navigation -->

			</div>
			<!-- / Top Fixed Bar: Container -->

		</div>
		<!-- / Top Fixed Bar: Navbar Inner -->

	</div>
	<!-- / Top Fixed Bar -->
	<?php } ?>

	<!-- Content Container -->
	<div class="container">

		<?php if($LOGIN != 1) { ?>

		<!-- Main Navigation: Box -->
		<div class="navbar navbar-inverse" id="nav">

			<!-- Main Navigation: Inner -->
			<div class="navbar-inner menu-pronatec">

				<!-- Main Navigation: Nav -->
				<ul class="nav">

					<li class="dropdown separador-pronatec">
						<a href="#" class="dropdown-toggle texto-topo-branco back-menu-pronatec" data-toggle="dropdown">
							<i class="icon-user icone-branco"></i> Alunos <b class="caret seta-menu-pronatec"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="listar-disciplinas.php"><i class="icon-book"></i> Listar Disciplinas</a></li>
							<li><a href="#"><i class="icon-exclamation-sign"></i> Listar Alertas</a></li>
						</ul>
					</li>

					<li class="separador-pronatec">
						<a class="texto-topo-branco back-menu-pronatec" href="usuarios.php"><i class="icon-group icone-branco"></i> Listar Usuários</a>
					</li>

					<li class="separador-pronatec">
						<a class="texto-topo-branco back-menu-pronatec" href="#"><i class="icon-align-justify icone-branco"></i> Dashboard</a>
					</li>

				</ul>
				<!-- / Main Navigation: Nav -->

			</div>
			<!-- / Main Navigation: Inner -->

		</div>
		<!-- / Main Navigation: Box -->
		<?php } ?>

		<!-- CONTEÚDO -->
		<div class="row-fluid" style="min-height: 480px;">
			<?php echo $CONTENT; ?>
		</div>
		<!-- / CONTEÚDO -->

	</div> 
	<!-- / Content Container -->

	<?php if($LOGIN != 1) { ?>
	<!-- Footer -->
	<footer class="footer">

		<!-- Footer Container -->
      	<div class="container">

			<!-- Footer Container: Content -->
        	<p><a href="http://www.ifal.edu.br" target="_blank">Instituto Federal de Alagoas</a> - <a href="http://www.pronatec.ifal.edu.br" target="_blank">Pronatec</a></p>
        	<p>&copy;<?php echo date('Y'); ?></p>
        	<!-- / Footer Container: Content -->

      	</div>
      	<!-- / Footer Container -->

	</footer>
	<!-- / Footer -->
	<?php } ?>

	<?php if($LOGIN != 1) { ?>
			<div id="modalAlterarSenha" class="modal hide fade" tabindex="-1" role="dialog">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h3>Alterar Senha</h3>
				</div>
				<div class="modal-body">
                    <div class="well no-padding">
                        <form name="frmAlterarSenha" class="form-horizontal" method="post">
                            <div class="control-group">
                                <label class="control-label">Senha Atual:</label>
                                <div class="controls">
                                    <input class="input-block-level" type="password" name="atual">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nova Senha:</label>
                                <div class="controls">
                                    <input class="input-block-level" type="password" name="senha1">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Repita a Nova Senha:</label>
                                <div class="controls">
                                    <input class="input-block-level" type="password" name="senha2">
                                </div>
                            </div>
                            <div class="form-actions" style="padding-bottom: 20px;">
                                <button type="submit" class="btn btn-primary"> Enviar</button>
                                <input type="hidden" name="envio" value="100">
                            </div>
                        </form>
                    </div>
				</div>
			</div>
	<?php } ?>

</body>	
		
</html>