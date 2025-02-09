<?php
  $urlQrCode = $this->Url->build(
    [
      'controller' => 'Users',
      'action' => 'geraQrCode2fa',
      '?' => ['idUser' => $user->id]
    ],
    ['fullBase' => true]
  );
  $urlNovoQrCode = $urlQrCode . '&novoQrCode=1';
?>

<div class="row">
  <div class="col-sm-auto">
    <?= $this->element(
        'breadcrumb',
        [
          'caminho' => [
            ['Pages', 'index', 'Home'],
            'Configurações',
            ['Users', 'index', 'Usuários'],
            'Editando'
          ]
        ]
    );?>
  </div>
</div>
<div class="row">
    <div class="col-sm-auto">
        <span class="titulo">Editando o usuário</span>
    </div>
</div>
<br>
<?= $this->Form->create($user) ?>
  <?php $this->Form->secure([
      'username',
      'email',
      'password',
  ]); ?>
  <div class="row">
      <div class="col-sm-4">
          <label for="username">Nome do Usuário</label>
          <input type="text" class="form-control inputs" id="username" name="username" autocomplete="nickname" maxlength="50" value="<?=$user->username?>" required>
      </div>
      <div class="col-sm-4">
          <label for="email">E-mail (login e rec. de senha)</label>
          <input type="email" class="form-control inputs" id="email" name="email" autocomplete="email" value="<?=$user->email?>" maxlength="100" required>
      </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <?= $this->element('inputSenhaUser')?>
    </div>
  </div>
  <div class="row">
      <div class="col-sm text-end">
          <?= $this->element('Diversos/btnSalvar') ?>
      </div>
  </div>
<?=$this->Form->end(['data-type' => 'hidden']); ?>

<hr>
<div class="row">
  <div class="col-sm-auto">
      <span class="titulo">Segurança</span>
  </div>
</div>
<br>
<div class="row">
    <div class="col-sm-4">
    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#TFAModal" onclick="obterQrCode2FA('<?=$urlQrCode?>')">
      Autenticação de Dois Fatores (2FA)
    </button>
    </div>
</div>

<div class="modal fade" id="TFAModal" tabindex="-1" aria-labelledby="TFAModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TFAModalLabel">Configurando a Autenticação de Dois Fatores (2FA)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Basta escanear o QrCode com o aplicativo de 2FA de sua preferência.</p>
        <div class="text-center">
          <div id="imagemQrCode"></div>
          <button type="button" class="btn btn-outline-secondary" onclick="obterQrCode2FA('<?=$urlNovoQrCode?>')">Gerar novo QrCode</button>
        </div>
      </div>
    </div>
  </div>
</div>
