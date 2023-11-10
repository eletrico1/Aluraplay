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
<div class="container-md">
    <h1>Listar Usuários</h1>
    <table id="datatable" class="display" >
        <thead>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Salário</th>
                <th>Idade</th>
                <th>Email</th>
                <th>adm</th>
            </tr>
        </thead>
    </table>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
$(document).ready(function() {
    $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "app/src/utils/datatable_listar",
                language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json',}
            });
        });
    </script>
</body>
<!-- footer -->
<footer class="footer">
    <!-- Copyright -->
    <a class= "direitos-footer" href="#"> © 2023 Copyright Todos Direitos Reservados</a>
    <!-- Copyright -->
</footer>
</html>