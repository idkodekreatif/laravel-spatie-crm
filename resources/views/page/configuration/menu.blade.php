<x-master-layout title="Menu Configuration">
    @push('style')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS (optional, for export buttons, etc.) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <!-- DataTables Responsive CSS (optional, for responsive tables) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.2/css/responsive.dataTables.min.css">
    @endpush

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">All Products</h5>
                            <p class="text-sm mb-0">
                                A lightweight, extendable, dependency-free javascript HTML table plugin.
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route('configuration.menu.create') }}"
                                    class="btn bg-gradient-primary btn-sm mb-0 add-menu">+&nbsp; New
                                    Menu</a>

                                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv"
                                    type="button" name="button">Export</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive p-5">
                        {!! $dataTable->table() !!}
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

                                beforeSend: function(){
                                    showLoading()
                                },
                                complete: function(){
                                    showLoading(false)
                                },

                                success: function(res) {
                                    const modal = $('#modal_action')
                                    modal.html(res)
                                    modal.modal('show')

                                    $('[name=level_menu]').on('change', function(){
                                        const wrapper = $('#main_menu_wrapper');
                                        if(this.value ==='sub_menu'){
                                            wrapper.removeClass('d-none')
                                        } else {
                                            wrapper.addClass('d-none')
                                        }
                                    })

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
                                                submitLoader().show()
                                            },

                                            success: function(res) {
                                               $('#modal_action').modal('hide')
                                               window.LaravelDataTables['menu-table'].ajax.reload()
                                            },

                                            complete: function(){
                                                submitLoader().hide()
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