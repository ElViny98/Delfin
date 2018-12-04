var containers = document.getElementsByClassName('news-container');

for(var i=0; i<containers.length; i++) {
    containers[i].style.display = 'none';
}

containers[0].removeAttribute('style');

function mostrar(index) {
    var containers = document.getElementsByClassName('news-container');
    console.log('Entró');
	for(var i=0; i<containers.length; i++) {
        containers[i].style.display = 'none';
    }

    containers[index].removeAttribute('style');
    $('html, body').animate({scrollTop: $("#new-container").offset().top}, 200);
}
