<!DOCTYPE HTML>
<html lang='<?php echo LANG; ?>'>
    <head>
        <title><?php echo TITLE; ?></title>
        <meta charset='<?php echo CHARSET; ?>' />
        <meta name='description' content='<?php echo DESCRIPTION; ?>' />
        <link rel='stylesheet' href='/public/css/default.css' />
        <link rel='icon' type='image/png' href='/public/icons/favicon.png'>
        <?php
        if (!empty($this->css)) {
            foreach ($this->css as $css) {
                echo "<link rel='stylesheet' href='/views/$css.css' />";
            }
        }
        ?>
        <script type='text/javascript' src='/public/js/jQuery.js'></script>
        <script type='text/javascript' src='/public/js/default.js'></script>        
        <?php
        if (!empty($this->js)) {
            foreach ($this->js as $js) {
                echo "<script type='text/javascript' src='/views/$js.js'></script>";
            }
        }
        ?>
    </head>
    <body>
        <div class='Main-Container'>
       