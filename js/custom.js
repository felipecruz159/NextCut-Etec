// Nav background com rolagem

window.onscroll = function() {
    var nav = document.getElementById('colorScroll');
    if ( window.pageYOffset > 300 ) {

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
 }

 $(window).resize(function(){location.reload();});

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
            var x = e.target.value.replace(/\D/g,"").match(/(\d{2})(\d{5})(\d{4})/);
            e.target.value = '(' + x[1] + ') ' + x[2] + '-' + x[3];
          });
          
          function mascara(o,f){
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }
        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }
        function mtel(v){
            v=v.replace(/\D/g,"");
            return v;
        }
        function id( el ){
            return document.getElementById( el );
        }
        window.onload = function(){
            id('telefone').onkeyup = function(){
                mascara( this, mtel );
            }
        }
    // /CADASTRO

    // CADASTRO DE BARBEIROS
    // /CADASTRO DE BARBEIROS


// /Mascara de camada dos campos

// Visualizar senha - login
    function verSenha(){
        var senha = document.getElementById("senha");
        var icone = document.getElementById("senhaIcon");

        if (senha.type=="password"){
            senha.type="text";
            icone.classList.remove("bi-eye-slash-fill");
            icone.classList.add("bi-eye-fill");
        }
        else{
            senha.type="password";
            icone.classList.remove("bi-eye-fill");
            icone.classList.add("bi-eye-slash-fill");
        }
    }
// /Visualizar senha - login

// Acordo com os termos no cadastro

// /Acordo com os termos no cadastro