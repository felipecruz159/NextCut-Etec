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

// =============================================================================================

// Realoca layout no responsivo/web
function changeHTML() {
    $("#headerRight").appendTo("#destination");
}

if ($(window).width() < 991) {
    changeHTML();
    nav.classList.add("mobileHeader");
}

var existeHeader = document.getElementById('colorScroll');
if (existeHeader) {
    $(window).resize(function () { location.reload(); });
}

// /Realoca layout no responsivo/web

// =============================================================================================

// Intervalo de tempo do carousel

$('#mainSlider').carousel({
    interval: 6000
});

// /Intervalo de tempo do carousel

// =============================================================================================

// Mascara dos campos

// API Cep

new Vue({
    el: "#appCep",
    data: {
        endereco: {
            cep: null,
            estado: null,
            cidade: null,
            bairro: null,
            rua: null
        }
    },
    methods: {
        cepAlterado() {
            axios({
                method: "get",
                url: `https://viacep.com.br/ws/${this.endereco.cep}/json/`,
                responseType: "application/json"
            }).then(response => {
                var bean = response.data;
                this.endereco.estado = bean.uf;
                this.endereco.cidade = bean.localidade;
                this.endereco.bairro = bean.bairro;
                this.endereco.rua = bean.logradouro;
            });
        }
    }
})

// Mostra cep quando logado

function mostraCep(){
    modalCep = document.getElementById('appCep');
    clickCep = document.getElementById('clickCep');
    clickCep2 = document.getElementById('clickCep2');

    // clickCep.style.display = "none";
    // clickCep2.style.display = "none";
    modalCep.style.display = "";
}

// /API Cep

// Validação entrada somente de números
function onlynumber(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    //var regex = /^[0-9.,]+$/;
    var regex = /^[0-9]+$/;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}


//Telefone

document.getElementById('telefone').addEventListener('blur', function (e) {
    var input = e.target.value;
    var tamanho = input.length;

    if (tamanho == 11) {
        var x = e.target.value.replace(/\D/g, "").match(/(\d{2})(\d{5})(\d{4})/);
        e.target.value = '(' + x[1] + ')' + x[2] + '-' + x[3];
    }
    else if (tamanho == 10) {
        var x = e.target.value.replace(/\D/g, "").match(/(\d{2})(\d{4})(\d{4})/);
        e.target.value = '(' + x[1] + ')' + x[2] + '-' + x[3];
    }
});

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

//CELULAR
document.getElementById('celular').addEventListener('blur', function (e) {
    var input = e.target.value;
    var tamanho = input.length;

    if (tamanho == 11) {
        var x = e.target.value.replace(/\D/g, "").match(/(\d{2})(\d{5})(\d{4})/);
        e.target.value = '(' + x[1] + ')' + x[2] + '-' + x[3];
    }
    else if (tamanho == 10) {
        var x = e.target.value.replace(/\D/g, "").match(/(\d{2})(\d{4})(\d{4})/);
        e.target.value = '(' + x[1] + ')' + x[2] + '-' + x[3];
    }
});

// /Mascara dos campos

// /CADASTRO DE BARBEIROS

// Confirma senha

function confereSenha() {
    const senha = document.querySelector('input[name=senha]');
    const confirma = document.querySelector('input[name=confirma]');

    if (confirma.value === senha.value) {
        confirma.setCustomValidity('');
    }
    else {
        confirma.setCustomValidity('As senhas não coincidem!');
    }
}

// /Confirma senha

// VALIDAR FORÇA DA SENHA

