<div class="container">
    <div class="mt-5">
        <h4>Editar conta a pagar</h4>
        <form action="/action/conta/atualizar?id_conta=<?= $db_data[0]['id_conta_pagar'] ?>" method="post">
            <div class="mt-4">
                <label for="">Empresa:</label>
                <select name="empresa" id="" class="form-control" required>
                    <? if(count($data) > 0): ?>
                        <option value="">-- Selecione --</option>
                        <?php foreach($data as $option): ?>
                            <option value="<?= $option['id_empresa'] ?>" <?php ($db_data[0]['nome_empresa'] == $option['nome_empresa']) ? 'selected=""' : '' ?>><?= $option['nome_empresa'] ?></option>
                        <?php endforeach; ?>
                    <? else: ?>
                        <option value="">Nenhuma empresa cadastrada</option>
                    <? endif; ?>
                </select>
            </div>
            
            <div class="mt-4">
                <label for="">Data a pagar:</label>
                <input type="date" name="data" id="" class="form-control" required value="<?= $db_data[0]['data_pagar'] ?>">
            </div>
    
            <div class="mt-4">
                <label for="">Valor a pagar (R$):</label>
                <input type="text" name="valor_pagar" class="form-control" required value="<?= $db_data[0]['valor'] ?>">
            </div>
    
            <div class="mt-4">
                <input type="submit" value="Editar" class="btn btn-success">
            </div>
        </form>
    </div>
</div>