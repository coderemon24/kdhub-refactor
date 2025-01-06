<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_module_category' ) ):
	function pixwell_module_category( $cat_id, $attachment_size = '', $title_size = 'h4' ) {

		if ( empty( $cat_id ) ) {
			return false;
		}
		$cat_id   = intval( $cat_id );
		$cat_name = get_cat_name( $cat_id );

		/** get random category */
		if ( empty( $cat_name ) ) {
			$categories   = get_categories( [ 'hide_empty' => true ] );
			$category_ids = [];
			foreach ( $categories as $category ) {
				$category_ids[] = $category->term_id;
			}
			$rand     = array_rand( $category_ids, 1 );
			$cat_id   = $category_ids[ $rand ];
			$cat_name = get_cat_name( $cat_id );
		}

		$cat_featured = '';

		if ( empty( $attachment_size ) ) {
			$attachment_size = 'pixwell_280x210';
		}

		$term_meta = rb_get_term_meta( 'pixwell_meta_categories', $cat_id );

		if ( ! empty( $term_meta['cat_featured'][0] ) ) {
			$cat_featured = wp_get_attachment_image_url( $term_meta['cat_featured'][0], $attachment_size );
			if ( empty( $cat_featured ) ) {
				$cat_featured = esc_url( $term_meta['cat_featured'][0] );
			}
		}

		if ( empty( $cat_featured ) ) {
			$cat_featured = 'data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=';
		}
		$image_size = pixwell_getimagesize( $cat_featured );
		$class_name = 'cat-list-item cat-id-' . esc_attr( $cat_id ); ?>
		<div class="<?php echo esc_attr( $class_name ) ?>">
			<a href="<?php echo get_category_link( $cat_id ); ?>" rel="category" aria-label="<?php echo esc_attr( $cat_name ); ?>"></a>
			<div class="cat-list-feat">
				<img src="<?php echo esc_html( $cat_featured ); ?>" alt="<?php echo esc_html( $cat_name ); ?>" loading="lazy" decoding="async" width="<?php if ( ! empty( $image_size[0] ) ) {
					echo esc_attr( $image_size[0] );
				} ?>" height="<?php if ( ! empty( $image_size[1] ) ) {
					echo esc_attr( $image_size[1] );
				} ?>">
			</div>
			<?php if ( ! empty( $cat_name ) ) : ?>
				<span class="cat-list-name <?php echo esc_attr( $title_size ) ?>"><?php echo esc_html( $cat_name ); ?></span>
			<?php endif; ?>
		</div>
		<?php
	}
endif;


