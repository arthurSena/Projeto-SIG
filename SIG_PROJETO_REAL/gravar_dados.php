<?php
//"$conexao" recebe a Conexão com o Banco de Dados
$conexao = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=123456");

//"$sql" string para Inserção de Registros na Tabela
/* $sql = "INSERT INTO public.\"TB_PROBLEMA\" (\"ID_PROBLEMA\", \"DATA_INICIO\", \"DESCRICAO\", \"TIPO_PROBLEMA\", \"LOCALIZACAO_MAPA\") VALUES (". 1 .", '". $_POST['data'] ."', '". $_POST['desc'] ."', '". $_POST['problema'] ."', ". "ST_GeomFromText('POINT(-71.060316 48.432044)', 4326)" .");"; */
$sql = "INSERT INTO public.\"pontos\" (\"the_geom\", \"tipo\", \"descricao\") VALUES ( ". "ST_GeomFromText('POINT($_POST['long'] $_POST['lat'])', 4326)" ." , '". $_POST['tipo'] ."', '". $_POST['desc'] ."');";
insert into pontos(the_geom, tipo, descricao) values (st_geomFromText('POINT(-35.897404479983 -7.1927902221681)',4326), 'Roubo', 'bla bla bla');
echo $sql;
//"$res" recebe o resultado da Inserção
$res = pg_exec($conexao, $sql);

//"$qtd_linhas" recebe a quantidade de Linhas Afetadas pela Inserção
$qtd_linhas = pg_affected_rows($res);

//Se "$qtd_linhas" tiver um Valor maior que 0 o Produto foi gravado com Sucesso na Tabela
if ($qtd_linhas > 0)
{
echo "Produto Cadastrado com Sucesso";
}
//Se "$qtd_linhas" tiver um Valor Igual a 0 é porque ouve um Erro ao gravar o Produto na Tabela
elseif ($qtd_linhas == 0)
{
echo "Não foi possível cadastrar o Produto";
}
?>