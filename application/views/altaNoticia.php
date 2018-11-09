<div id="titulo">
    <h3>Noticias</h3>
    <hr>
</div>
<div class="containerNoticia">
    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('index.php/user/datosNoticia');?>" method="post">
        <div class="form-group" >
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1" >
                    <label class="control-label col-lg text-left" for="txtTitulo">Titulo:</label>
                </div>
                <div class="col-lg-11 col-md-11 col-sm-11">
                     <input type="cnombre" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Titulo">
                </div>
            </div>
            <div class="row" style="height:60px;">
                <div class="col-lg-1 col-md-1 col-sm-1" >
                    <label class="control-label col-lg text-left" for="pic">Imagen:</label>
                </div>
                <div class="col-lg-11 col-md-11 col-sm-11">
                    <input type="file" name="pic" accept="image/*">
                </div>

            </div>
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1" >
                    <label class="control-label col-lg text-left" for="content">Contenido:</label>
                </div>
                <div class="col-lg-11 col-md-11 col-sm-11">
                    <script src="<?php echo base_url('assets/js/ckeditor5/ckeditor.js'); ?>"></script>
                    <div id="conteinerEditor">
                        <textarea name="content" id="editor">Descripción de la noticia</textarea>
                    </div>
            		<script>
            			ClassicEditor
            				.create( document.querySelector( '#editor' ) )
            				.then( editor => {
            					console.log( editor );
            				} )
            				.catch( error => {
            					console.error( error );
            				} );
            		</script>
                </div>
            </div>

            <div class="row">
              <div class="col-lg">
                <button type="submit" name='submit' value='upload' class="btn btn-default" id="btnGenerarNot">Generar Noticia</button>
              </div>
            </div>
        </div>

    </form>
</div>
