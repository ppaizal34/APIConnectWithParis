import { call_random_api, call_spesifik_api, call_all_api, test_token, copy_url} from './call_api.js';

const btn_all_api = document.querySelector('#btn_all_api');
const btn_copy = document.querySelectorAll('#btn_copy');

const btn_clear_token = document.querySelector('#clear_token');
const btn_test_token = document.querySelector('#btn_test_token');

const token_input = document.querySelector('#token_input');

document.body.addEventListener('click', function (event) {
    const id = event.target.id;
    const statusView = event.target.parentElement.querySelector('#status');
    const messageView = event.target.parentElement.querySelector('#message');

    if (id === 'btn_clear') {
        statusView.innerHTML = '-----';
        messageView.innerHTML = '-----';
        event.target.nextElementSibling.remove();
        event.target.nextElementSibling.remove();
        event.target.id = 'btn_all_api';
        event.target.innerHTML = 'Try out';
    }
});

btn_copy.forEach((btn_copy) => {
   btn_copy.addEventListener('click', function(event){
        copy_url(event);
   });
});

btn_clear_token.addEventListener('click', function(){
    btn_test_token.disabled = true;
    token_input.value = '';
    token_input.focus();
});

token_input.addEventListener('input', function(){
    if (this.value !== "") {
        btn_test_token.disabled = false; 
        btn_clear_token.style.display = "inline"; 
    } else {
        btn_test_token.disabled = true; 
        btn_clear_token.style.display = "none"; 
    }
});

btn_all_api.addEventListener('click', function () {
    call_all_api("http://127.0.0.1:8000/api/public/islamic_prayer", this);
});


btn_test_token.addEventListener('click', function(){
    test_token(`http://127.0.0.1:8000/api/private/islamic_prayer/random`, this, token_input.value);
});



