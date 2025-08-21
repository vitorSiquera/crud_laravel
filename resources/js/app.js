import './bootstrap';

window.togglePassword = function(fieldId, toggleIcon){
    const field = document.getElementById(fieldId);
    const icon = toggleIcon.querySelector('i');

    if(field.type === "password"){
        field.type = "text";
        icon.classList.remove('bi-eye-fill', 'bi-eye');
        icon.classList.add('bi-eye-slash-fill');
    } else {
        field.type = "password";
        icon.classList.remove('bi-eye-slash-fill');
        icon.classList.add('bi-eye-fill');
    }
}

