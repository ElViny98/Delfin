function cleanMain() {
    document.getElementById('main-content').innerHTML = '';
}

function closeNav() {
    if($(window).width() < 769) {
        $("#inactive").toggleClass('activate');
        $("#menu-toggle").toggleClass('change');
        $("#inactive").animate({scrollTop: 0}, "fast");
    }
}

$(document).ready(function() {
    cleanMain();
    $("#main-content").load(globalUrl + 'index.php/user/inicio');

    $("#btnInicio").on('click', function() {
        cleanMain();
        $("#main-content").load(globalUrl + 'index.php/user/inicio');
        closeNav();
    });

    $("#btnPerfil").on('click', function() {
        cleanMain();
        $("#main-content").load(globalUrl + 'index.php/user/perfil');
        closeNav();
    });

    $("#btnInvestigaciones").on('click', function() {
        cleanMain();
        $("#main-content").load(globalUrl + 'index.php/user/investigaciones');
        closeNav();
    });

    $("#btnNoticias").on('click', function() {
        cleanMain();
        $("#main-content").load(globalUrl + 'index.php/user/noticias_misnoticias');
        closeNav();
    });
});

function nuevaInvestigacion() {
    cleanMain();
    $("#main-content").load(globalUrl + 'index.php/user/nuevaInvestigacion');
}
function verPerfilUser(id){
    cleanMain();
    $("#main-content").load(globalUrl + 'index.php/user/datos_PerfilUsuario?id='+id);
}

function nuevaNoticia() {
    cleanMain();
    $("#main-content").load(globalUrl + 'index.php/user/Noticias');
}

function modificarNoticia(index) {
    cleanMain();
    $("#main-content").load(globalUrl + 'index.php/user/editarNoticia?id=' + index);
}

function modificarInvestigacion(index) {
    cleanMain();
    $("#main-content").load(globalUrl + 'index.php/user/editarInvestigacion?id=' + index);
}