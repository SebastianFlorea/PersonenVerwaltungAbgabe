$('#form').submit(function (e) {
    let $inputs = $('#form input');
    $inputs.each(function () {
        let name = $(this).attr('name');
        if ($(this).val() == "" && name != "token") {
            e.preventDefault();
            $(".error-messages").text(name + ' ist leer').fadeIn();
        }
    })
})

$('#form_login').submit(function (e) {
    let $inputs = $('#form_login input');
    $inputs.each(function () {
        if ($(this).val() == "") {
            e.preventDefault();
            let name = $(this).attr('name');
            $(".error-messages").text(name + ' ist leer').fadeIn();
        }
    });
});


/*
$('#form_login').submit(function(e) {
    let $inputs = $('#form_login input');
    $inputs.each(function() {
        if ($(this).val() == "") {
            e.preventDefault();
            let name = $(this).attr('name');
             if (typeof name !== typeof undefined){
                $(".error-messages").text(name + ' ist leer').fadeIn();
             }
        }
    });
}); */


/*
const form = document.getElementById('form');
const firstname = document.getElementById('firstname_id');

form.addEventListener('submit', e => {

    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};


const validateInputs = () => {
    const firstnameValue = firstname.value.trim();

    if (firstnameValue === '') {
        setError(firstname, 'Firstname is required');
    } else {
        setSuccess(firstname);
    }
};

*/


/*
const form = document.getElementById('user_form');
const firstnameInput = document.getElementById('firstname_id');
const messageContainer = document.getElementById('message-container');

form.addEventListener("submit", function(e){

    let firstname = firstnameInput.value;
    findErrors(firstname);

    if(errors.length > 0){
        e.preventDefault();
        alert($(this).attr('name') + ' is blank')
        messageContainer.innerText = errors.join(". ")
    }
})

function findErrors(firstname){
    let errorMessages = []

    if(firstname === '' || firstname == null){
        errorMessages.push("Vorname ist nicht eingegeben")
    }
    return errorMessages;
}
*/