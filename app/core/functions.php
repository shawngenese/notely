<?php

function dd($data) {
    echo "<pre>";
    var_dump($data);
    echo"</pre>";
}

function view($path, $attributes = []) {
    extract($attributes);
    require(BASE_PATH . "views/" . $path);
}