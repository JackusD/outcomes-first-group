<?php
$classes = !empty($args['classes']) ? $args['classes'] : null;
$fill = !empty($args['fill']) ? $args['fill'] : null;
$width = !empty($args['width']) ? $args['width'] : null;
$height = !empty($args['height']) ? $args['height'] : null;
$style = !empty($args['style']) ? $args['style'] : null;
?>

<svg class="<?php echo $classes; ?>" 
    xmlns="http://www.w3.org/2000/svg" 
    viewBox="0 0 14 8"
    <?php if ($width) echo 'width="' . $width . '"'; ?>
    <?php if ($height) echo 'height="' . $height . '"'; ?>
    <?php if ($fill) echo 'fill="' . $fill . '"'; ?>
    <?php if ($style) echo 'style="' . $style . '"'; ?>>
    
    <path d="M7 8c-.3 0-.5-.1-.7-.3l-6-6C-.1 1.3-.1.7.3.3s1-.4 1.4 0L7 5.6 12.3.3c.4-.4 1-.4 1.4 0s.4 1 0 1.4l-6 6c-.2.2-.4.3-.7.3z"/>
</svg>

