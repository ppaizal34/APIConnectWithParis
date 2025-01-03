import { loadingAnimate, preElement, h6Element } from "./renderHTML.js";

export const call_api = (url, token = "") => {
    // Tentukan konfigurasi fetch berdasarkan kondisi
    const fetchOptions = token
        ? {
              method: "GET",
              headers: {
                  Authorization: `Bearer ${token}`,
                  "Content-Type": "application/json",
                  Accept: "application/json",
              },
          }
        : {};

    // Lakukan fetch dan sambungkan then ke hasilnya
    return fetch(url, fetchOptions)
        .then((response) => {
            if (!response.ok) {
                console.log(response);
                throw {
                    status: response.status,
                    message: response.statusText,
                };
            }
            return response.json().then((data) => {
                return {
                    status: response.status,
                    Heroes: data,
                };
            });
        })
        .catch((err) => {
            throw err;
        });
};

export const startRateLimit = (btn) => {
    let oneMinute = 60;

    const intervalRateLimit = setInterval(() => {
        oneMinute--;

        btn.disabled = true;
        btn.textContent = `Mohon menunggu selama ${oneMinute} detik`;

        if (oneMinute <= 0) {
            oneMinute = 60;
            clearInterval(intervalRateLimit);
            btn.disabled = false;
            btn.textContent = "Try out";
        }
    }, 1000);
};

export const copy_url = (event) => {
    if (event.target.id === "btn_copy") {
        const img_copy = event.target.querySelector("img");
        const url = event.target.querySelector("span");

        navigator.clipboard.writeText(url.textContent).then(() => {
            const copiedMessage = document.createElement("span");
            copiedMessage.id = "copied";
            copiedMessage.textContent = "Copied!";
            img_copy.replaceWith(copiedMessage);

            event.target.disabled = true;

            setTimeout(() => {
                event.target.disabled = false;

                const btn_copied = event.target.querySelector("#copied");
                const newImg = document.createElement("img");
                newImg.src = "/assets/images_api/documents_api/copy.png";
                newImg.id = "btn_copy";
                newImg.classList.add("pt-1");
                newImg.alt = "Copy";
                newImg.width = 25;
                newImg.height = 25;

                btn_copied.replaceWith(newImg);
            }, 3000);

            return;
        });
    }
};

export const call_all_api = async function (url, button) {
    // Hanya jalankan jika tombol belum berubah menjadi btn_clear
    if (button.id !== "btn_clear") {
        const statusView = button.parentElement.querySelector("#status");
        const messageView = button.parentElement.querySelector("#message");

        try {
            button.innerHTML = loadingAnimate("block");

            const API = await call_api(url);

            const statusCode = `<span class='badge text-bg-success'>${API.status}</span>`;
            const message = `<span class='badge text-bg-success'>${API.Heroes.message}</span>`;
            const pre = preElement();
            const h6 = h6Element();

            statusView.innerHTML = statusCode;
            messageView.innerHTML = message;

            API.Heroes.data.forEach((data) => {
                pre.append(JSON.stringify(data, null, 2));
            });

            button.insertAdjacentElement("afterend", h6);
            h6.insertAdjacentElement("afterend", pre);

            button.id = "btn_clear";
            button.innerHTML = "Clear";
        } catch (err) {
            console.log(button);
            if (err.status == 429) {
                startRateLimit(button);
            }

            const statusCode = `<span class='badge text-bg-danger'>${err.status}</span>`;
            const message = `<span class='badge text-bg-danger'>${err.message}</span>`;

            statusView.innerHTML = statusCode;
            messageView.innerHTML = message;

            console.log(err.status);
        }
    }
};

export const call_random_api = async function (url, button) {
    // Hanya jalankan jika tombol belum berubah menjadi btn_clear
    if (button.id !== "btn_clear") {
        const statusView = button.parentElement.querySelector("#status");
        const messageView = button.parentElement.querySelector("#message");

        try {
            button.innerHTML = loadingAnimate("block");

            const API = await call_api(url);
            const statusCode = `<span class='badge text-bg-success'>${API.status}</span>`;
            const message = `<span class='badge text-bg-success'>${API.Heroes.message}</span>`;
            const pre = preElement();
            const h6 = h6Element();

            statusView.innerHTML = statusCode;
            messageView.innerHTML = message;

            pre.append(JSON.stringify(API.Heroes.data, null, 2));

            button.insertAdjacentElement("afterend", h6);
            h6.insertAdjacentElement("afterend", pre);

            button.id = "btn_clear";
            button.innerHTML = "Clear";
        } catch (err) {
            if (err.status === 429) {
                startRateLimit(button);
            }

            const statusCode = `<span class='badge text-bg-danger'>${err.status}</span>`;
            const message = `<span class='badge text-bg-danger'>${err.message}</span>`;

            statusView.innerHTML = statusCode;
            messageView.innerHTML = message;
        }
    }
};

export const call_spesifik_api = async function (url, button) {
    // Hanya jalankan jika tombol belum berubah menjadi btn_clear
    if (button.id !== "btn_clear") {
        const search_input = document.querySelector("#search_input").value;
        const statusView = button.parentElement.querySelector("#status");
        const messageView = button.parentElement.querySelector("#message");

        try {
            button.innerHTML = loadingAnimate("block");

            const API = await call_api(url);

            const statusCode = `<span class='badge text-bg-success'>${API.status}</span>`;
            const message = `<span class='badge text-bg-success'>${API.Heroes.message}</span>`;
            const pre = preElement();
            const h6 = h6Element();

            statusView.innerHTML = statusCode;
            messageView.innerHTML = message;

            API.Heroes.data.forEach((data) => {
                pre.append(JSON.stringify(data, null, 2) + "\n");
            });

            button.insertAdjacentElement("afterend", h6);
            h6.insertAdjacentElement("afterend", pre);

            button.id = "btn_clear";
            button.innerHTML = "Clear";
        } catch (err) {
            console.log(button);
            if (err.status == 429) {
                startRateLimit(button);
            }

            const statusCode = `<span class='badge text-bg-danger'>${err.status}</span>`;
            const message = `<span class='badge text-bg-danger'>${err.message}</span>`;

            statusView.innerHTML = statusCode;
            messageView.innerHTML = message;

            console.log(err.status);
        }
    }
};

export const test_token = async function (url, button, token) {
    if (button.id !== 'btn_clear') {
        const statusView = button.parentElement.querySelector('#status');
        const messageView = button.parentElement.querySelector('#message');

        try {
            button.innerHTML = loadingAnimate('block');

            const API = await call_api(url, token);

            const statusCode = `<span class='badge text-bg-success'>${API.status}</span>`;
            const message = `<span class='badge text-bg-success'>${API.Heroes.message}</span>`;
            const pre = preElement();
            const h6 = h6Element();
            statusView.innerHTML = statusCode;
            messageView.innerHTML = message;

            pre.append(JSON.stringify(API.Heroes.data, null, 2) + "\n");
            
            button.insertAdjacentElement('afterend', h6);
            h6.insertAdjacentElement('afterend', pre);

            button.id = 'btn_clear';
            button.innerHTML = "Clear";
        } catch (err) {
            if(err.status == 429){
                startRateLimit(button);
            }else if(err.status == 401){
                button.innerHTML = "Try Out";
                button.disabled = false;
                token_input.focus();
            }

            const statusCode = `<span class='badge text-bg-danger'>${err.status}</span>`;
            const message = `<span class='badge text-bg-danger'>${err.message}</span>`;

            statusView.innerHTML = statusCode;
            messageView.innerHTML = message;

            console.log(err.status);
        }
    }
};
