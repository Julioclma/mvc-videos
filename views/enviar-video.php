<?php require_once __DIR__ . '/../templates/inicio-html.php'; ?>

<main class="container">

    <form class="container__formulario" action="/enviar-video" method="post">
        <h2 class="formulario__titulo">Envie um vídeo!</h3>
            <div class="formulario__campo">
                <label class="campo__etiqueta" for="url">Link embed</label>
                <input name="url" class="campo__escrita" required placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url' />
            </div>


            <div class="formulario__campo">
                <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                <input name="titulo" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo" id='titulo' />
            </div>

            <div class="formulario__campo">
                <label class="campo__etiqueta" for="image">Selecione uma imagem de Capa</label>
                <input  type="file" name="image" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo" id='image' />
            </div>

            <input class="formulario__botao" type="submit" value="Enviar" />
    </form>

</main>

<?php require_once __DIR__ . '/../templates/fim-html.php'; ?>