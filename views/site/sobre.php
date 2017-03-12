<?php
use yii\helpers\Html;

$this->title = 'Shopping | Sobre';
?>
<h1>Conheça o shopping</h1>
	<section class="textoShopping texto">
		<h2>O Shopping</h2>
		<p>
			O complexo faz parte do mais novo bairro da cidade de São Caetano do Sul, o espaço dos <strong>designers</strong> - uma área de 480 mil m<sup>2</sup>, totalmente planejada e sustentável, que reúne moradia, trabalho e lazer.
		</p>
		<p>
			O Shopping possui <em>318</em> lojas em 3 andares, <em>5.102</em> vagas de estacionamento, em <em>104,9</em> mil m<sup>2</sup> de área construída e <em>39</em> mil m<sup>2</sup> de área bruta locável.
		</p>
	</section>
	<section class="arquitetura texto">
		<h2>Projeto Arquitetônico</h2>
		<p>
			Projetado e assinado por <strong>Ted Mosby</strong>, o prédio possui um layout <em>moderno</em>, <em>adaptável</em> a diferentes públicos. Transmite tranquilidade, de modo a simular um jardim ao ar livre, garantindo a total segurança. Projeto com total <em>sustentabilidade</em>, associando tecnologia, simplicidade e uso de energia sem afetar ao meio-ambiente.
		</p>
	</section>
	<section class="projetosSociais texto">
		<h2>Projetos Sociais</h2>
		<p>
			O nosso shopping é totalmente adepto a práticas e projetos sociais, no qual possa colaborar com toda a população. Alguns de nossos projetos sociais envolvem:
			<ul>
				<li>Contribuição de renda</li>
				<li>Doação a empresas de diferentes finalidades</li>
				<li>Apoio a diversidade</li>
				<li>Apoio a educação, cultura e lazer</li>
			</ul>
		</p>
	</section>
	<section class="inauguracoes texto">
		<h2>Próximas Inaugurações</h2>
		<p>
			Conheça as nossas próximas inaugurações, consultando a tabela abaixo.
		</p>
		<table class="tabela">
			<thead>
				<tr>
					<th>Atração</th>
					<th>Data</th>
					<th>Descrição</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Livraria Cultura</td>
					<td>10/02/2017</td>
					<td>A maior livraria da América Latina chega ao nosso shopping, com total diversidade</td>
				</tr>
				<tr>
					<td>Loja Saraiva</td>
					<td>19/03/2017</td>
					<td>Mais uma loja Saraiva, com 2 andares e diversidade de livros, CDs e DVDs</td>
				</tr>
				<tr>
					<td>Teatro</td>
					<td>26/05/2017</td>
					<td>Teatro Martins Fontes, com shows musicais, teatro e stand-up; funcionará diariamente</td>
				</tr>
				<tr>
					<td>Omeleteria</td>
					<td>12/07/2017</td>
					<td>Omeleteria criada pelos vencedores do Master Chef, com gastronomia de primeira</td>
				</tr>
			</tbody>
		</table>
	</section>
	<section class="formulario">
		<h2>Fale Conosco</h2>
		<p>Envie dúvidas, sugestões, elogios, reclamações, etc.</p>
		<!-- Nome, e-mail, assunto, mensagem !-->
		<form action="" method="POST">
			<div class="campo-formulario campoTresColunas">
				<label for="nome">Nome</label>
				<input type="text" name="nome" id="nome" placeholder="Nome Completo" class="field-large">
			</div>
			<div class="campo-formulario campoTresColunas">
				<label for="email">E-mail</label>
				<input type="email" name="email" id="email" placeholder="nome@provedor.com" class="field-large">
			</div>
			<div class="campo-formulario campoTresColunas">
				<label for="assunto">Assunto</label>
				<select name="assunto" id="assunto" class="field-large">
					<option value="">Selecione</option>
					<option value="1">Achados e Perdidos</option>
					<option value="2">Dúvida</option>
					<option value="3">Elogio</option>
					<option value="4">Reclamação</option>
					<option value="5">Sugestão</option>
					<option value="6">Trabalhe Conosco</option>
					<option value="7">Outros</option>	
				</select>
			</div>
			<div class="campo-formulario campoUmaColuna">
				<label for="mensagem">Mensagem</label>
				<textarea name="mensagem" rows="4" class="field-large"></textarea>
			</div>
			<button type="submit" class="btn-submit">Enviar Mensagem</button>
			<button type="reset" class="btn-warning">Limpar</button>
		</form>
	</section>