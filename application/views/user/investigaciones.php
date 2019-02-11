<div class="container">
    <div class="container-fluid" style="margin-bottom: 3%;">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-lg-9 col-xl-9">
				<h2>Investigaciones</h2>
			</div>
			<div class="col-xs-12 col-md-4 col-lg-3 col-xl-3">
				<button onclick="nuevaInvestigacion()" class="btn btn-primary" style="width:100%;"><i class="fa fa-plus-circle"></i>&nbspNueva investigación</button>
			</div>
		</div>
	</div>
<hr>
<div class="">
    <?php
        foreach($investigaciones->result() as $r)
        {
            echo
           '
            <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
                <div class="row new-container" >
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <a href="'.base_url('index.php/user/investigacion?id='.$r->idInvestigaciones).'" class="link-new">'.$r->Titulo.'</a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <a href="'.base_url('index.php/user/editarInvestigacion?id='.$r->idInvestigaciones).'" style="width: 100%;" class="btn btn-success"><i class="fa fa-pencil-square-o"></i>&nbspEditar</a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <a href="'.base_url('index.php/user/eliminarInvesitacion?id='.$r->idInvestigaciones).'" style="width: 100%;" class="btn btn-danger"><i class="fa fa-times"></i>&nbspEiminar</a>
                    </div>
                </div>
                <hr>
            </div>
           ';
        }
    ?>
</div>
</div>
