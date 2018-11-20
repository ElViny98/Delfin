<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de contraseña</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <form action="<?php echo base_url('index.php/inicio/recuperar'); ?>" method="post">
        <label for="correo">Correo electrónico:</label>
        <input type="text" name="correo" id="correo">
        <input type="submit">
    </form>
</body>

</html>