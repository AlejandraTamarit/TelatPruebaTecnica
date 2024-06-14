<main class="container">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    </div>

    <div class="row row-cols-1 row-cols-md-12 mb-3">
        <div class="col">
            <div class="card mb-4 shadow-sm">

            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo Electronico</th>
                        <th>Status</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuario as $key => $p) : ?>
                        <tr>
                        <form action="<?= base_url('/search') ?>" method="post">
                            <td hidden><input type="text" name="id" value = "<?= $p->id ?>"/></td>
                            <td><?= $p->id ?></td>
                            <td><?= $p->nombre ?></td>
                            <td><?= $p->apellidos ?></td>
                            <td><?= $p->correo_electronico ?></td>
                            <td><?= $p->status ?></td>
                            <td>
                                <button type="submit" class="btn btn-primary" name ="send" value="view_details"><i class="fas fa-eye"></i></button>
                                <button type="submit" class="btn btn-warning" name ="send" value="edit"><i class="fas fa-user-edit"></i></button>
                                <button type="submit" class="btn btn-danger" name ="send" value="change_status"><i class="fas fa-user-slash"></i></button>
                            </td>
                        </form>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            </div>
            <?= $pager->links('default', 'pagination') ?>
        </div>
        <div class="col-9">  
        </div>
        <div class="col-3 text-right">
            <a class="btn btn-info" type="submit" href="<?= base_url('/add') ?>"><i class="fas fa-user-plus"></i></a>
            <a class="btn btn-secondary" type="submit" href="<?= base_url('/export') ?>"><i class="fas fa-file-export"></i></a>
            <a class="btn btn-success" type="submit" href="<?= base_url('/') ?>"><i class="fas fa-home"></i></a>
        </div>
    </div>
</main>
<script>
   $(document).ready(function() {
    <?php if(session()->getFlashdata('success')){ ?>
        Swal.fire({
            icon: 'success',
            title: '',
            text: '<?= session("success") ?>'
        });
    <?php } ?>

    <?php if(session()->getFlashdata('error')){ ?>
        Swal.fire({
            icon: 'error',
            title: '',
            text: '<?= session("error") ?>'
        });
    <?php } ?>

   });
</script>