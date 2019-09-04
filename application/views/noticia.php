<?php 
    $this->load->view('helpers/headerInicio');
?>

<div class="container">
    <div class="page-header">
        <h1><?php echo $titulo ?></h1>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <?php echo $descripcion; ?>
        </div>
    </div>
</div>

<?php
    $this->load->view('helpers/footerInicio');
?>
