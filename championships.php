<?php require 'blocks/head.php'; ?>
    <title>Главная страница | WSR PTK</title>
  </head>
  <body>
    <?php require 'blocks/navbar-top.php'?>
    <div class="container-fluid">
        <div class="row">
            <?php require 'blocks/navbar-left.php'?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Стартовая страница</h1>
                </div>
                <div class="pt-3 pb-2 mb-5 border-bottom">
                    <h3>Добро пожаловать, <?=$_COOKIE['user']?></h3>
                    <p>Вы находитесь на стартовой странице информационной системы. Пожалуйста, выберите в меню ниже, с чем Вам необходимо сегодня работать. В случае заруднений вы можете посетить страницу с <a href = "">Инструкциями пользователя</a>.</p>
                </div>
                <div class = "d-flex flex-wrap">
                    <!-- Блок площадок -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Работа с площадками</h4>
                        </div>
                        <div class = "row">
                            <div class="col" style = "padding: 0; margin: 30px 0 10px 0;">
                                <img src="img\icons-black\hard-drive.svg" class="card-img" alt="img" width = "128" height = "128">
                            </div>
                            <div class="col">
                                <div class="card-body" style = "padding: 0; margin: 10px 10px 10px 0;">
                                    <h3 class="card-title pricing-card-title">Данных в базе:</h3>
                                        <ul class="list-unstyled">
                                            <li>Всего площадок: 25</li>
                                            <li>Всего документов: 25</li>
                                            <li>Записей в таблице: 229</li>
                                            <li>Размер файлов: 25 ГБ</li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                        <div class ="col">
                            <button type="button" class="btn btn-lg btn-block btn-outline-primary" href="areas.php">Работать с площадками</button>
                        </div> 
                        <br>
                    </div>
                    <!-- Блок участников -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Работа с участниками</h4>
                        </div>
                        <div class = "row">
                            <div class="col" style = "padding: 0; margin: 30px 0 10px 0;">
                                <img src="img\icons-black\users.svg" class="card-img" alt="img" width = "128" height = "128">
                            </div>
                            <div class="col">
                                <div class="card-body" style = "padding: 0; margin: 10px 10px 10px 0;">
                                    <h3 class="card-title pricing-card-title">Данные в базе</h3>
                                        <ul class="list-unstyled">
                                            <li>Всего участников: 228</li>
                                            <li>Участников от колледжа: 25</li>
                                            <li>Записей в таблице: 229</li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                        <div class ="col">
                            <button type="button" class="btn btn-lg btn-block btn-outline-primary" href="partipants.php">Работать с участниками</button>
                        </div> 
                        <br>
                    </div>
                    <!-- Блок чемпионатов -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Работа с чемпионатами</h4>
                        </div>
                        <div class = "row">
                            <div class="col" style = "padding: 0; margin: 30px 0 10px 0;">
                                <img src="img\icons-black/award.svg" class="card-img" alt="img" width = "128" height = "128">
                            </div>
                            <div class="col">
                                <div class="card-body" style = "padding: 0; margin: 10px 10px 10px 0;">
                                    <h3 class="card-title pricing-card-title">Данные в базе</h3>
                                        <ul class="list-unstyled">
                                            <li>Всего чемпионатов: 228</li>
                                            <li>Число победителей колледжа: 25</li>
                                            <li>Записей в таблице: 229</li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                        <div class ="col">
                            <button type="button" class="btn btn-lg btn-block btn-outline-primary" href="championships.php"> Работать с чемпионатами</button>
                        </div> 
                        <br>
                    </div>
                </div>
            </main>
        </div>
    </div>
  </body>
</html>