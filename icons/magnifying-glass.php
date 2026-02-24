<?php
$classes = !empty($args['classes']) ? $args['classes'] : null;
$fill = !empty($args['fill']) ? $args['fill'] : null;
$width = !empty($args['width']) ? $args['width'] : null;
$height = !empty($args['height']) ? $args['height'] : null;
$style = !empty($args['style']) ? $args['style'] : null;
?>

<svg class="<?php echo $classes; ?>" 
    xmlns="http://www.w3.org/2000/svg" 
    viewBox="0 0 12 12"
    <?php if ($width) echo 'width="' . $width . '"'; ?>
    <?php if ($height) echo 'height="' . $height . '"'; ?>
    <?php if ($fill) echo 'fill="' . $fill . '"'; ?>
    <?php if ($style) echo 'style="' . $style . '"'; ?>>
    
    <path d="M11.8 10.4c.2.2.2.6 0 .8l-.7.7c-.2.2-.6.2-.8 0L8 9.5c-.1-.1-.1-.2-.1-.4v-.4c-.8.7-1.9 1-3 1C2.2 9.8 0 7.6 0 4.9 0 2.2 2.2 0 4.9 0s4.9 2.2 4.9 4.9c0 1.1-.4 2.2-1 3h.4c.1 0 .3.1.4.2l2.2 2.3zM4.9 7.9c1.6 0 3-1.3 3-3 0-1.6-1.4-3-3-3-1.7 0-3 1.4-3 3s1.3 3 3 3z"/>
</svg>
