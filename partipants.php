<?php 
    require 'blocks/head.php'; ?>
    <title>Работа с участниками | WSR PTK</title>
  </head>
  <body>
    <?php require 'blocks/navbar-top.php'?>
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="container-fluid mx-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Данные о участниках чемпионата</h1>
                </div>
                <?php
                    if (empty($_POST))
                    {
                        echo "
                            <div class='pt-3 pb-2 mb-5 border-bottom'>
                                <h3>Приступая к работе</h3>
                                <br>
                                <p>Вы находитесь в разделе работы с участниками. В данном разделе Вы можете:</p>
                                <li>выбрать участников опредленной компетенции</li>
                                <li>создать отчет об участниках</li>
                                <li>добавить/изменить участника</li>
                                <li>удалить участника</li>
                                <br>
                                <p>В случае заруднений вы можете посетить страницу с <a href = 'help.php'>Инструкциями пользователя</a>.</p>
                            </div>
                        ";
                    }

                    echo "<div>";
                        require 'blocks/select-comp-search.php';
                        if (!empty($_POST)) require 'php/partipants.php';
                    echo "</div>";
                ?>
            </main>
        </div>
    </div>
  </body>
</html>