function validarSenhaForca() {

    var label = document.getElementById('labelForca');
    var senha = document.getElementById('senha').value;
    var forca = 0;

    label.style.display = "";

    if ((senha.length >= 4) && (senha.length <= 7)) {
        forca += 10;
    } else if (senha.length > 7) {
        forca += 25;
    }

    if ((senha.length >= 5) && (senha.match(/[a-z]+/))) {
        forca += 10;
    }

    if ((senha.length >= 6) && (senha.match(/[A-Z]+/))) {
        forca += 20;
    }

    if ((senha.length >= 7) && (senha.match(/[@#$%&;*_-]/))) {
        forca += 25;
    }

    if (senha.match(/([1-9]+)\1{1,}/)) {
        forca += -25;
    }

    mostrarForca(forca);
}

function mostrarForca(forca) {

    var barra = document.getElementById("erroSenhaForca");
    var label = document.getElementById('labelForca');
    var url = window.location.href;

    if (url == 'http://localhost/NextCut/?page=cadastro_barbeiro') {
        barra.style.width = "65%";
        barra.style.margin = "auto";
        label.style.textAlign = "center";
        label.style.padding = "0px";
    }
    else {
        barra.style.width = "100%";
        label.style.textAlign = "center";
    }
    if (forca < 30) {
        barra.innerHTML = '<div class="progress" ><div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>';
    } else if ((forca >= 30) && (forca < 50)) {
        barra.innerHTML = '<div class="progress"><div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div></div>';
    } else if ((forca >= 50) && (forca < 70)) {
        barra.innerHTML = '<div class="progress"><div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></div>';
    } else if ((forca >= 70) && (forca < 100)) {
        barra.innerHTML = '<div class="progress"><div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>';
    }
}

// /VALIDAR FORÇA DA SENHA

// Visualizar senha
function verSenha() {
    var senha = document.getElementById('senha');
    var icone = document.getElementById('senhaIcon');

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
    var senha = document.getElementById('confirma');
    var icone = document.getElementById('senhaIcon2');

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
// /Visualizar senha

// Acordo com os termos no cadastro

function checkbox() {
    var checkbox = document.getElementById('termos');

    if (checkbox.checked) {
        checkbox.setCustomValidity('');
    }
    else {
        checkbox.setCustomValidity('Você precisa concordar com os nossos termos!');
        return false;
    }
}

// /Acordo com os termos no cadastro

// Form sexo

function getSexo() {
    var sexo = document.getElementById('sexo');
    var optionValue = sexo.options[sexo.selectedIndex];
    var outroSexo = document.getElementById('outroSexo');

    var value = optionValue.value;

    if (value == 3) {
        outroSexo.type = "text";
        outroSexo.required = true;
    }
    else {
        outroSexo.type = "hidden";
        outroSexo.required = false;
    }

}


// /Form sexo

// Escolha plano

var p1 = document.getElementById('plano1');
var p2 = document.getElementById('plano2');
var escolhido = document.getElementById('escolhido');

p1.addEventListener('click', function planoCor() {
    p2.classList.remove("plano-selecionado");
    p1.classList.add("plano-selecionado");
    escolhido.value = 1;
});

p2.addEventListener('click', function planoCor2() {
    p1.classList.remove("plano-selecionado");
    p2.classList.add("plano-selecionado");
    escolhido.value = 2;
});

// /Escolha plano

// Cadastro barbeiro next page
const div1 = document.getElementById('barbeiro1');
const div2 = document.getElementById('barbeiro2');
const div3 = document.getElementById('barbeiro3');
const div4 = document.getElementById('barbeiro4');
const div5 = document.getElementById('barbeiro5');

function goto1(){
    div1.style.display = "none";
    div2.style.display = "";
    window.scrollTo(0, 0);
}
function goto2(){
    div2.style.display = "none"
    div3.style.display = "";
    window.scrollTo(0, 0);
}
function goto3(){
    div3.style.display = "none"
    div4.style.display = "";
    window.scrollTo(0, 0);
}
function goto4(){
    div4.style.display = "none"
    div5.style.display = "";
    window.scrollTo(0, 0);
}
function previ1(){
    div2.style.display = "none"
    div1.style.display = "";
    window.scrollTo(0, 0);
}
function previ2(){
    div3.style.display = "none"
    div2.style.display = "";
    window.scrollTo(0, 0);
}
function previ3(){
    div4.style.display = "none"
    div3.style.display = "";
    window.scrollTo(0, 0);
}
function previ4(){
    div5.style.display = "none"
    div4.style.display = "";
    window.scrollTo(0, 0);
}
// /Cadastro barbeiro next page

//Reload

function reload(){
    location.reload()    
}

// hora

function horaIgual(){
    var escolha1 = document.getElementById("corte1");
    var escolha2 = document.getElementById("corte2");
    escolha1.style.display = "none";
    escolha2.style.display = "none";

    var tipoAgenda = document.getElementById("tipoAgenda");
    tipoAgenda.value = 1;

    var div1 = document.getElementById("horasIguais");
    var div2 = document.getElementById("diasIguais");

    div1.style.display = "";
    div2.style.display = "";
    console.log(tipoAgenda.value);
}

function horaPerso(){
    var escolha1 = document.getElementById("corte1");
    var escolha2 = document.getElementById("corte2");
    escolha1.style.display = "none";
    escolha2.style.display = "none";

    var tipoAgenda = document.getElementById("tipoAgenda");
    tipoAgenda.value = 2;

    var div1 = document.getElementById("diasDif");
    div1.style.display = "";
    console.log(tipoAgenda.value);
}
