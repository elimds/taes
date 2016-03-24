<?php
	include("session.php");

	$dados = simplexml_load_file("http://www.andersonmaia.com.br/mestrado/taes/disciplinas.xml");

	$CONTENT = <<<HTML
		<div class="span12">
			<h4 class="titulo">Listar Disciplinas Matriculadas</h4>

			<div class="top-bar">
				<h3><i class="icon-book"></i> Disciplinas</h3>
			</div>
			<div class="well no-padding">
					
				<table class="data-table">
					<thead>
						<tr>
							<th width="50%">Disciplina</th>
							<th width="50%">Professor</th>
						</tr>
					</thead>
					<tbody>
HTML;

	foreach ($dados as $disciplinas) {
		$CONTENT .= <<<HTML
			<tr>
				<td>{$disciplinas->nome_disciplina}</td>
				<td>{$disciplinas->nome_professor}</td>
			</tr>
HTML;
	}

	$CONTENT .= <<<HTML
					</tbody>
					<tfoot>
						<tr>
							<th>Disciplina</th>
							<th>Professor</th>
						</tr>
					</tfoot>
				</table>

			</div>
		</div>
HTML;

	include("modelo.inc.php");
?>