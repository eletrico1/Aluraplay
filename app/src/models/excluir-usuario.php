<?php
    include_once("../../conexao.php");
    $conexao= new Database();
    $con = $conexao->conectar();

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = "UPDATE usuarios SET fl_deleted = 1 WHERE id = :id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>alert('Usuário excluido com sucesso');</script>";
        } else {
            echo "<script>alert('erro ao excluir usuario');</script>";
        }
    }
?>
