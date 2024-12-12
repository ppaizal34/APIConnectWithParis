$(document).ready(function () {
    $("#login").validate({
        rules: {
            email: {
                required: true,
                email: true,
                regex: /^[a-zA-Z0-9._%+-]+@gmail\.com$/,
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Email tidak boleh kosong.",
                email: "Masukkan email yang valid.",
                regex: "Masukkan alamat email Gmail yang valid.", // Pesan error untuk regex
            },
            password: {
                required: "Password tidak boleh kosong.",
            },
        },
        errorPlacement: function (error, element) {
            element.siblings(".invalid-feedback").find("span").html(error);
        },
        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        },
        submitHandler: function (form) {
            event.preventDefault();
            const formData = new FormData(form);

            const loading = `<div class="spinner-border text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>`;
            const btn_login = $("#btn_login")
                .html(loading)
                .attr("type", "button");
            const success_login = $("#success_login");

            success_login.children().last().append("").text("");
            success_login
                .children()
                .last()
                .append("")
                .text(`Proses Login Berhasil`);

            axios
                .post("http://127.0.0.1:8000/login", formData)
                .then(function (response) {
                    // console.log(response.data);
                    // console.log(response.data.message);
                    success_login.show();
                    const error_login = $("#error_login");

                    if (error_login.is(":visible")) {
                        error_login.hide();
                    }

                    const access_token = response.data.data.token;
                    const refresh_token = response.data.data.refresh_token;
                    const expired_access_token =
                        response.data.data.expired_access_token;
                    const expired_refresh_token =
                        response.data.data.expired_refresh_token;

                    localStorage.setItem("access_token", access_token);
                    localStorage.setItem("refresh_token", refresh_token);
                    localStorage.setItem(
                        "expired_access_token",
                        expired_access_token
                    );
                    localStorage.setItem(
                        "expired_refresh_token",
                        expired_refresh_token
                    );

                    btn_login.hide();
                    window.location.href = "http://127.0.0.1:8000/admin";
                })
                .catch(function (error) {
                    btn_login.html("login").attr("type", "submit");
                    const error_login = $("#error_login");
                    const message = error.response.data.message;
                    const code_status = error.status;

                    error_login.children().last().append("").text("");
                    error_login.children().last().append("").text(`${message}`);
                    error_login.show();
                });
        },
    });

    $("#register").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 255,
            },
            email: {
                required: true,
                email: true,
                regex: /^[a-zA-Z0-9._%+-]+@gmail\.com$/,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 255,
            },
        },
        messages: {
            name: {
                required: "Nama tidak boleh kosong",
                minlength: "Nama minimal 3 karakter",
                maxlength: "Nama maksimal 255 karakter",
            },
            email: {
                required: "Email tidak boleh kosong.",
                email: "Masukkan email yang valid.",
                regex: "Masukkan alamat email Gmail yang valid.", // Pesan error untuk regex
            },
            password: {
                required: "Password tidak boleh kosong.",
                minlength: "Password minimal 3 karakter",
                maxlength: "Password maksimal 255 karakter",
            },
        },
        errorPlacement: function (error, element) {
            element.siblings(".invalid-feedback").find("span").html(error);
        },
        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        },
        submitHandler: function (form) {
            event.preventDefault();
            const formData = new FormData(form);

            axios
                .post("http://127.0.0.1:8000/register", formData)
                .then(function (response) {
                    // console.log(response.data);
                    const access_token = response.data.data.token;
                    localStorage.setItem("access_token", access_token);

                    window.location.href = "http://127.0.0.1:8000/";
                })
                .catch(function (error) {
                    console.log(error);
                    const error_login = $("#error_login");
                    const message = error.response.data.message;
                    const code_status = error.status;

                    error_login.children().last().text("");

                    error_login.children().last().append(`${message}`);
                    error_login.show();
                });
        },
    });

    $.validator.addMethod(
        "regex",
        function (value, element, pattern) {
            return this.optional(element) || pattern.test(value);
        },
        "Format tidak valid."
    );
});
