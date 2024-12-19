function check_refresh_token_expired() {
    const expiredTime = localStorage.getItem("expired_refresh_token");

    // Cek apakah expired_refresh_token ada pada localStorage
    if(!expiredTime){
        return false;
    }

    const now = new Date();
    const targetTime = new Date(expiredTime);

    if (now > targetTime) {
        axios
            .post("http://127.0.0.1:8000/logout")
            .then((response) => {
                if (response.status == 200) {
                    window.location.href = "http://127.0.0.1:8000/login";
                }
            })
            .catch((error) => {
                console.log(error);
            });
    }
}

check_refresh_token_expired()
