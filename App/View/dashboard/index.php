<?= extend('/layout/head.php') ?>
<?= extend('/layout/nav.php') ?>

<div class="card border">
    <div class="card-header">
        <a class="btn btn-primary" href="<?= base_url('/dashboard/create') ?>" role="button">Registrar Gasto</a>
        <a class="btn btn-danger" href="<?= base_url('/dashboard/eliminados') ?>" role="button">Gastos Eliminados</a>
    </div>
    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Registrado:</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Total</th>
                    <th scope="col">F-registro</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inversiones as $inv) : ?>
                    <tr>
                        <th scope="row"><?= $inv->id ?></th>
                        <td><?= $inv->id_user ?></td>
                        <td><?= $inv->features ?></td>
                        <td><?= $inv->cant ?></td>
                        <td><?= $inv->price ?></td>
                        <td><?= ($inv->price * $inv->cant) ?></td>
                        <td><?= $inv->created_at ?></td>
                        <td>
                            <a href="<?= base_url('/dashboard/edit?id=' . $inv->id) ?>" class="btn btn-warning">Editar</a>
                            <a href="<?= base_url('/dashboard/delete?id=' . $inv->id) ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= extend('/layout/footer.php') ?>