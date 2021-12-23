<?= extend('/layout/head.php') ?>
<?= extend('/layout/nav.php') ?>

<div class="card border">
    <div class="card-header">
        <a class="btn btn-primary" href="<?= base_url('/dashboard/create') ?>" role="button">Registrar Gasto</a>
        <a class="btn btn-danger" href="<?= base_url('/dashboard/eliminados') ?>" role="button">Gastos Eliminados</a>
        <a class="btn border border-dark rounded" href="#">Total: S/<?= isset($suma) ? number_format($suma, 2., '.', ',') : '0' ?></a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <!-- <table id="myTable" class="table table-sm table-bordered table-striped"> -->
            <table id="myTable" class="table table-striped table-bordered">
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
                <tbody id="tbody_gastos">
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
                                <button vergasto="<?= $inv->id ?>" url="<?= base_url('/dashboard/ver?id=' . $inv->id) ?>" class="btn btn-info btn-sm  verArchivo"><i class="fas fa-eye"></i></button>
                                <button editartgasto="<?= $inv->id ?>" url="<?= base_url('/dashboard/edit?id=' . $inv->id) ?>" class="btn btn-warning btn-sm  alertEdit"><i class="fas fa-edit"></i></button>
                                <button eliminargasto="<?= $inv->id ?>" url="<?= base_url('/dashboard/delete?id=' . $inv->id) ?>" class="btn btn-danger btn-sm alertDelete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= extend('/layout/footer.php') ?>