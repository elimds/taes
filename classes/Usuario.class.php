<?php
	class Usuario extends Mysql {

		public function getUsuarios() {
			$dados = array();
			$dados = $this->retornarDados("select codigo, email, senha, nome from Usuarios order by nome ", array("codigo", "email", "senha", "nome"));

			return $dados;
		}

	}
?>
