<!doctype html>
<html lang="pt-br">
  <head>
  	<title>KeyAnyWhere</title>
	<?= $this->Html->charset() ?>
	<?= $this->Html->meta('icon', 'favicon.ico') ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="sessionTimeout" id="sessionTimeout" content="<?=$sessionTimeout?>">
	<?=$this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));?>
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <?php
      echo $this->Html->css([
      	'bootstrap/bootstrap.min.css',
      	'bootstrap/bootstrap-icons.css',
      	'css-estilizacao-geral',
      ]);
      echo $this->fetch('css');
    ?>
	<?=$this->Html->script('categorias.js');?>
	<?=$this->Html->script('geradorSenha.js');?>
	<script src="https://kit.fontawesome.com/6be704c138.js" crossorigin="anonymous"></script>
  </head>
  <body>
		<div id="div-lateral">
			<div id="logo-kaw">
				<?=$this->Html->image("logo-kaw.png", ['url' => ['controller' => 'Pages', 'action' => 'home']]);?>
			</div>
			<nav id="menu-lateral">
				<?=$this->cell('CategoriasMenu')?>
			</nav>
		</div>
		<div id="menu-superior">
			<div class="row" id="opcoes-menu-superior">
				<div class="col-sm-auto">
					<a class="btn btn-outline-light botoes" role="button" href="<?=$this->Url->build(['controller' => 'Categorias', 'action' => 'index']);?>" title="Listagem categorias">
						<i class="bi bi-list-ol icone-opcao"></i>Categorias
					</a>
				</div>
				<div class="col-sm-auto ">
					<a class="btn btn-outline-light botoes" role="button" href="<?=$this->Url->build(['controller' => 'Entradas', 'action' => 'add']);?>" title="Nova entrada">
						<i class="bi bi-plus-lg icone-opcao"></i>Entrada
					</a>
				</div>
				<div class="col-sm text-center text-white" id="timerSessao"></div>
				<div class="col-sm-auto ms-auto">
					<input type="search" class="form-control input-busca" id="buscaEntrada"	placeholder="Mínimo 3 caracteres"
						onblur="removeResultadoBuscaGenerico('buscaEntrada', 'ul-busca')"
						oninput="buscaGenerica(
							'buscaEntrada',
							'ul-busca',
							'<?=$this->Url->build(['controller' => 'Entradas', 'action' => 'busca'], ['fullBase' => true])?>',
							{qtdCaracMin:'3'}
						)"
					>
					<div class="div-resultado-busca">
						<ul class="ul-busca" id="ul-busca"></ul>
					</div>
				</div>
				<div class="col-sm-auto">
					<?=$this->element('Diversos/btnOpcoes')?>
				</div>
			</div>
		</div>
		<div id="corpo-conteudo">
			<div class="row">
				<div class="col-sm"></div>
				<div class="col-sm"><?= $this->Flash->render()?></div>
				<div class="col-sm"></div>
			</div>
      		<?= $this->fetch('content') ?>
		</div>

		<div class="modal fade" id="sessaoExpiradaModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">A sessão expirou</h5>
					</div>
					<div class="modal-body">
						<p>O seu tempo de sessão acabou. Você precisa logar novamente.</p>
					</div>
					<div class="modal-footer">
						<a class="btn btn-primary" href="<?=$this->Url->build(['controller' => 'users', 'action' => 'login'])?>" role="button">Entrar</a>
					</div>
				</div>
			</div>
		</div>

		<?=$this->Html->script('bootstrap/popper.min.js')?>
		<?=$this->Html->script('bootstrap/bootstrap.js')?>
		<?=$this->Html->script('easytimer.min.js');?>
		<?=$this->Html->script('buscaConteudo.js')?>
		<?=$this->Html->script('ferramentas.js');?>
  	</body>
</html>