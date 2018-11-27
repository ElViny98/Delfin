var elements = document.getElementsByTagName('li');

/*for(var i=0; i<elements.length; i++) {
    elements[i].onmouseenter = function(el) {
        document.getElementById('inactive').classList.add('activate');
    }
}

document.getElementById('inactive').onmouseout = function() {
    document.getElementById('inactive').classList.remove('activate');
}*/

$("#menu-toggle").click(function() {
    $("#menu-toggle").toggleClass('change');
    $("#inactive").toggleClass('activate');
    $("#nav-content").toggleClass('move-off-canvas');
    $("#main-content").toggleClass('move-off-canvas');
});