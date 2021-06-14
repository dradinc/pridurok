<?php
    function pretty_filesize($file) {
        $size = filesize($file);
        if($size < 1024){$size = $size." Bytes";}
        elseif(($size<1048576)&&($size>1023)){$size=round($size/1024, 1)." KB";}
        elseif(($size<1073741824)&&($size>1048575)){$size=round($size/1048576, 1)." MB";}
        else{$size=round($size/1073741824, 1)." GB";}
        return $size;
    }

    function getUrlMimeType($url) {
        $buffer = file_get_contents($url);
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        return $finfo->buffer($buffer);
    }

    $direct = $_POST['select-comp'];

    $mysql = new mysqli('eporqep6b4b8ql12.chr7pe7iynqr.eu-west-1.rds.amazonaws.com', 'euu7bk3xyma0vpnw', 'y86jquk4ya29ia69', 'q2es9sphx9i4qtq9');


    $sql = "SELECT * FROM `Competitions` WHERE (Code_Competition = '".$direct."');";
    $result_select = mysqli_query($mysql, $sql);
    $object = mysqli_fetch_object($result_select);

    echo "
        <div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom'>
            <h1 class='h2'>Площадка ".$object->Name."</h1>
        </div>";

    echo "
        <div class='row'>
            <div class='col'>
                <h4>Загрузить документы</h4>
                <form method='post' action='php/upload.php' enctype='multipart/form-data'>
                    <div class='row g-3 align-items-center'>
                        <div class='col-auto'>
                            <input class='btn btn-primary' type='file' id='inputfile' name='inputfile'>
                        </div>
                        <div class='col-auto'>
                            <input type='hidden' id='cc' name='cc' value='".$direct."'>
                        </div>
                        <div class='col-auto'>
                            <select style='height: 42px; border-radius: 5px;' id='select-type' name='select-type'>
                                <option selected='true' disabled='disabled' value='TD'>Категория файла</option>
                                <option value = 'PA'>План площадки</option>
                                <option value = 'IS'>Инфраструктурный лист</option>
                                <option value = 'SMP'>SMP-план</option>
                                <option value = 'TD'>Описание компетенции</option>
                                <option value = 'AD'>Дополнительно...</option>
                            </select>
                        </div>
                        <div class='col-auto'>
                            <input class='btn btn-primary' style='height: 42px;' type='submit' value='Загрузить'>
                        </div>
                    </div>
                </form>
                <div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom'>
                    <h4>Загруженные документы</h4>
                </div>"
    ;
    $dir_names = array ("PA", "IS", "SMP", "TD", "AD");
    $dir_check = array ("0", "0", "0", "0", "0");
    $success_found = array("0");
    

    //$file = glob($dir);

    echo "<div class = 'd-flex flex-wrap'>";
    for ($a = 0; $a < count($dir_names); $a++)
    {
        switch ($dir_names[$a]) {
            case "PA":
                $name_file = "План площадки <br><br>";
                break;
            case "AD":
                $name_file = "Дополнительно <br><br>";
                break;
            case "IS":
                $name_file = "Инфраструктур-ный лист";
                break;
            case "SMP":
                $name_file = "SMP-план <br><br>";
                break;
            case "TD":
                $name_file = "Описание компетенции";
                break;
        }

        $dir='files/'.$direct.'/'.$dir_names[$a].'/';
        
        
        
        if (count(scandir($dir)) > 2)
        {
            $fil1 = scandir($dir);
            $i=0;

            
            foreach ($fil1 as $value) {
                if($i>1) {
                $name = $value;
                $upld = date("d.m.y",fileatime($dir.$name));
                $size = pretty_filesize($dir.$name);
                $tp = getUrlMimeType($dir.$name);

                echo "<div class='card mb-4 shadow-sm'>
                        <div class='card-header'>
                            <h4 class='my-0 font-weight-normal'>".$name_file."</h4>
                        </div>
                        <div>
                            <div class = 'row'>
                                <div class='col'>
                                    <div class='card-body'>
                                        <h3 class='card-title pricing-card-title'>Информация:</h3>
                                            <ul class='list-unstyled'>
                                                <li>Имя: ".$name."</li>
                                                <li>Загружено: ".$upld."</li>
                                                <li>Размер: ".$size."</li>
                                                <li>Тип: ".$tp."</li>
                                            </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class ='col' align='center'>
                            <a class='btn btn-lg btn-block btn-outline-primary stretched-link' href='php/dl_save.php?filename=".$dir.$name."'>Скачать</a>               
                        </div> 
                        <br>
                        <div class ='col' align='center'>
                            <a class='btn btn-lg btn-block btn-outline-primary stretched-link' href='php/delite_file.php?filename=".$dir.$name."'>Удалить</a>
                        </div>
                        <br>
                    </div>";
                }
                $i++;

            }
            
            $dir_check[$a] = "1";
            $success_found[0] = "1";

        }

    }
    echo "</div>";

    if ($success_found[0] == "0") {
        echo "<p>Ни один файл не найден, попробуйте загрузить новый файл</p>";
    }


    $sql_area = "SELECT * FROM `HCC` WHERE (Code_Competition = '".$direct."');";
    $result_select_area = mysqli_query($mysql, $sql_area);
    $object_area = mysqli_fetch_object($result_select_area);

        echo "
            </div>
            <div class ='col'>
                <div class='border shadow-sm' >
                <div class='card-header'>
                    <h4 class='my-0 font-weight-normal'>".$object->Name."</h4>
                </div>
                <div>
                    <div class = 'row'>
                        <div class='col'>
                            <div class='card-body'>
                                <h3 class='card-title pricing-card-title'>Информация о площадке</h3>
                                <p>Номер аудитории: ".$object_area->ID_Area."</p>
                                <p>Количество участников: ".$object_area->Quota."</p>
                                <h5 class='card-title pricing-card-title'>Загруженные документы</h5>
                                <ul class='list-unstyled'>
                                    <li>План площадки: "; if ($dir_check[0]=="0") echo "Не загружен"; else echo "Загружен"; echo "</li>
                                    <li>Инфраструктурный лист: "; if ($dir_check[1]=="0") echo "Не загружен"; else echo "Загружен"; echo "</li>
                                    <li>SMP-план: "; if ($dir_check[3]=="0") echo "Не загружен"; else echo "Загружен"; echo "</li>
                                    <li>Описание компетенции: "; if ($dir_check[3]=="0") echo "Не загружен"; else echo "Загружен"; echo "</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>"; 
?>