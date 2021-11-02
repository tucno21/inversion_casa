<?= extend('/layout/head.php') ?>
<?= extend('/layout/nav.php') ?>

<div class="card border">
    <div class="card-header">
        <a class="btn btn-primary" href="<?= base_url('/dashboard/create') ?>" role="button">Registrar Gasto</a>
        <a class="btn btn-danger" href="<?= base_url('/dashboard/eliminados') ?>" role="button">Gastos Eliminados</a>
        <a class="btn border border-dark rounded" href="#">Total: S/<?= isset($suma) ? number_format($suma, 2., '.', ',') : '0' ?></a>
    </div>
    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Registrado:</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>F-registro</th>
                    <th>Acciones</th>
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
                        <td>S/<?= number_format(($inv->price * $inv->cant), 2., '.', ',') ?></td>
                        <td><?= $inv->created_at ?></td>
                        <td>
                            <button url="<?= base_url('/dashboard/ver?id=' . $inv->id) ?>" class="btn btn-info verArchivo"><i class="fas fa-eye"></i></button>
                            <button url="<?= base_url('/dashboard/edit?id=' . $inv->id) ?>" class="btn btn-warning alertEdit"><i class="fas fa-edit"></i></button>
                            <button url="<?= base_url('/dashboard/delete?id=' . $inv->id) ?>" class="btn btn-danger alertDelete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= extend('/layout/footer.php') ?>