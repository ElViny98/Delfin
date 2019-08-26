<div class="container">
    <h3>Noticias</h3>
    <hr>
</div>
<div class="container">
    <form class="form-horizontal" enctype="multipart/form-data" action="<?=base_url('index.php/user/editarDatosNoticia?id='.$id)?>" method="post" id="form-new">

        <div class="form-group" >
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2" >
                    <label class="control-label col-lg text-left" for="txtTitulo">Titulo:</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                     <input type="cnombre" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Titulo" value="<?php echo $titulo ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2" >
                    <label class="control-label col-lg text-left" for="content">Contenido:</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">
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
                [ 'code-block' ],
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
        var actionForm = '<?php echo base_url('index.php/user/editarDatosNoticia?id='.$id); ?>';

        var formData = new FormData();

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
