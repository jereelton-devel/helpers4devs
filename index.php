<?php

$list = glob("./contents/*.html", GLOB_BRACE);
$tot = count($list);

echo "<ul>";
for($i = 0; $i < $tot; $i++) {
    echo "<li><a href='{$list[$i]}'>".basename($list[$i])."</a></li>";
}
echo "</ul>";