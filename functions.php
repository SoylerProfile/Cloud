<?php

function addFile($user, $allowedTypes, $location) {
    if($_FILES){
        $fileName = $_FILES['filename']['name'];
        $tempName = $_FILES['filename']['tmp_name'];
        $ext = substr($fileName, 1 +strpos($fileName, ".")); //НУЖНО РАЗОБРАТЬСЯ ЧУТЬ ЛУЧШЕ )))) )) ))))))))))))))))))))) )))) )))
        if(!in_array($ext, $allowedTypes)){
            echo "Недопустимое расширение файла<br>";
        }
        else{
            if(move_uploaded_file($tempName, $location.$fileName)){
                echo "Файл был успешно загружен<br>";
            }
        }
    }
    $owner = "files/".$user;
    if(file_exists($owner)){
        echo "У вас есть личное хранилище!";
    }
    else{
        mkdir($owner);
        echo "Мы создали для вас личное хранилище!";
    }
}
function showImages($location) {
    if(isset($_POST['images'])){
        echo "<h3>Ваши картинки:</h3><br>";
        $files = scandir($location);
        $loc = $location;
        $imgarray = array('image/png', 'image/jpeg');
        foreach($files as $file){
            if($file !== "." and $file !== ".."){
                $loc = $location.$file;
                $locnew = mime_content_type($loc);
                $check = in_array($locnew, $imgarray);
                if($check){
                    echo "<h4>$file</h4><br>";
                    echo '<img src="'.$location.$file.'" width="581px"/>';
                    echo "<br><a href='$loc' download>Скачать</a>";
                    echo "<br><br><input type='submit' value='Скрыть картинки'/><hr>";
                }
            }
        }
    }
}
function showDocuments($location) {
    if(isset($_POST['documents'])){
        echo "Ваши документы:";
        $files = scandir($location);
        $loc = $location;
        $docarray = array('application/pdf', 'text/plain');
        foreach($files as $file){
            if($file !== "." and $file !== ".."){
                $loc = $location.$file;
                $locnew = mime_content_type($loc);
                $check = in_array($locnew, $docarray);
                if($check){
                    echo "<h4>$file</h4><br>";
                    echo "<a href='$loc' download>Скачать</a>";
                    echo "<br><br><input type='submit' value='Скрыть документы'/><hr>";
                }
            }
        }
    }
}
function showAllFiles($location) {
    if(isset($_POST['myfiles'])){
        echo "<br>Ваши файлы:<br><br>";
        $files = scandir($location);
        foreach($files as $file){
            if($file !== "." and $file !== ".."){
                echo "$file<br>";
            }
        }
    }
}
function deleteFiles($location) {
    if(isset($_POST['deleting'])){
        $trash = $_POST['trash'];
        $dustbin = $location.$trash;
        $path = file_exists($dustbin);
        if($path and !empty($trash)){
            unlink($dustbin);
            echo "<br><br>Файл был успешно удален";
        }
        elseif (empty($trash)){
            echo "<br><br>Поле не может быть пустым";
        }
        else{
            echo "<br><br>Данный файл не найден";
        }
    }
}