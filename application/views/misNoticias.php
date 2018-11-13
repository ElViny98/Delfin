<div class="contenidoTabla" id="divVerMisNoticias">
      <div class="scrollTabla">
        <center>
        <table id="tablaNoticias">
          <thead>
            <tr>
              <th>Titulo</th>
              <th>Fecha</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody id=bodyTablaMisNoticias>
						<?php foreach ($consulta->result() as $noticia) {?>
												<tr>
													<td><?php echo $noticia->Titulo;?></td>
                                                    <td style="width:20%"><?php echo $noticia->Fecha;?></td>
                                                    <td style="width:20%">
                                                      <center>
                                                        <script type="text/javascript">
                                                              function confirma(){
                                                               if (confirm("¿Realmente desea eliminarlo?")){
                                                               alert("El registro ha sido eliminado.") }
                                                               else {
                                                               return false
                                                               }
                                                              }
                                                        </script>
                                                        <button id="btnEditar" type="button"><a href="<?=base_url('index.php/')?>user/editarNoticia/<?=$noticia->idNoticias?>">Editar</a></button>
                                                        <button id="btnEliminar" type="button"><a onclick="if(confirma() == false) return false" href="<?=base_url('index.php/')?>user/eliminarNoticia/<?=$noticia->idNoticias?>">Eliminar</a></button>
                                                      </center>
                                                    </td>
												</tr>

						<?php  } ?>
          </tbody>
        </table>
        </center>
        </div>
        <br>
        <button type="button" name="button" id="btnNuevaNot" class="btn btn-default"><a href="<?php echo base_url('index.php/user/Noticias'); ?>">Nueva Noticia</a></button>
      
  	</div>
