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

function modificar(index) {
    cleanMain();
    $("#main-content").load(globalUrl + 'index.php/user/editarNocia?id=' + index);
}

