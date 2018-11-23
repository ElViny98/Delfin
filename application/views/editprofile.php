<html>
<head>
<title>Update Data In Database Using CodeIgniter</title>
</head>
<body>
<div id="container">
<div id="wrapper">
<h1>Update Data In Database Using CodeIgniter </h1><hr/>
<div id="menu">
<p>Click On Menu</p>
</div>
<div id="detail">
<p>Edit Detail & Click Update Button</p>
<label id="hide">Id :</label>
<input type="text" id="id" name="did" value="<?php echo $data->idUsuarios; ?>">
<label>Name :</label>
<input type="text" id="Name" name="dname" value="<?php echo $data->Nombre; ?>">
<label>Email:</label>
<input type="text" id="Mail" name="demail" value="<?php echo $data->Correo; ?>">
<label>city :</label>
<input type="text" id="City" name="dmobile" value="<?php echo $data->Ciudad; ?>">
<label>Address :</label>
<input type="text" id="Pais" name="daddress" value="<?php echo $data->Pais; ?>">
<input type="submit" id="submit" name="dsubmit" value="Update" onclick="editprf()">
<!--</form>-->
</div>
</div>
</div>
</body>
</html>
<script type="text/javascript">

   function editprf(){
    var id = $('#id').val();
    var nom = $('#Name').val();
    var cor = $('#Mail').val();
    var cit = $('#City').val();
    var cou = $('#Pais').val();
    $.ajax({
    method: "POST",
    url: '<?php echo base_url("index.php/user/update_prof"); ?>',
    data: { Id: id, name: nom, mail: cor, city: cit, country: cou  }
  })
    .done(function( msg ) {
      alert( "Data Saved: " + msg );
    }
      location.reload(forceGet);
  );
  }


</script>
