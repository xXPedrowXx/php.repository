
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>landing page</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body >
    <input id="close-menu" class="close-menu" type="checkbox" aria-label="close menu" role="button">
    <label class="close-menu-label" for="close-menu" title="close menu"></label>
    <aside class="Menu white-bg">
        <div class="main-content Menu-content">
            <h1 onclick="getElementById('close-menu').checked=false"><a href="login.php">Login</a></h1>
            <nav>
                <ul onclick="getElementById('close-menu').checked=false">
                    <li><a href="#intro">Intro</a></li>
                    <li><a href="#top3">Top 3</a></li>
                    <li><a href="#grid-one">grid-one</a></li>
                    <li><a href="#gallery">gallery</a></li>
                    <li><a href="#pricing">Pricing</a></li>

                </ul>
            </nav>
        </div>
    </aside>
    <div class="menu-spacing"></div>

    <section id="intro" class="main-bg section intro">
        <div class="main-content intro-content">
            <div class="intro-text">
                <h2> Teste titulo intro 1 </h2>
                <p>Alguns minutos de estudo por dia valem a pena. Pesquisas mostram que os alunos que fazem do estudo um hábito têm maior probabilidade de alcançar suas metas.</p>
            </div>
            <div class="intro-img">
                <img src="assets/img/undraw_static_assets_rpm6.svg" alt="3 personagens cada um segurando a logo do Css Javascript e HTML da esquerda para a direita respectivamente">
            </div>
        </div>
    </section>

    <section id="top3" class="white-bg section">
        <div class="main-content top3-content"> 
            <h2> top 3 </h2>
            <p>Como muitos de vocês devem ter visto, o React Router Dom atualizou para a versão 6 já tem algum tempo. Essa atualização tem mudanças significativas em relação à versão anterior, por isso fiz uma nova seção no curso falando apenas da nova versão do React Router Dom v6.</p>
            <p>Como você já deve saber também, as empresas não costumam migrar suas bases de código assim que uma lib atualiza por vários motivos: segurança, bugs, manter o código, etc. É mais prudente manter o que já funciona, do que migrar para novos códigos desconhecidos. Portanto, não vou remover os vídeos sobre a versão antiga.</p>
            <p>Essa atualização é gratuita e todos receberão as novas aulas. A nova seção tem o nome de "React Router Dom v6".</p>
        </div>
    </section>

    <section id="grid-one" class="main-bg section grid-one">
        <div class="grid-one-content main-content">
            <h2 class="grid-main-heading">My grid</h2>
            <p class="grid-description">Uma breve descrição</p>
            <div class="grid">
                <article>
                    <h3>Teste1</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni id minima repellat corrupti doloremque optio unde. Maiores culpa omnis praesentium nisi quaerat ab illo deleniti porro! Nulla architecto consequatur perspiciatis.</p>
                </article>
                <article>
                    <h3> Teste 2 </h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A suscipit rem velit porro ex! Ut atque cupiditate maxime voluptates quidem dolorum doloribus, ab voluptate repellendus sequi in, non, sunt dolores.</p>
                </article>
                <article>
                    <h3> Teste 3 </h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A suscipit rem velit porro ex! Ut atque cupiditate maxime voluptates quidem dolorum doloribus, ab voluptate repellendus sequi in, non, sunt dolores.</p>
                </article>
            </div>
        </div>
    </section>

    <section id="gallery" class="white-bg section grid-one">
        <div class="grid-one-content main-content">
            <h2 class="grid-main-heading">Gallery</h2>
            <p class="grid-description">Uma breve descrição</p>
            <div class="grid">
                <div class="gallery-image">
                    <img src="http://source.unsplash.com/random/360x360?r=1" alt="random image from unsplash">
                </div>
                <div class="gallery-image">
                    <img src="http://source.unsplash.com/random/360x360?r=2" alt="random image from unsplash">
                </div >
                <div class="gallery-image">
                    <img src="http://source.unsplash.com/random/360x360?r=3" alt="random image from unsplash">
                </div>
                <div class="gallery-image">
                    <img src="http://source.unsplash.com/random/360x360?r=4" alt="random image from unsplash">
                </div>
                <div class="gallery-image">
                    <img src="http://source.unsplash.com/random/360x360?r=5" alt="random image from unsplash">
                </div>
                <div class="gallery-image">
                    <img src="http://source.unsplash.com/random/360x360?r=6" alt="random image from unsplash">
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="white-bg section">
        <div class="main-content top3-content"> 
            <h2> Pricing</h2>
            <p>Texto informativo em cima da tabela de tamanho qualquer <br>lorem ipsum dolor sit amet consectetur adipisicing elit. A suscipit rem velit porro ex! </p>
            <div class="resposive-table">
                <table>
                    <caption>Pricing table</caption>
                    <thead>
                        <tr>
                            <th>Title 1</th>
                            <th>Title 2</th>
                            <th>Title 3</th>
                            <th>Title 4</th>
                            <th>Title 5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Content 1</td>
                            <td>Content 2</td>
                            <td>Content 3</td>
                            <td>Content 4</td>
                            <td>Content 5</td>
                        </tr>
                        <tr>
                            <td>Content 1</td>
                            <td>Content 2</td>
                            <td>Content 3</td>
                            <td>Content 4</td>
                            <td>Content 5</td>
                        </tr>
                        <tr>
                            <td>Content 1</td>
                            <td>Content 2</td>
                            <td>Content 3</td>
                            <td>Content 4</td>
                            <td>Content 5</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Testando</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>


    <footer class="white-bg footer">
        <P><a  rel="nofollow" target="_blank" href="https://www.instagram.com/_pedroh_05/"> Pedrin bala tensa <span class="heart">❤</span> (menor que tres) </a></P>
    </footer>

</body>
</html>