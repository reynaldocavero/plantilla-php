<!DOCTYPE html>
<html>
<head>
	<title>documento</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>
	<div class="row">
		<div class="col col-ms-6">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="tipoDoc" id="inlineRadio1" value="option1" checked>
				<label class="form-check-label" for="inlineRadio1" >FACTURA</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="tipoDoc" id="inlineRadio2" value="option2">
				<label class="form-check-label" for="inlineRadio2">BOLETA</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col col-ms-6">
			<div class="form-group row">
				<label for="rucCliente" class="col-sm-4 col-form-label">RUC Cliente</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="rucCliente" placeholder="RUC Cliente">
				</div>
			</div>
		</div>
		<div class="col col-ms-6">
			
		</div>
	</div>
	<div class="row">
		<div class="col col-ms-6">
			<div class="form-group row">
				<label for="rucCliente" class="col-sm-4 col-form-label">Cliente</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="txtCliente" placeholder="Cliente">
				</div>
			</div>
		</div>
		<div class="col col-ms-6">
			
		</div>
	</div>
	<div class="row">
		<div class="col col-ms-6">
			<div class="form-group row">
				<select class="custom-select">
					<option value="0">--SELECCIONA TIPO AFECTACION--</option>
					<option value="1">CON IGV</option>
					<option value="2">SIN IGV</option>
				</select>
			</div>
		</div>
		<div class="col col-ms-6">
			
		</div>
	</div>
	<div class="row">
		<div class="col col-ms-6">
			<div class="form-group row">
				<label for="rucCliente" class="col-sm-4 col-form-label">Vendedor</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="txtVendedor" placeholder="Vendedor" list="listademodelos">
					<div id="listaVendedor"></div>
				</div>
			</div>
		</div>
		<div class="col col-ms-6">
			
		</div>
	</div>
	<div class="row">
		<div class="col col-ms-12">
			<center><button id="btnAgregar" class="btn btn-success txt-center">+</button></center>
		</div>

	</div>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">CODIGO</th>
				<th scope="col">PRODUCTO</th>
				<th scope="col">PRECIO</th>
				<th scope="col">DESCUENTO</th>
				<th scope="col">CANTIDAD</th>
				<th scope="col">TOTAL</th>
				<th scope="col">#</th>
			</tr>
		</thead>
		<tbody id="tablaProducto">

		</tbody>
		<tfoot id="footer_tabla">
			<tr>
				<td colspan="5" class="text-right" >TOTAL BRUTO</td><td id="TotalBruto"></td>
			</tr>
			<tr>
				<td colspan="5" class="text-right">IGV</td><td id="Igv"></td>
			</tr>
			<tr>
				<td colspan="5" class="text-right" >NETO</td><td id="netoPagar"></td>
			</tr>
		</tfoot>
	</table>
	<button class="btn btn-primary" id="btnGrabar">Grabar</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable " role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalScrollableTitle">Productos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">CODIGO</th>
								<th scope="col">PRODUCTO</th>
								<th scope="col">PRECIO</th>
							</tr>
						</thead>
						<tbody id="tablaProductoModal">

						</tbody>

					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary">+</button>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">


		$("#btnDocumento").on('click',function(){
			var c='documento';
			var i='index';
			$.ajax({
				type: "POST",
				url: "Router.php",
				data: 'controller='+c+'&method='+i,
				success: function(data) {
					//console.log(data);
				}
			});
		})


		$("#rucCliente").on('blur',function(){
			var metodo='listaDoc';
			var ruc={ruc:$('#rucCliente').val()}
			$.ajax({
				type: "POST",
				url: "documentoController.php",
				data: {metodo:metodo,
					ruc:JSON.stringify(ruc)},
					success: function(data) {
						//console.log(data);
						var obj=JSON.parse(data);
						$.each(obj,function(key,val){
							$("#txtCliente").val(val.nombre);
						})
					}
				});
		})

		$("#txtVendedor").on('keypress',function(){
			var metodo='listavendedor';
			var nombre={nombre:$('#txtVendedor').val()}
			$.ajax({
				type: "POST",
				url: "documentoController.php",
				data: {metodo:metodo,
					nombre:JSON.stringify(nombre)},
					success: function(data) {
						var obj=JSON.parse(data);
						var vend=$('#listaVendedor').html('');
						var datalista=$('<datalist id="listademodelos">');
						$.each(obj,function(key,val){

							datalista.append('<option value="'+val.nombre+'">');

						})
						vend.html(datalista);

					}
				});
		})
		var codigoTab=0;
		$("#btnAgregar").on('click',function(){
			
			codigoTab++;
			var tr=$("<tr>");
			tr.html('<td><input type="text" class="form-control txtCodigo" id="txtCodigo'+codigoTab+'" placeholder="Cliente" data-id="'+codigoTab+'"></td>'+
				'<td id="txtProducto'+codigoTab+'"></td>'+
				'<td id="txtPrecio'+codigoTab+'"></td>'+
				'<td><input type="text" class="form-control txtdescuento" id="txtdescuento'+codigoTab+'"  placeholder="Cliente" ></td>'+
				'<td><input type="text" class="form-control txtCantidad" id="txtCantidad'+codigoTab+'"  placeholder="Cliente" data-id="'+codigoTab+'"></td>'+
				'<td id="txtImporte'+codigoTab+'">0.0</td><td><button id="btnEliminar'+codigoTab+'" class="btn btn-danger eliminar">Eliminar</button> <button id="btnUpdate'+codigoTab+'" data-id="'+codigoTab+'" class="btn btn-default update" data-toggle="modal" data-target="#exampleModalScrollable">Actualizar</button></td>');
			$('#tablaProducto').append(tr);


			var trs=$("#tablaProducto tr").length;

			if(trs>0)
			{
                // Eliminamos la ultima columna


                $("#footer_tabla").html('<tr><td colspan="5" class="text-right" >TOTAL BRUTO</td>'+
                	'<td id="TotalBruto"></td></tr>'+
                	'<tr><td colspan="5" class="text-right">IGV</td><td id="Igv"></td></tr>'+
                	'<tr><td colspan="5" class="text-right" >NETO</td><td id="netoPagar"></td></tr>');
                
            }else{
            	$("#footer_tabla").html('');
            }
        })

		$(document).on('blur',".txtCodigo",function(){
			var cod=$(this).attr('data-id');
			//alert(cod);
			var metodo='listaProducto';
			var codigo={codigo:$(this).val()}
			$.ajax({
				type: "POST",
				url: "documentoController.php",
				data: {metodo:metodo,
					codigo:JSON.stringify(codigo)},
					success: function(data) {
						//console.log(data);
						var obj=JSON.parse(data);
						$.each(obj,function(key,val){
							$("#txtProducto"+cod).text(val.producto);
							$("#txtPrecio"+cod).text(parseFloat(val.precio).toFixed(2));
						})
					}
				});
		})

		$(document).on('change',".txtCantidad",function(){
			var cod=$(this).attr('data-id');
			var cant=$('#txtCantidad'+cod).val();
			var lista={cantidad:cant,codigo:$('#txtCodigo'+cod).val()};
			var metodo='validarStock';
			$.ajax({
				type: "POST",
				url: "documentoController.php",
				data: {metodo:metodo,
					lista:JSON.stringify(lista)},
					success: function(data) {
						//console.log(data);
						var obj=JSON.parse(data);
						$.each(obj,function(key,val){
							if(parseInt(val.stock) >= parseInt(cant)){
								var precio=$('#txtPrecio'+cod).text();
								var importe=parseFloat(precio)* parseInt(cant);
								//console.log(importe);
								$('#txtImporte'+cod).text(importe.toFixed(2));

								totalNeto();


							}else{
								alert("el stock es de "+ val.stock);
							}

						})						


					}
				});



				//console.log(total);



			})


		$(document).on('click',".eliminar",function(){
			var cod=$(this).attr('id');
			var trs=$("#tablaProducto tr").length;

			if(trs>0)
			{
                // Eliminamos la ultima columna
                $(this).closest('tr').remove();
                if(trs == 1){
                	$("#footer_tabla").html('');
                }
            }

            totalNeto()
            return ;
        })

		$(document).on('click',".update",function(){
			var cod=$(this).attr('data-id');
			var codigo=$("#txtCodigo"+cod).val();
			var tr=$("<tr>");
			tr.html('<td>'+codigo+'</td>'+
				'<td>'+codigo+'</td>'+
				'<td>'+codigo+'</td>');
			$('#tablaProductoModal').append(tr);
			return ;
		})

		$("#btnGrabar").on('click',function(){
			var metodo='grabar';
			var arreglo=[];
			var total=0;
			var x=0;
			
			$('#tablaProducto tr').each(function () {
				x++;
				arreglo.push({codigo:$('#txtCodigo'+x).val(),producto:$(this).find("td").eq(1).html(),precio:$(this).find("td").eq(2).html(),cantidad:$('#txtCantidad'+x).val(),importe:$(this).find("td").eq(5).html()});
			});


			console.log(arreglo);


			
			$.ajax({
				type: "POST",
				url: "documentoController.php",
				data: {metodo:metodo,
					arreglo:JSON.stringify(arreglo)},
					success: function(data) {
						console.log(data);

					}
				});

			return;
		})



		var totalNeto=function(){
			var total=0;

			$('#tablaProducto tr').each(function () {
				total =parseFloat(total) + parseFloat($(this).find("td").eq(5).html());
			});
			var igv=parseFloat(total) * parseFloat(18/100);
			$('#TotalBruto').text(total.toFixed(2));
			$('#Igv').text(igv.toFixed(2));
			var neto=parseFloat(igv) + parseFloat(total);
			$('#netoPagar').text(neto.toFixed(2));
		}
		
	</script>
</body>
</html>