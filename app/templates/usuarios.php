<?php
    include_once 'app/templates/inicio-html.php';
        ?>
 <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Usuários</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../public/css/users.css">

</head>

<body>
<div class="container-md-12"  style="background-color: whitesmoke; height: 80%; border-radius: 10px;" >
    <h1>Listar Usuários</h1>
    <table id="datatable" class="display">
        <thead>
                <th>id</th>
                <th>Nome</th>
                <th>Salário</th>
                <th>Idade</th>
                <th>Email</th>
                <th>adm</th>
                <th>Ações</th>
            </tr>
        </thead>
    </table>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="../../public/js/usuarios.js"></script>


<?php include_once 'app/templates/fim-html.php'; ?>
