<div class="container">
    <h3>Noticia</h3>
    <hr>
</div>
<div class="container" style="padding:0 6% 0 6%;">
    <form class="form-horizontal" enctype="multipart/form-data" action="<?=base_url('index.php/user/datosNoticia')?>" method="post" id="form-new">

        <div class="form-group" >
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2" >
                    <label class="control-label col-lg text-left" for="txtTitulo">Titulo:</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                     <input type="cnombre" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Titulo">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2" >
                    <label class="control-label col-lg text-left" for="pic">Imagen:</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10" >
                    <div id="file-preview-zone">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2" >
                </div>
                <div id="selecImg" class="col-lg col-md col-sm">
                    <input type="file" name="pic" id="pic" accept="image/*" >
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
                             document.getElementById("file-preview-zone").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"style="max-width:600px;max-height:300px;"/>'].join('');
                            };
                        })(f);

                        reader.readAsDataURL(f);
                      }
                  }

                  document.getElementById('pic').addEventListener('change', archivo, true);
                </script>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2" >
                    <label class="control-label col-lg text-left" for="content">Contenido:</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">

                    <div id="conteinerEditor">

                    </div>

                </div>
            </div>

            <div class="row" style="padding-top: 40px;">
              <div class="col-lg">
                  <br>
                <button type="submit" name='submit' value='upload' class="btn btn-default" id="btnGenerarNot">Generar Noticia</button>
              </div>
            </div>
        </div>

    </form>
</div>
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var quill = new Quill('#conteinerEditor', {
        modules: {
            toolbar: [
                [ { header: [1, 2, 3, false] } ],
                [ { 'font': [] } ],
                [ 'bold', 'italic', 'underline', 'strike' ],
                [ 'link' ],
                [ 'image', 'code-block' ],
                [ { list: 'ordered' }, { list: 'bullet' } ],
                [ { align: [] } ]
            ]
        },
        placeholder: 'Redacción...',
        theme: 'snow'
    });

    $("#form-new").submit(function(event) {
        event.preventDefault();
        var actionForm = '<?php echo base_url('index.php/user/datosNoticia'); ?>';

        var formData = new FormData();
        $.each($('input[type=file]')[0].files, function(i, files) {
            formData.append('pic', files);
        });

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
                        $("#main-content").load('<?php echo base_url('index.php/user/Noticias_MisNoticias'); ?>');
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
