<?php
	class Mysql {
		private $banco 			= "taes"; //nome do banco de dados
		private $servidor 		= "localhost"; //nome do servidor de banco de dados
		private $user 			= "root"; //usuario do banco
		private $password 		= ""; //password do banco
		private $link_id 		= ""; //link para resultado da consulta
		private $MYSQL_ERRNO 	= ""; //variavel para tratamento de erros, nº de error
		private $MYSQL_ERROR 	= ""; //variavel para tratamento de erros, nome do error
		private $rows 			= "";

		public function __construct($banco="", $usuario="", $senha="") {
			$conBanco 		= ($banco != "") ? $banco : $this->banco;
			$conUsuario 	= ($usuario != "") ? $usuario : $this->user;
			$conSenha 		= ($senha != "") ? $senha : $this->password;
			$this->link_id 	= @mysql_connect($this->servidor, $conUsuario, $conSenha);
			
			if(! $this->link_id) {
				$this->MYSQL_ERRNO = 0;
				$this->MYSQL_ERROR = "Conexão Falhou $this->servidor.";
				$this->erro($this->MYSQL_ERROR, "mysql_connect($this->servidor, $conUsuario, $conSenha)");
			}
			else if(empty($conBanco) && ! mysql_select_db($conBanco)) {
				$this->MYSQL_ERRNO = mysql_errno();
				$this->MYSQL_ERROR = mysql_error();
				$this->erro($this->MYSQL_ERROR, "mysql_select_db($conBanco)");
			}
			else if(! empty($conBanco) && ! mysql_select_db($conBanco)) {
				$this->MYSQL_ERRNO = mysql_errno();
				$this->MYSQL_ERROR = mysql_error();
				$this->erro($this->MYSQL_ERROR, "mysql_select_db($conBanco)");
		   }
		}

		public function result($link, $row, $mix) {
			return utf8_encode(@mysql_result($link, $row, $mix));
		}

		public function query($query) {
			if($result = @mysql_query($query, $this->link_id)) {
				$this->rows = @mysql_num_rows($result);

				return $result;
			}
			else
				$this->erro(mysql_error(), $query);
		}

		public function insert($tabela, $campos) {
			$sql 		= "insert into $tabela (";
			$valores 	= "values (";
			$num 		= count($campos);
			reset($campos);

			for($i=0; $i<$num; $i++){
				$chave = key($campos);

				if($i == 0) {
					$sql 		.= "$chave";
					$valores 	.= "'" .$this->removerEspacos($campos[$chave]) ."'";
				}
				else {
					$sql 		.= ", $chave";
					$valores 	.= ", '" .$this->removerEspacos($campos[$chave]) ."'";
				}

				next($campos);
			}

			$sql .= ") " .$valores.")";
			$this->query($sql);
		}

		public function delete($tabela, $condicao, $codigos) {
			$this->query("delete from $tabela where $condicao in ($codigos)");
		}

		public function update($tabela, $campos, $condicao, $codigo) {
			$sql = "update $tabela set ";
			$num = count($campos);
			reset($campos);

			for($i=0; $i<$num; $i++) {
				$chave = key($campos);
				$valor = ($this->removerEspacos($campos[$chave]) == "NULL") ? $this->removerEspacos($campos[$chave]) : "'" .$this->removerEspacos($campos[$chave]) ."'";

				if($i == 0)
					$sql .= "$chave = " .$valor;
				else
					$sql .= ", $chave = " .$valor;

				next($campos);
			}

			$sql .= " where " .$condicao ." = '" .$codigo ."'";
			$this->query($sql);
		}

		public function fetcharray($query) {
			return mysql_fetch_array($query);
		}

		public function fetchrow($query) {
			return mysql_fetch_row($query);
		}

		public function removerEspacos($str) {
			$str = trim($str);
			$str = preg_replace('/\s(?=\s)/', '', $str);
			$str = preg_replace('/[\n\r\t]/', ' ', $str);

			return utf8_decode($str);
		}

		public function retornarDados($consulta, $campos) {
			$dados 			= array();
			$sql 			= $this->query($consulta);
			$dados['total'] = $this->rows;
			$aux			= count($campos);

			for($i=0; $i<$dados['total']; $i++) {
				foreach ($campos as $campo) {
					$dados[$i][$campo] = (substr($campo, 0, 5) == "valor") ? @number_format($this->result($sql, $i, $campo), 2, ",", ".") : $this->result($sql, $i, $campo);
				}
			}

			return $dados;
		}

		public function erro($error, $sql) {
			$mensagem = "<h3>Eu sou o arquivo do site!</h3><p />";
			$mensagem .= "<strong>Ocorreu o seguinte erro:</strong> $error<strong><br />";
			$mensagem .= "<strong>Na página:</strong> " .$_SERVER['PHP_SELF'] ."<br />";
			$mensagem .= "<strong>Na consulta:</strong> $sql<br />";
			$mensagem .= "<strong>No IP:</strong> " .$_SERVER['REMOTE_ADDR'];
			echo $mensagem; die("<p /><h2 style='color: red'>Ocorreu um erro interno!!!</h2>");
		}

	}

?>