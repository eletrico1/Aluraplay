<?php
    require_once("conexao.php");
    $con = new Database();
    $conexao = $con->conectar();

    $acao = $_REQUEST["acao"];
    $return = array();

    if ($acao == "get-usuarios") {
        $query = "select nome,
                         email,
                         idade,
                         adm 
                  from usuarios ";
        $consulta = $conexao->prepare($query);
        $consulta->execute();

        while ($data = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $return[] = array(
                "nome"            => $data["nome"],
                "email_usuario"   => $data["email"],
                "idade"           => $data["idade"],
                "permissao_admin" => $data["adm"]
            );
        }
    } else if ($acao == "get-videos") {
        $query = "select *
                  from videos ";

        $consulta = $conexao->prepare($query);
        $consulta->execute();
        while ($data = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $return[] = array(
                "id_video"     => $data["id"],
                "url"          => $data["url"],
                "titulo_video" => $data["title"]
            );
        }

    }
    die(json_encode($return));
?>
