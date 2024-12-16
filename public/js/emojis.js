let id_btn = "";

function startRateLimit(btn) {
    let oneMinute = 60;

    const intervalRateLimit = setInterval(() => {
        oneMinute--;
        $(btn)
            .prop("disabled", true)
            .text(`Mohoh menunggu selama ${oneMinute} detik`);

        if (oneMinute <= 0) {
            oneMinute = 60;
            clearInterval(intervalRateLimit);
            $(btn).prop("disabled", false).text("Try out");
        }
    }, 1000);
}

$(document).on("click", "#btn_copy", function () {
    const img_copy = $(this).find("img");
    const url = $(this).find("span");

    navigator.clipboard.writeText(url.text()).then(() => {
        img_copy.replaceWith("<span id='copied'>Copied!</span>");
        $(this).prop("disabled", true);

        setTimeout(() => {
            $(this).prop("disabled", false);
            const btn_copied = $(this).find("#copied");
            btn_copied.replaceWith(`<img src="{{ asset('assets/images_api/documents_api/copy.png') }}" id="btn_copy"
                                            class="pt-1" alt="Copy" width="25" height="25">`);
        }, 3000);
    });
});

$(document).on("click", "#btn_clear", function () {
    const accordionItem = $(this).closest(".accordion-item");
    const btn = $(this);
    const token_input = $("#token_input");
    const info_status = accordionItem.find("#status");
    const info_message = accordionItem.find("#message");

    // Hapus elemen <h6> dan <pre>
    btn.next("h6").remove();
    btn.next("pre").remove();
    info_status.html("-----");
    info_message.html("-----");

    // Kembalikan tombol ke state awal sebagai "Try out"
    btn.attr("id", id_btn).text("Try out");

    if(token_input.val() == ''){
        const btn_test_token = $('#btn_test_token');
        btn_test_token.prop('disabled', true);
    }
});

$(document).on("click", "#btn_all_api", function () {
    const accordionItem = $(this).closest(".accordion-item");
    const btn = $(this);
    const info_status = accordionItem.find("#status");
    const info_message = accordionItem.find("#message");

    // Menampilkan loading sebelum data dikirimkan
    const loading = `<div class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>`;
    btn.prop("disabled", true).html(loading);

    axios
        .get("http://127.0.0.1:8000/api/public/emojis/paginate")
        .then((response) => {
            // console.log(response.data.data)
            const status = $("<span class='badge text-bg-success'>200</span>");
            const message = $(
                `<span class='badge text-bg-success'>${response.data.message}</span>`
            );
            const emojis = response.data.data;
            const h6 = $("<h6></h6>").text("Response:");
            const pre = $("<pre></pre>").css({
                height: "200px",
                "overflow-x": "hidden",
            });
            $(info_status).html(status);
            $(info_message).html(message);
            // Tambahkan elemen <h6> dan <pre> setelah tombol
            btn.after(h6);

            // Tambahkan data API ke dalam <pre>
            emojis.forEach((data) => {
                pre.append(JSON.stringify(data, null, 2) + "\n");
            });

            // Tambahkan <pre> setelah <h6>
            h6.after(pre);

            // Ubah id dan teks tombol menjadi "Clear"
            btn.attr("id", "btn_clear").prop("disabled", false).text("Clear");
            id_btn = "btn_all_api";
        })
        .catch((error) => {
            if (error.response.status == 429) {
                startRateLimit(btn);
            }

            const status = $(
                `<span class='badge text-bg-danger'>${error.response.status}</span>`
            );
            const message = $(
                `<span class='badge text-bg-danger'>${error.response.statusText}</span>`
            );

            info_status.html(status);
            info_message.html(message);
        });
});

$(document).on("click", "#btn_test_token", function () {
    const accordionItem = $(this).closest(".accordion-item");
    const btn = $(this);
    const token_input = accordionItem.find("#token_input").val();
    const info_status = accordionItem.find("#status");
    const info_message = accordionItem.find("#message");

    // Menampilkan loading sebelum data dikirimkan
    const loading = `<div class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>`;
    btn.prop("disabled", true).html(loading);

    axios
        .get(`http://127.0.0.1:8000/api/private/emojis/random`, {
            headers: {
                Authorization: `Bearer ${token_input}`,
            },
        })
        .then((response) => {
            console.log(response.data);
            const status = $(
                `<span class="badge text-bg-success">${response.status}</span>`
            );
            const message = $(
                `<span class="badge text-bg-success">${response.data.message}</span>`
            );
            const data = JSON.stringify(response.data, null, 2);
            const h6 = $("<h6></h6>").text("response");
            const pre = $("<pre></pre>").text(data);

            $(info_status).html(status);
            $(info_message).html(message);
            // Menambahkan elemen h6 dan pre setelah btn_try_out
            $(btn).after(h6);
            h6.after(pre);
            // Ubah id dan teks tombol menjadi "Clear"
            btn.attr("id", "btn_clear").prop("disabled", false).text("Clear");
            id_btn = "btn_test_token";
        })
        .catch((error) => {
            console.log(error)
            if (error.response.status == 429) {
                startRateLimit(btn);
            } else if (error.response.status == 401) {
                btn.html("Try out").prop("disabled", false);
                $("#token_input").focus();
            }

            console.log(error.response.status);

            const status = $(
                `<span class='badge text-bg-danger'>${error.response.status}</span>`
            );
            const message = $(
                `<span class='badge text-bg-danger'>${error.response.statusText}</span>`
            );

            $(info_status).html(status);
            $(info_message).html(message);
        });
});

$("#token_input").on("input", function () {
    const token_input = $(this);
    const btn_test_token = $("#btn_test_token");
    const clear_token = $("#clear_token");

    if (token_input.val() !== "") {
        btn_test_token.prop("disabled", false);
        clear_token.show();
    } else {
        btn_test_token.prop("disabled", true);
        clear_token.hide();
    }
});

$("#clear_token").click(function () {
    const btn_test_token = $('#btn_test_token');
    $("#token_input").val("").focus();
    btn_test_token.prop('disabled', true);
});


