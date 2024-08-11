<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>
        {{ $title }}
    </title>

    <link rel="canonical" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/loading.css') }}" rel="stylesheet" />

    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.min%EF%B9%96v=1.1.1.css') }}" rel="stylesheet" />

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>

    <!-- iziToast CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">

    @stack('style')
</head>

<body class="g-sidenav-show  bg-gray-100">

    <x-asside />

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <x-nav />

        <div class="container-fluid py-4">
            {{-- content --}}
            <div class="modal fade" id="modal_action" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
            </div>

            {{ $slot }}

            {{-- loader --}}
            <div class="preloader" style="visibility:hidden;">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>

            <x-footer />
        </div>
    </main>

    <!-- Core JS Files -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jkanban/jkanban.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/tilt.min.js') }}"></script>

    <!-- iziToast JS -->
    <script src="{{ asset('assets/js/plugins/iziToast.min.js') }}"></script>

    <script>
        // Loader
        showLoading()
        $(document).ready(function() {
            showLoading(false)
        });

        function showLoading(show = true) {
            const preloader = $(".preloader");

            if (show) {
                preloader.css({
                    opacity: 1,
                    visibility: "visible",
                });
            } else {
                preloader.css({
                    opacity: 0,
                    visibility: "hidden",
                });
            }
        }

        // Function to show iziToast notifications
        function showToast(status = 'success', message) {
            iziToast[status]({
                title: status == 'success' ? 'Success' : 'Error',
                message: message,
                position: 'topRight'
            });
        }

        function submitLoader(formId = '#form_action') {
            const button = $(formId).find('button[type="submit"]');

            function show() {
                button
                    .addClass('btn-load')
                    .attr("disabled", true)
                    .html(
                        `<span class="d-flex align-items-center"><span class"spinner-border flex-shrink-0"></span><span
                        class="flex-grow-1 ms-2"> Loading...</span></span>`
                    );
            }

            function hide(text = "Save changes") {
                button.removeClass("btn-load").removeAttr("disabled").text(text);
            }

            return {
                show,
                hide
            }
        }

        function handleFormSubmit(selector) {
            let onSuccessCallback;
            let dataTableId;
            let runDefaultSuccessCallback = true;

            function init() {
                $(selector).on('submit', function(e) {
                    e.preventDefault();
                    const _form = this;

                    $.ajax({
                        url: _form.action,
                        method: _form.method,
                        data: new FormData(_form),
                        contentType: false,
                        processData: false,

                        beforeSend: function() {
                            $(_form).find('.is-invalid').removeClass('is-invalid');
                            $(_form).find('.invalid-feedback').remove();
                            submitLoader().show();
                        },

                        success: function(res) {
                            if (runDefaultSuccessCallback) {
                                $('#modal_action').modal('hide');
                                showToast(res.status, res.message)
                            }

                            if (onSuccessCallback) onSuccessCallback(res);
                            if (dataTableId) window.LaravelDataTables[dataTableId].ajax.reload();
                        },

                        complete: function() {
                            submitLoader().hide();
                        },

                        error: function(err) {
                            $(_form).find('.is-invalid').removeClass('is-invalid');
                            $(_form).find('.invalid-feedback').remove();

                            const errors = err.responseJSON?.errors;

                            if (errors) {
                                for (let [key, message] of Object.entries(errors)) {

                                    const input = $(`[name=${key}]`);
                                    input.addClass('is-invalid');
                                    input.parent().append(
                                        `<div class="invalid-feedback">${message}</div>`);
                                }
                            }

                            showToast('error', err.responseJSON?.message)
                        }
                    });
                });
            }

            function onSuccess(cb, runDefault = true) {
                onSuccessCallback = cb;
                runDefaultSuccessCallback = runDefault;
                return this;
            }

            function setDataTable(id) {
                dataTableId = id;
                return this;
            }

            return {
                init,
                onSuccess,
                setDataTable,
            };
        }

        function handleAjax(url, method = 'get') {
            let onSuccessCallback;
            let onErrorCallback;
            let runDefaultSuccessCallback = true;

            function onSuccess(cb, runDefault = true) {
                onSuccessCallback = cb;
                runDefaultSuccessCallback = runDefault;
                return this;
            }

            function onError(cb) {
                onErrorCallback = cb;
                return this;
            }

            function execute() {
                $.ajax({
                    url,
                    method,

                    beforeSend: function() {
                        showLoading(true);
                    },
                    complete: function() {
                        showLoading(false);
                    },

                    success: function(res) {
                        if (runDefaultSuccessCallback) {
                            const modal = $('#modal_action');
                            modal.html(res);
                            modal.modal('show');

                            // Initialize Choices.js after modal is shown
                            modal.on('shown.bs.modal', function() {
                                const choiceElements = document.querySelectorAll(
                                    '.choices-multiple-remove-button');
                                choiceElements.forEach(element => {
                                    new Choices(element, {
                                        removeItemButton: true
                                    });
                                });
                            });
                        }

                        if (onSuccessCallback) onSuccessCallback(res);
                    },
                    error: function(err) {
                        if (onErrorCallback) onErrorCallback(err);
                    }
                });
            }

            return {
                execute,
                onSuccess,
                onError
            };
        }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="{{ asset('assets/js/soft-ui-dashboard.min%EF%B9%96v=1.1.1.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
    @stack('Script')
</body>

</html>