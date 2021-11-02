<?= extend('/layout/head.php') ?>
<?= extend('/layout/nav.php') ?>

<div class="container">
    <div class="card" style="width: 18rem;">
        <?php if ($inv->photo != '') : ?>
            <img src="../img/<?= $inv->photo ?>" class="card-img-top" alt="img">
        <?php else : ?>
            <img src="../img/blanco.jpg" class="card-img-top" alt="img">
        <?php endif; ?>
        <div class="card-body">
            <h5 class="card-title">Detalle de Inversion</h5>
            <p class="card-text"><?= $inv->features ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cant: <?= $inv->cant ?></li>
            <li class="list-group-item">precio: <?= $inv->price ?></li>
            <li class="list-group-item">total: <?= ($inv->price * $inv->cant) ?></li>
            <li class="list-group-item">FC: <?= $inv->created_at ?></li>
            <li class="list-group-item">FA: <?= $inv->updated_at ?></li>
        </ul>
    </div>
</div>



<?= extend('/layout/footer.php') ?>