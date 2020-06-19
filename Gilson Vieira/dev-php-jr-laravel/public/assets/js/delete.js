$(document).ready(function () {
    var swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });
    $(".delete").on('click', function () {
        swalWithBootstrapButtons.fire({
            title: 'Tem certeza ?',
            text: "Esta ação irá desabilitar recurso !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, Desabilitar !',
            cancelButtonText: 'Não, cancelar !',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    icon: 'info',
                    title: 'Desabilitando !',
                    text: 'Aguarde, pode demorar um pouco !',
                    allowOutsideClick: false,
                });
                Swal.showLoading();
                $.ajax({
                    url: $(this).data('url'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    dataType: 'json',
                    success: function (data) {
                        console.info(data);
                        swal.fire({
                            title: 'desabilitado !',
                            icon: 'success',
                        }).then(okay => {
                            if (okay) {
                                window.location.reload();
                            }
                        });
                    },
                    error: function (data) {
                        console.warn(data);
                        swal.fire({
                            title: 'Falha ao remover !',
                            text: 'Informe ao administrador do sistema !',
                            icon: 'error',
                        });
                    },
                });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: 'Ação cancelada !',
                    text: 'nenhuma dado foi alterado !',
                    icon: 'info',
                })
            }
        });
    });
});
