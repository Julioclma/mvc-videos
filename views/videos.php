<?php require_once __DIR__ . '/../templates/inicio-html.php'; ?>


<ul class="videos__container" alt="videos alura">


    <?php
    /* Verifica se video não for encontrado */
    if ($_GET['find'] === '0') {
        echo "<p>    
video não encontrado
</p>";
    }
    ?>
    <?php foreach ($videoList as $video) : ?>
        <li class="videos__item">
            <iframe width="100%" height="72%" src="<?= $video->url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="descricao-video">
                <img src="./img/logo.png" alt="logo canal alura">
                <h3><?= $video->title ?></h3>

                <div class="acoes-video">
                <h3>Link image: <?= $video->image ?></h3>

                    <a href=<?= "/editar-video?id=$video->id" ?>>Editar</a>

                    <a href="./remover-video?id=<?= $video->id ?>">Excluir</a>
                </div>
            </div>
        </li>

    <?php endforeach; ?>
</ul>


<?php require_once __DIR__ . '/../templates/fim-html.php';
