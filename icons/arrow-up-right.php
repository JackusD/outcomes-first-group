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
    
    <path d="M11.9.6c-.1-.2-.3-.4-.5-.5-.1-.1-.3-.1-.4-.1H1C.4 0 0 .4 0 1s.4 1 1 1h7.6L.3 10.3c-.4.4-.4 1 0 1.4.2.2.4.3.7.3s.5-.1.7-.3L10 3.4V11c0 .6.4 1 1 1s1-.4 1-1V1c0-.1 0-.3-.1-.4z"/>
</svg>
