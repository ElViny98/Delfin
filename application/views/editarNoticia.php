<div class="container">
    <h3>Noticias</h3>
    <hr>
</div>
<div class="container">
    <form class="form-horizontal" enctype="multipart/form-data" action="<?=base_url('index.php/user/editarDatosNoticia?id='.$id)?>" method="post" id="form-new">

        <div class="form-group" >
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1" >
                    <label class="control-label col-lg text-left" for="txtTitulo">Titulo:</label>
                </div>
                <div class="col-lg-11 col-md-11 col-sm-11">
                     <input type="cnombre" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Titulo" value="<?php echo $titulo ?>">
                </div>
            </div>
            <div class="row" >
                <div class="col-lg-1 col-md-1 col-sm-1" >
                    <label class="control-label col-lg text-left" for="pic">Imagen:</label>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7" >
                    <div id="file-preview-zone">
                        <img src="<?=base_url('')?>assets/img/<?= $img?>" alt="" >
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
                    <input type="file" name="pic" id="pic" accept="image/*" >
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
                    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
                    <div id="conteinerEditor">

                    </div>
                </div>
            </div>

            <div class="row">
              <div class="col-lg">
                <button type="submit" name='submit' style="margin-top: 50px;" value='upload' class="btn btn-default" id="btnEditNot">Editar Noticia</button>
              </div>
            </div>
        </div>

    </form>
</div>
<script>
    var quill = new Quill('#conteinerEditor', {
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, false] }],
                [ { 'font': [] } ],
                [ 'bold', 'italic', 'underline' ],
                [ 'image', 'code-block' ],
                [ { list: 'ordered' }, { list: 'bullet' } ],
                [ { align: [] } ]
            ]
        },
        placeholder: 'Redacción...',
        theme: 'snow'
    });
    quill.clipboard.dangerouslyPasteHTML(0, '<?php echo $descripcion; ?>');

    $("#form-new").submit(function(event) {
        event.preventDefault();
        var actionForm = '<?php echo base_url('index.php/user/editarDatosNoticia'); ?>';

        var formData = new FormData();
        $.each($('input[type=file]')[0].files, function(i, files) {
            formData.append('pic', files);
        });

        $.each($('img'))
        formData.append('content', getQuillHTML(quill.getContents()));
        formData.append('txtTitulo', $("#txtTitulo").val());

        $.ajax({
            url: actionForm,
            type: 'POST',
            data: formData,
            processData: false,
            cache: false,
            contentType: false,
            success: function(data) {
                switch(data) {
                    case '1':
                        location.href('<?php echo base_url('index.php/user/Noticias_MisNoticias'); ?>');
                        break;

                    case '0':
                        alert('Algo salió mal. Inténtelo nuevamente en unos segundos.');
                        break;

                    default:
                        alert('Porfavor, verifique la conexión a Internet e inténtelo de nuevo');
                        break;
                }
            }
        });
    });

    function getQuillHTML(deltaObject) {
        var tempCont = document.createElement('div');
        (new Quill(tempCont)).setContents(deltaObject);

        return tempCont.getElementsByClassName('ql-editor')[0].innerHTML;
    }
</script>
