Execute o comando <code>php -S localhost:8989</code> para iniciar o servidor.

<br>
<br>

<h2>Perguntas SQL:</h2>
<p>Inserir um registro:</p>
<code>
    INSERT INTO produtos (cod_prod, loj_prod, desc_prod, dt_inclu_prod, preco_prod)
    VALUES (170, 2, 'LEITE CONDENSADO MOCOCA', '2010-12-30', 45.40);
</code>

<p>Alterar o preço do produto:</p>

<code>
    UPDATE produtos
    SET preco_prod = 95.40
    WHERE cod_prod = 170 AND loj_prod = 2;
</code>

<p>Selecionar todos os registros das lojas 1 e 2:</p>
<code>
    SELECT *
    FROM produtos
    WHERE loj_prod IN (1, 2);
</code>

<p>Selecionar a maior e menor data de inclusão:</p>
<code>
    SELECT MAX(dt_inclu_prod) AS maior_data, MIN(dt_inclu_prod) AS menor_data
    FROM produtos;
</code>

<p>Contar todos os registros:</p>
<code>
    SELECT COUNT(*) AS total_registros
    FROM produtos;
</code>


<p>Selecionar produtos que começam com "L":</p>

<code>
    SELECT *
    FROM produtos
    WHERE desc_prod LIKE 'L%';
</code>

<p>Soma de preços totalizado por loja:</p>

<code>
    SELECT loj_prod, SUM(preco_prod) AS total_preco
    FROM produtos
    GROUP BY loj_prod;
</code>