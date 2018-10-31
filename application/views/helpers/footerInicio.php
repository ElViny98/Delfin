    <!-- Footer -->
    <footer class="page-footer font-small footer-dark">

        <div class="container">
          <!--Formulario de contacto-->
          <div class="container">

  <h2>Envianos un Mensaje</h2><!---->
  <form class="form-horizontal" action="/action_page.php">

  <div class="form-group">
    <label class="control-label col-lg text-left" for="email">Email:</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-lg text-left" for="cname">Nombre Completo:</label>
    <div class="col-sm-6">
      <input type="cnombre" class="form-control" id="cnombre" placeholder="Nombre y Apellidos">
    </div>
  </div>

</form>
<form>
  <div class="form-group">
    <label for="comment">Comment:</label>
    <textarea class="form-control" rows="5" id="comment"></textarea>
  </div>
</form>

<div class="col-lg ">
  <button type="submit" class="btn btn-default">Submit</button>
</div>

</div><!--container-->
</div><!--big gray div-->

        <div class="footer-copyright text-center py-3">
            © 2018
        </div>

    </footer>
    <!-- Footer -->
</body>
<script type="text/javascript">
   function iniciarSesion(){
       $("#iniciarSesionModal").modal('show');
   }

   $("#btnIniciar").on('click', function() {
       $("#formInicio").submit();
   });
</script>
</html>
