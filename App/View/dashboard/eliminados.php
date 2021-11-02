<?= extend('/layout/head.php') ?>
<?= extend('/layout/nav.php') ?>

<div class="card border">
    <div class="card-header">
        <a class="btn btn-primary" href="<?= base_url('/dashboard') ?>" role="button">Regresar</a>
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
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= extend('/layout/footer.php') ?>