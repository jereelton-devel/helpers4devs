<?php

$list = glob("./contents/*.html", GLOB_BRACE);
$tot = count($list);

?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Helpers4Devs</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css" />
</head>
<body>

<div class="div-items-info">
    <h2>
        HELPERS4DEVS Menu
        <br />
        <span class="author">
            Powered by: Jereelton Teixeira
            <br />
            <a href="https://github.com/jereelton-devel" target="_blank">https://github.com/jereelton-devel</a>
        </span>
    </h2>
    <ul>
    <?php

    function buildMenuItem($str):string {
        return strtoupper(
            str_replace(" info", "",
                str_replace("-", " ",
                    str_replace(".html", "",
                        basename($str)))));
    }

    $get_content = ($_GET['source']) ?? "";

    for($i = 0; $i < $tot; $i++) {

        $content_name = str_replace(".html", "", basename($list[$i]));
        $content = buildMenuItem($list[$i]);

        if($get_content != "" && $get_content == $content_name) {
            echo "<li><a class='active' href='?source={$content_name}'>{$content}</a></li>";
        } else {
            echo "<li><a href='?source={$content_name}'>{$content}</a></li>";
        }
    }
    ?>
    </ul>
</div>

<div class="div-contents-info">
    <?php

    include "./contents/lgpd.phtml";

    if($get_content != "") {
        if(file_exists('./contents/'.$get_content.".html")) {
            include './contents/'.$get_content.".html";
        }
    } else {
        include './contents/modelo-info.phtml';
    }
    ?>
</div>

</body>
</html>