<?php
    $direct = $_POST['select-comp'];

    $mysql = new mysqli('eporqep6b4b8ql12.chr7pe7iynqr.eu-west-1.rds.amazonaws.com', 'euu7bk3xyma0vpnw', 'y86jquk4ya29ia69', 'q2es9sphx9i4qtq9');

    $sql = "SELECT * FROM `Competitions` WHERE (Code_Competition = '".$direct."');";
    $result_select = mysqli_query($mysql, $sql);
    $object = mysqli_fetch_object($result_select);
    echo "
        <div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom'>
            <h1 class='h2'>Участники соревнований ".$object->Name."</h1>
        </div>";
    
    if (!empty($_POST['search']))
    {
        if ($direct=="all") {
            $search = $_POST['search'];

            $query = "SELECT Competitions.Name, `Login`, `Password`, `Rules`, `E_Mail`, CONCAT(`Middlename`, ' ', `Surname`, ' ', `Lastname`) 
                    AS FIO, `Citizenship`, `Date_Birthday`, `Phone`, `Code_Institution`, `Code_Group`, `Size`, `ESIM_Status`, `Comment` 
                    FROM Participants INNER JOIN Competitions ON Participants.Code_Competition = Competitions.Code_Competition 
                    WHERE (Participants.Rules != 3) AND (Participants.Rules != 4) AND (Participants.Middlename LIKE '%".$search."%' OR Participants.Phone LIKE '%".$search."%' OR Participants.E_Mail LIKE '%".$search."%')";
        } else {
            $search = $_POST['search'];

            $query = "SELECT Competitions.Name, `Login`, `Password`, `Rules`, `E_Mail`, CONCAT(`Middlename`, ' ', `Surname`, ' ', `Lastname`) 
                    AS FIO, `Citizenship`, `Date_Birthday`, `Phone`, `Code_Institution`, `Code_Group`, `Size`, `ESIM_Status`, `Comment` 
                    FROM Participants INNER JOIN Competitions ON Participants.Code_Competition = Competitions.Code_Competition 
                    WHERE (Participants.Rules != 3) AND (Participants.Rules != 4) AND (Participants.Code_Competition = '".$direct."') AND (Participants.Middlename LIKE '%".$search ."%' OR Participants.Phone LIKE '%".$search."%' OR Participants.E_Mail LIKE '%".$search."%')";
        }
    } 
    else 
    {
        if ($direct=="all") {
            $query = "SELECT Competitions.Name, `Login`, `Password`, `Rules`, `E_Mail`, CONCAT(`Middlename`, ' ', `Surname`, ' ', `Lastname`) 
                    AS FIO, `Citizenship`, `Date_Birthday`, `Phone`, `Code_Institution`, `Code_Group`, `Size`, `ESIM_Status`, `Comment` 
                    FROM Participants INNER JOIN Competitions ON Participants.Code_Competition = Competitions.Code_Competition 
                    WHERE (Participants.Rules != 3) AND (Participants.Rules != 4)";
        } else {
            $search = $_POST['search'];

            $query = "SELECT Competitions.Name, `Login`, `Password`, `Rules`, `E_Mail`, CONCAT(`Middlename`, ' ', `Surname`, ' ', `Lastname`) 
                    AS FIO, `Citizenship`, `Date_Birthday`, `Phone`, `Code_Institution`, `Code_Group`, `Size`, `ESIM_Status`, `Comment` 
                    FROM Participants INNER JOIN Competitions ON Participants.Code_Competition = Competitions.Code_Competition 
                    WHERE (Participants.Rules != 3) AND (Participants.Rules != 4) AND (Participants.Code_Competition = '".$direct."')";
        }
    }
       
    if (mysqli_num_rows(mysqli_query($mysql, $query)) > 0)
    {
        $result = mysqli_query($mysql, $query);

        $filename = "php/buffer.txt";
        $text = $query;

        file_put_contents($filename, $text);


        echo "
        <div class = 'row'>
        <div class ='col' align='center'>
                            <a class='btn btn-lg btn-block btn-outline-primary stretched-link' href='php/export.php'>Экспортировать в Excel</a>               
                        </div> 
                        <br>
                        <div class ='col' align='center'>
                            <a class='btn btn-lg btn-block btn-outline-primary stretched-link' href='insert-partipants.php'>Добавить нового участника</a>
                        </div>            
                        </div>                    
        <table class='table table-striped table-sm align-middle mt-3'>
            <thead>
                <tr class='align-middle'>
                <th>Компетенция</th>
                <th>Электронная почта</th>
                <th>ФИО</th>
                <th>Статус</th>
                <th>Гражданство</th>
                <th>Дата рождения</th>
                <th>Мобильный телефон</th>
                <th>Учебное заведение</th>
                <th>Специальность и курс</th>
                <th>Размер одежды</th>
                <th>Внесение в eSIM</th>
                <th>Комментарий</th>
                <th></th>
                <th></th>
                </tr>
            </thead>
            <tbody>
            ";
                while ($row = $result->fetch_array()) { 
            echo "	    		
            <tr>
                <td>".$row['Name']."</td>
                <td>".$row['E_Mail']."</td>
                <td>".$row['FIO']."</td>
                <td>";
                    switch ($row['Rules']){
                        case 0:
                            echo 'Конкурасант';
                            break;
                        case 1:
                            echo 'Эксперт';
                            break;
                        case 2:
                            echo 'Главный эксперт';
                            break;
                        case 3:
                            echo 'Модератор';
                            break;
                        case 4:
                            echo 'Администратор';
                            break;
                    }
                echo "
                </td>
                <td>".$row['Citizenship']."</td>
                <td>".$row['Date_Birthday']."</td>
                <td>".$row['Phone']."</td>
                <td>Политехнический колледж</td>
                <td>".$row['Code_Group']."</td>
                <td>".$row['Size']."</td>
                <td>".$row['ESIM_Status']."</td>
                <td>".$row['Comment']."</td>
                <form method='POST' action='update.php'>
                <td><input type='image' src='img/icons-black/edit.svg'></td>
                </form>
                <form method='POST' action='delete.php'>
                <td><input type='image' src='img/icons-black/trash.svg'></td>  
                </form>        
            </tr>";
            }
            echo "
            </tbody>
        </table>  ";  
    }
    else
    {
        echo "<p>По вашему запросу ничего не найдено. Попробуйте сбросить фильтр и ввести другие данные</p>";
    }
?>