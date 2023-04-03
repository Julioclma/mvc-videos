<?php require_once __DIR__.'/../templates/inicio-html.php'; ?>

<main class="container">

    <form class="container__formulario" action="/editar-video" method="post" enctype="multipart/form-data" >
        <h2 class="formulario__titulo">Editando vídeo!</h3>
            <div class="formulario__campo">
                <label class="campo__etiqueta" for="url">Link embed</label>
                <input value="<?= $video['url'] ?>" name="url" class="campo__escrita" required placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url' />
            </div>


            <div class="formulario__campo">
                <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                <input value="<?= $video['title'] ?>" name="titulo" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo" id='titulo' />
            </div>

            <div class="formulario__campo">
                <label class="campo__etiqueta" for="image">Selecione uma imagem de Capa <?php var_dump($video['image_path']);?></label>
                <input accept="image/*" type="file" name="image" class="campo__escrita" id='image'/>
            </div>

            <input hidden value="<?= $video['id'] ?>" name="id">
            <input class="formulario__botao" type="submit" value="Editar" />
    </form>

</main>

<?php require_once __DIR__.'/../templates/fim-html.php'; ?>