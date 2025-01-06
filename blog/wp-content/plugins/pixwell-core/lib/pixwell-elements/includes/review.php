<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_render_block_review' ) ) {
	function pixwell_render_block_review( $attributes ) {

		$wrapperClassName = 'gb-wrap gb-review none-padding';
		if ( ! empty( $attributes['shadow'] ) ) {
			$wrapperClassName .= ' yes-shadow';
		}
		$attributes['post_id'] = get_the_ID();

		$output = '';

		$heading_tag   = ! empty( $attributes['headingHTMLTag'] ) ? esc_attr( $attributes['headingHTMLTag'] ) : 'h2';
		$heading_class = ! empty( $attributes['tocAdded'] ) ? 'gb-heading' : 'gb-heading none-toc';

		$avg_value = pixwell_block_review_get_average( $attributes );

		$output .= '<div ' . get_block_wrapper_attributes( [
				'class' => $wrapperClassName,
				'style' => pixwell_get_block_review_style( $attributes ),
			] ) . '>';

		if ( ! empty( $attributes['shadow'] ) ) {
			$output .= pixwell_block_review_featured_image( $attributes );
		}

		$output .= '<div class="gb-content gb-review-content">';

		if ( empty( $attributes['shadow'] ) ) {
			$output .= pixwell_block_review_featured_image( $attributes );
		}
		$output .= '<div class="gb-review-header">';
		$output .= '<div class="gb-review-heading">';
		if ( ! empty( $attributes['heading'] ) ) {
			$output .= '<' . $heading_tag . ' class="' . $heading_class . '">' . $attributes['heading'] . '</' . $heading_tag . '>';
		}
		if ( ! empty( $attributes['price'] ) ) {
			$output .= '<span class="af-price ' . $heading_tag . '">';
			if ( ! empty( $attributes['salePrice'] ) ) {
				$output .= '<del>' . $attributes['price'] . '</del>' . $attributes['salePrice'];
			} else {
				$output .= $attributes['price'];
			}
			$output .= '</span>';
		}
		$output .= '</div>';

		if ( $avg_value && function_exists( 'pixwell_get_review_stars' ) ) {
			$output .= '<div class="review-total-stars">';

            $out_of_label = esc_html__( 'out of 5', 'pixwell-core' );

			$output .= pixwell_get_review_stars( $avg_value );
			$output .= '<span>' . $avg_value . ' <em>' . $out_of_label . '</em>' . '</span>';

			$output .= '</div>';
		}
		$output .= '</div>';
		if ( ! empty( $attributes['description'] ) ) {
			$output .= '<div class="gb-review-description top-divider"><p class="gb-description">' . $attributes['description'] . '</p></div>';
		}
		$output .= pixwell_block_review_features( $attributes );
		$output .= pixwell_block_review_pros_cons( $attributes );
		$output .= pixwell_block_review_buttons( $attributes );
		$output .= '</div>';
		$output .= '</div>';

		add_action(
			'wp_footer',
			function () use ( $attributes ) {
				pixwell_block_review_schema_markup( $attributes );
			}, 5
		);

		return $output;
	}
}

