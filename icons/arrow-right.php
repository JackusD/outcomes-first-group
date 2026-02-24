<?php
$classes = !empty($args['classes']) ? $args['classes'] : null;
$fill = !empty($args['fill']) ? $args['fill'] : null;
$width = !empty($args['width']) ? $args['width'] : null;
$height = !empty($args['height']) ? $args['height'] : null;
$style = !empty($args['style']) ? $args['style'] : null;
?>

<svg class="<?php echo $classes; ?>" 
    xmlns="http://www.w3.org/2000/svg" 
    viewBox="0 0 10.3 10.3"
    <?php if ($width) echo 'width="' . $width . '"'; ?>
    <?php if ($height) echo 'height="' . $height . '"'; ?>
    <?php if ($fill) echo 'fill="' . $fill . '"'; ?>
    <?php if ($style) echo 'style="' . $style . '"'; ?>>
    
    <path d="M10.3 5.4V5c0-.1-.1-.1-.1-.2L5.5.1C5.3 0 5 0 4.8.1s-.2.5 0 .7l3.8 3.8H.5c-.3.1-.5.3-.5.6s.2.5.5.5h8.1L4.8 9.5c-.2.2-.2.5 0 .7.1.1.2.1.4.1s.3 0 .4-.1l4.7-4.7c-.1 0 0-.1 0-.1z"/>
</svg>
