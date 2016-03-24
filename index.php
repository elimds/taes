<?php
	$LOGIN = 1;

	$HEADER = <<<HTML
        <script src="js/jquery.maskedinput.min.js"></script>
		<script>
			$(function() {
                $("input:text[name='cpf'], input:text[name='recuperar']").mask("999.999.999-99");

                $("button#recuperar").click(function() {
                    $("#modalRecuperar").modal('show');

                    return false;
                });

                $(".control-group").css({"background-color": "#30A3DA", "background-image": "none", "border-bottom": "none", "color": "#FFF", "text-shadow": "none"});
                $("form[name='frmRecuperar'] .control-group").removeAttr("style");
                $("input:text, input:password").css("box-shadow", "none");
                $("i").addClass("icone-branco");
                $(".padding").css("background-color", "#30A3DA");
                $(".btn-primary").css("background-image", "linear-gradient(to bottom, #8CC63F, #8CC63F)");
                $(".btn-primary").hover(function() {
                    $(this).css("background-position", "0");
                });
			});
		</script>
HTML;

	$CONTENT = <<<HTML
    	<form class="form-signin form-horizontal" method="post" action="principal.php" style="max-width: 302px;">
    		<div class="top-bar logo-login">
                <img src="img/logo-color.png">
    		</div>
    		<div class="well no-padding">
      			<div class="control-group">
        			<label class="control-label"><i class="icon-user"></i></label>
        			<div class="controls">
          				<input type="text" name="matricula" placeholder="matrícula">
        			</div>
          		</div>
          		<div class="control-group">
            		<label class="control-label"><i class="icon-key"></i></label>
            		<div class="controls">
              			<input type="text" name="cpf" placeholder="cpf">
            		</div>
          		</div>
                <div class="control-group">
                    <label class="control-label"><i class="icon-check"></i></label>
                    <div class="controls">
                        <label class="checkbox" style="margin-bottom: 0;">
                            <div class="checker"><span><input type="checkbox" name="lembrar"></span></div> Lembrar Matrícula
                        </label>
                    </div>
                </div>
        		<div class="padding">
          			<button class="btn btn-primary" type="submit">Acessar</button>
          			<button id="recuperar" class="btn">Esqueceu a senha?</button>
          			<input type="hidden" name="envio" value="1">
          		</div>
        	</div>
  		</form>
        <div id="modalRecuperar" class="modal hide fade" tabindex="-1" role="dialog">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Recuperar Senha</h3>
            </div>
            <div class="modal-body">
                <div class="span12 sem-margin-left">
                    <div class="well no-padding">
                        <form name="frmRecuperar" class="form-horizontal" method="post">
                            <div class="control-group">
                                <label class="control-label">Digite seu CPF:</label>
                                <div class="controls">
                                    <input class="input-block-level" type="text" name="recuperar">
                                </div>
                            </div>
                            <div class="form-actions" style="padding-bottom: 20px;">
                                <button type="submit" class="btn btn-primary"> Enviar</button>
                                <input type="hidden" name="envio" value="2">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
HTML;

	include("modelo.inc.php");
?>