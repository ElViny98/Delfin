<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('helpers/headerInicio');
?>

<div class="Imagen" >
    <img src="<?php echo base_url('assets/img/logolargo.png');?>">
</div>

<div class="signup-container">
    <form action="<?php echo base_url('index.php/inicio/') ?>"></form>
</div>

<?php $this->load->view('helpers/footerInicio'); ?>