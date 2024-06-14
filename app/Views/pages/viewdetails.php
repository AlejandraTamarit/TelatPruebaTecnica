<main class="container">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    </div>

    <div class="row row-cols-1 row-cols-md-12 mb-3">
        <div class="col">
            <div class="card mb-4 shadow-sm">
                <div class="card-header text-center">
                    <h4 class="my-0 fw-normal">Informacion Usuario</h4>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-4 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $usuario['nombre'] ?>" readonly>
                            <input type="text" class="form-control" name="id" id="id" value="<?= $usuario['id'] ?>" hidden>
                        </div>
                        <div class="col-md-4 mb-3 ">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?= $usuario['apellidos'] ?>" readonly>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="select_sexo" class="form-label">Sexo</label>
                            <input type="text" class="form-control" name="sexo" id="sexo" value="<?= $usuario['sexo'] ?>" readonly>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="correo_electronico" class="form-label">Correo Electronico</label>
                            <input type="text" class="form-control" name="correo_electronico" id="correo_electronico" value="<?= $usuario['correo_electronico'] ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" value="<?= $usuario['telefono'] ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="telefono" class="form-label">Tipo Usuario</label>
                            <input type="text" class="form-control" name="tipo_usuario" id="tipo_usuario" value="<?= $usuario['tipo_usuario'] ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="codigo_postal" class="form-label">Código Postal</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="codigo_postal" id="codigo_postal" value="<?= $usuario['codigo_postal'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="list_colonias" class="form-label">Colonia</label>
                            <input type="text" class="form-control" name="colonia" id="colonia" value="<?= $usuario['colonia'] ?>" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="dele_muni" class="form-label">Delegación/Municipio</label>
                            <input type="text" class="form-control" name="dele_muni" id="dele_muni" value="<?= $usuario['dele_muni'] ?>" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" name="estado" id="estado" value="<?= $usuario['estado'] ?>" readonly>
                        </div>
                        <div class="col-9">  
                        </div>
                        <div class="col-3 text-right">
                            <a class="btn btn-success" type="submit" href="<?= base_url('/') ?>"><i class="fas fa-home"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
