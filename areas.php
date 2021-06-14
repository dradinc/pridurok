<?php
    require 'blocks/head.php'; ?>
    <title>Работа с площадками | WSR PTK</title>
  </head>
  <body>
    <?php require 'blocks/navbar-top.php'?>
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="container-fluid mx-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Данные о площадах</h1>
                </div>
                <?php
                    if (empty($_POST))
                    {
                        echo "
                            <div class='pt-3 pb-2 mb-5 border-bottom'>
                                <h3>Приступая к работе</h3>
                                <br>
                                <p>Вы находитесь в разделе работы с площадками. В данном разделе Вы можете:</p>
                                <li>выбрать файлы опредленной компетенции</li>
                                <li>скачать необходимые файлы</li>
                                <li>загрузить необходимые файлы</li>
                                <li>удалить лишние файлы</li>
                                <br>
                                <p>В случае заруднений вы можете посетить страницу с <a href = 'help.php'>Инструкциями пользователя</a>.</p>
                            </div>
                        ";
                    }

                    echo "<div>";
                        require 'blocks/select-comp.php';
                        if (!empty($_POST)) require 'php/areas.php';
                    echo "</div>";
                ?>  
            </main>
        </div>
    </div>
  </body>
</html>