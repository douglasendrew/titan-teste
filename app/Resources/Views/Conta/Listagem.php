<div class="container">
    <div class="mt-5">
        <h4>Contas a Pagar</h4>

        <div class="mt-5">
            <table class="table dataTable">
                <thead>
                    <td>Empresa</td>
                    <td>Dt. Pagamento</td>
                    <td>Valor</td>
                    <td>Pago?</td>
                    <td>Ações</td>
                </thead>
                <tbody>
                    <?php if(count($db_data) > 0): ?>
                        <?php foreach( $db_data as $value ): ?>
                            <tr>
                                <td><?= $value['nome_empresa'] ?></td>
                                <td><?= $value['data_pagar'] ?></td>
                                <td><?= number_format($value['valor'], 2, ',', '.') ?></td>
                                <td><?= ($value['pago'] == '1') ? 'Sim' : 'Não' ?></td>
                                <td>
                                    <?php if($value['pago'] == '0'): ?>
                                        <a href="/conta/pagar?id_conta=<?= $value['id_conta_pagar'] ?>" class="btn btn-success btn-xs">Pagar</a>
                                        <a href="/conta/editar?id_conta=<?= $value['id_conta_pagar'] ?>" class="btn btn-primary btn-xs">Editar</a>
                                        <a href="/conta/excluir?id_conta=<?= $value['id_conta_pagar'] ?>" class="btn btn-danger btn-xs">Excluir</a>
                                    <?php else: ?>
                                        <div>Pago com sucesso</div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>