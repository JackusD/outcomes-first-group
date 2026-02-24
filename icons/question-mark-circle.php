<?php
$classes = !empty($args['classes']) ? $args['classes'] : null;
$fill = !empty($args['fill']) ? $args['fill'] : null;
$width = !empty($args['width']) ? $args['width'] : null;
$height = !empty($args['height']) ? $args['height'] : null;
$style = !empty($args['style']) ? $args['style'] : null;
?>

<svg class="<?php echo $classes; ?>" 
    xmlns="http://www.w3.org/2000/svg" 
    viewBox="0 0 22 22"
    <?php if ($width) echo 'width="' . $width . '"'; ?>
    <?php if ($height) echo 'height="' . $height . '"'; ?>
    <?php if ($fill) echo 'fill="' . $fill . '"'; ?>
    <?php if ($style) echo 'style="' . $style . '"'; ?>>
    
    <path d="M11 22C4.9 22 0 17.1 0 11S4.9 0 11 0s11 4.9 11 11-4.9 11-11 11zm0-20c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9z"/><path d="M10.9 13c-.4 0-.8-.3-.9-.7-.2-.5.1-1.1.6-1.3.6-.2 2.3-1 2.3-2.1 0-.5-.2-.9-.5-1.3s-.7-.6-1.2-.7c-.5-.1-.9 0-1.4.2-.3.4-.6.8-.8 1.2-.1.6-.7.8-1.2.6-.6-.1-.8-.7-.7-1.2.4-.9 1-1.7 1.8-2.2.8-.5 1.8-.7 2.7-.5.9.2 1.8.6 2.4 1.4.6.7.9 1.6.9 2.6 0 2.6-3.3 3.8-3.7 3.9-.1.1-.2.1-.3.1zM11 17c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1z"/>
</svg>