if ( ! function_exists( 'pixwell_get_block_review_style' ) ) {
	function pixwell_get_block_review_style( $attributes ) {

		$css = [];

		if ( ! empty( $attributes['headingColor'] ) ) {
			$css['--heading-color'] = $attributes['headingColor'];
		}
		if ( ! empty( $attributes['darkHeadingColor'] ) ) {
			$css['--dark-heading-color'] = $attributes['darkHeadingColor'];
		}
		if ( ! empty( $attributes['desktopHeadingSize'] ) ) {
			$css['--desktop-heading-size'] = $attributes['desktopHeadingSize'] . 'px';
		}
		if ( ! empty( $attributes['tabletHeadingSize'] ) ) {
			$css['--tablet-heading-size'] = $attributes['tabletHeadingSize'] . 'px';
		}
		if ( ! empty( $attributes['mobileHeadingSize'] ) ) {
			$css['--mobile-heading-size'] = $attributes['mobileHeadingSize'] . 'px';
		}
		if ( ! empty( $attributes['descriptionColor'] ) ) {
			$css['--description-color'] = $attributes['descriptionColor'];
		}
		if ( ! empty( $attributes['darkDescriptionColor'] ) ) {
			$css['--dark-description-color'] = $attributes['darkDescriptionColor'];
		}
		if ( ! empty( $attributes['desktopDescriptionSize'] ) ) {
			$css['--desktop-description-size'] = $attributes['desktopDescriptionSize'] . 'px';
		}
		if ( ! empty( $attributes['tabletDescriptionSize'] ) ) {
			$css['--tablet-description-size'] = $attributes['tabletDescriptionSize'] . 'px';
		}
		if ( ! empty( $attributes['mobileDescriptionSize'] ) ) {
			$css['--mobile-description-size'] = $attributes['mobileDescriptionSize'] . 'px';
		}

		if ( ! empty( $attributes['priceColor'] ) ) {
			$css['--price-color'] = $attributes['priceColor'];
		}
		if ( ! empty( $attributes['darkPriceColor'] ) ) {
			$css['--dark-price-color'] = $attributes['darkPriceColor'];
		}
		if ( ! empty( $attributes['desktopPriceSize'] ) ) {
			$css['--desktop-price-size'] = $attributes['desktopPriceSize'] . 'px';
		}
		if ( ! empty( $attributes['tabletPriceSize'] ) ) {
			$css['--tablet-price-size'] = $attributes['tabletPriceSize'] . 'px';
		}
		if ( ! empty( $attributes['mobilePriceSize'] ) ) {
			$css['--mobile-price-size'] = $attributes['mobilePriceSize'] . 'px';
		}
		if ( ! empty( $attributes['overlayMetaColor'] ) ) {
			$css['--overlay-meta-color'] = $attributes['overlayMetaColor'];
		}
		if ( ! empty( $attributes['overlayMetaBg'] ) ) {
			$css['--overlay-meta-bg'] = $attributes['overlayMetaBg'];
		}
		if ( ! empty( $attributes['starColor'] ) ) {
			$css['--review-color'] = $attributes['starColor'];
		}
		/** buttons */
		if ( ! empty( $attributes['desktopButtonSize'] ) ) {
			$css['--desktop-button-size'] = $attributes['desktopButtonSize'] . 'px';
		}
		if ( ! empty( $attributes['tabletButtonSize'] ) ) {
			$css['--tablet-button-size'] = $attributes['tabletButtonSize'] . 'px';
		}
		if ( ! empty( $attributes['mobileButtonSize'] ) ) {
			$css['--mobile-button-size'] = $attributes['mobileButtonSize'] . 'px';
		}
		if ( ! empty( $attributes['buttonColor'] ) ) {
			$css['--button-color'] = $attributes['buttonColor'];
		}
		if ( ! empty( $attributes['buttonBg'] ) ) {
			$css['--button-bg'] = $attributes['buttonBg'];
		}
		if ( ! empty( $attributes['darkButtonColor'] ) ) {
			$css['--dark-button-color'] = $attributes['darkButtonColor'];
		}
		if ( ! empty( $attributes['darkButtonBg'] ) ) {
			$css['--dark-button-bg'] = $attributes['darkButtonBg'];
		}
		if ( ! empty( $attributes['isBorderButtonColor'] ) ) {
			$css['--is-border-button-color'] = $attributes['isBorderButtonColor'];
		}
		if ( ! empty( $attributes['isBorderButtonBorder'] ) ) {
			$css['--is-border-button-border'] = $attributes['isBorderButtonBorder'];
		}
		if ( ! empty( $attributes['isBorderDarkButtonColor'] ) ) {
			$css['--dark-is-border-button-color'] = $attributes['isBorderDarkButtonColor'];
		}
		if ( ! empty( $attributes['isBorderDarkButtonBg'] ) ) {
			$css['--dark-is-border-button-border'] = $attributes['isBorderDarkButtonBg'];
		}
		/** border and padding */
		if ( ! empty( $attributes['borderStyle'] ) ) {
			$css['--border-style'] = $attributes['borderStyle'];
		}
		if ( ! empty( $attributes['borderRadius'] ) ) {
			$css['--border-radius'] = $attributes['borderRadius'] . 'px';
		}
		if ( ! empty( $attributes['borderWidth'] ) ) {
			$css['--border-width'] = pixwell_get_block_border_width_css( $attributes['borderWidth'] );
		}
		if ( ! empty( $attributes['borderColor'] ) ) {
			$css['--border-color'] = $attributes['borderColor'];
		}
		if ( ! empty( $attributes['darkBorderColor'] ) ) {
			$css['--dark-border-color'] = $attributes['darkBorderColor'];
		}
		if ( ! empty( $attributes['background'] ) ) {
			$css['--bg'] = $attributes['background'];
		}
		if ( ! empty( $attributes['darkBackground'] ) ) {
			$css['--dark-bg'] = $attributes['darkBackground'];
		}
		if ( ! empty( $attributes['desktopPadding'] ) ) {
			$css['--desktop-padding'] = pixwell_get_block_padding_css( $attributes['desktopPadding'] );
		}
		if ( ! empty( $attributes['tabletPadding'] ) ) {
			$css['--tablet-padding'] = pixwell_get_block_padding_css( $attributes['tabletPadding'] );
		}
		if ( ! empty( $attributes['mobilePadding'] ) ) {
			$css['--mobile-padding'] = pixwell_get_block_padding_css( $attributes['mobilePadding'] );
		}

		$css_attributes = '';
		foreach ( $css as $key => $value ) {
			$css_attributes .= "$key: $value;";
		}

		return $css_attributes;
	}
}

