<?php
$classes = !empty($args['classes']) ? $args['classes'] : null;
$fill = !empty($args['fill']) ? $args['fill'] : null;
$width = !empty($args['width']) ? $args['width'] : null;
$height = !empty($args['height']) ? $args['height'] : null;
$style = !empty($args['style']) ? $args['style'] : null;
?>

<svg class="<?php echo $classes; ?>" 
    xmlns="http://www.w3.org/2000/svg" 
    viewBox="0 0 20 22"
    <?php if ($width) echo 'width="' . $width . '"'; ?>
    <?php if ($height) echo 'height="' . $height . '"'; ?>
    <?php if ($fill) echo 'fill="' . $fill . '"'; ?>
    <?php if ($style) echo 'style="' . $style . '"'; ?>>
    
    <path d="m19.6 7.2-9-7c-.4-.3-.9-.3-1.2 0l-9 7c-.3.2-.4.5-.4.8v11c0 .8.3 1.6.9 2.1.5.6 1.3.9 2.1.9h14c.8 0 1.6-.3 2.1-.9s.9-1.3.9-2.1V8c0-.3-.1-.6-.4-.8zM12 20H8v-8h4v8zm6-1c0 .3-.1.5-.3.7s-.4.3-.7.3h-3v-9c0-.6-.4-1-1-1H7c-.6 0-1 .4-1 1v9H3c-.3 0-.5-.1-.7-.3-.2-.2-.3-.4-.3-.7V8.5l8-6.2 8 6.2V19z"/>
</svg>
