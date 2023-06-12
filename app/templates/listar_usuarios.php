<?php

// Incluir a conexao com o banco de dados
include_once 'app/conexao.php';

//Receber os dados da requisão
$dados_requisicao = $_REQUEST;

//lista de colunas
    $colunas = [

      0=> 'id',
      1=> 'nome',
      2=>'salario',
      3=>'idade',
      4=>'email',
      5=>'senha',

    ];
// Obter a quantidade de registros no banco de dados
$query_qnt_usuarios = "SELECT COUNT(id) AS qnt_usuarios FROM usuarios";
$result_qnt_usuarios = $conexao->prepare($query_qnt_usuarios);
$result_qnt_usuarios->execute();
$row_qnt_usuarios = $result_qnt_usuarios->fetch(PDO::FETCH_ASSOC);
//var_dump($row_qnt_usuarios);

// Recuperar os registros do banco de dados
    $query_usuarios = "SELECT nome, salario, idade, email 
                    FROM usuarios ";
    //Acessa quando há parametros de pesquisa no campo "Ssearch"
    if(!empty($dados_requisicao['search']['value'])){
        $query_usuarios .= " WHERE nome LIKE :nome";
        $query_usuarios .= " OR salario LIKE :salario";
        $query_usuarios .= " OR idade LIKE :idade";
        $query_usuarios .= " OR email LIKE :email";
        }

    //abaixo ordenação do datatable pelo item selecionado
                    $query_usuarios .= " ORDER BY " .$colunas[$dados_requisicao['order'][0]['column']] .
                     " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";
$result_usuarios = $conexao->prepare($query_usuarios);
$result_usuarios->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT);
$result_usuarios->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);
    //Acessa quando há parametros de pesquisa no campo "Ssearch"
    if(!empty($dados_requisicao['search']['value'])) {
        $valor_pesc = "%" . $dados_requisicao['search']['value']. "%";
        $result_usuarios->bindParam(':nome',$valor_pesc, PDO::PARAM_STR);
        $result_usuarios->bindParam(':salario',$valor_pesc, PDO::PARAM_STR);
        $result_usuarios->bindParam(':idade',$valor_pesc, PDO::PARAM_STR);
        $result_usuarios->bindParam(':email',$valor_pesc, PDO::PARAM_STR);
    }
    //executar a query
$result_usuarios->execute();

//captura respectiva coluna
while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_usuario);
    $registro = [];
    $registro[] = $nome;
    $registro[] = $salario;
    $registro[] = $idade;
    $registro[] = $email;
    $dados[] = $registro;
}

var_dump($dados);

//Cria o array de informações a serem retornadas para o Javascript
$resultado = [
    "draw" => intval($dados_requisicao['draw']), // Para cada requisição é enviado um número como parâmetro
    "recordsTotal" => intval($row_qnt_usuarios['qnt_usuarios']), // Quantidade de registros que há no banco de dados
    "recordsFiltered" => intval($row_qnt_usuarios['qnt_usuarios']), // Total de registros quando houver pesquisa
    "data" => $dados // Array de dados com os registros retornados da tabela usuarios
];

// Retornar os dados em formato de objeto para o JavaScript
echo json_encode($resultado);