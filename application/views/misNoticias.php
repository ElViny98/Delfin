<div class="contenidoTabla" id="divVerMisNoticias">
      <div class="scrollTabla">
        <table id="tablaNoticias">
          <thead>
            <tr>
              <th>Titulo</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody id=bodyTablaMisNoticias>
						<?php foreach ($consulta->result() as $noticia) {?>
												<tr>
													<td><?php echo $noticia->Titulo;?></td>
                                                    <td>
                                                      <center>
                                                        <button id="btnEditar" type="button" onclick="EnviarEditar('${index}')">Editar</button>
                                                        <button id="btnEliminar" type="button" onclick="Eliminar('${index}')">Eliminar</button>
                                                      </center>
                                                    </td>
												</tr>

						<?php  } ?>
          </tbody>
        </table>
      </div>
  	</div>
