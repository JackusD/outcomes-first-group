<?php
$classes = !empty($args['classes']) ? $args['classes'] : null;
$fill = !empty($args['fill']) ? $args['fill'] : null;
$width = !empty($args['width']) ? $args['width'] : null;
$height = !empty($args['height']) ? $args['height'] : null;
$style = !empty($args['style']) ? $args['style'] : null;
?>

<svg class="<?php echo $classes; ?>" 
    xmlns="http://www.w3.org/2000/svg" 
    viewBox="0 0 22 20"
    <?php if ($width) echo 'width="' . $width . '"'; ?>
    <?php if ($height) echo 'height="' . $height . '"'; ?>
    <?php if ($fill) echo 'fill="' . $fill . '"'; ?>
    <?php if ($style) echo 'style="' . $style . '"'; ?>>
    
    <path d="M21 0h-6c-1.3 0-2.6.5-3.5 1.5-.2.1-.4.3-.5.5-.1-.2-.3-.4-.5-.6C9.6.5 8.3 0 7 0H1C.4 0 0 .4 0 1v15c0 .6.4 1 1 1h7c.5 0 1 .2 1.4.6.4.4.6.9.6 1.4 0 .6.4 1 1 1s1-.4 1-1c0-.5.2-1 .6-1.4s.9-.6 1.4-.6h7c.6 0 1-.4 1-1V1c0-.6-.4-1-1-1zM10 15.5c-.6-.3-1.3-.5-2-.5H2V2h5c.8 0 1.6.3 2.1.9.6.5.9 1.3.9 2.1v10.5zm10-.5h-6c-.7 0-1.4.2-2 .5V5c0-.8.3-1.6.9-2.1.5-.6 1.3-.9 2.1-.9h5v13z"/>
</svg>
