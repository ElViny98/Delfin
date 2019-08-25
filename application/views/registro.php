<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('helpers/headerInicio');
?>

<div class="Imagen" >
    <img src="<?php echo base_url('assets/img/logolargo.png');?>">
</div>

<div class="container">
    <h4>Registro</h4><br>
    <form>
        <div class="form-row">
         <div class="col-md-4 mb-3">
           <label for="txtNombreR">Nombre</label>
           <input type="text" class="form-control" id="txtNombreR" name="txtNombreR" placeholder="Nombre" required>
         </div>
         <div class="col-md-4 mb-3">
           <label for="txtPaternoR">Apellido Paterno</label>
           <input type="text" class="form-control" id="txtPaternoR" name="txtPaternoR" placeholder="Apellido Paterno" required>
         </div>
         <div class="col-md-4 mb-3">
           <label for="txtMaternoR">Apellido Materno</label>
           <input type="text" class="form-control" id="txtMaternoR" name="txtMaternoR" placeholder="Apellido Materno" required>
         </div>
         <div class="col-md-4 mb-3">
           <label for="txtSexoR">Sexo</label>
           <select id="txtSexoR" name="txtSexoR" class="form-control" required>
                 <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
                 <option value="Femenino">Femenino</option>
                 <option value="Masculino">Masculino</option>
           </select>
         </div>
         <div class="col-md-4 mb-3">
           <label for="txtCorreoR">Correo</label>
           <div class="input-group">
             <div class="input-group-prepend">
               <span class="input-group-text" id="inputGroupPrepend2">@</span>
             </div>
             <input type="text" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Correo" aria-describedby="inputGroupPrepend2" required>
           </div>
         </div>
         <div class="col-md-4 mb-3">
           <label for="txtCorreoC">Confirmacion de Correo</label>
           <div class="input-group">
             <input type="text" class="form-control" id="txtCorreoC" name="txtCorreoC" placeholder="Confirmacion de Correo" aria-describedby="inputGroupPrepend2" required>
           </div>
         </div>
       </div>
       <div class="form-row">
         <div class="col-md-3 mb-3">
           <label for="txtPaisR">País</label>
           <select id="txtPaisR" name="txtPaisR" class="form-control">
                 <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
                 <?php
                   foreach ($paises->result() as $country) {
                       echo '<option value="'.$country->id.'">'.$country->name.'</option>';
                   }
                  ?>
           </select>
         </div>
         <div class="col-md-3 mb-3">
           <label for="txtTelefonoR">Teléfono</label>
           <input type="text" class="form-control" id="txtTelefonoR" name="txtTelefonoR" placeholder="Teléfono" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
         </div>
         <div class="col-md-6 mb-3">
           <label for="txtInstR">Institución</label>
           <select id="txtInstR" name="txtInstR" class="form-control">
                 <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
                 <?php
                    $x=1;
                   foreach ($instituciones->result() as $institucion) {
                       echo '<option value="'.$institucion->idInstitucion.'">'.$institucion->Nombre.'</option>';
                       $x++;
                   }
                    echo '<option value="'.$x.'">Otra</option>';
                  ?>
           </select>
         </div>
         <div class="col-md-12" id="datosInstitucion" style="display:none;">
             <hr>
             <div class="row">
                 <div class="col-md-12">
                     <h6>Datos de la Institución</h6>
                 </div>
                 <div class="col-md-9 mb-3">
                   <label for="txtInstNombreR">Nombre</label>
                   <input type="text" class="form-control" id="txtInstNombreR" name="txtInstNombreR" required>
                 </div>
                 <div class="col-md-2 mb-3">
                 </div>
                 <div class="col-md-3 mb-3">
                   <label for="txtInstPaisR">País</label>
                   <select id="txtInstPaisR" name="txtInstPaisR" class="form-control">
                         <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
                         <?php
                           foreach ($paises->result() as $country) {
                               echo '<option value="'.$country->id.'">'.$country->name.'</option>';
                           }
                          ?>
                   </select>
                 </div>
                 <div class="col-md-3 mb-3">
                   <label for="txtInstEstadoR">Estado</label>
                   <select id="txtInstEstadoR" name="txtInstEstadoR" class="form-control">
                         <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>

                   </select>
                 </div>
                 <div class="col-md-3 mb-3">
                   <label for="txtInstCPR">Código Postal</label>
                   <input type="text" class="form-control" id="txtInstCPR" name="txtInstCPR" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                 </div>
             </div>
             <hr>
         </div>
             <div class="col-md-3 mb-3">
               <label for="txtContra">Contraseña</label>
               <input type="password" id="txtContra" name="txtContra" class="form-control" data-toggle="password" placeholder="Contraseña" required>
             </div>
             <div class="col-md-3 mb-3">
               <label for="txtContraC">Confirmación de Contraseña</label>
               <input type="password" id="txtContraC" name="txtContraC" class="form-control" data-toggle="password" placeholder="Confirmación de Contraseña" required>
             </div>

       </div>
