<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>duo front</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/estilo.css">
</head>
<body>
<?php 
    $json_file = file_get_contents("./duvidas.json");   
    $json_str = json_decode($json_file, true);
?>
    <main>
        <nav>
            <div class="container">
                <a class="menu franqueado" href=""><img src="./assets/img/editar.png"/> seja franqueado</a>
                <a class="menu consultor" href=""><img src="./assets/img/seja_consultor.png"/> seja um consultor(a)</a>
                <a class="menu comprar" href="">quero comprar</a>
                <a class="restrito" href=""><img src="./assets/img/area_restrita.png"/> área restrita</a>
            </div>
        </nav>
        <section class="banner">
            <div class="container">
                <h1>Dúvidas</h1>
                <p>
                    <b>listamos aqui algumas duvidas frequentes,</b> caso a sua dúvida não esteja aqui voce pode entrar em contato conosco <a href="">clicando aqui</a>
                </p>
            </div>
        </section>
        <section class="duvidas">
            <div class="container">
                <?php foreach($json_str["lista_tarefas"] as $duvida):?>
                <div class="item">
                    <div class="pergunta">
                        <?php echo $duvida["titulo"]?>
                    </div>
                    <div class="resposta">
                    <?php echo $duvida["descricao"]?>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <footer></footer>
        </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".item").click(function(){
                $(this).toggleClass("active");
            })
        })
    </script>
</body>
</html>