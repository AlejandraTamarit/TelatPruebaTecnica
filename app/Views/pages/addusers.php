<main class="container">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    </div>

    <div class="row row-cols-1 row-cols-md-12 mb-3">
        <div class="col">
            <div class="card mb-4 shadow-sm">
                <div class="card-header text-center">
                    <h4 class="my-0 fw-normal">Agregar Usuario</h4>
                </div>
                <div class="card-body">
                    <form  action="<?= base_url('/save') ?>" method="post" class="row g-3">
                        <div class="col-md-4 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="col-md-4 mb-3 ">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="select_sexo" class="form-label">Sexo</label>
                            <select class="form-select form-control form-control-md" name="sexo" id="sexo" aria-label="">
                                <option value="none" selected disabled hidden>Seleccione</option>
                                <option value="Mujer">Mujer</option>
                                <option value="Hombre">Hombre</option>
                            </select>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="correo_electronico" class="form-label">Correo Electronico</label>
                            <input type="text" class="form-control" name="correo_electronico" id="correo_electronico">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="telefono" class="form-label">Tipo Usuario</label>
                            <select class="form-select form-control form-control-md" name="tipo_usuario" id="tipo_usuario" aria-label="">
                            <option value="none" selected disabled hidden>Seleccione</option>    
                            <option value="Administrativo">Administrativo</option>
                                <option value="Administrativo-Operativo">Administrativo-Operativo</option>
                                <option value="Operativo">Operativo</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="codigo_postal" class="form-label">Código Postal</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="codigo_postal" id="codigo_postal">
                                <a href="javascript:void(0)" onclick="getDataCP()" class="btn btn-primary"><i class="fas fa-search"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="list_colonias" class="form-label">Colonia</label>
                            <select class="form-select form-control form-control-md " name="list_colonias" id="list_colonias" >
                                <option>Seleccione</option>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="dele_muni" class="form-label">Delegación/Municipio</label>
                            <input type="text" class="form-control" name="dele_muni" id="dele_muni">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" name="estado" id="estado">
                        </div>
                        <div class="col-12 text-right mb-3">
                            <input class="w-20 btn btn-lg btn-outline-success" type="submit" value="Agregar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function getDataCP(){

        $.ajax({
            url : 'https://api.copomex.com/query/info_cp/' + $("#codigo_postal").val(),
            data : { 
              token : '47a9e9d1-9544-4ba5-8bb7-19f9ef83e0b7',
              type : 'simplified'
            },
            type : 'GET',
            dataType : 'json', 
            success : function(copomex) { 

              if(!copomex.error){

                $("#codigo_postal").val(copomex.response.cp);
                $("#dele_muni").val(copomex.response.municipio);
                $("#estado").val(copomex.response.estado);
                $("#list_colonias").html('');
                for(var i = 0; i<copomex.response.asentamiento.length; i++){
                  $("#list_colonias").append('<option>'+copomex.response.asentamiento[i]+'</option>');
                }

              }else{
                console.log('error: ' + copomex.error_message);
              }

            },
            error : function(jqXHR, status, error) {

                if(jqXHR.status==400){
                  copomex = jqXHR.responseJSON;
                  alert(copomex.error_message);
                }

            },
            complete : function(jqXHR, status) {

                console.log('Petición a COPOMEX terminada');

            }
          });
    		
    }
</script>