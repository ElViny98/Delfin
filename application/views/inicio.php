<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-dialog.min.js');?>"></script>
	   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
       <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
       <script type="text/javascript">
       /*
       function mostrarIniciarSesion(){
            $('#iniciarSesion').css({'display':'block'});
            $('#iniciarSesion').addClass("active");
        }*/

       </script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Logo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!--<li class="nav-item active">-->
            <li class="nav-item">
                <a class="nav-link" onclick="iniciarSesion()" >Iniciar Sesión <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Acerca de </a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="buscar" placeholder="Buscar" aria-label="Buscar">
          <button id="btnBuscar" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </div>
    </nav>

    <div class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Iniciar Sesión</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Iniciar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

<!--
    <div id="iniciarSesion">
        <div class="form">
            <form class="form-signin">
              <h1 class="h3 mb-3 font-weight-normal">Usuario</h1>
              <label for="inputEmail" class="sr-only">Correo</label>
              <center><input type="email" id="inputEmail" class="form-control" placeholder="Correo" required="" autofocus=""></center>

              <label for="inputPassword" class="sr-only">Contraseña</label>
              <center><input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required=""></center>

              <div class="checkbox mb-3">
                  <label>
                      <input type="checkbox" value="remember-me"> Remember me
                  </label>
              </div>

                <br>
              <center><button id="btnIniciar" class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button></center>
              <p class="mt-5 mb-3 text-muted">© 2018</p>
            </form>
        </div>
    </div>
    -->
  </body>
  <script type="text/javascript">
     function iniciarSesion(){
         BootstrapDialog.show({
             title: 'Iniciar Sesión',
             message: `<form class="form-signin">
               <h1 class="h3 mb-3 font-weight-normal">Usuario</h1>
               <label for="inputEmail" class="sr-only">Correo</label>
               <center><input type="email" id="inputEmail" class="form-control" placeholder="Correo" required="" autofocus=""></center>

               <label for="inputPassword" class="sr-only">Contraseña</label>
               <center><input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required=""></center>
               <!--
               <div class="checkbox mb-3">
                   <label>
                       <input type="checkbox" value="remember-me"> Remember me
                   </label>
               </div>
                 -->
                 <br>
               <center><button id="btnIniciar" class="btn btn-lg btn-primary btn-block" type="submit">Iniciar</button></center>
             </form>`,
             type: BootstrapDialog.TYPE_PRIMARY
         })
     }
  </script>
</html>
