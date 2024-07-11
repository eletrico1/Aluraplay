$(document).ready(function() {
    $('#datatable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "app/src/utils/datatable_listar",
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json',}
    });
});

// Evento de clique no botão Excluir
$('#datatable').on('click', '.btn-excluir', function() {
    var id = $(this).data('id');
    console.log(id);
    if (confirm('Tem certeza que deseja excluir este usuário?')) {
        // Aqui você faria a requisição AJAX para excluir o usuário pelo ID
        // Exemplo de requisição AJAX:
        $.ajax({
            url: 'app/src/models/excluir-usuario.php',
            type: 'POST',
            data: { id: id },
            success: function(response) {
                // Recarregar o DataTable após exclusão
                $('#datatable').DataTable().ajax.reload();
                alert('Usuário excluido com sucesso.');

            },
            error: function(xhr, status, error) {
                alert('Ocorreu um erro ao excluir o usuário.');
                console.error(xhr.responseText);
            }
        });
    }
});
