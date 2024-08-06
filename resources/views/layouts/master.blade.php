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

    {{-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/loading.css') }}" rel="stylesheet" />

    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.min%EF%B9%96v=1.1.1.css') }}" rel="stylesheet" />

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>


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

    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jkanban/jkanban.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/tilt.min.js') }}"></script>
    <script>
        showLoading()
        $(document).ready(function() {
            showLoading(false)
        })

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

        function submitLoader(formId = '#form_action') {
            const button = $(formId).find('button[type="submit"]');

            function show() {
                button
                    .addClass('btn-load')
                    .attr("disabled", true)
                    .html(
                        `<span class="d-flex align-items-center"><span class"spinner-border flex-shrink-0"></span><span class="flex-grow-1 ms-2"> Loading...</span></span>`
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
    </script>

    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");
        var ctx2 = document.getElementById("chart-bar").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(33,82,255,0.1)');
        gradientStroke1.addColorStop(0.2, 'rgba(33,82,255,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(33,82,255,0)'); //purple colors

        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Tasks",
                    tension: 0.3,
                    pointRadius: 2,
                    pointBackgroundColor: "#2152ff",
                    borderColor: "#2152ff",
                    borderWidth: 2,
                    backgroundColor: gradientStroke1,
                    data: [40, 45, 42, 41, 40, 43, 40, 42, 39],
                    maxBarThickness: 6,
                    fill: true
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            color: '#252f40',
                            padding: 10
                        }
                    },
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#9ca2b7'
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#9ca2b7'
                        }
                    },
                },
            },
        });

        new Chart(ctx2, {
            type: "doughnut",
            data: {
                labels: ['Done', 'In progress'],
                datasets: [{
                    label: "Projects",
                    weight: 9,
                    cutout: 50,
                    tension: 0.9,
                    pointRadius: 2,
                    borderWidth: 2,
                    backgroundColor: ['#2152ff', '#a8b8d8'],
                    data: [75, 25],
                    fill: false
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            display: false,
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script>
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
                                    console.log(key, message);
                                    const input = $(`[name=${key}]`);
                                    input.addClass('is-invalid');
                                    input.parent().append(
                                        `<div class="invalid-feedback">${message}</div>`);
                                }
                            }
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

                            // Inisialisasi Choices.js setelah modal ditampilkan
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
                        console.log(err);
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