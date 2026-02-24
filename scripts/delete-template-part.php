<?php
define('WP_USE_THEMES', true);
require('../../../wp-load.php');

if (empty($argv[1])) {
    echo "Template name name is required as first argument e.g. 'composer create-block -- \"Block Name\"'\n";
    exit;
}

$class_name = $argv[1];

$class_name_lowercase = strtolower($class_name);
$class_name_lowercase = str_replace(' ', '-', $class_name_lowercase);

$it = new RecursiveDirectoryIterator(OUTCOMES_FIRST_GROUP_DIR_PATH . "/template-parts/$class_name_lowercase", RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);

foreach($files as $file) {
    if ($file->isDir()){
        rmdir($file->getPathname());
    } else {
        unlink($file->getPathname());
    }
}
rmdir(OUTCOMES_FIRST_GROUP_DIR_PATH . "/template-parts/$class_name_lowercase");

echo "$class_name block deleted\n";
