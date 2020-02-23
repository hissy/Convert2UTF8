<?php
require_once "vendor/autoload.php";

use voku\helper\UTF8;

$options = getopt('f:e:');
$file = $options['f'];
if (isset($options['e'])) {
    $from_encoding = $options['e'];
} else {
    $from_encoding = '';
}
if (file_exists($file)) {
    $content = UTF8::file_get_contents($file, false, null, null, null, 10, true, $from_encoding);
    $content = preg_replace("/\r\n|\r|\n/", PHP_EOL, $content);
    file_put_contents($file, UTF8::bom() . $content);
}
