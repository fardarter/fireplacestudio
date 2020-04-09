<?php

ff_Featured_Area::setIgnoreFirstFeatured( false );
$featured_img = ff_Featured_Area::getFeaturedImage();
list( $featured_img_w, $featured_img_h  ) = ff_Featured_Area::getFeaturedImageSizes();

switch ( get_post_format() ) {
	case 'audio':
		$featured_primary = ff_Featured_Area::getFeaturedAudio();
		break;

	case 'video':
		$featured_primary = ff_Featured_Area::getFeaturedVideo();
		break;

	case 'gallery':
		ff_Featured_Area::setFeaturedPrinter( 'ff_Gallery' );
		$featured_primary = get_post_gallery( get_the_ID() );
		ff_Featured_Area::setFeaturedPrinter( false );
		break;

	default:
		$featured_primary = '';
		break;
}

global $featured_height;

if( ! empty( $featured_primary ) ){
	echo '<section class="entry-featured"><figure>';

	// Modified default WP featured areas
	echo  $featured_primary;

	ff_Featured_Area::setIgnoreFirstFeatured( true );
	echo '</figure></section>';
}else if( ! empty( $featured_img ) ) {
    $query = $query->get('post-classic-meta');
    global $post;
    $featuredImageQuery = $query->get('featured-image');

    $imageUrlNonresized = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
    $imageUrlResized = null;
    if( $imageUrlNonresized != null && $featuredImageQuery->get('show') ) {
        $width = $featuredImageQuery->get('width');
        $height = $featuredImageQuery->get('height');

        if( absint($width) == 0 ) {
            $width = null;
        }

        if( absint($height) == 0 ) {
            $height = null;
        }

        $crop = false;

        if( $width != null || $height != null ) {
            $imageUrlResized = fImg::resize( $imageUrlNonresized, $width, $height, true );
        } else {
            $imageUrlResized = $imageUrlNonresized;
        }
    }


	if( $imageUrlResized != null ) {
		?>
			<section class="entry-featured"><figure>
			        <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo esc_attr( $imageUrlResized ); ?>" alt=""></a>
			</figure></section>
		<?php
	}
}





