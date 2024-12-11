$(document).ready(function () {
    // Ambil expired_access_token dari localStorage
    const expiredTime = localStorage.getItem("expired_access_token");
    const now = new Date();
    const targetTime = new Date(expiredTime);

    if (now > targetTime) {
        const myModal = new bootstrap.Modal(
            document.getElementById("staticBackdrop"),
            {
                keyboard: false,
            }
        );
        myModal.show();

        return;
    }
});
