function validar_signin() {
    var validacion1 = validar_signin_email();
    var validacion2 = validar_signin_password();
    return validacion1 && validacion2;
}

function validar_signup() {
    var validacion1 = validar_signup_username();
    var validacion2 = validar_signup_email();
    var validacion3 = validar_signup_passwdlength1();
    var validacion4 = validar_signup_passwdlength2();
    var validacion5 = validar_signup_passwds();
    return validacion1 && validacion2 && validacion3 && validacion4 && validacion5;
}

function validar_admin_newuser() {
    var validacion1 = validar_admin_user();
    var validacion2 = validar_admin_email();
    var validacion3 = validar_admin_passwd();

    return validacion1 && validacion2 && validacion3;
}

function validar_newtopic() {
    var validacion1 = validar_newtopic_titulo();
    var validacion2 = validar_newtopic_contenido();
    var validacion3 = validar_newtopic_categoria();

    return validacion1 && validacion2 && validacion3;
}

function validar_topic(){
    var validacion1 = validar_topic_newcomment();

    return validacion1;
}

function validar_signin_email() {
    var email = document.getElementById("inputEmail").value.trim();
    var input = document.getElementById("inputEmail");
    var re = /(\w+)\@(\w+)\.[a-zA-Z]/g;
    var testEmail = re.test(email);

    if (email.length > 0 && testEmail) {
        input.className = "form-control is-valid";
        return true;
    } else {
        if (!email.length > 0) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Este campo es obligatorio";
            return false;
        }
        if (!testEmail) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Ingrese un correo valido";
            return false;
        }
    }
}

function validar_signin_password() {
    var passwd = document.getElementById("inputPassword").value.trim();
    var input = document.getElementById("inputPassword");

    if (passwd.length >= 6 && passwd.length <= 20) {
        input.className = "form-control is-valid";
        return true;
    } else {
        if (!passwd.length >= 6 || !passwd.length <= 20) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Debe ser entre 6 y 20 caracteres";
            return false;
        }
    }
}

function validar_signup_username() {
    var username = document.getElementById("inputUsername").value.trim();
    var input = document.getElementById("inputUsername");

    if (username.length >= 4 && username.length <= 20) {
        input.className = "form-control is-valid";
        return true;
    } else {
        if (!username.length >= 4 || !username.length <= 20) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Debe ser entre 4 y 20 caracteres";
            return false;
        }
    }
}

function validar_signup_email() {
    var email = document.getElementById("inputEmailsignup").value.trim();
    var input = document.getElementById("inputEmailsignup");
    var re = /(\w+)\@(\w+)\.[a-zA-Z]/g;
    var testEmail = re.test(email);

    if (email.length > 0 && testEmail) {
        input.className = "form-control is-valid";
        return true;
    } else {
        if (!email.length > 0) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Este campo es obligatorio";
            return false;
        }
        if (!testEmail) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Ingrese un correo valido";
            return false;
        }
    }
}

function validar_signup_passwdlength1() {
    var passwd1 = document.getElementById("inputPasswordsignup").value.trim();
    var input1 = document.getElementById("inputPasswordsignup");

    if (passwd1.length >= 6 && passwd1.length <= 20) {
        input1.className = "form-control is-valid";
        return true;
    } else {
        if (!passwd1.length >= 6 || !passwd1.length <= 20) {
            input1.className = "form-control is-invalid";
            input1.value = "";
            input1.placeholder = "Debe ser entre 6 y 20 caracteres";
            return false;
        }
    }
}

function validar_signup_passwdlength2() {
    var passwd2 = document.getElementById("inputPassword2").value.trim();
    var input2 = document.getElementById("inputPassword2");

    if (passwd2.length >= 6 && passwd2.length <= 20) {
        input2.className = "form-control is-valid";
        return true;
    } else {
        if (!passwd2.length >= 6 || !passwd2.length <= 20) {
            input2.className = "form-control is-invalid";
            input2.value = "";
            input2.placeholder = "Debe ser entre 6 y 20 caracteres";
            return false;
        }
    }
}

