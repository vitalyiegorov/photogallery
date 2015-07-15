<div id='message'>
    <div class='close'></div>
    <div class='text'></div>
</div>

<div style='margin: 25px 15px;'>
    <a href='/index' class='label'>Вернуться</a>
</div>

<form action='/add/addPhoto' method='post' enctype='multipart/form-data' id='newPhoto' name='newPhoto'>
    <table style='margin: 50px auto 0 auto; text-align: center;'>
        <tr>
            <td><input type='file' name='file' id='file' class='label'/></td>
        </tr>
        <tr>
            <td><textarea name='comment' class='label' style='width:400px; height:250px;'>Напишите комментарий к фотографии (Не менее 200 символов)</textarea></td>
        </tr>
        <tr>
            <td><input type='submit' name='submit' value='Добавить фотографию' class='label'/></td>
        </tr>
    </table>
</form>
<div id='editPhoto'>    
    <?php
    foreach ($this->photos as $photo) {
        echo "<div class='item'><img src='/public/photos/" . $photo['img'] . "'><br><textarea class='label' id='newcomment-" . $photo['id'] . "'>" . $photo['comment'] . "</textarea><br><br><a href='" . $photo['id'] . "' class='label change'>Изменить</a> <a href='" . $photo['id'] . "' class='label-red delete'>Удалить</a></div>";
    }
    ?>  
</div>
