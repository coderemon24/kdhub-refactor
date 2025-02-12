<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_filter( 'rb_meta_boxes', 'pixwell_register_metaboxes' );

if ( ! function_exists( 'pixwell_register_metaboxes' ) ) {
	function pixwell_register_metaboxes( $metaboxes = [] ) {

		$metaboxes[] = pixwell_single_post_metaboxes();
		$metaboxes[] = pixwell_single_page_metaboxes();

		return $metaboxes;
	}
}

if ( ! function_exists( 'pixwell_single_post_metaboxes' ) ) {
	function pixwell_single_post_metaboxes() {

		return [
			'id'         => 'pixwell_post_options',
			'title'      => esc_html__( 'Pixwell Post Options', 'pixwell' ),
			'context'    => 'normal',
			'post_types' => [ 'post' ],
			'tabs'       => [
				[
					'id'     => 'pixwell-general',
					'title'  => esc_html__( 'General', 'pixwell' ),
					'icon'   => 'dashicons-admin-site',
					'fields' => [
						[
							'id'      => 'title_tagline',
							'name'    => esc_html__( 'Title Tagline', 'pixwell' ),
							'desc'    => esc_html__( 'Enter a tagline for the post.', 'pixwell' ),
							'info'    => esc_html__( 'The tagline will be displayed below the post title on individual post pages.', 'pixwell' ),
							'type'    => 'textarea',
							'single'  => true,
							'default' => '',
						],
						[
							'name'        => esc_html__( 'Primary Category', 'pixwell' ),
							'id'          => 'primary_cat',
							'type'        => 'category_select',
							'taxonomy'    => 'category',
							'placeholder' => esc_html__( 'Select a Primary Category', 'pixwell' ),
							'desc'        => esc_html__( 'Set a primary category for this post.', 'pixwell' ),
							'info'        => esc_html__( 'This option is useful when a post belongs to multiple categories.', 'pixwell' ),
							'default'     => '',
						],
						[
							'id'      => 'meta_custom',
							'name'    => esc_html__( 'Custom Meta - Value', 'pixwell' ),
							'desc'    => esc_html__( 'Input a custom meta for this post.', 'pixwell' ),
							'info'    => esc_html__( 'Navigate to "Theme Options > Styles & Design > Custom Meta" for additional settings.', 'pixwell' ),
							'type'    => 'text',
							'default' => '',
						],
						[
							'id'      => 'single_top',
							'name'    => esc_html__( 'Top Content Ad', 'pixwell' ),
							'desc'    => esc_html__( 'Display ad widget section at the beginning of the post content.', 'pixwell' ),
							'info'    => esc_html__( 'Navigate to "Appearance > Widgets > Single Content - Top Advert Section" to add widgets.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'1'  => esc_html__( 'Enable', 'pixwell' ),
								'-1' => esc_html__( 'Disable', 'pixwell' ),
							],
							'default' => '1',
						],
						[
							'id'      => 'single_bottom',
							'name'    => esc_html__( 'Bottom Content Ad', 'pixwell' ),
							'desc'    => esc_html__( 'Display ad widget section at the end of the post content.', 'pixwell' ),
							'info'    => esc_html__( 'Navigate to "Appearance > Widgets > Single Content - Bottom Advert Section" to add widgets.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'1'  => esc_html__( 'Enable', 'pixwell' ),
								'-1' => esc_html__( 'Disable', 'pixwell' ),
							],
							'default' => '1',
						],
						[
							'id'      => 'single_schema',
							'name'    => esc_html__( 'Article Markup for SEO', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable structured data markup for this post.', 'pixwell' ),
							'info'    => esc_html__( 'Select "disable" if you are using a third-party plugin to manage SEO for this post.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
								'-1'      => esc_html__( 'Enable', 'pixwell' ),
								'1'       => esc_html__( 'Disable', 'pixwell' ),
							],
							'default' => 'default',
						],
					],
				],
				[
					'id'     => 'pixwell-layout',
					'title'  => esc_html__( 'Layout', 'pixwell' ),
					'icon'   => 'dashicons-layout',
					'fields' => [
						[
							'id'      => 'post_layout',
							'name'    => esc_html__( 'Single Layout', 'pixwell' ),
							'desc'    => esc_html__( 'Choose a layout for this individual post.', 'pixwell' ),
							'type'    => 'image_select',
							'class'   => 'big',
							'options' => pixwell_add_settings_meta_single_layout(),
							'default' => 'default',
						],
						[
							'id'      => 'sidebar_name',
							'name'    => esc_html__( 'Sidebar Name', 'pixwell' ),
							'desc'    => esc_html__( 'Assign a sidebar for this post.', 'pixwell' ),
							'info'    => esc_html__( 'The sidebar will not appear in the layout without specifying its position.', 'pixwell' ),
							'type'    => 'select',
							'options' => pixwell_add_settings_sidebar_name( true ),
							'default' => 'default',
						],
						[
							'id'      => 'sidebar_pos',
							'name'    => esc_html__( 'Sidebar Position', 'pixwell' ),
							'desc'    => esc_html__( 'Select a position for the post sidebar.', 'pixwell' ),
							'class'   => 'sidebar-select',
							'type'    => 'image_select',
							'options' => pixwell_add_settings_meta_sidebar_pos(),
							'default' => 'default',
						],
						[
							'id'      => 'feat_size',
							'name'    => esc_html__( 'Featured Image Size', 'pixwell' ),
							'desc'    => esc_html__( 'Choose the quality for the post featured image.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( 'Default From Theme Options', 'pixwell' ),
								'full'    => esc_html__( 'Full Size', 'pixwell' ),
								'crop'    => esc_html__( 'Crop Size', 'pixwell' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'feat_credit',
							'name'    => esc_html__( 'Featured Credit Text', 'pixwell' ),
							'desc'    => esc_html__( 'Enter credit text for the featured image.', 'pixwell' ),
							'info'    => esc_html__( 'If this setting is left empty, the image title will be displayed.', 'pixwell' ),
							'type'    => 'text',
							'default' => '',
						],
					],
				],
				/** post review */
				[
					'id'     => 'pixwell-review',
					'title'  => esc_html__( 'Post Review', 'pixwell' ),
					'icon'   => 'dashicons-star-filled',
					'fields' => [
						[
							'id'      => 'post_review',
							'name'    => esc_html__( 'Post Review', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable the product review feature for this post.', 'pixwell' ),
							'type'    => 'select',
							'class'   => 'ruby-review-checkbox',
							'options' => [
								'-1' => esc_html__( '- Disable -', 'pixwell' ),
								'1'  => esc_html__( 'Enable', 'pixwell' ),
							],
							'default' => '-1',
						],
						[
							'id'      => 'review_users',
							'name'    => esc_html__( 'User Reviews', 'pixwell' ),
							'desc'    => esc_html__( 'Choose whether to replace the comment section with a review section for this post.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( '- Use Default Settings from Theme Options -', 'pixwell' ),
								'-1'      => esc_html__( 'Disable', 'pixwell' ),
								'1'       => esc_html__( 'Enable', 'pixwell' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'review_style',
							'name'    => esc_html__( 'Review Box Style', 'pixwell' ),
							'desc'    => esc_html__( 'Choose the style for the review box.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'-1' => esc_html__( '- Dark -', 'pixwell' ),
								'1'  => esc_html__( 'Light', 'pixwell' ),
							],
							'default' => '-1',
						],
						[
							'id'   => 'review_feat',
							'name' => esc_html__( 'Review Featured Image', 'pixwell' ),
							'desc' => esc_html__( 'Upload a featured header image for the review box.', 'pixwell' ),
							'type' => 'file',
						],
						[
							'id'   => 'review_label_1',
							'name' => esc_html__( 'Criteria 1 - Label', 'pixwell' ),
							'desc' => esc_html__( 'Enter a label for Criteria 1.', 'pixwell' ),
							'type' => 'text',
						],
						[
							'id'    => 'review_star_1',
							'name'  => esc_html__( 'Criteria 1 - Stars', 'pixwell' ),
							'desc'  => esc_html__( 'Enter the number of stars for Criteria 1. The input should be a number between 1 and 5.', 'pixwell' ),
							'type'  => 'text',
							'class' => 'input-small',
						],
						[
							'id'   => 'review_label_2',
							'name' => esc_html__( 'Criteria 2 - Label', 'pixwell' ),
							'desc' => esc_html__( 'Enter a label for Criteria 2.', 'pixwell' ),
							'type' => 'text',
						],
						[
							'id'    => 'review_star_2',
							'name'  => esc_html__( 'Criteria 2 - Stars', 'pixwell' ),
							'desc'  => esc_html__( 'Enter the number of stars for Criteria 2. The input should be a number between 1 and 5.', 'pixwell' ),
							'type'  => 'text',
							'class' => 'input-small',
						],
						[
							'id'   => 'review_label_3',
							'name' => esc_html__( 'Criteria 3 - Label', 'pixwell' ),
							'desc' => esc_html__( 'Enter a label for Criteria 3.', 'pixwell' ),
							'type' => 'text',
						],
						[
							'id'    => 'review_star_3',
							'name'  => esc_html__( 'Criteria 3 - Stars', 'pixwell' ),
							'desc'  => esc_html__( 'Enter the number of stars for Criteria 3. The input should be a number between 1 and 5.', 'pixwell' ),
							'type'  => 'text',
							'class' => 'input-small',
						],
						[
							'id'   => 'review_label_4',
							'name' => esc_html__( 'Criteria 4 - Label', 'pixwell' ),
							'desc' => esc_html__( 'Enter a label for Criteria 4.', 'pixwell' ),
							'type' => 'text',
						],
						[
							'id'    => 'review_star_4',
							'name'  => esc_html__( 'Criteria 4 - Stars', 'pixwell' ),
							'desc'  => esc_html__( 'Enter the number of stars for Criteria 4. The input should be a number between 1 and 5.', 'pixwell' ),
							'type'  => 'text',
							'class' => 'input-small',
						],
						[
							'id'   => 'review_label_5',
							'name' => esc_html__( 'Criteria 5 - Label', 'pixwell' ),
							'desc' => esc_html__( 'Enter a label for Criteria 5.', 'pixwell' ),
							'type' => 'text',
						],
						[
							'id'    => 'review_star_5',
							'name'  => esc_html__( 'Criteria 5 - Stars', 'pixwell' ),
							'desc'  => esc_html__( 'Enter the number of stars for Criteria 5. The input should be a number between 1 and 5.', 'pixwell' ),
							'type'  => 'text',
							'class' => 'input-small',
						],
						[
							'id'   => 'review_label_6',
							'name' => esc_html__( 'Criteria 6 - Label', 'pixwell' ),
							'desc' => esc_html__( 'Enter a label for Criteria 6.', 'pixwell' ),
							'type' => 'text',
						],
						[
							'id'    => 'review_star_6',
							'name'  => esc_html__( 'Criteria 6 - Stars', 'pixwell' ),
							'desc'  => esc_html__( 'Enter the number of stars for Criteria 6. The input should be a number between 1 and 5.', 'pixwell' ),
							'type'  => 'text',
							'class' => 'input-small',
						],
						[
							'id'   => 'review_label_7',
							'name' => esc_html__( 'Criteria 7 - Label', 'pixwell' ),
							'desc' => esc_html__( 'Enter a label for Criteria 7.', 'pixwell' ),
							'type' => 'text',
						],
						[
							'id'    => 'review_star_7',
							'name'  => esc_html__( 'Criteria 7 - Stars', 'pixwell' ),
							'desc'  => esc_html__( 'Enter the number of stars for Criteria 7. The input should be a number between 1 and 5.', 'pixwell' ),
							'type'  => 'text',
							'class' => 'input-small',
						],
						[
							'id'      => 'fallback_stars',
							'name'    => esc_html__( 'Fallback Total Stars', 'pixwell' ),
							'desc'    => esc_html__( 'Input fallback stars value if all criteria reviews are empty', 'pixwell' ),
							'info'    => esc_html__( 'The value should be between 1 and 5.', 'pixwell' ),
							'type'    => 'text',
							'default' => 5,
							'class'   => 'input-small',
						],
						[
							'id'   => 'review_meta',
							'name' => esc_html__( 'Short Meta Info', 'pixwell' ),
							'desc' => esc_html__( 'Enter short meta info to display before the review score. For example: "Good", "Bad"...', 'pixwell' ),
							'type' => 'text',
						],
						[
							'id'          => 'review_pros',
							'name'        => esc_html__( 'Pros Summary Section', 'pixwell' ),
							'desc'        => esc_html__( 'Enter pros summary for this review, separated by "/". For example: "positive 1/positive 2/positive 3"', 'pixwell' ),
							'placeholder' => 'positive 1/positive 2/positive 3',
							'type'        => 'textarea',
						],
						[
							'id'          => 'review_cons',
							'name'        => esc_html__( 'Cons Summary Section', 'pixwell' ),
							'desc'        => esc_html__( 'Enter cons summary for this review, separated by "/". For example: "negative 1/negative 2/negative 3"', 'pixwell' ),
							'placeholder' => 'negative 1/negative 2/negative 3',
							'type'        => 'textarea',
						],
						[
							'id'   => 'review_summary',
							'name' => esc_html__( 'Final Summary Section', 'pixwell' ),
							'desc' => esc_html__( 'Enter the final summary for this review. Provide a concise conclusion summarizing key points and recommendations.', 'pixwell' ),
							'type' => 'textarea',
						],
						[
							'id'   => 'review_button',
							'name' => esc_html__( 'Offer Label', 'pixwell' ),
							'desc' => esc_html__( 'Enter an offer label (Call to action) for this product review. For example: "Buy Now only $1", "Check Price", "Get Deal"', 'pixwell' ),
							'type' => 'text',
						],
						[
							'id'   => 'review_destination',
							'name' => esc_html__( 'Offer Destination URL', 'pixwell' ),
							'desc' => esc_html__( 'Enter the destination URL of the offer. Make sure to include the full URL, including "https://".', 'pixwell' ),
							'type' => 'text',
						],
						[
							'id'   => 'preview_price',
							'name' => esc_html__( 'Offer Price', 'pixwell' ),
							'desc' => esc_html__( 'Enter the price of the offer without the currency symbol.', 'pixwell' ),
							'info' => esc_html__( 'This setting is for schema review markup. It will not appear in the view.', 'pixwell' ),
							'type' => 'text',
						],
						[
							'id'          => 'review_currency',
							'name'        => esc_html__( 'Offer Currency', 'pixwell' ),
							'desc'        => esc_html__( 'Enter the currency of the offer.', 'pixwell' ),
							'info'        => esc_html__( 'This setting is for schema review markup and will not be displayed in the view.', 'pixwell' ),
							'placeholder' => 'USD',
							'type'        => 'text',
						],
						[
							'id'          => 'review_price_valid',
							'name'        => esc_html__( 'Offer Price Valid Until', 'pixwell' ),
							'desc'        => esc_html__( 'Enter the valid until date for this offer. Please ensure you input the date in the correct format: yyyy-mm-dd.', 'pixwell' ),
							'info'        => esc_html__( 'This setting is for schema review markup and will not be displayed in the view.', 'pixwell' ),
							'placeholder' => 'yyyy-mm-dd',
							'type'        => 'text',
						],
					],
				],
				[
					'id'     => 'pixwell-video',
					'title'  => esc_html__( 'Video Format', 'pixwell' ),
					'desc'   => esc_html__( 'To activate this feature, select "Video" as the Post Format in the right pane.', 'pixwell' ),
					'icon'   => 'dashicons-format-video',
					'fields' => [
						[
							'id'      => 'video_url',
							'name'    => esc_html__( 'Video URL', 'pixwell' ),
							'desc'    => esc_html__( 'Enter the URL of your video. Supported platforms: YouTube, Vimeo, DailyMotion...', 'pixwell' ),
							'type'    => 'text',
							'default' => '',
						],
						[
							'id'   => 'video_embed',
							'name' => esc_html__( 'Iframe Embed Code', 'pixwell' ),
							'desc' => esc_html__( 'Enter an iframe embed code. This could include embeds from various sources.', 'pixwell' ),
							'info' => esc_html__( 'This setting will override the video URL setting if both are filled.', 'pixwell' ),
							'type' => 'textarea',
						],
						[
							'id'   => 'video_hosted',
							'name' => esc_html__( 'Self-Hosted Video', 'pixwell' ),
							'desc' => esc_html__( 'Upload your video file. Supported formats: mp4, m4v, webm, ogv, wmv, flv.', 'pixwell' ),
							'info' => esc_html__( 'This setting will override the "Iframe Embed Code" setting if both are filled.', 'pixwell' ),
							'type' => 'file',
						],
						[
							'id'      => 'video_autoplay',
							'name'    => esc_html__( 'Autoplay Video', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable autoplay for the video in this post.', 'pixwell' ),
							'info'    => esc_html__( 'This setting may not take effect if a third-party video service restricts it.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
								'1'       => esc_html__( 'Enable', 'pixwell' ),
								'-1'      => esc_html__( 'Disable', 'pixwell' ),
							],
							'default' => 'default',
						],
					],
				],
				[
					'id'     => 'pixwell-audio',
					'title'  => esc_html__( 'Audio Format', 'pixwell' ),
					'desc'   => esc_html__( 'To activate this feature, select "Audio" as the Post Format in the right pane.', 'pixwell' ),
					'icon'   => 'dashicons-format-audio',
					'fields' => [
						[
							'id'   => 'audio_url',
							'name' => esc_html__( 'Audio URL', 'pixwell' ),
							'desc' => esc_html__( 'Enter the URL of your audio. Supported platforms: SoundCloud, MixCloud.', 'pixwell' ),
							'type' => 'text',
						],
						[
							'id'   => 'audio_embed',
							'name' => esc_html__( 'Iframe Embed Code', 'pixwell' ),
							'desc' => esc_html__( 'Enter an iframe embed code. This could include embeds from various sources.', 'pixwell' ),
							'info' => esc_html__( 'This setting will override the audio URL setting if both are filled.', 'pixwell' ),
							'type' => 'textarea',
						],
						[
							'id'   => 'audio_hosted',
							'name' => esc_html__( 'Self-Hosted Audio', 'pixwell' ),
							'desc' => esc_html__( 'Upload your audio file. Supported formats: mp3, ogg, wma, m4a, wav.', 'pixwell' ),
							'info' => esc_html__( 'This setting will override the "Iframe Embed Code" setting if both are filled.', 'pixwell' ),
							'type' => 'file',
						],
						[
							'id'      => 'post_podcast',
							'name'    => esc_html__( 'Single Podcast Layout', 'pixwell' ),
							'desc'    => esc_html__( 'Enable to display the podcast layout for this audio post.', 'pixwell' ),
							'info'    => esc_html__( 'This setting is applicable only for self-hosted audio.', 'pixwell' ),
							'class'   => 'big',
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
								'1'       => esc_html__( 'Disable', 'pixwell' ),
								'2'       => esc_html__( 'Enable', 'pixwell' ),
							],
							'default' => 'default',
						],
					],
				],
				[
					'id'     => 'pixwell-gallery',
					'title'  => esc_html__( 'Gallery Format', 'pixwell' ),
					'desc'   => esc_html__( 'To activate this feature, select "Gallery" as the Post Format in the right pane.', 'pixwell' ),
					'icon'   => 'dashicons-format-gallery',
					'fields' => [
						[
							'id'      => 'gallery_data',
							'name'    => esc_html__( 'Upload Gallery', 'pixwell' ),
							'desc'    => esc_html__( 'Upload images for this gallery.', 'pixwell' ),
							'info'    => esc_html__( 'The popup will collect titles, captions, and descriptions for each attachment to display.', 'pixwell' ),
							'type'    => 'images',
							'default' => '',
						],
						[
							'id'      => 'gallery_layout',
							'name'    => esc_html__( 'Gallery Layout', 'pixwell' ),
							'desc'    => esc_html__( 'Choose a layout for this gallery post.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( 'Default (from Theme Options)', 'pixwell' ),
								'slide'   => esc_html__( 'Slider', 'pixwell' ),
								'list'    => esc_html__( 'List', 'pixwell' ),
								'grid'    => esc_html__( 'Grid (Small)', 'pixwell' ),
							],
							'default' => 'default',
						],
					],
				],
				[
					'id'     => 'pixwell-left-side',
					'title'  => esc_html__( 'Left Content', 'pixwell' ),
					'icon'   => 'dashicons-align-pull-left',
					'fields' => [
						[
							'id'      => 'single_left',
							'name'    => esc_html__( 'Left Content Section', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable the left side section in the post content.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
								'1'       => esc_html__( 'Enable', 'pixwell' ),
								'-1'      => esc_html__( 'Disable', 'pixwell' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'single_left_article',
							'name'    => esc_html__( 'Recommended Article', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable the display of the most recommended article.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
								'1'       => esc_html__( 'Enable', 'pixwell' ),
								'-1'      => esc_html__( 'Disable', 'pixwell' ),
							],
							'default' => 'default',
						],
					],
				],
				[
					'id'     => 'pixwell-via',
					'title'  => esc_html__( 'Source/Via', 'pixwell' ),
					'icon'   => 'dashicons-paperclip',
					'fields' => [
						[
							'id'      => 'source_name',
							'name'    => esc_html__( 'Source Name', 'pixwell' ),
							'desc'    => esc_html__( 'Enter a source name for this post.', 'pixwell' ),
							'info'    => esc_html__( 'The source name will be displayed beneath the post tags within the post content.', 'pixwell' ),
							'type'    => 'text',
							'default' => '',
						],
						[
							'id'      => 'source_url',
							'name'    => esc_html__( 'Source URL', 'pixwell' ),
							'desc'    => esc_html__( 'Enter the source URL for this post.', 'pixwell' ),
							'type'    => 'text',
							'default' => '',
						],
						[
							'id'      => 'via_name',
							'name'    => esc_html__( 'Via Name', 'pixwell' ),
							'desc'    => esc_html__( 'Enter a via name for this post.', 'pixwell' ),
							'type'    => 'text',
							'default' => '',
						],
						[
							'id'      => 'via_url',
							'name'    => esc_html__( 'Via URL', 'pixwell' ),
							'desc'    => esc_html__( 'Input a via URL for this post.', 'pixwell' ),
							'type'    => 'text',
							'default' => '',
						],
					],
				],
				[
					'id'     => 'pixwell-shop',
					'title'  => esc_html__( 'Shop The Post', 'pixwell' ),
					'icon'   => 'dashicons-cart',
					'fields' => [
						[
							'id'      => 'shop_post',
							'name'    => esc_html__( 'Shop the Post', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable the "Shop the Post" feature.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'-1' => esc_html__( '- Disable -', 'pixwell' ),
								'1'  => esc_html__( 'Enable', 'pixwell' ),
							],
							'default' => '-1',
						],
						[
							'id'      => 'shop_post_position',
							'name'    => esc_html__( 'Section Position', 'pixwell' ),
							'desc'    => esc_html__( 'Select where to display this section.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'top'    => esc_html__( 'Top Content', 'pixwell' ),
								'bottom' => esc_html__( 'Bottom Content', 'pixwell' ),
							],
							'default' => 'top',
						],
						[
							'id'      => 'shop_post_title',
							'name'    => esc_html__( 'Section Header', 'pixwell' ),
							'desc'    => esc_html__( 'Enter a heading for this section.', 'pixwell' ),
							'type'    => 'text',
							'default' => esc_html__( 'Shop This Post', 'pixwell' ),
						],
						[
							'id'      => 'shop_post_embed',
							'name'    => esc_html__( 'Embed Code', 'pixwell' ),
							'desc'    => esc_html__( 'Enter your product embed code.', 'pixwell' ),
							'info'    => esc_html__( 'Leave this setting blank to use WooCommerce product IDs.', 'pixwell' ),
							'type'    => 'textarea',
							'default' => '',
						],
						[
							'id'          => 'shop_post_wc',
							'name'        => esc_html__( 'or Woocommerce Product IDs', 'pixwell' ),
							'placeholder' => '1000,1001,1002',
							'desc'        => esc_html__( 'Enter Woocommerce product IDs.', 'pixwell' ),
							'info'        => esc_html__( 'Separate multiple IDs by comma. For example: 1000, 1001, 1002', 'pixwell' ),
							'type'        => 'text',
							'default'     => '',
						],
					],
				],
				[
					'id'     => 'pixwell-sponsor',
					'title'  => esc_html__( 'Sponsored Post', 'pixwell' ),
					'icon'   => 'dashicons-bell',
					'fields' => [
						[
							'id'      => 'sponsor_post',
							'name'    => esc_html__( 'Sponsored Post', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable the sponsored post feature.', 'pixwell' ),
							'single'  => true,
							'type'    => 'select',
							'options' => [
								'-1' => esc_html__( '- Disable -', 'pixwell' ),
								'1'  => esc_html__( 'Enable', 'pixwell' ),
							],
							'default' => '-1',
						],
						[
							'id'   => 'sponsor_url',
							'name' => esc_html__( 'Sponsor URL', 'pixwell' ),
							'desc' => esc_html__( 'Enter the sponsor\'s website URL.', 'pixwell' ),

							'type'    => 'text',
							'default' => '',
						],
						[
							'id'   => 'sponsor_name',
							'name' => esc_html__( 'Sponsor Name', 'pixwell' ),
							'desc' => esc_html__( 'Enter the sponsor\'s brand name.', 'pixwell' ),

							'type'    => 'text',
							'default' => '',
						],
						[
							'id'   => 'sponsor_logo',
							'name' => esc_html__( 'Sponsor Logo', 'pixwell' ),
							'desc' => esc_html__( 'Upload the sponsor\'s brand logo.', 'pixwell' ),

							'type' => 'file',
						],
						[
							'id'      => 'sponsor_redirect',
							'name'    => esc_html__( 'Direct Redirect', 'pixwell' ),
							'desc'    => esc_html__( 'Enable to redirect directly to the sponsor website when clicking on the post title.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'-1' => esc_html__( '- Disable -', 'pixwell' ),
								'1'  => esc_html__( 'Enable', 'pixwell' ),
							],
						],
					],
				],
				[
					'id'     => 'pixwell-shares',
					'title'  => 'Fake Shares & Views',
					'icon'   => 'dashicons-visibility',
					'fields' => [
						[
							'id'      => 'start_share',
							'name'    => esc_html__( 'Social Shares', 'pixwell' ),
							'desc'    => esc_html__( 'Manually input the total number of social media shares for this post.', 'pixwell' ),
							'type'    => 'text',
							'default' => '',
						],
						[
							'id'      => 'start_view',
							'name'    => esc_html__( 'Fake Views Value', 'pixwell' ),
							'desc'    => esc_html__( 'Enter a fake view count for this post.', 'pixwell' ),
							'info'    => esc_html__( 'This meta field triggers the "Post Views Counter" plugin to calculate and display post views.', 'pixwell' ),
							'type'    => 'text',
							'default' => '',
						],
					],
				],
				[
					'id'     => 'pixwell-table-contents',
					'title'  => 'Table of Contents',
					'icon'   => 'dashicons-editor-ol',
					'fields' => [
						[
							'id'      => 'table_contents_post',
							'name'    => esc_html__( 'Table of Contents', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable the table of contents for this post.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
								'1'       => esc_html__( 'Enable', 'pixwell' ),
								'-1'      => esc_html__( 'Disable', 'pixwell' ),
							],
						],
						[
							'id'      => 'table_contents_layout',
							'name'    => esc_html__( 'Table of Contents Layout', 'pixwell' ),
							'desc'    => esc_html__( 'Choose a layout style for the table of contents.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( '- Default -', 'pixwell' ),
								'1'       => esc_html__( 'Half Width', 'pixwell' ),
								'2'       => esc_html__( 'Full Width (2 Columns)', 'pixwell' ),
								'3'       => esc_html__( 'Full Width (1 Column)', 'pixwell' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'table_contents_enable',
							'type'    => 'text',
							'name'    => esc_html__( 'Minimum Heading Tags', 'pixwell' ),
							'desc'    => esc_html__( 'Specify the minimum number of heading tags required to display the table of contents.', 'pixwell' ),
							'default' => '',
						],
						[
							'id'      => 'table_contents_position',
							'type'    => 'text',
							'name'    => esc_html__( 'Table of Contents Position', 'pixwell' ),
							'desc'    => esc_html__( 'Enter the position "After X paragraph" to display the table of contents box.', 'pixwell' ),
							'default' => '',
						],
					],
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_single_page_metaboxes' ) ) {
	function pixwell_single_page_metaboxes() {

		return [
			'id'         => 'pixwell_page_options',
			'title'      => esc_html__( 'Pixwell Page Options', 'pixwell' ),
			'context'    => 'normal',
			'post_types' => [ 'page' ],
			'tabs'       => [
				[
					'id'     => 'pixwell-page-header',
					'title'  => esc_html__( 'Site Header', 'pixwell' ),
					'icon'   => 'dashicons-heading',
					'fields' => [
						[
							'id'      => 'header_float',
							'name'    => esc_html__( 'Transparent Header', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable the transparent header for this page.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'-1' => esc_html__( '- Disable -', 'pixwell' ),
								'1'  => esc_html__( 'Enable', 'pixwell' ),
							],
							'default' => '-1',
						],
						[
							'id'      => 'navbar_border',
							'name'    => esc_html__( 'Header 3 Border', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable the bottom border style for header 3.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'-1' => esc_html__( '- Disable -', 'pixwell' ),
								'1'  => esc_html__( 'Enable', 'pixwell' ),
							],
							'default' => '-1',
						],
						[
							'id'      => 'header_banner_border',
							'name'    => esc_html__( 'Header 7 Border', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable the bottom border style for header 7.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'-1' => esc_html__( '- Disable -', 'pixwell' ),
								'1'  => esc_html__( 'Enable', 'pixwell' ),
							],
							'default' => '-1',
						],
					],
				],
				[
					'id'     => 'pixwell-page-single',
					'title'  => esc_html__( 'for Single Pages', 'pixwell' ),
					'desc'   => esc_html__( 'These settings apply only to standard single pages (without builders).', 'pixwell' ),
					'icon'   => 'dashicons-admin-page',
					'fields' => [
						[
							'id'      => 'page_layout',
							'name'    => esc_html__( 'Content Layout', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable the sidebar area for this page.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( 'Default from Theme Option', 'pixwell' ),
								'-1'      => esc_html__( 'Full Width', 'pixwell' ),
								'1'       => esc_html__( 'Content with Sidebar', 'pixwell' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'page_max_width',
							'name'    => esc_html__( 'Full Width - Content Width', 'pixwell' ),
							'desc'    => esc_html__( 'Enter the maximum width value (in pixels) for this page.', 'pixwell' ),
							'info'    => esc_html__( 'This setting only applies to the content layout without the sidebar.', 'pixwell' ),
							'type'    => 'text',
							'class'   => 'input-small',
							'default' => '',
						],
						[
							'id'      => 'page_title',
							'name'    => esc_html__( 'Page Header', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable the header for this single page.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( 'Default from Theme Option', 'pixwell' ),
								'-1'      => esc_html__( 'Enable', 'pixwell' ),
								'1'       => esc_html__( 'Disable', 'pixwell' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'page_header_layout',
							'name'    => esc_html__( 'Header Layout', 'pixwell' ),
							'desc'    => esc_html__( 'Choose a layout for the header on this single page.', 'pixwell' ),
							'info'    => esc_html__( 'The "Full Background" option requires a featured image.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( 'Default from Theme Option', 'pixwell' ),
								'-1'      => esc_html__( 'Classic', 'pixwell' ),
								'1'       => esc_html__( 'Full Background', 'pixwell' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'page_sidebar_name',
							'name'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
							'desc'    => esc_html__( 'Choose a sidebar to assign to this single page.', 'pixwell' ),
							'options' => pixwell_add_settings_sidebar_name( true ),
							'type'    => 'select',
							'default' => 'default',
						],
						[
							'id'      => 'page_sidebar_pos',
							'name'    => esc_html__( 'Sidebar Position', 'pixwell' ),
							'desc'    => esc_html__( 'Choose a sidebar position for this single page.', 'pixwell' ),
							'class'   => 'sidebar-select',
							'type'    => 'image_select',
							'options' => pixwell_add_settings_meta_sidebar_pos(),
							'default' => 'default',
						],
						[
							'id'      => 'table_contents_page',
							'name'    => esc_html__( 'Table of Contents', 'pixwell' ),
							'desc'    => esc_html__( 'Show table of contents section in the page content.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
								'1'       => esc_html__( 'Enable', 'pixwell' ),
								'-1'      => esc_html__( 'Disable', 'pixwell' ),
							],
						],
						[
							'id'      => 'table_contents_layout',
							'name'    => esc_html__( 'Table of Contents Layout', 'pixwell' ),
							'desc'    => esc_html__( 'Choose a layout style for the table of contents.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( '- Default -', 'pixwell' ),
								'1'       => esc_html__( 'Half Width', 'pixwell' ),
								'2'       => esc_html__( 'Full Width (2 Columns)', 'pixwell' ),
								'3'       => esc_html__( 'Full Width (1 Column)', 'pixwell' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'table_contents_enable',
							'type'    => 'text',
							'name'    => esc_html__( 'Minimum Heading Tags', 'pixwell' ),
							'desc'    => esc_html__( 'Specify the minimum number of heading tags required to display the table of contents.', 'pixwell' ),
							'default' => '',
						],
						[
							'id'      => 'table_contents_position',
							'type'    => 'text',
							'name'    => esc_html__( 'Table of Contents Position', 'pixwell' ),
							'desc'    => esc_html__( 'Enter the position "After X paragraph" to display the table of contents box.', 'pixwell' ),
							'default' => '',
						],
					],
				],
				[
					'id'     => 'pixwell-page-composer',
					'title'  => esc_html__( 'for Ruby Composer', 'pixwell' ),
					'desc'   => esc_html__( 'These settings below will only apply to the "Ruby Composer" page.', 'pixwell' ),
					'icon'   => 'dashicons-awards',
					'fields' => [
						[
							'id'      => 'composer_blog',
							'name'    => esc_html__( 'Latest Blog Section', 'pixwell' ),
							'desc'    => esc_html__( 'Toggle to enable or disable the latest blog section.', 'pixwell' ),
							'info'    => esc_html__( 'This section displays the latest blog posts, similar to index.php, with pagination at the bottom of the page.', 'pixwell' ),
							'type'    => 'select',
							'options' => [
								'-1' => esc_html__( '- Disable -', 'pixwell' ),
								'1'  => esc_html__( 'Enable', 'pixwell' ),
							],
							'default' => '-1',
						],
						[
							'id'      => 'composer_blog_title',
							'name'    => esc_html__( 'Block Heading', 'pixwell' ),
							'desc'    => esc_html__( 'Input a heading for this section.', 'pixwell' ),
							'type'    => 'text',
							'default' => esc_html__( 'The Latest News', 'pixwell' ),
						],
						[
							'id'      => 'composer_blog_layout',
							'name'    => esc_html__( 'Blog Layout', 'pixwell' ),
							'desc'    => esc_html__( 'Select a layout for the blog.', 'pixwell' ),
							'type'    => 'image_select',
							'class'   => 'big',
							'options' => pixwell_add_settings_blog_layouts(),
							'default' => 'classic',
						],
						[
							'id'      => 'composer_blog_posts_per_page',
							'name'    => esc_html__( 'Posts per Page', 'pixwell' ),
							'desc'    => esc_html__( 'Enter the number of posts to display per page.', 'pixwell' ),
							'type'    => 'text',
							'class'   => 'input-small',
							'default' => '6',
						],
						[
							'id'    => 'composer_blog_offset',
							'name'  => esc_html__( 'Post Offset', 'pixwell' ),
							'desc'  => esc_html__( 'Enter an offset (number of posts to skip) for the blog.', 'pixwell' ),
							'type'  => 'text',
							'class' => 'input-small',
						],
						[
							'id'      => 'composer_blog_pagination',
							'name'    => esc_html__( 'Pagination Type', 'pixwell' ),
							'desc'    => esc_html__( 'Choose the pagination style for the blog.', 'pixwell' ),
							'type'    => 'select',
							'options' => pixwell_add_settings_blog_pagination( false ),
							'default' => 'number',
						],
						[
							'id'      => 'composer_blog_sidebar_name',
							'type'    => 'select',
							'name'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
							'desc'    => esc_html__( 'Choose a sidebar to assign to the blog.', 'pixwell' ),
							'info'    => esc_html__( 'The sidebar will not appear in the layout until its position is specified.', 'pixwell' ),
							'options' => pixwell_add_settings_sidebar_name( false ),
							'default' => 'pixwell_sidebar_default',
						],
						[
							'id'      => 'composer_blog_sidebar_pos',
							'name'    => esc_html__( 'Sidebar Position', 'pixwell' ),
							'desc'    => esc_html__( 'Choose the position of the sidebar for the blog.', 'pixwell' ),
							'class'   => 'sidebar-select',
							'type'    => 'image_select',
							'options' => pixwell_add_settings_meta_sidebar_pos(),
							'default' => 'default',
						],
					],
				],
			],
		];
	}
}
