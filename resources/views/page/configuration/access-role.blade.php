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
            <div class="card main-content">
                <div class="card-header pb-0">
                    <div class="d-lg-flex justify-content-between">
                        <div>
                            <h5 class="mb-0">Access Roles</h5>
                            <p class="text-sm mb-0">
                                A lightweight, extendable, dependency-free javascript HTML table plugin.
                            </p>
                        </div>
                        <div class="ms-auto mt-lg-0 mt-4">

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

    function handleCheckMenu() {
        // Handle parent checkbox click to check/uncheck child checkboxes
        $('.parent').on('click', function() {
            const childs = $(this).closest('tr').find('.child');
            childs.prop('checked', this.checked);
        });

        // Handle child checkbox click to check/uncheck parent checkbox
        $('.child').on('click', function() {
            const parentRow = $(this).closest('tr');
            const childs = parentRow.find('.child');
            const checked = parentRow.find('.child:checked');
            parentRow.find('.parent').prop('checked', childs.length === checked.length);
        });

        // Ensure parent checkboxes are correctly initialized based on child checkboxes
        $('.parent').each(function() {
            const parentRow = $(this).closest('tr');
            const childs = parentRow.find('.child');
            const checked = parentRow.find('.child:checked');
            $(this).prop('checked', childs.length === checked.length);
        });
    }

    // Document ready function to initialize event listeners
    $(document).ready(function() {
        handleAction(datatable, function() {
            handleCheckMenu();

            $('.search').on('keyup', function() {
                const value = this.value.toLowerCase(); // Corrected toLowerCase spelling

                $('#menu_permissions tr').show().filter(function() {
                    return $(this).text().toLowerCase().indexOf(value) === -1; // Corrected toLowerCase spelling and usage
                }).hide();
            });

            // Handle change event on .copy-role select element
            $('.copy-role').on('change', function() {
                const roleId = this.value;
                if (roleId) {
                    handleAjax(`{{ url('configuration/access-role') }}/${roleId}/role`)
                    .onSuccess(function(res) {
                        $('#menu_permissions').html(res);
                        handleCheckMenu(); // Reinitialize event listeners after AJAX load
                    }, false)
                    .execute();
                }
            });
        });
        handleDelete(datatable);
    });
    </script>
    @endpush
</x-master-layout>