const access_token = $("#token");
const getToken = localStorage.getItem("access_token");

$(document).on("click", "#btn_copy_token", function () {
    const img_copy = $(this).find("img");
    const token = $(this).find("span");

    navigator.clipboard
        .writeText(getToken)
        .then(() => {
            token.replaceWith("<span id='copied'>Copied!</span>");
            $(this).prop("disabled", true);

            setTimeout(() => {
                $(this).prop("disabled", false);
                const btn_copied = $(this).find("#copied");
                btn_copied.replaceWith(`<span>Copy Token</span>`);
            }, 3000);
        })
        .catch((error) => {});
});

$(document).ready(function () {
    $("#form_logout").submit(function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        const loading = `<div class="spinner-border text-light" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>`;
        const btn_logout = $("#btn_logout")
            .html(loading)
            .attr("type", "button");
        const success_logout = $("#success_logout");

        success_logout.children().last().append("").text("");
        success_logout
            .children()
            .last()
            .append("")
            .text(`Proses Logout Berhasil`);

        axios
            .post("http://127.0.0.1:8000/logout", formData)
            .then((response) => {
                success_logout.show();
                const code_status = response.status;
                const error_logout = $("#error_logout");

                if (error_logout.is(":visible")) {
                    error_logout.hide();
                }

                if (code_status == 200) {
                    localStorage.removeItem("access_token");
                    window.location.href = "http://127.0.0.1:8000/";
                }
            })
            .catch((error) => {
                // console.log(error.response.data.message)
                const error_logout = $("#error_logout");
                const message = error.response.data.message;

                error_logout.children().last().append("").text("");
                error_logout.children().last().append("").text(`${message}`);
                error_logout.show();
                btn_logout.html("Logout").attr("type", "submit");
            });
    });

    $("#refresh_token").click(function () {
        const success_reset_api_view = $("#success_reset_api");
        const error_reset_api_view = $("#error_reset_api");

        axios
            .get("http://127.0.0.1:8000/refresh_token")
            .then((response) => {
                // console.log(response.data);
                const access_token = response.data.data.access_token;
                const expired_access_token =
                    response.data.data.expired_access_token;

                localStorage.setItem("access_token", access_token);
                localStorage.setItem(
                    "expired_access_token",
                    expired_access_token
                );

                success_reset_api_view.show();
            })
            .catch((error) => {
                // console.log(error);
                error_reset_api_view.show();
            });
    });

    // Ambil expired_access_token dari localStorage
    const expiredTime = localStorage.getItem("expired_access_token");

    if (!expiredTime) {
        $("#expired_access_token").val("Token tidak ditemukan.");
        return;
    }

    // Konversi waktu ke format Date
    const now = new Date();
    const targetTime = new Date(expiredTime);

    // Fungsi untuk menghitung mundur
    function updateCountdown() {
        const now = new Date();
        const diff = targetTime - now;

        if (diff <= 0) {
            $("#expired_access_token").val("Token telah kadaluwarsa!");
            clearInterval(interval);
            const btn_reset_api = $("#refresh_token");
            btn_reset_api.prop("disabled", false);
            return;
        }

        // Hitung waktu yang tersisa
        const months = Math.floor(diff / (1000 * 60 * 60 * 24 * 30));
        const days = Math.floor(
            (diff % (1000 * 60 * 60 * 24 * 30)) / (1000 * 60 * 60 * 24)
        );
        const hours = Math.floor(
            (diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000); // Tambahkan perhitungan detik

        // Format hasil singkat
        let countdownText = "";
        if (months > 0) countdownText = `${months} bln ${days} hr`;
        else if (days > 0) countdownText = `${days} hr ${hours} jam`;
        else if (hours > 0) countdownText = `${hours} jam ${minutes} mnt`;
        else if (minutes > 0) countdownText = `${minutes} mnt ${seconds} detik`;
        else countdownText = `${seconds} detik`; // Jika hanya detik tersisa

        // Tampilkan waktu singkat
        $("#expired_access_token").val(`Kadaluwarsa: ${countdownText}`);
    }

    // Jalankan countdown setiap detik
    const interval = setInterval(updateCountdown, 1000);
    updateCountdown();
});
