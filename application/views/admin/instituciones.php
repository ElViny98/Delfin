
<div class="contenidoTabla" id="divVerUsuarios">
	<div class="container-fluid" >
		<div class="row">
			<div class="col-xs-12 col-md-8 col-lg-9 col-xl-9 container" >
        <div class="contenidoTabla" id="divVerInstituciones">
          <div class="container-fluid">
            <h1>Instituciones</h1>
            <br>
            <table class="table table-condensed" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>C.P.</th>
                </tr>
            </thead>
            <tbody>
                <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                    <td><?php echo $data->Nombre; ?></td>
                    <td>Mexico</td>
                    <td>82530</td>
                </tr>
                <tr >
                    <td colspan="6" class="hiddenRow"><div class="accordian-body collapse" id="demo1"> Demo1 </div> </td>
                </tr>
                <tr data-toggle="collapse" data-target="#demo2" class="accordion-toggle">
                    <td>2</td>
                    <td>05 May 2013</td>
                    <td>Credit Account</td>

                </tr>
                <tr>
                    <td colspan="6" class="hiddenRow"><div id="demo2" class="accordian-body collapse">Demo2</div></td>
                </tr>
                <tr data-toggle="collapse" data-target="#demo3" class="accordion-toggle">
                    <td>3</td>
                    <td>05 May 2013</td>
                    <td>Credit Account</td>

                </tr>
                <tr>
                    <td colspan="6"  class="hiddenRow"><div id="demo3" class="accordian-body collapse">Demo3</div></td>
                </tr>
            </tbody>
          </table>
          </div>
        </div>
	</div>
</div>
<script type="text/javascript">
	function verDetalles(index) {
	}
</script>
