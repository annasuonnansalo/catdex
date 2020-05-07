<?php include __DIR__ . '/src/include/top.php'; ?>

<main>

    <section class="grid">
        <?php foreach (glob(__DIR__ . '/data/cat/*.json') as $file) : ?>
            <?php $data = json_decode(file_get_contents($file)); ?>
            <?php $href = './cat_detail.php?cat_uri=' . $data->uri; ?>
            <a href="<?= $href; ?>">
                <?php $image = './lib/index/' . $data->key . '.jpg'; ?>
                <picture style="background-image: url('<?= $image; ?>');"></picture>
                <h2><?= $data->name; ?></h2>
                <p><?= $data->extract; ?></p>
            </a>
        <?php endforeach; ?>
    </section>

    <nav class="feature">
        <a href="">Most expensive cats</a>
        <a href="">Benefits of indoor life</a>
        <a href="">Brushing tips</a>
    </nav>

</main>

<?php include __DIR__ . '/src/include/bottom.php'; ?>
