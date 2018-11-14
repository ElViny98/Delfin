<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de contraseña</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <script src="<?php echo base_url('assets/js/CryptoJS.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
</head>
<body>
    <form action="<?php echo base_url('index.php/inicio/passwordrecovery'); ?>" method="post">
        <label for="p1">Nueva contraseña:</label>
        <input type="password" name="p1" id="p1">
        <label for="newpass">Repetir contraseña:</label>
        <input type="password" name="newpass" id="newpass">   
        <button type="button" id="btnCambiar" class="btn btn-primary">Aceptar</button>
    </form>
</body>
<script>
    var url = '<?php echo base_url('index.php/inicio/passwordrecovery'); ?>';

    $("#btnCambiar").on('click', function() {
        var pass = CryptoJS.MD5(document.getElementById('newpass').value);
        var data = {
            newpass: pass.toString(),
            token:   '<?php echo $token; ?>'
        };
        $.post(url, data, function(ans) {
        console.log(ans);
        switch(ans) {
            case "1":
                alert('Contraseña cambiada');
                break;

            case "2":
                alert('Error :(');
                break;
        }
    });
    })
</script>
</html>