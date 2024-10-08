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
                            <h5 class="mb-0">All Products</h5>
                            <p class="text-sm mb-0">
                                A lightweight, extendable, dependency-free javascript HTML table plugin.
                            </p>
                        </div>
                        <div class="ms-auto mt-lg-0 mt-4">
                            @can('create configuration/menu')
                            <a href="{{ route('configuration.menu.create') }}"
                                class="btn bg-gradient-primary btn-sm mb-0 action">+&nbsp; New
                                Menu</a>
                            @endcan

                            @can('sort configuration/menu')
                            <a href="{{ route('configuration.menu.sort') }}"
                                class="btn bg-gradient-primary btn-sm mb-0 action sort">+&nbsp; Sort
                                Menu</a>
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
        const datatable = 'menu-table';

        // Function to handle visibility of main menu based on selected level
        function handleMenuChange() {
            const wrapper = $('#main_menu_wrapper');
            $('[name=level_menu]').on('change', function () {
                if (this.value === 'sub_menu') {
                    wrapper.removeClass('d-none');
                } else {
                    wrapper.addClass('d-none');
                }
            });
        }

        $('.sort').on('click', function(e){
            e.preventDefault()

            handleAjax(this.href, 'put')
            .onSuccess(function(res){
                window.location.reload()
            }, false)
            .execute()
        })

        // Document ready function to initialize event listeners
        $(document).ready(function () {
            // Initialize menu change handling
            handleMenuChange();

            handleAction(datatable, function(){
                handleMenuChange()
            })
        });
    </script>
    @endpush
</x-master-layout>