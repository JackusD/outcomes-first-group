<?php
$classes = !empty($args['classes']) ? $args['classes'] : null;
$fill = !empty($args['fill']) ? $args['fill'] : null;
$width = !empty($args['width']) ? $args['width'] : null;
$height = !empty($args['height']) ? $args['height'] : null;
$style = !empty($args['style']) ? $args['style'] : null;
?>

<svg class="<?php echo $classes; ?>" 
    xmlns="http://www.w3.org/2000/svg" 
    viewBox="0 0 18 22"
    <?php if ($width) echo 'width="' . $width . '"'; ?>
    <?php if ($height) echo 'height="' . $height . '"'; ?>
    <?php if ($fill) echo 'fill="' . $fill . '"'; ?>
    <?php if ($style) echo 'style="' . $style . '"'; ?>>
    
    <path d="M17.9 6.6c-.1-.1-.1-.2-.2-.3l-6-6c-.1-.1-.2-.2-.3-.2-.1-.1-.3-.1-.4-.1H3C2.2 0 1.4.3.9.9.3 1.4 0 2.2 0 3v16c0 .8.3 1.6.9 2.1.5.6 1.3.9 2.1.9h12c.8 0 1.6-.3 2.1-.9s.9-1.3.9-2.1V7c0-.1 0-.3-.1-.4zM12 3.4 14.6 6H12V3.4zm3.7 16.3c-.2.2-.4.3-.7.3H3c-.3 0-.5-.1-.7-.3-.2-.2-.3-.4-.3-.7V3c0-.3.1-.5.3-.7.2-.2.4-.3.7-.3h7v5c0 .6.4 1 1 1h5v11c0 .3-.1.5-.3.7z"/><path d="M13 11H5c-.6 0-1 .4-1 1s.4 1 1 1h8c.6 0 1-.4 1-1s-.4-1-1-1zM13 15H5c-.6 0-1 .4-1 1s.4 1 1 1h8c.6 0 1-.4 1-1s-.4-1-1-1zM5 9h2c.6 0 1-.4 1-1s-.4-1-1-1H5c-.6 0-1 .4-1 1s.4 1 1 1z"/>
</svg>