if ( ! function_exists( 'pixwell_block_review_featured_image' ) ) {

	function pixwell_block_review_featured_image( $attributes ) {

		$avg_value = pixwell_block_review_get_average( $attributes );
		$output    = '';
		if ( ! empty( $attributes['image'] ) ) {
			$output .= '<div class="gb-review-featured">';
			$output .= '<img class="" src="' . $attributes['image'] . '" alt="' . $attributes['imageAlt'] . '">';
			if ( ! empty( $attributes['meta'] ) ) {
				$output .= '<span class="gb-absolute-meta review-quickview-meta">';
				$output .= '<span class="meta-score h4">';
				if ( empty( $avg_value ) ) {
					$output .= ! empty( $attributes['metaScore'] ) ? $attributes['metaScore'] : '';
				} else {
					$output .= $avg_value;
				}
				$output .= '</span>';
				$output .= '<span class="meta-text">' . $attributes['meta'] . '</span>';
				$output .= '</span>';
			}
			$output .= '</div>';
		}

		return $output;
	}
}

if ( ! function_exists( 'pixwell_block_review_get_average' ) ) {

	function pixwell_block_review_get_average( $attributes ) {

		if ( empty( $attributes['productFeatures'] ) || ! is_array( $attributes['productFeatures'] ) ) {
			return false;
		}

		$total = 0;
		$count = 0;
		foreach ( $attributes['productFeatures'] as $feature ) {
			if ( ! empty( $feature['rating'] ) && ! empty( $feature['label'] ) ) {
				$total += (float) $feature['rating'];
				$count ++;
			}
		}

		$average_rating = $count > 0 ? $total / $count : 0;

		return round( $average_rating, 1 );
	}
}

if ( ! function_exists( 'pixwell_block_review_pros_cons' ) ) {
	function pixwell_block_review_pros_cons( $attributes ) {

		if ( ! function_exists( 'pixwell_render_review_pros_cons' ) ) {
			return false;
		}
		if ( empty( $attributes['productPros'] ) && empty( $attributes['productCons'] ) ) {
			return false;
		}

		$settings = [
			'cons'    => [],
			'pros'    => [],
			'classes' => 'top-divider',
		];

		if ( ! empty( $attributes['prosLabel'] ) ) {
			$settings['pros_label'] = $attributes['prosLabel'];
		}

		if ( ! empty( $attributes['consLabel'] ) ) {
			$settings['cons_label'] = $attributes['consLabel'];
		}

		if ( ! empty( $attributes['productPros'] ) && is_array( $attributes['productPros'] ) ) {
			foreach ( $attributes['productPros'] as $index => $item ) {
				if ( ! empty( $item['content'] ) ) {
					$settings['pros'][ $index ]['pros_item'] = $item['content'];
				}
			}
		}

		if ( ! empty( $attributes['productCons'] ) && is_array( $attributes['productCons'] ) ) {
			foreach ( $attributes['productCons'] as $index => $item ) {
				if ( ! empty( $item['content'] ) ) {
					$settings['cons'][ $index ]['cons_item'] = $item['content'];
				}
			}
		}

		ob_start();
		pixwell_render_review_pros_cons( $settings );

		return ob_get_clean();
	}
}

