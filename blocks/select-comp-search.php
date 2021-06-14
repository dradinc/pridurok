<?php
    $mysql = new mysqli('eporqep6b4b8ql12.chr7pe7iynqr.eu-west-1.rds.amazonaws.com', 'euu7bk3xyma0vpnw', 'y86jquk4ya29ia69', 'q2es9sphx9i4qtq9');

    
    if ($_COOKIE['rules'] > 2)
    {
        $sql = "SELECT * FROM `Competitions` WHERE (Code_Competition <> 'ADM');";
        $result_select = mysqli_query($mysql, $sql);
        
        echo "
            <form method='post'>
                <div class='row g-3 align-items-center'>
                    <div class='col-auto'>
                        <label for='select-comp' class='col-form-label'>Компетенция</label>
                    </div>
                    <div class='col-auto'>
                        <select style='height: 38px; border-radius: 5px;' id='select-comp' name='select-comp'"; if (isset($_POST['select-comp'])) echo 'disabled'; echo ">
                            <option selected='true' disabled='disabled' value='0' style='margin: 10px 0 10px 0;'>Выберите компетенцию</option>
                            <option value='all'>Все</option>";
                            while($object = mysqli_fetch_object($result_select)){
                                echo "<option value = '$object->Code_Competition' > $object->Name </option>";
                            }
        echo "          </select>
                    </div>
                    <div class='col-auto'>
                        <label for='search' class='col-form-label'>Поиск по</label>
                    </div>
                    <div class='col-auto'>
                        <input class='form-control mr-sm-2' type='search' placeholder='Искать...' aria-label='Search' id='search' name='search'"; if (isset($_POST['select-comp'])) echo 'disabled'; echo ">
                    </div>
                    <div class='col-auto'>
                        <input type='submit'"; if (isset($_POST['select-comp'])) echo 'value="Сбросить фильтр"'; else echo "value='Отобразить данные'"; echo "class='btn btn-primary'>
                    </div>
                </div>
            </form>";
    }
    else
    {
        //TODO: Дописать для Главного эксперта
    }
?>