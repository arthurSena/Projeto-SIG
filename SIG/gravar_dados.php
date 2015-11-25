<?php
//"$conexao" recebe a Conexão com o Banco de Dados
$conexao = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=123456");
if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
}

if(isset($_POST['desc'])){
    $desc = $_POST['desc'];
}

if(isset($_POST['lat'])){
    $lat = $_POST['lat'];
}

if(isset($_POST['long'])){
    $long = $_POST['long'];
}

//"$sql" string para Inserção de Registros na Tabela
/* $sql = "INSERT INTO public.\"TB_PROBLEMA\" (\"ID_PROBLEMA\", \"DATA_INICIO\", \"DESCRICAO\", \"TIPO_PROBLEMA\", \"LOCALIZACAO_MAPA\") VALUES (". 1 .", '". $_POST['data'] ."', '". $_POST['desc'] ."', '". $_POST['problema'] ."', ". "ST_GeomFromText('POINT(-71.060316 48.432044)', 4326)" .");"; */
$sql = "insert into public.\"pontos\" (\"the_geom\", \"tipo\", \"descricao\") values (". "ST_GeomFromText('POINT($long $lat)', 900913)" .", '$tipo', '$desc');";
//insert into pontos(the_geom, tipo, descricao) values (st_geomFromText('POINT(-35.897404479983 -7.1927902221681)',4326), 'Roubo', 'bla bla bla');
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