<?php
include_once ("../../conexao.php");
$conexao = new Database();
$con = $conexao->conectar();
//Receber os dados da requisão
    $dados_requisicao = $_REQUEST;

// Obter a quantidade de registros no banco de dados
    $query_qnt_usuarios = "SELECT COUNT(id) AS qnt_usuarios FROM usuarios";
    $result_qnt_usuarios = $con->prepare($query_qnt_usuarios);
    $result_qnt_usuarios->execute();
    $row_qnt_usuarios = $result_qnt_usuarios->fetch(PDO::FETCH_ASSOC);
//var_dump($row_qnt_usuarios);

// Recuperar os registros do banco de dados
    $query_usuarios = "SELECT id, nome, salario, idade , email, adm
                    FROM usuarios where fl_deleted = 0
                    ORDER BY id DESC 
                    LIMIT :inicio , :quantidade"; //LIMIT :inicio, :quantidade
   // var_dump($query_usuarios);

    $result_usuarios = $con->prepare($query_usuarios);
   // var_dump($result_usuarios);
    $result_usuarios->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT);
    $result_usuarios->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);
    $result_usuarios->execute();
    while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_usuario);
        extract($row_usuario);
        $registro = [];
        $registro[] = $id;
        $registro[] = $nome;
        $registro[] = $salario;
        $registro[] = $idade;
        $registro[] = $email;
        $registro[] = $adm;
        if($row_usuario['id'] != 1) {
            $registro[] = '<button class="btn btn-danger btn-sm btn-excluir" data-id="' . $id . '">Excluir</button>';
        } else{
            $registro[] = '';
        }
        $dados[] = $registro;
    }

//Cria o array de informações a serem retornadas para o Javascript
    $resultado = [
        "draw" => intval($dados_requisicao['draw']), // Para cada requisição é enviado um número como parâmetro
        "recordsTotal" => intval($row_qnt_usuarios['qnt_usuarios']), // Quantidade de registros que há no banco de dados
        "recordsFiltered" => intval($row_qnt_usuarios['qnt_usuarios']), // Total de registros quando houver pesquisa
        "data" => $dados // Array de dados com os registros retornados da tabela usuarios
    ];

// Retornar os dados em formato de objeto para o JavaScript
    echo json_encode($resultado);