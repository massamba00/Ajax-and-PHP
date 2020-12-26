<?php

$content = [
    'short' => 'New Content',
    'regular' => 'This is the new content which has been loaded by Ajax.',
    'long' => 'This content is the result of making an Ajax query to a php page which dynamically generated text as a response',
];

echo json_encode($content);