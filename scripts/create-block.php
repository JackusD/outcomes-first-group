<?php
define('WP_USE_THEMES', true);
require('../../../wp-load.php');

if (empty($argv[1])) {
    echo "Block name is required as first argument e.g. 'composer create-block -- \"Block Name\"'\n";
    exit;
}

$block_name = $argv[1];

$block_name_lowercase = strtolower($block_name);
$block_name_lowercase = str_replace(' ', '-', $block_name_lowercase);

if (is_dir(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . "/$block_name_lowercase")) {
    echo "$block_name block already exists\n";
    exit;
}

$template_file_content = 
'<?php
$manifest = outcomes_first_group_get_manifest();

// Return block preview image
if ($block[\'mode\'] === \'preview\') {
    return;
}

$block_name = \'' . $block_name_lowercase . '\';

$blocks = outcomes_first_group_get_block_names();

$block_blocks = array_filter($blocks, function($block) use ($block_name) {
    return $block[\'name\'] === $block_name;
});

if ($block_blocks) {
    foreach ($block_blocks as $block_block) {
        // Include block css
        if (!empty($block_block[\'assets\'][\'css\'])) wp_enqueue_style(\'outcomes-first-group-block-\' . $block_name);

        // Include block js
        if (!empty($block_block[\'assets\'][\'js\'])) wp_enqueue_script(\'outcomes-first-group-block-\' . $block_name);
    }
}

$block_classes = \'block \' . $block_name;
?>

<div class="<?php echo $block_classes; ?>">

</div>
';

$block_json_file_content = 
'{
    "name": "outcomes-first-group/' . $block_name_lowercase . '",
    "title": "' . $block_name . '",
    "description": "",
    "script": "",
    "category": "theme-blocks",
    "icon": "admin-generic",
    "apiVersion": 2,
    "keywords": [],
    "acf": {
        "mode": "edit",
	    "renderTemplate": "template.php"
    },
    "styles": [],
    "supports": {
        "align": false,
        "anchor": false,
        "alignContent": false,
        "color": {
            "text": false,
            "background": false,
            "link": false
        },
        "alignText": false,
        "fullHeight": false
    },
    "attributes": {
    }
}
';

$js_file_content = 
'import \'../js/' . $block_name_lowercase . '.js\';
';

$sass_file_content = 
'@use \'../../../../assets/src/sass/settings/colours\';
@use \'../../../../assets/src/sass/tools/functions\';

.' . $block_name_lowercase . ' {
    
}
';

$group_id = uniqid();

$acf_group_content = 
'{
    "key": "group_' . $group_id . '",
    "title": "' . $block_name . '",
    "fields": [
        {
            "key": "field_' . uniqid() . '",
            "label": "",
            "name": "",
            "aria-label": "",
            "type": "message",
            "instructions": "",
            "required": 0,
            "conditional_logic": 0,
            "wrapper": {
                "width": "",
                "class": "block-title",
                "id": ""
            },
            "message": "' . $block_name . '",
            "new_lines": "",
            "esc_html": 0
        }
    ],
    "location": [
        [
            {
                "param": "block",
                "operator": "==",
                "value": "outcomes-first-group\/' .  $block_name_lowercase . '"
            }
        ]
    ],
    "menu_order": 0,
    "position": "normal",
    "style": "default",
    "label_placement": "top",
    "instruction_placement": "label",
    "hide_on_screen": "",
    "active": true,
    "description": "",
    "show_in_rest": 0,
    "modified": ' . time() . '
}';

if (!is_dir(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . "/$block_name_lowercase")) {
    mkdir(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . "/$block_name_lowercase");
}

if (!is_dir(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . "/$block_name_lowercase/assets")) {
    mkdir(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . "/$block_name_lowercase/assets");
}

if (!is_dir(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . "/$block_name_lowercase/assets/js")) {
    mkdir(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . "/$block_name_lowercase/assets/js");
}

if (!is_dir(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . "/$block_name_lowercase/assets/sass")) {
    mkdir(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . "/$block_name_lowercase/assets/sass");
}

file_put_contents(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . "/$block_name_lowercase/template.php", $template_file_content);
file_put_contents(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . "/$block_name_lowercase/block.json", $block_json_file_content);
file_put_contents(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . "/$block_name_lowercase/assets/js/$block_name_lowercase.js", $js_file_content);
file_put_contents(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . "/$block_name_lowercase/assets/sass/$block_name_lowercase.scss", $sass_file_content);
file_put_contents(OUTCOMES_FIRST_GROUP_DIR_PATH . "/acf-json/group_$group_id.json", $acf_group_content);

$blocks = file_get_contents(OUTCOMES_FIRST_GROUP_DIR_PATH . '/blocks.json');
$blocks = $blocks ? json_decode($blocks, true) : [];

$block_exists = $blocks && array_filter($blocks, function($block) use ($block_name_lowercase) {
    return $block['name'] === $block_name_lowercase;
});

if (!$block_exists) {
    $blocks[] = [
        'name'       => $block_name_lowercase,
        'assets'     => [
            'css' => [
                'dependencies' => []
            ],
            'js'  => [
                'dependencies' => []
            ],
        ],
        'post_types' => [],
    ];
}

file_put_contents(OUTCOMES_FIRST_GROUP_DIR_PATH . "/blocks.json", json_encode($blocks, JSON_PRETTY_PRINT));

echo "$block_name block created\n";
