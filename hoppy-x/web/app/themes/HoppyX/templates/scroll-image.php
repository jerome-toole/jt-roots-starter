<?php

$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'large', true);

?>

<div class="entry-image parallax-window" data-parallax="scroll" data-bleed="5" data-speed="0.2" data-image-src="<?php echo $thumb_url[0] ?>"></div>
