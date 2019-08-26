
<div class="container">
    <h3>Investigación</h3>
    <hr>
</div>
    <div class="container" style="padding:0 6% 0 6%;">
        <form enctype="multipart/form-data" id="formInv" action="<?php echo base_url('index.php/user/registrarInv'); ?>" method="post">
            <div class="form-row">
                <label for="tipo" class="col-xl-1 col-lg-2 col-md-3 col-sm-12" style="padding-top: 0.5%;">Tipo:</label>
                <select name="tipo" id="tipoInv" class="form-control col-xl-11 col-lg-10 col-md-9 col-sm-12">
                    <option value="Artículo" <?php if($investigacion[0]->Tipo == 'Artículo') echo 'selected' ?>>Artículo</option>
                    <option value="Libro" <?php if($investigacion[0]->Tipo == 'Libro') echo 'selected' ?>>Libro</option>
                    <option value="Capítulo" <?php if($investigacion[0]->Tipo == 'Capítulo') echo 'selected' ?>>Capítulo</option>
                    <option value="Código" <?php if($investigacion[0]->Tipo == 'Código') echo 'selected' ?>>Código</option>
                    <option value="Conferencia" <?php if($investigacion[0]->Tipo == 'Conferencia') echo 'selected' ?>>Conferencia</option>
                    <option value="Portada" <?php if($investigacion[0]->Tipo == 'Portada') echo 'selected' ?>>Portada</option>
                    <option value="Resultados de experimentación" <?php if($investigacion[0]->Tipo == 'Resultados de experimentación') echo 'selected' ?>>Resultados de experimentación</option>
                    <option value="Método" <?php if($investigacion[0]->Tipo == 'Método') echo 'selected' ?>>Método</option>
                    <option value="Patente" <?php if($investigacion[0]->Tipo == 'Patente') echo 'selected' ?>>Patente</option>
                    <option value="Presentación" <?php if($investigacion[0]->Tipo == 'Presentación') echo 'selected' ?>>Presentación</option>
                    <option value="Tésis" <?php if($investigacion[0]->Tipo == 'Tésis') echo 'selected' ?>>Tésis</option>
                    <option value="Investigación" <?php if($investigacion[0]->Tipo == 'Investigación') echo 'selected' ?>>Investigación</option>
                </select>
            </div>
            <div class="form-row" style="margin-top: 2%;">
                <label for="titulo" class="col-xl-1 col-lg-3 col-md-2 col-sm-12 col-xs-12" style="padding-top: 0.5%;">Título: </label>
                <input placeholder="Título de su investigación..." type="text" class="form-control col-xl-11 col-lg-9 col-md-10 col-sm-12 col-xs-12" name="titulo"  id="txtTitulo" value="<?php echo $investigacion[0]->Titulo ?>">
            </div>
            <div class="form-row" style="margin-top: 2%;">
                <label for="fechaInv" class="col-xl-1 col-lg-2 col-md-1 col-sm-12 col-xs-12" style="padding-top: 0.5%;">Fecha: </label>
                <input type="date" class="form-control col-xl-5 col-lg-4 col-md-5 col-sm-12 col-xs-12" name="fechaInv"  id="fechaInv" value="<?php echo $investigacion[0]->Fecha ?>">

                <label style="padding-left: 2%; padding-top: 0.5%;" for="tema" class="col-xl-1 col-lg-2 col-md-1 col-sm-12 col-xs-12" style="padding-top: 0.5%;">Tema: </label>
                <input type="text" class="form-control col-xl-5 col-lg-4 col-md-5 col-sm-12 col-xs-12" name="tema"  id="txtTema" value="<?php echo $investigacion[0]->Tema ?>">
            </div>
            <div class="form-row" style="margin-top: 2%;">
                <label style="padding-top: 0.5%;" for="autoresInv" class="col-xl-1 col-lg-2 col-md-2 col-sm-12">Autores:</label>
                <input class="col-xl-11 col-lg-10 col-md-10 col-sm-12 form-control" type="text" id="autoresInv">
                <small style="float: right;">Separe los nombres con una coma</small>
            </div>
            <div class="form-row" style="margin-top: 2%; height: 50px;">
                <div class="col-12">
                    <input type="file" accept=".pdf" name="archivoInv" id="archivoInv" onchange="changeButton();" class="new-document">
                    <button class="btn btn-primary" id="btnArchivo" style="width: 100%; height: 100%;">
                        <i class="fa fa-lg fa-upload" aria-hidden="true">&nbsp</i>
                        Seleccionar archivo
                    </button>
                </div>
            </div>
            <div class="form-row" style="margin-top: 2%;">
                <div class="col-10"></div>
                <div class="col-2">
                    <button style="width: 100%;" class="btn btn-success" id="btnRegistrar">Guardar</button>
                </div>
            </div><!--end of original-->
        </form>
        <br>
    </div>


<script>
    var auxAut = [];
    $("#btnArchivo").on('click', function(event) {
        event.preventDefault();
        $("#archivoInv").click();
    });

    function changeButton() {
        document.getElementById('btnArchivo').innerHTML = '';
        var html = `
            <span style="">
                <i class="fa fa-file" style="color: #FFFFFF;">&nbsp</i>
            </span>
            <span>
                ${ document.getElementById('archivoInv').files[0].name }
            </span>
        `;
        document.getElementById('btnArchivo').innerHTML = html;
    }
    $("#autoresInv").tagsInput({
        width: '100%',
        height: '100%',
        defaultText: 'Autores',
        class: 'col-xl-11 col-lg-10 col-md-10 col-sm-12 form-control'
    });
    <?php
        if(isset($autores))
        {
            $aut = '';
            $len = count($autores->result());
            $index = 0;
            foreach($autores->result() as $au)
            {
                echo '$("#autoresInv").addTag("'.$au->Nombre.'")
                ';
            }
        }
    ?>

    $("#formInv").submit(function(event) {
        event.preventDefault();
        var autores = $("#autoresInv").val().split(',');
        var aut = compareArr(autores, auxAut);
        var formData = new FormData(document.getElementById('formInv'));
        var aut = compareArr(autores, auxAut); 
        formData.append('archivoInv', document.getElementById('archivoInv').files[0]);
        formData.append('id', "<?php echo $id ?>");

        aut.forEach(function(x) {
            formData.append('autoresNuevos[]', x);
        });

        auxAut.forEach(function(x) {
            formData.append('autores[]', x);
        });

        $.ajax({
            url: '<?php echo base_url('index.php/user/editarInv'); ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function(ans) {
                alert("Investigacion registrada exitosamente!");
                console.log('Hola');
            }
        })

    });

    function compareArr(arr1, arr2) {
        var flag = true;
        var arr = [];
        arr1.forEach(function(x) {
            arr2.forEach(function(y) {
                if(x == y)
                    flag = false;
            });
            if(flag) {
                arr.push(x);
            }
            flag = true;
        });
        return arr;
    }
</script>
