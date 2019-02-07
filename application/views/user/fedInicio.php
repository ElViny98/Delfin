<!-- Barra de búsqueda pendiente -->
<div class="Imagen" >
    <img src="<?php echo base_url('assets/img/logolargo.png');?>">
</div>
<div class="investigaciones-display">
    <div class="header">
        Investigaciones recientes
    </div>
    <ul class="investigaciones-list">
        <li>
            <div class="img-perfil-container">
                <img src="https://via.placeholder.com/35">
            </div>
            <div class="perfil-container">
                <a href="#">Dr. Rodolfo Ostos Robles</a>
            </div>

            <div class="ivestigacion-container">
              <?php foreach ($Investigadores->result() as $i) {
                echo '<li>

                <div class="perfil-container">
                <img src="https://via.placeholder.com/35">
                    <a href="#">'.$i->Nombre." ".$i->ApPaterno." ".$i->ApMaterno.'</a>
                </div>
                </li>
                ';
                } ?>
            </div>
        </li>
        <li>
            <img src="https://via.placeholder.com/35">Investigador

        </li>
        <li>
            <img src="https://via.placeholder.com/35">Investigador
        </li>
    </ul>
</div>

<div class="content-fed">
    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <input class="form-control" type="text" id="txtBuscar">
            </div>
            <div class="col-3">
                <button class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </div>
</div>
