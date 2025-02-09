<div class="row">
  <div class="col-sm-auto">
    <?=$this->element(
        'breadcrumb',
        ['caminho' => [
            ['Pages', 'index', 'Home'],
            'Configurações',
            'IPs Bloqueados',
            'Listagem'
        ]]
    );?>
  </div>
</div>

<div class="row">
    <div class="col-sm">
        <span class="titulo">IPs Bloqueados</span>
    </div>
    <div class="col-sm text-end">
        <?= $this->element('Diversos/btnNovo', ['parametros' => ['controller' => 'IpsBloqueados', 'texto' => 'IP']])?>
    </div>
</div>

<table class="table table-borderless table-striped table-hover">
    <thead>
        <tr class="text-center titulo-coluna-tabela">
            <th><?=$this->Paginator->sort('created', 'Data bloqueio')?></th>
            <th><?=$this->Paginator->sort('ip', 'IP')?></th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ipsBloqueados as $ip): ?>
            <tr class="text-center">
                <td><?= h($ip->created) ?></td>
                <td><?=h($ip->ip)?></td>
                <td>
                    <?= $this->element('Diversos/btnExcluir', ['parametros' => ['controller' => 'IpsBloqueados', 'id' => $ip->id]])?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br>
<?= $this->element('paginacao');?>
