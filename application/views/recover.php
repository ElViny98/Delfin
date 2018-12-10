<center>
    <div class="Imagen" >
        <img src="<?php echo base_url('assets/img/logolargo.png');?>">
    </div>
<div class="container" style="width:400px;background-color:#343A40; margin:10px; color:white;border-radius:8px;">
    <form action="<?php echo base_url('index.php/inicio/recuperar'); ?>" method="post">
        <h6>Confirmación de Correo</h6>
        <label for="correo">Correo:</label>
        <input class="form-control" type="text" name="correo" id="correo">
        <br>
        <p style="text-align:justify;">Verifique el correo antes de enviar la confirmación, en el cuál se le notificará su nueva contraseña para ingresar</p>
        <input type="submit" class="btn btn-primary" style="width:100px;">
    </form>
</div>
</center>
