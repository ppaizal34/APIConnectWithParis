import { call_random_api, call_spesifik_api, call_all_api, test_token, copy_url} from './call_api.js';

const btn_all_api = document.querySelector('#btn_all_api');
const btn_random_api = document.querySelector('#btn_random_api');
const btn_spesifik_api = document.querySelector('#btn_spesifik_api');
const btn_copy = document.querySelectorAll('#btn_copy');

const btn_clear_input = document.querySelector('#clear_input');
const btn_clear_token = document.querySelector('#clear_token');
const btn_test_token = document.querySelector('#btn_test_token');

const search_input = document.querySelector('#search_input');
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

btn_clear_input.addEventListener('click', function(){
    btn_spesifik_api.disabled = true;
    search_input.value = '';
    search_input.focus();
});

btn_clear_token.addEventListener('click', function(){
    btn_test_token.disabled = true;
    token_input.value = '';
    token_input.focus();
});

search_input.addEventListener("input", function () {
    if (search_input.value === "") {
        btn_spesifik_api.disabled = true;
        clearToken.style.display = "none";
    } else {
        btn_spesifik_api.disabled = false;
        clearToken.style.display = "block";
    }
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
    call_all_api("http://127.0.0.1:8000/api/public/volcanoes", this);
});

btn_random_api.addEventListener('click', function () {
    call_random_api('http://127.0.0.1:8000/api/public/volcanoes/random', this);
});

btn_spesifik_api.addEventListener('click', function () {
    call_spesifik_api(`http://127.0.0.1:8000/api/public/volcanoes/${search_input.value}`, this);
});

btn_test_token.addEventListener('click', function(){
    test_token(`http://127.0.0.1:8000/api/private/volcanoes/random`, this, token_input.value);
});