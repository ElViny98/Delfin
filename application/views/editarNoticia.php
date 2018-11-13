<div id="titulo">
    <h3>Noticias</h3>
    <hr>
</div>
<div class="containerNoticia">
    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('index.php/user/datosEditarNoticia');?>" method="post">

        <div class="form-group" >
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1" >
                    <label class="control-label col-lg text-left" for="txtTitulo">Titulo:</label>
                </div>
                <div class="col-lg-11 col-md-11 col-sm-11">
                     <input type="cnombre" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Titulo" value="<?php echo $consulta->result()[0]->Titulo ?>">
                </div>
            </div>
            <div class="row" >
                <div class="col-lg-1 col-md-1 col-sm-1" >
                    <label class="control-label col-lg text-left" for="pic">Imagen:</label>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7" >
                    <div id="file-preview-zone">
                        <img src="<?=base_url('')?>assets/img/<?= $consulta->result()[0]->img?>" alt="" >
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3" id="nota">
                    <p><span style="color:red;">Nota: </span> <span>Se recomienda un tamaño de 700x300 pixeles para evitar distorciones en la imagen original.</span> </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1" >
                </div>
                <script type="text/javascript">
                    function mostrarSelecImg(){
                        $('#selecImg').css({'display':'block'});
                        $('#selecImgCancelar').css({'display':'block'});
                        $('#changeImg').css({'display':'none'});
                    }
                    function Cancelar(){
                        $('#selecImg').css({'display':'none'});
                        $('#selecImgCancelar').css({'display':'none'});
                        $('#changeImg').css({'display':'block'});
                        document.getElementById("pic").value = "";
                    }
                </script>
                <div id="changeImg" class="col-lg col-md col-sm" style="display:block;">
                    <input type="button" name="picChange" id="picChange" value="Cambiar Imagen" onclick="mostrarSelecImg()">
                </div>
                <div id="selecImg" class="col-lg col-md col-sm" style="display:none;">
                    <input type="file" name="pic" id="pic" accept="image/*">
                </div>
                <div id="selecImgCancelar" class="col-lg col-md col-sm" style="display:none;">
                    <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()">
                </div>
                <script type="text/javascript">
                    function archivo(evt) {
                      var files = evt.target.files; // FileList object

                      // Obtenemos la imagen del campo "file".
                      for (var i = 0, f; f = files[i]; i++) {
                        //Solo admitimos imágenes.
                        if (!f.type.match('image.*')) {
                            continue;
                        }

                        var reader = new FileReader();

                        reader.onload = (function(theFile) {
                            return function(e) {
                              // Insertamos la imagen
                             document.getElementById("file-preview-zone").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                            };
                        })(f);

                        reader.readAsDataURL(f);
                      }
                  }

                  document.getElementById('pic').addEventListener('change', archivo, true);
                </script>
            </div>
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1" >
                    <label class="control-label col-lg text-left" for="content">Contenido:</label>
                </div>
                <div class="col-lg-11 col-md-11 col-sm-11">
                    <script src="<?php echo base_url('assets/js/ckeditor5/ckeditor.js'); ?>"></script>
                    <div id="conteinerEditor">
                        <textarea name="content" id="editor"><?php echo $consulta->result()[0]->Descripcion ?></textarea>
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
                <button type="submit" name='submit' value='upload' class="btn btn-default" id="btnEditNot">Editar Noticia</button>
              </div>
            </div>
        </div>

    </form>
</div>