if ( ! function_exists( 'pixwell_block_review_features' ) ) {
	function pixwell_block_review_features( $attributes ) {

		if ( ! function_exists( 'pixwell_get_review_stars' ) ) {
			return false;
		}
		if ( empty( $attributes['productFeatures'] ) || ! is_array( $attributes['productFeatures'] ) ) {
			return false;
		}

		ob_start(); ?>
		<div class="review-specs top-divider">
			<?php foreach ( $attributes['productFeatures'] as $element ) :
				if ( empty( $element['label'] ) || empty( $element['rating'] ) ) {
					continue;
				}
				if ( $element['rating'] > 5 ) {
					$element['rating'] = 5;
				} elseif ( $element['rating'] < 1 ) {
					$element['rating'] = 1;
				} ?>
				<div class="review-el">
					<div class="review-label">
						<span class="review-label-info h4"><?php echo esc_html( $element['label'] ); ?></span>
						<span class="rating-info is-meta"><?php printf( esc_html__( '%s out of 5', 'pixwell-core' ), $element['rating'] ); ?></span>
					</div>
					<span class="review-rating"><?php echo pixwell_get_review_stars( $element['rating'] ); ?></span>
				</div>
			<?php endforeach;
			?>
		</div>
		<?php
		return ob_get_clean();
	}
}

if ( ! function_exists( 'pixwell_block_review_buttons' ) ) {
	function pixwell_block_review_buttons( $attributes ) {

		if ( empty( $attributes['buyButtons'] ) || ! is_array( $attributes['buyButtons'] ) ) {
			return false;
		}

		$output = '';
		$output .= '<div class="review-buttons top-divider">';
		foreach ( $attributes['buyButtons'] as $item ) {

			$class_name = 'review-btn is-btn gb-btn';
			if ( ! empty( $item['isButtonBorder'] ) ) {
				$class_name .= ' is-border-style';
			}

			$isSponsored = ! empty( $item['isSponsored'] ) ? $item['isSponsored'] : false;
			$link        = ! empty( $item['link'] ) ? esc_url( $item['link'] ) : '#';
			$output      .= '<a class="' . $class_name . '" href="' . $link . '" target="_blank" rel="nofollow noreferrer' . ( $isSponsored ? ' sponsored' : '' ) . '">' . esc_html( $item['label'] ) . '</a>';
		}
		$output .= '</div>';

		return $output;
	}
}

if ( ! function_exists( 'pixwell_get_review_stars' ) ) {
    /**
     * @param int $average
     *
     * @return string
     */
    function pixwell_get_review_stars( $average = 0 ) {

        $output = '<span class="rstar-wrap">';
        $output .= '<span class="rstar-bg" style="width:' . floatval( $average ) * 100 / 5 . '%"></span>';
        for ( $i = 1; $i <= 5; $i ++ ) {
            $output .= '<span class="rstar"><i class="rbi rbi-star-full" aria-hidden="true"></i></span>';
        }
        $output .= '</span>';

        return $output;
    }
}

if ( ! function_exists( 'pixwell_render_review_pros_cons' ) ) {
    /**
     * @param array $settings
     *
     * @return false
     */
    function pixwell_render_review_pros_cons( $settings = [] ) {

        if ( empty( $settings['pros'] ) && empty( $settings['cons'] ) ) {
            return false;
        }

        $pros_label = ! empty( $settings['pros_label'] ) ? $settings['pros_label'] : esc_html__( 'Good Stuff', 'pixwell-core' );
        $cons_label = ! empty( $settings['cons_label'] ) ? $settings['cons_label'] : esc_html__( 'Bad Stuff', 'pixwell-core' );
        $class_name = 'pros-cons' . ( ! empty( $settings['classes'] ) ? ' ' . $settings['classes'] : '' );

        ?>
        <div class="<?php echo esc_attr( $class_name ); ?>">
            <div class="pros-cons-holder">
                <?php if ( is_array( $settings['pros'] ) ) : ?>
                    <div class="pros-list-wrap">
                        <div class="pros-cons-list-inner">
                            <span class="pros-cons-title h4"><i class="rbi rbi-thumbs-up"></i><?php echo esc_attr( $pros_label ); ?></span>
                            <?php foreach ( $settings['pros'] as $item ) :
                                if ( ! empty( $item['pros_item'] ) ) :?>
                                    <span class="pros-cons-el"><?php echo esc_html( $item['pros_item'] ); ?></span>
                                <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                <?php endif;
                if ( is_array( $settings['cons'] ) ) : ?>
                    <div class="cons-list-wrap">
                        <div class="pros-cons-list-inner">
                            <span class="pros-cons-title h4"><i class="rbi rbi-thumbs-down"></i><?php echo esc_attr( $cons_label ); ?></span>
                            <?php foreach ( $settings['cons'] as $item ) :
                                if ( ! empty( $item['cons_item'] ) ) :?>
                                    <span class="pros-cons-el"><?php echo esc_html( $item['cons_item'] ); ?></span>
                                <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}
