<?php
$classes = !empty($args['classes']) ? $args['classes'] : null;
$fill = !empty($args['fill']) ? $args['fill'] : null;
$width = !empty($args['width']) ? $args['width'] : null;
$height = !empty($args['height']) ? $args['height'] : null;
$style = !empty($args['style']) ? $args['style'] : null;
?>

<svg class="<?php echo $classes; ?>" 
    xmlns="http://www.w3.org/2000/svg" 
    viewBox="0 0 23.9 24"
    <?php if ($width) echo 'width="' . $width . '"'; ?>
    <?php if ($height) echo 'height="' . $height . '"'; ?>
    <?php if ($fill) echo 'fill="' . $fill . '"'; ?>
    <?php if ($style) echo 'style="' . $style . '"'; ?>>
    
    <path d="M15.9 6.4H8.1c-.9 0-1.6.7-1.6 1.6v7.8c0 .9.7 1.6 1.6 1.6h7.8c.9 0 1.6-.7 1.6-1.6V8.1c0-1-.7-1.7-1.6-1.7zm.4 9.4c0 .2-.2.4-.4.4H8.1c-.2 0-.4-.2-.4-.4V8.1c0-.2.2-.4.4-.4h7.8c.2 0 .4.2.4.4v7.7z"/><path d="M23.3 11.3c.3 0 .6-.3.6-.6s-.3-.6-.6-.6H20V8.7h3.3c.3 0 .6-.3.6-.6s-.3-.6-.6-.6H20v-1C20 5.1 18.8 4 17.4 4h-.8V.6c0-.3-.3-.6-.6-.6s-.6.3-.6.6V4H14V.6c0-.3-.3-.6-.6-.6s-.6.3-.6.6V4h-1.4V.6c-.1-.3-.4-.6-.7-.6s-.6.3-.6.6V4H8.6V.6C8.6.3 8.3 0 8 0s-.6.3-.6.6V4h-.8C5.1 4 4 5.1 4 6.5v.9H.6c-.3.1-.6.3-.6.7s.3.6.6.6H4v1.4H.6c-.3 0-.6.3-.6.6s.3.6.6.6H4v1.4H.6c-.3 0-.6.3-.6.6s.3.6.6.6H4v1.4H.6c-.3.1-.6.3-.6.7s.3.6.6.6H4v.8C4 18.8 5.2 20 6.6 20h.8v3.4c0 .3.2.6.6.6s.6-.3.6-.6V20H10v3.4c0 .3.3.6.6.6s.6-.3.6-.6V20h1.4v3.4c0 .3.3.6.6.6s.6-.3.6-.6V20h1.4v3.4c0 .3.3.6.6.6s.6-.3.6-.6V20h.9c1.4 0 2.6-1.2 2.6-2.6v-.8h3.3c.3 0 .6-.3.6-.6s-.3-.6-.6-.6H20V14h3.3c.3 0 .6-.3.6-.6s-.3-.6-.6-.6H20v-1.4h3.3zm-4.5 6c0 .8-.6 1.4-1.4 1.4H6.6c-.8 0-1.4-.6-1.4-1.4V6.5c0-.8.6-1.4 1.4-1.4h10.8c.8 0 1.4.6 1.4 1.4v10.8z"/>
</svg>
