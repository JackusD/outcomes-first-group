<?php
$classes = !empty($args['classes']) ? $args['classes'] : null;
$fill = !empty($args['fill']) ? $args['fill'] : null;
$width = !empty($args['width']) ? $args['width'] : null;
$height = !empty($args['height']) ? $args['height'] : null;
$style = !empty($args['style']) ? $args['style'] : null;
?>

<svg class="<?php echo $classes; ?>" 
    xmlns="http://www.w3.org/2000/svg" 
    viewBox="0 0 20.8 20.8"
    <?php if ($width) echo 'width="' . $width . '"'; ?>
    <?php if ($height) echo 'height="' . $height . '"'; ?>
    <?php if ($fill) echo 'fill="' . $fill . '"'; ?>
    <?php if ($style) echo 'style="' . $style . '"'; ?>>
    
    <path d="M7.4 13.8c-.2 0-.3-.1-.4-.2l-2.8-2.8c-.2-.2-.2-.6 0-.8L7 7.2c.2-.2.6-.2.8 0 .2.2.2.6 0 .8l-2.4 2.4 2.4 2.4c.2.2.2.6 0 .8-.1.1-.2.2-.4.2zM13.4 13.8c-.2 0-.3-.1-.4-.2-.2-.2-.2-.6 0-.8l2.4-2.4L12.9 8c-.2-.2-.2-.6 0-.8s.6-.2.8 0l2.8 2.8c.2.2.2.6 0 .8l-2.8 2.8c0 .1-.2.2-.3.2zM8.4 15.7h-.2c-.3-.1-.5-.5-.3-.8l3.9-9.5c.1-.3.5-.5.8-.3.3.1.5.5.3.8L9 15.4c-.1.2-.4.3-.6.3z"/><path class="st0" d="M17.9 20.8H2.8C1.2 20.8 0 19.5 0 18V2.8C0 1.3 1.3 0 2.8 0h15.1c1.6 0 2.8 1.3 2.8 2.8v15.1c.1 1.6-1.2 2.9-2.8 2.9zM2.8 1.2c-.9 0-1.6.7-1.6 1.6v15.1c0 .9.7 1.6 1.6 1.6h15.1c.9 0 1.6-.7 1.6-1.6V2.8c0-.9-.7-1.6-1.6-1.6H2.8z"/>
</svg>
