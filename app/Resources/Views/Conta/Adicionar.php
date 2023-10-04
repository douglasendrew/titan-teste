<div class="container">
    <div class="mt-5">
        <h4>Adiconar conta a pagar</h4>

        <form action="/action/conta/adicionar" method="post">
            <div class="mt-4">
                <label for="">Empresa:</label>
                <select name="empresa" id="" class="form-control" required>
                    <? if(count($db_data) > 0): ?>
                        <option value="">-- Selecione --</option>
                        <?php foreach($db_data as $option): ?>
                            <option value="<?= $option['id_empresa'] ?>"><?= $option['nome_empresa'] ?></option>
                        <?php endforeach; ?>
                    <? else: ?>
                        <option value="">Nenhuma empresa cadastrada</option>
                    <? endif; ?>
                </select>
            </div>
            
            <div class="mt-4">
                <label for="">Data a pagar:</label>
                <input type="date" name="data" id="" class="form-control" required>
            </div>
    
            <div class="mt-4">
                <label for="">Valor a pagar (R$):</label>
                <input type="text" name="valor_pagar" class="form-control" required>
            </div>
    
            <div class="mt-4">
                <input type="submit" value="Salvar" class="btn btn-success">
            </div>
        </form>
    </div>
</div>