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
    @endpush
</x-master-layout>