function validar_signup_passwds() {
    var passwd1 = document.getElementById("inputPasswordsignup").value.trim();
    var input1 = document.getElementById("inputPasswordsignup");
    var passwd2 = document.getElementById("inputPassword2").value.trim();
    var input2 = document.getElementById("inputPassword2");

    if (validar_signup_passwdlength2() && validar_signup_passwdlength1()) {
        if (passwd1 === passwd2) {
            input1.className = "form-control is-valid";
            input2.className = "form-control is-valid";
            return true;
        } else {
            input1.className = "form-control is-invalid";
            input2.className = "form-control is-invalid";
            input1.value = "";
            input2.value = "";
            input1.placeholder = "Las contraseñas no coinciden";
            input2.placeholder = "Las contraseñas no coinciden";
            return false;
        }
    }
}

function validar_admin_user() {
    var username = document.getElementById("adminUser").value.trim();
    var input = document.getElementById("adminUser");

    if (username.length >= 4 && username.length <= 20) {
        input.className = "form-control is-valid";
        return true;
    } else {
        if (!username.length >= 4 || !username.length <= 20) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Debe ser entre 4 y 20 caracteres";
            return false;
        }
    }
}

function validar_admin_email() {
    var email = document.getElementById("adminEmail").value.trim();
    var input = document.getElementById("adminEmail");
    var re = /(\w+)\@(\w+)\.[a-zA-Z]/g;
    var testEmail = re.test(email);

    if (email.length > 0 && testEmail) {
        input.className = "form-control is-valid";
        return true;
    } else {
        if (!email.length > 0) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Este campo es obligatorio";
            return false;
        }
        if (!testEmail) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Ingrese un correo valido";
            return false;
        }
    }
}

function validar_admin_passwd() {
    var passwd = document.getElementById("adminPasswd").value.trim();
    var input = document.getElementById("adminPasswd");

    if (passwd.length >= 6 && passwd.length <= 15) {
        input.className = "form-control is-valid";
        return true;
    } else {
        if (!passwd.length >= 6 || !passwd.length <= 15) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Debe ser entre 6 y 20 caracteres";
            return false;
        }
    }
}

function validar_newtopic_titulo() {
    var titulo = document.getElementById("Titulo").value.trim();
    var input = document.getElementById("Titulo");

    if (titulo.length >= 6 && titulo.length <= 30) {
        input.className = "form-control is-valid";
        return true;
    } else {
        if (!titulo.length >= 6 || !titulo.length <= 30) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Debe ser entre 6 y 30 caracteres";
            return false;
        }
    }
}

function validar_newtopic_contenido() {
    var contenido = document.getElementById("contenido").value.trim();
    var input = document.getElementById("contenido");

    if (contenido.length >= 15 && contenido.length <= 1000) {
        input.className = "form-control is-valid";
        return true;
    } else {
        if (!contenido.length >= 15 || !contenido.length <= 1000) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Debe ser entre 15 y 1000 caracteres";
            return false;
        }
    }
}

function validar_newtopic_categoria() {
    var cat1 = document.getElementById("categoria1").checked;
    var cat2 = document.getElementById("categoria2").checked;
    var cat3 = document.getElementById("categoria3").checked;
    var cat4 = document.getElementById("categoria4").checked;
    var feed = document.getElementById("newtopicFeedback");

    var flag = true;

    if (cat1 || cat2 || cat3 || cat4) {
        flag = false;
        feed.className = "invisible text-danger";
        return true;
    }

    if (flag){
        feed.className = "visible text-danger";
        return false;
    }
}

function validar_topic_newcomment(){
    var comentario = document.getElementById("textareaComentario").value.trim();
    var input = document.getElementById("textareaComentario");

    if (comentario.length >= 5 && comentario.length <= 1000) {
        input.className = "form-control is-valid";
        return true;
    } else {
        if (!comentario.length >= 5 || !comentario.length <= 1000) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Debe ser entre 5 y 1000 caracteres";
            return false;
        }
    }
}