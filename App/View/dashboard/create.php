<?= extend('/layout/head.php') ?>
<?= extend('/layout/nav.php') ?>

<?php

use App\System\Session;

$session = new Session;
?>

<div class="card border">
    <div class="card-header">
        <h4 class="card-title">Panel de Registro</h4>
        <a class="btn btn-primary" href="<?= base_url('/dashboard') ?>" role="button">Regresar</a>
    </div>
    <div class="card-body">
        <div class="container">
            <form method="POST" action="<?= base_url('/dashboard/create') ?>" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?= $session->get('user')->id ?>">

                <div class="mb-3 form-group has-validation">
                    <label class="form-label">Detalles</label>
                    <input type="text" class="form-control <?= isset($err->features) ? 'is-invalid' : '' ?>" name="features" value="<?= isset($data->features) ? $data->features : '' ?>" />
                    <?php if (isset($err->features)) : ?>
                        <div class="invalid-feedback">
                            <?= $err->features ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-md-6 mb-3 form-group has-validation">
                        <label class="form-label">Cantidad</label>
                        <input type="number" class="form-control <?= isset($err->cant) ? 'is-invalid' : '' ?>" name="cant" value="<?= isset($data->cant) ? $data->cant : '' ?>" />
                        <?php if (isset($err->cant)) : ?>
                            <div class="invalid-feedback">
                                <?= $err->cant ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-12 col-md-6 mb-3 form-group has-validation">
                        <label class="form-label">Precio</label>
                        <input type="number" class="form-control <?= isset($err->price) ? 'is-invalid' : '' ?>" name="price" value="<?= isset($data->price) ? $data->price : '' ?>" />
                        <?php if (isset($err->price)) : ?>
                            <div class="invalid-feedback">
                                <?= $err->price ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>


                <div class="mb-3 form-group has-validation">
                    <label class="form-label">Foto del recibo</label>
                    <input type="file" class="form-control <?= isset($err->photo) ? 'is-invalid' : '' ?>" name="photo" value="" />
                    <?php if (isset($err->photo)) : ?>
                        <div class="invalid-feedback">
                            <?= $err->photo ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-12 mt-5">
                    <button type="submit" class="btn btn-primary">Registrar gastos</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= extend('/layout/footer.php') ?>