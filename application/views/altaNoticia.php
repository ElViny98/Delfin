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
                    <label class="control-label col-lg text-left" for="content">Contenido:</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">

                    <div id="conteinerEditor">

                    </div>

                </div>
            </div>
            <!-- you: para que pueda subir una imagen representativa de la noticia-->
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2" >
                    <label class="control-label col-lg text-left" for="imagen">Picture: </label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">

                    

                </div>
            </div>
            <!--end of you-->
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
                [ 'code-block' ],
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
        

        formData.append('content', getQuillHTML(quill.getContents()));
        formData.append('txtTitulo', $("#txtTitulo").val());
        formData.append('imagen', $("#imagen").val());//you
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
