<div id='owl-demo' class='owl-carousel owl-theme'>
    <div class='item'><img src='/public/photos/1.jpg'></div>
    <div class='item'><img src='/public/photos/2.jpg'></div>
    <div class='item'><img src='/public/photos/3.jpg'></div>
</div>

<div id='photos'>
    <div class='panel'>
        <form action='' method=''>
            <a href='/add' class='label'>Редактировать</a>
            <select name='sort' id='sort' class='label'>
                <option value='0'>Сортивка</option>
                <option value='0'>По дате</option>
                <option value='1'>По размеру</option>
            </select>
        </form>
    </div>
    <div class='allPhotos'>
        <?php
        foreach ($this->photos as $photo) {
            echo "<div class='item'><a href='/index/photo/" . $photo['id'] . "'><img src='/public/photos/" . $photo['img'] . "'></a></div>";
        }
        ?>
    </div>
</div>

<div id='black'>
    <div class='close'></div>
    <div class='item'></div>
    <div class='comment'>
        <div class='text'></div>
        <hr>
        <div class='info'></div>
    </div>
</div>