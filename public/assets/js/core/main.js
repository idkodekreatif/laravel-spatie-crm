// Setup CSRF Token for all AJAX requests
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// Loader
showLoading();
$(document).ready(function () {
    showLoading(false);

    // Example AJAX request to verify CSRF token is sent
    $("#example-button").click(function () {
        $.ajax({
            url: "/example-endpoint", // Replace with your endpoint
            method: "POST",
            data: {
                exampleData: "value",
            },
            success: function (response) {
                console.log("Request successful:", response);
            },
            error: function (xhr) {
                console.error("Request failed:", xhr);
            },
        });
    });
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
function showToast(status = "success", message) {
    iziToast[status]({
        title: status == "success" ? "Success" : "Error",
        message: message,
        position: "topRight",
    });
}

function submitLoader(formId = "#form_action") {
    const button = $(formId).find('button[type="submit"]');

    function show() {
        button
            .addClass("btn-load")
            .attr("disabled", true)
            .html(
                `<span class="d-flex align-items-center"><span class="spinner-border flex-shrink-0"></span><span class="flex-grow-1 ms-2"> Loading...</span></span>`
            );
    }

    function hide(text = "Save changes") {
        button.removeClass("btn-load").removeAttr("disabled").text(text);
    }

    return {
        show,
        hide,
    };
}

function handleFormSubmit(selector) {
    let onSuccessCallback;
    let dataTableId;
    let runDefaultSuccessCallback = true;

    function init() {
        $(selector).on("submit", function (e) {
            e.preventDefault();
            const _form = this;

            $.ajax({
                url: _form.action,
                method: _form.method,
                data: new FormData(_form),
                contentType: false,
                processData: false,

                beforeSend: function () {
                    $(_form).find(".is-invalid").removeClass("is-invalid");
                    $(_form).find(".invalid-feedback").remove();
                    submitLoader().show();
                },

                success: function (res) {
                    if (runDefaultSuccessCallback) {
                        $("#modal_action").modal("hide");
                        showToast(res.status, res.message);
                    }

                    if (onSuccessCallback) onSuccessCallback(res);
                    if (dataTableId)
                        window.LaravelDataTables[dataTableId].ajax.reload();
                },

                complete: function () {
                    submitLoader().hide();
                },

                error: function (err) {
                    $(_form).find(".is-invalid").removeClass("is-invalid");
                    $(_form).find(".invalid-feedback").remove();

                    const errors = err.responseJSON?.errors;

                    if (errors) {
                        for (let [key, message] of Object.entries(errors)) {
                            const input = $(`[name=${key}]`);
                            input.addClass("is-invalid");
                            input
                                .parent()
                                .append(
                                    `<div class="invalid-feedback">${message}</div>`
                                );
                        }
                    }

                    showToast("error", err.responseJSON?.message);
                },
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

function handleAjax(url, method = "get") {
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

            beforeSend: function () {
                showLoading(true);
            },
            complete: function () {
                showLoading(false);
            },

            success: function (res) {
                if (runDefaultSuccessCallback) {
                    const modal = $("#modal_action");
                    modal.html(res);
                    modal.modal("show");

                    // Initialize Choices.js after modal is shown
                    modal.on("shown.bs.modal", function () {
                        const choiceElements = document.querySelectorAll(
                            ".choices-multiple-remove-button"
                        );
                        choiceElements.forEach((element) => {
                            new Choices(element, {
                                removeItemButton: true,
                            });
                        });
                    });
                }

                if (onSuccessCallback) onSuccessCallback(res);
            },
            error: function (err) {
                if (onErrorCallback) onErrorCallback(err);
            },
        });
    }

    return {
        execute,
        onSuccess,
        onError,
    };
}
