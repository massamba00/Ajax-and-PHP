<?php
session_start();
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}

function isAjaxRequest () {
    return
        isset($_SERVER['HTTP_X_REQUESTED_WITH'])
        && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}

if (!isAjaxRequest()) {
    exit(1);
}
function arrayRemove($element, $array) {
    $index = array_search($element, $array);
    array_splice($array, $index, 1);

    return $array;
}
$rawId = isset($_POST['id']) ? $_POST['id'] : '';

if (preg_match('/blog-post-(\d+)/', $rawId, $matches)) {
    $id = $matches[1];
    $_SESSION['favorites'] = arrayRemove($id, $_SESSION['favorites']);

    echo 'true';
} else {
    echo 'false';
}
