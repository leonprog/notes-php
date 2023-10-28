<?php

function dd(mixed $data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit;
}