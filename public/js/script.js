$(document).ready(function(){

    $('#cameraInput').on('change', function(e){
 $data = e.originalEvent.target.files[0];
  $reader = new FileReader();
  reader.onload = function(evt){
  $('#your_img_id').attr('src',evt.target.result);
  reader.readAsDataUrl($data);
}});
    
    $('#hora_recepcion').datetimepicker({
        format: 'LT',
    });
    $('#hora_entrega').datetimepicker({
        format: 'LT',
        
    });

    $('.selectpicker').selectpicker();
    var estados = ['Espera','Cocción','Por entregar','Entregado'];
	$(document).on("click", ".btn-agregar", function(){
		contentHtml  = "<tr>";
		contentHtml += "<td>";
        contentHtml += "<input type='text' class='form-control' name='bandejas[]' required='required'>";
        contentHtml += "<input type='file' name='image[]' class='form-control'>"
        contentHtml += "</td>" 
		contentHtml += "<td><button type='button' class='btn btn-success btn-agregar'>Agregar</button></td>"
		contentHtml +="</tr>";
		
		$("#tb-bandejas tbody").append(contentHtml);
		$(this).removeClass('btn-sucess btn-agregar').addClass('btn-danger btn-remove').text('Quitar');
	});
	$(document).on("click", ".btn-remove", function(){
		$(this).closest("tr").remove();

	});
	$(document).on("click", ".btn-ver", function(){
		var valueBtn = $(this).val();
		var obj = JSON.parse(valueBtn);
		$("#celda-codigo").text(obj.codigo);
		$("#celda-referencia").text(obj.referencia);
		$("#celda-cantidad").text(obj.cantidad_asados);
		$("#celda-monto").text(obj.monto_pagar);
		$("#celda-hora").text(obj.hora_entrega);

		asados = '<ul class="list-group list-group-flush">';
  
		$.each(obj.asados, function(key, value){
			asados += '<li class="list-group-item">'+value.descripcion+'</li>';
		});
		asados += '</ul>';

		$("#asados").html(asados);
	});
    $(document).on("change", "#cliente", function(){
        $("#info-cliente-asados").show();
        var valueBtn = $(this).val();
        
        var obj = JSON.parse(valueBtn);
        $("#idCliente").val(obj.id);
        $("#codigo").val(obj.codigo);
        $("#referencia").val(obj.referencia);
        $("#hora_recepcion").val(obj.hora_recepcion);
        $("#monto_pagar").val(obj.monto_pagar);
        $("#hora_entrega").val(obj.hora_entrega);
        if (obj.pagado == '1') {
            $("#pago-adelantado").prop("checked", true);
        } else {
            $("#pago-no-adelantado").prop("checked", true);
        }
        asados ="";

        $.each(obj.asados, function(key, value){
                asados += '<tr>';
                asados +='<td><img src="'+base_url+'/images/'+value.imagen+'" alt="" class="img-fluid" width="150px"></td>';
                asados += '<td>'+value.descripcion+'</td>';
                asados += '<td>'+estados[value.estado]+'</td>';
                if (value.estado == '0') {
                    asados += '<td><button type="button" class="btn btn-danger btn-remove-asado" value="'+value.id+'">Quitar</button></td>';
                }else{
                    asados += '<td></td>';
                }
                asados += '</tr>';
            });

        $("#tb-asados tbody").html(asados);
    });

	$("#search").autocomplete({
        source:function(request, response){
            $.ajax({
                url: 'autocomplete',
                type: "GET",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
        },
        minLength:2,
        select:function(event, ui){

            $("#codigo").text(ui.item.codigo);
            $("#referencia").text(ui.item.referencia);
            $("#hora").text(ui.item.hora);
            $("#monto").val(ui.item.monto);
            if (ui.item.pagado == 0) {
            	$("#pagado").text('NO');

            }else{
            	$("#pagado").text('SI');
            }
            $("#info-cliente-asados").show();
            asados = '';
            $.each(ui.item.asados, function(key, value){
            	asados += '<tr>';
                asados +='<td><img src="'+base_url+'/images/'+value.imagen+'" alt="" class="img-fluid" width="150px"></td>';
                asados += '<td>'+value.descripcion+'</td>';
                asados += '<td>'+estados[value.estado]+'</td>';
                if (value.estado == '0') {
                    asados += '<td><button type="button" class="btn btn-danger">Quitar</button></td>';
                }else{
                    asados += '<td></td>';
                }
                asados += '</tr>';
            });
            $("#tb-asados tbody").html(asados);
            this.value = "";
            return false;
        },
    });

    $('#tb-search').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#AgregarAsado").submit(function(e){
        e.preventDefault();
        var formData = new FormData($("#AgregarAsado")[0]);

        $.ajax({
            url: 'asados',
            method: 'POST',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(response){
                console.log(response);
                asados  = '<tr>';
                asados +='<td><img src="'+base_url+'/images/'+response.asado.imagen+'" alt="" class="img-fluid" width="150px"></td>';
                asados += '<td>'+response.asado.descripcion+'</td>';
                asados += '<td>'+estados[response.asado.estado]+'</td>';
                if (response.asado.estado == '0') {
                    asados += '<td><button type="button" class="btn btn-danger btn-remove-asado" value="'+response.asado.id+'">Quitar</button></td>';
                }else{
                    asados += '<td></td>';
                }
                asados += '</tr>';

                $("#tb-asados tbody").append(asados);
                $("#AgregarAsado")[0].reset();
                $("#modal-add-bandeja").modal("hide");
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'Se agrego correctamente un nuevo asado',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });
    $(document).on("click", ".btn-remove-asado", function(){
        $(this).closest("tr").remove();
        idAsado = $(this).val();

        $.ajax({
            url: 'asados/' + idAsado,
            type: 'POST',
            data: {_method:'delete'},
            success:function(response){
                alert("Asado Eliminado");
            }
        });

    });
    $(document).on("click",".btn-change-status", function(){
        info = $(this).val();
        celdaEstado = $(this).closest("tr").find("td:eq(5)");
        celdaButton = $(this).closest("tr").find("td:eq(6)");
        boton = $(this); 

        data = info.split("*");
        
        $.ajax({
            method:'PUT',
            url:'asados/'+data[0],
            data:{estado:data[1]},
            success:function(data){
                alert("Actualizado");
                switch(data.asado.estado) {
                    case '1':
                        celdaEstado.text(estados[data.asado.estado]);
                        boton.removeClass('btn-warning').addClass('btn-primary').text('Pasar a ' + estados[Number(data.asado.estado) +1]).val(data.asado.id+"*"+ (Number(data.asado.estado) + 1));
                        break;
                    case '2':
                        celdaEstado.text(estados[data.asado.estado]);
                        boton.removeClass('btn-primary').addClass('btn-success').text('Pasar a ' + estados[Number(data.asado.estado) +1]).val(data.asado.id+"*"+ (Number(data.asado.estado) + 1));
                        break;
                    
                    default:
                        celdaEstado.text(estados[data.asado.estado]);
                        boton.remove();
                        celdaButton.text('No hay mas opciones');
                        break;
                        
                }
            }

        });
    });

});