<!--
       <div class="form-group">
         <div class="form-check">
           <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
           <label class="form-check-label" for="invalidCheck2">
             Agree to terms and conditions
           </label>
         </div>
     </div>
 -->
       <button class="btn btn-default" id="registrar" type="button" onclick="registrarUser()">Registrar</button>
    </form>
    <br><br>
</div>
<script type="text/javascript">

function registrarUser(){
 var nom = $('#txtNombreR').val();
 var apa = $('#txtPaternoR').val();
 var ama = $('#txtMaternoR').val();
 var sex = $('#txtSexoR').val();
 var pai = $('#txtPaisR option:selected').text();
 var tel = $('#txtTelefonoR').val();
 var cor = $('#txtCorreoR').val();
 var corC = $('#txtCorreoC').val();
 var contra = $('#txtContra').val();
 var contraC = $('#txtContraC').val();
 //Institucion
 var idIns = $('#txtInstR').val();
 var ins= $('#txtInstR option:selected').text();
 var insNom= $('#txtInstNombreR').val();
 var idpaI = $('#txtInstPaisR').val();
 var paI = $('#txtInstPaisR option:selected').text();
 var idEsI = $('#txtInstEstadoR').val();
 var esI = $('#txtInstEstadoR option:selected').text();
 var cp = $('#txtInstCPR').val();
 var contraEn=CryptoJS.MD5(contra).toString();
    if (cor=corC) {
        if (contra=contraC) {
            $.ajax({
            method: "POST",
            url: '<?php echo base_url("index.php/Inicio/altaUsuario"); ?>',
            data: { name: nom, appaterno: apa, apmaterno:ama, sexo: sex, pais:pai, telefono:tel, correo: cor, contraseña:contraEn,
            idInst:idIns, inst: ins,nombreInst:insNom, idpaisinst: idpaI, paisinst: paI, idEstadoInst:idEsI, estadoInst: esI, cogPos: cp
           }
           ,success:function(res){
               if (res=='1') {
                   alert('Registro exitoso');
                    var url = '<?php echo base_url('index.php/inicio/ingresar'); ?>';
           			var pass = CryptoJS.MD5(document.getElementById('txtContra').value);
                    var emailC=$('#txtCorreoR').val();
                    console.log(cor);
           			console.log(pass.toString());
           			var data = {
           				email: cor,
           				password: pass.toString()
           			}
           			$.post(url, data, function(data) {
           				switch(data) {
           					case "0":
           						alert('Usuario y/o contraseña incorrectos.');
           						break;

           					case "1":
           						location.href = '<?php echo base_url('index.php/admin'); ?>';
           						break;

           					case "2":
           						location.href = '<?php echo base_url('index.php/user'); ?>';
           						break;

           					default:
           						alert('Error de conexión');
           						break;
           				}
           			});
           		}
               else {
                   alert('Error de registro');
               }
           }
           })


       }else {
           $('#txtContraC').css({'border':'1px solid red'});
           alert('Error de Confirmación, Contraseña diferente');
       }
   }else {
        $('#txtCorreoC').css({'border':'1px solid red'});
        alert('Error de Confirmación, Correo diferente');
   }
}
$("#txtInstR").change(function() {
    var opcion = $('#txtInstR option:selected').text();
    if (opcion=='Otra') {
        $('#datosInstitucion').css({'display':'block'});
    }else {
        $('#datosInstitucion').css({'display':'none'});
    }
})
$("#txtInstPaisR").change(function() {
    $.ajax({
        url: '<?php echo base_url('index.php/user/getRegions?countryId='); ?>' + this.value,
        type: 'GET',
        success: function(data) {
            var sel = document.getElementById("txtInstEstadoR");
            sel.remove(sel.selectedIndex);
            document.getElementById('txtInstEstadoR').innerHTML = data;
        }
    });
})


</script>
<?php $this->load->view('helpers/footerInicio'); ?>
