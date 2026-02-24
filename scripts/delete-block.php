<?php
define('WP_USE_THEMES', true);
require('../../../wp-load.php');

if (empty($argv[1])) {
    echo "Block name is required as first argument e.g. 'composer create-block -- \"Block Name\"'\n";
    exit;
}

$class_name = $argv[1];

$class_name_lowercase = strtolower($class_name);
$class_name_lowercase = str_replace(' ', '-', $class_name_lowercase);

$it = new RecursiveDirectoryIterator(OUTCOMES_FIRST_GROUP_DIR_PATH . "/blocks/$class_name_lowercase", RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);

foreach($files as $file) {
    if ($file->isDir()){
        rmdir($file->getPathname());
    } else {
        unlink($file->getPathname());
    }
}
rmdir(OUTCOMES_FIRST_GROUP_DIR_PATH . "/blocks/$class_name_lowercase");

$blocks = file_get_contents(OUTCOMES_FIRST_GROUP_DIR_PATH . '/blocks.json');
$blocks = $blocks ? json_decode($blocks, true) : [];

if ($blocks) {
    $blocks = array_filter($blocks, function($block) use ($class_name_lowercase) {
        return $block['name'] !== $class_name_lowercase;
    });
}

file_put_contents(OUTCOMES_FIRST_GROUP_DIR_PATH . "/blocks.json", json_encode($blocks, JSON_PRETTY_PRINT));

echo "$class_name block deleted\n";
