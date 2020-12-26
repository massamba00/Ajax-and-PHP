<?php
sleep(1);

function isAjaxRequest () {
    return
        isset($_SERVER['HTTP_X_REQUESTED_WITH'])
        && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}

$length = $_POST['length'] !== '' ? (int) $_POST['length'] : '';
$width = $_POST['width'] !== '' ? (int) $_POST['width'] : '';
$height = $_POST['height'] !== '' ? (int) $_POST['height'] : '';

$errors = [];

if ($length === '') {
    $errors[] = 'length';
}
if ($width === '') {
    $errors[] = 'width';
}
if ($height === '') {
    $errors[] = 'height';
}

if (!empty($errors)) {
    if (isAjaxRequest()) {
        $resultErrors = ['errors' => $errors];
        echo json_encode($resultErrors);
        exit;
    }

    echo "<p>The errors: </p>" . implode(',', $errors);
    echo '<p><a href="/index.php">Back </a></p>';
    exit;
}

$volume = $length * $width * $height;
if (isAjaxRequest()) {
    echo json_encode(['volume' => $volume]);
} else {
    echo "<p>The total volume is: $volume </p>";
    echo '<p><a href="/index.php">Back </a></p>';
    exit;
}
