<?php
$classes = !empty($args['classes']) ? $args['classes'] : null;
$fill = !empty($args['fill']) ? $args['fill'] : null;
$width = !empty($args['width']) ? $args['width'] : null;
$height = !empty($args['height']) ? $args['height'] : null;
$style = !empty($args['style']) ? $args['style'] : null;
?>

<svg class="<?php echo $classes; ?>" 
    xmlns="http://www.w3.org/2000/svg" 
    viewBox="0 0 5.5 10"
    <?php if ($width) echo 'width="' . $width . '"'; ?>
    <?php if ($height) echo 'height="' . $height . '"'; ?>
    <?php if ($fill) echo 'fill="' . $fill . '"'; ?>
    <?php if ($style) echo 'style="' . $style . '"'; ?>>
    
    <path d="M.5 10c-.1 0-.3 0-.4-.1-.1-.2-.1-.6 0-.8L4.3 5 .1.9C0 .7 0 .3.1.1s.5-.2.7 0l4.5 4.5c.2.2.2.5 0 .7L.9 9.9c-.1.1-.3.1-.4.1z"/>
</svg>
