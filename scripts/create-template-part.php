<?php
define('WP_USE_THEMES', true);
require('../../../wp-load.php');

if (empty($argv[1])) {
    echo "Template part name is required as first argument e.g. 'composer create-template-part -- \"Template Part Name\"'\n";
    exit;
}

$class_name = $argv[1];

$class_name_lowercase = strtolower($class_name);
$class_name_lowercase = str_replace(' ', '-', $class_name_lowercase);

if (!is_dir(OUTCOMES_FIRST_GROUP_TEMPLATE_PARTS_DIR_PATH)) {
    mkdir(OUTCOMES_FIRST_GROUP_TEMPLATE_PARTS_DIR_PATH);
}

if (is_dir(OUTCOMES_FIRST_GROUP_TEMPLATE_PARTS_DIR_PATH . "/$class_name_lowercase")) {
    echo "$block_name template part already exists\n";
    exit;
}

$template_file_content = 
'<?php
$manifest = outcomes_first_group_get_manifest();

$template_part_name = \'' . $class_name_lowercase . '\';

// Include template part css
if ($manifest && !empty($manifest->{\'template-part-\' . $template_part_name . \'.css\'}) &&
    !wp_style_is(\'outcomes-first-group-template-part-\' . $template_part_name, \'enqueued\') && 
    file_exists(OUTCOMES_FIRST_GROUP_BUILD_DIR_PATH . $manifest->{\'template-part-\' . $template_part_name . \'.css\'})) {

    wp_register_style(
        \'outcomes-first-group-template-part-\' . $template_part_name, 
        OUTCOMES_FIRST_GROUP_BUILD_URI . $manifest->{\'template-part-\' . $template_part_name . \'.css\'}, 
        []
    );

    wp_enqueue_style(\'outcomes-first-group-template-part-\' . $template_part_name);
}

// Include template part js
// if ($manifest && !empty($manifest->{\'template-part-\' . $template_part_name . \'.js\'}) &&
//     !wp_script_is(\'outcomes-first-group-template-part-\' . $template_part_name, \'enqueued\') && 
//     file_exists(OUTCOMES_FIRST_GROUP_BUILD_DIR_PATH . $manifest->{\'template-part-\' . $template_part_name . \'.js\'})) {

//     wp_register_script(
//         \'outcomes-first-group-template-part-\' . $template_part_name, 
//         OUTCOMES_FIRST_GROUP_BUILD_URI . $manifest->{\'template-part-\' . $template_part_name . \'.js\'}, 
//         []
//     );

//     wp_enqueue_script(\'outcomes-first-group-template-part-\' . $template_part_name);
// }
?>

<div class="' . $class_name_lowercase . '">

</div>

';

$js_file_content = 
'import \'../js/' . $class_name_lowercase . '.js\';
';

$sass_file_content = 
'@use \'../../../../assets/src/sass/settings/colours\';
@use \'../../../../assets/src/sass/tools/functions\';

.' . $class_name_lowercase . ' {
    
}
';

if (!is_dir(__DIR__ . "/../template-parts/$class_name_lowercase")) {
    mkdir(__DIR__ . "/../template-parts/$class_name_lowercase");
}

if (!is_dir(__DIR__ . "/../template-parts/$class_name_lowercase/assets")) {
    mkdir(__DIR__ . "/../template-parts/$class_name_lowercase/assets");
}

if (!is_dir(__DIR__ . "/../template-parts/$class_name_lowercase/assets/js")) {
    mkdir(__DIR__ . "/../template-parts/$class_name_lowercase/assets/js");
}

if (!is_dir(__DIR__ . "/../template-parts/$class_name_lowercase/assets/sass")) {
    mkdir(__DIR__ . "/../template-parts/$class_name_lowercase/assets/sass");
}

file_put_contents(__DIR__ . "/../template-parts/$class_name_lowercase/template.php", $template_file_content);
file_put_contents(__DIR__ . "/../template-parts/$class_name_lowercase/assets/js/$class_name_lowercase.js", $js_file_content);
file_put_contents(__DIR__ . "/../template-parts/$class_name_lowercase/assets/sass/$class_name_lowercase.scss", $sass_file_content);

echo "Created src/$class_name_lowercase.php\n";
