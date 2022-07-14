// Nav background com rolagem
var nav = document.getElementById('colorScroll');
window.onscroll = function () {

    if (window.pageYOffset > 300) {

        nav.classList.add("navbarScroll");
    } else {

        nav.classList.remove("navbarScroll");
    }
}

// /Nav background com rolagem

// Arruma layout no responsivo/web
function changeHTML() {
    $("#headerRight").appendTo("#destination");
}

if ($(window).width() < 991) {
    changeHTML();  
    nav.classList.add("mobileHeader");
}

$(window).resize(function () { location.reload(); });

// /Arruma layout no responsivo/web

// Intervalo de tempo do carousel

$('#mainSlider').carousel({
    interval: 6000
});

// /Intervalo de tempo do carousel

// Mascara de camada dos campos

// CADASTRO DE CLIENTES
//Telefone
document.getElementById('telefone').addEventListener('blur', function (e) {
    var x = e.target.value.replace(/\D/g, "").match(/(\d{2})(\d{5})(\d{4})/);
    e.target.value = '(' + x[1] + ') ' + x[2] + '-' + x[3];
});

function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}
function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}
function mtel(v) {
    v = v.replace(/\D/g, "");
    return v;
}
function id(el) {
    return document.getElementById(el);
}
window.onload = function () {
    id('telefone').onkeyup = function () {
        mascara(this, mtel);
    }
}
// /CADASTRO DE CLIENTES

// CADASTRO DE BARBEIROS
//CPF
document.getElementById('cpf').addEventListener('blur', function (e) {
    var x = e.target.value.replace(/\D/g, "").match(/(\d{3})(\d{3})(\d{3})(\d{2})/);
    e.target.value = x[1] + '.' + x[2] + '.' + x[3] + '-' + x[4];
});

//CNPJ
document.getElementById('cnpj').addEventListener('blur', function (e) {
    var x = e.target.value.replace(/\D/g, "").match(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/);
    e.target.value = x[1] + '.' + x[2] + '.' + x[3] + '/' + x[4] + '-' + x[5];
});

//CEP
document.getElementById('cep').addEventListener('blur', function (e) {
    var x = e.target.value.replace(/\D/g, "").match(/(\d{5})(\d{3})/);
    e.target.value = x[1] + '-' + x[2];
});
// /CADASTRO DE BARBEIROS

// /Mascara de camada dos campos

// CADASTRO DE BARBEIROS
$(function () {
    var atual_fs, next_fs, prev_fs;
    $('.next').click(function () {
        atual_fs = $(this).parent();
        next_fs = $(this).parent().next();

        $('#progress li').eq($('fieldset').index(next_fs)).addClass('ativo')
        atual_fs.fadeOut(200);
        next_fs.fadeIn(500);
    });

    $('.prev').click(function () {
        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();

        $('#progress li').eq($('fieldset').index(atual_fs)).removeClass('ativo')
        atual_fs.fadeOut(200);
        prev_fs.fadeIn(500);
    });
    $('#formulario input[type=submit]').click(function () {
        return false;
    })
});

//CELULAR
document.getElementById('celular').addEventListener('blur', function (e) {
    var x = e.target.value.replace(/\D/g, "").match(/(\d{2})(\d{5})(\d{4})/);
    e.target.value = '(' + x[1] + ') ' + x[2] + '-' + x[3];
});


// /CADASTRO DE BARBEIROS

// Visualizar senha - login
function verSenha() {
    var senha = document.getElementById("senha");
    var icone = document.getElementById("senhaIcon");

    if (senha.type == "password") {
        senha.type = "text";
        icone.classList.remove("bi-eye-slash-fill");
        icone.classList.add("bi-eye-fill");
    }
    else {
        senha.type = "password";
        icone.classList.remove("bi-eye-fill");
        icone.classList.add("bi-eye-slash-fill");
    }
}

function verConfirma() {
    var senha = document.getElementById("confirma");
    var icone = document.getElementById("senhaIcon2");

    if (senha.type == "password") {
        senha.type = "text";
        icone.classList.remove("bi-eye-slash-fill");
        icone.classList.add("bi-eye-fill");
    }
    else {
        senha.type = "password";
        icone.classList.remove("bi-eye-fill");
        icone.classList.add("bi-eye-slash-fill");
    }
}
// /Visualizar senha - login

// Acordo com os termos no cadastro

// /Acordo com os termos no cadastro