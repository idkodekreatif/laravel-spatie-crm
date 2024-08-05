<x-master-layout title="Menu Configuration">
    @push('style')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS (optional, for export buttons, etc.) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <!-- DataTables Responsive CSS (optional, for responsive tables) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.2/css/responsive.dataTables.min.css">
    @endpush
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    @can('create configuration/menu')
                    <a class="btn btn-primary btn-sm add-menu"
                        href="{{ route('configuration.menu.create') }}">Tambah</a>
                    @endcan

                    <h5 class="mb-0">Datatable Search</h5>
                    <p class="text-sm mb-0">
                        A lightweight, extendable, dependency-free javascript HTML table plugin.
                    </p>
                </div>
                <div class="table-responsive p-3">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>

    @push('Script')
    <!-- jQuery (necessary for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    {!! $dataTable->scripts() !!}

    <script>
        $('.add-menu').on('click', function(e) {
                e.preventDefault();

                $.ajax({
                    url: this.href,
                    method: 'get',
                    success: function(res) {
                        const modal = $('#modal_action')
                        modal.html(res)
                        modal.modal('show')

                        $('#form_action').on('submit', function(e) {
                            e.preventDefault();
                            const _form = this;

                            $.ajax({
                                url: _form.action,
                                method: _form.method,
                                data: new FormData(_form),
                                contentType: false,
                                processData: false,

                                beforeSend: function(){
                                    $(_form).find('.is-invalid').removeClass('is-invalid')
                                    $(_form).find('.invalid-feedback').remove()
                                },

                                success: function(res) {
                                   $('#modal_action').modal('hide')
                                },
                                error: function(err) {
                                    // Remove previous error messages and invalid classes
                                    $(_form).find('.is-invalid').removeClass(
                                        'is-invalid');
                                    $(_form).find('.invalid-feedback').remove();

                                    const errors = err.responseJSON?.errors;

                                    if (errors) {
                                        for (let [key, message] of Object.entries(
                                                errors)) {
                                            console.log(key, message);
                                            const input = $(`[name=${key}]`);
                                            input.addClass('is-invalid');
                                            input.parent().append(
                                                `<div class="invalid-feedback">${message}</div>`
                                                );
                                        }
                                    }
                                }
                            });
                        });
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            })
    </script>
    @endpush
</x-master-layout>