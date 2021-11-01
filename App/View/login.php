<?= extend('/layout/head.php') ?>

<div class="container">

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <form action="<?= base_url('/login') ?>" method="POST">
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="username" id="typeEmailX" class="form-control form-control-lg <?= isset($err->username) ? 'is-invalid' : '' ?>" />
                                        <label class="form-label" for="typeEmailX">Usuario</label>
                                        <?php if (isset($err->username)) : ?>
                                            <div class="invalid-feedback">
                                                <?= $err->username ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg <?= isset($err->password) ? 'is-invalid' : '' ?>" />
                                        <label class="form-label" for="typePasswordX">Contraseña</label>
                                        <?php if (isset($err->password)) : ?>
                                            <div class="invalid-feedback">
                                                <?= $err->password ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= extend('/layout/footer.php') ?>