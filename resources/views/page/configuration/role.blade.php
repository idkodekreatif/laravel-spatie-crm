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
                    <div class="d-lg-flex justify-content-between">
                        <div>
                            <h5 class="mb-0">All Roles</h5>
                            <p class="text-sm mb-0">
                                A lightweight, extendable, dependency-free javascript HTML table plugin.
                            </p>
                        </div>
                        <div class="ms-auto mt-lg-0 mt-4">
                            @can('create configuration/roles')
                            <a href="{{ route('configuration.roles.create') }}"
                                class="btn bg-gradient-primary btn-sm mb-0 add-menu">+&nbsp; New
                                Role</a>
                            @endcan

                            <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv"
                                type="button" name="button">Export</button>
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 pb-0">
                    <div class="table-responsive p-5">
                        {!! $dataTable->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('Script')
    <!-- jQuery (necessary for DataTables) -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Additional Plugin -->
    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
    {!! $dataTable->scripts() !!}

    <script>
        const datatable = 'role-table';

        // Document ready function to initialize event listeners
        $(document).ready(function() {

            // Event listener for 'add-menu' button click
            $('.add-menu').on('click', function(e) {
                e.preventDefault();
                const url = this.href;

                handleAjax(url).onSuccess(function(res) {
                    handleFormSubmit('#form_action')
                        .setDataTable(datatable)
                        .init();
                }).execute();
            });

            // Event listener for actions on the menu table
            $('#' + datatable).on('click', '.action', function(e) {
                e.preventDefault();
                const url = this.href;

                handleAjax(url).onSuccess(function(res) {
                    handleFormSubmit('#form_action')
                        .setDataTable(datatable)
                        .init();
                }).execute();
            });
            // Event listener for actions on the menu table
            $('#' + datatable).on('click', '.delete', function(e) {
                e.preventDefault();
               Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        handleAjax(this.href, 'delete').onSuccess(function(res) {
                        showToast(res.status, res.message)
                        window.LaravelDataTables[datatable].ajax.reload()
                        }, false).execute();
                    }
                });
            });
        });

    </script>
    @endpush
</x-master-layout>