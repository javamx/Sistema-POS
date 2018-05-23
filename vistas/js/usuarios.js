/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFoto").val("");

		  swal({
			title: 'Formato no Compatible! ',
			timer: 4000,
			type: 'warning',			
			onOpen: () => {
			  swal.showLoading()
			}
		  })
	}else if (imagen["size"] > 2000000) {
		$(".nuevaFoto").val("");
		swal({
			title: 'Supera el peso maximo permitido',
			timer: 4000,
			type: 'warning',
			onOpen: () => {
			  swal.showLoading()
			}
		  })
	}else {
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);
		$(datosImagen).on("load", function(event){
			var rutaImagen = event.target.result;
			$(".previsualizar").attr("src", rutaImagen);
		})
	}
})




