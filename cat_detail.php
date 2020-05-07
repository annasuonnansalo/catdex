<?php include __DIR__ . '/src/include/top.php'; ?>

<?php
$cat_uri = $_GET['cat_uri'];
foreach (glob(__DIR__ . '/data/cat/*.json') as $file) {
    $data = json_decode(file_get_contents($file));    
    if ($data->uri == $cat_uri) break;
}
?>

<main>

    <section class="content text">
        <picture></picture>
        <article>
            <h1><?= $data->name; ?></h1>
            <p><?= $data->text; ?></p>
        </article>
    </section>
    <section class="content attribute">
        <h2>Breed Overview</h2>
        <?php if (!empty($data->attribute)) : ?>
            <dl>
                <?php foreach ($data->attribute as $attribute) : ?>
                    <dt><?= $attribute->name; ?></dt>
                    <dd><?= $attribute->text; ?></dd>
                <?php endforeach; ?>
            </dl>
        <?php endif; ?>
    </section>
    <section class="content trait">
        <h2>Ragdoll Characteristics</h2>
        <?php if (!empty($data->trait)) : ?>
            <table>
                <?php foreach ($data->trait as $trait) : ?>
                    <tr>
                        <th><?= $trait->name; ?></th>
                        <td><?= $trait->text; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </section>
    <section class="article content">
        <?php if (!empty($data->article)) : ?>
            <?php foreach ($data->article as $article) : ?>
                <h2><?= $article->name; ?></h2>
                <p><?= $article->text; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
    <section class="content extra">
        <h2><?= $extra->name; ?></h2>
        <p><?= $extra->text; ?></p>
        <?php if (!empty($data->extra->cat)) : ?>
            <nav>
                <?php foreach ($data->extra->cat as $key) : ?>
                    <?php
                    foreach (glob(__DIR__ . '/data/cat/*.json') as $file) {
                        $cat = json_decode(file_get_contents($file));    
                        if ($cat->key == $key) break;
                    }
                    ?>
                    <?php $href = './cat_detail.php?cat_uri=' . $cat->uri; ?>
                    <?php $image = './lib/index/' . $cat->key . '.jpg'; ?>
                    <a href="<?= $href; ?>" style="background-image: url('<?= $image; ?>');">
                        <?= $cat->name; ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>
    </section>

</main>

<?php include __DIR__ . '/src/include/bottom.php'; ?>
