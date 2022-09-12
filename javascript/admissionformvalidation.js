function validate()
{
    var phone_input = document.getElementById("myform_phone");

    phone_input.addEventListener('input', () => {
    phone_input.setCustomValidity('');
    phone_input.checkValidity();
    });

    phone_input.addEventListener('invalid', () => {
    if(phone_input.value === '') {
        phone_input.setCustomValidity('Enter phone number!');
    } else {
        phone_input.setCustomValidity('Enter phone number in this format: 1234567890');
    }
    });

    var phone_input = document.getElementById("myform_phone2");

    phone_input.addEventListener('input', () => {
    phone_input.setCustomValidity('');
    phone_input.checkValidity();
    });

    phone_input.addEventListener('invalid', () => {
    if(phone_input.value === '') {
        phone_input.setCustomValidity('Enter phone number!');
    } else {
        phone_input.setCustomValidity('Enter phone number in this format: 1234567890');
    }
    });
}