<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'pixwell_widget_follower' ) ) :
	class pixwell_widget_follower extends WP_Widget {

		function __construct() {

			$widget_ops = [
				'classname'   => 'widget-social-follower',
				'description' => esc_html__( '[Sidebar Widget] Display your social URL with total of followers', 'pixwell-core' ),
			];

			parent::__construct( 'pixwell_widget_follower', esc_html__( '- [SIDEBAR] - Social Follower -', 'pixwell-core' ), $widget_ops );
		}

		function widget( $args, $instance ) {

			$instance = wp_parse_args( $instance, [
				'title'           => '',
				'facebook_page'   => '',
				'facebook_api'    => '',
				'facebook_count'  => '',
				'twitter_user'    => '',
				'twitter_count'   => '',
				'pinterest_user'  => '',
				'pinterest_count' => '',
				'instagram_user'  => '',
				'instagram_count' => '',
				'telegram_link'   => '',
				'telegram_count'  => '',
				'tiktok_link'     => '',
				'tiktok_count'    => '',
			] );

			$instance['title'] = apply_filters( 'widget_title', $instance['title'], 12 );

			echo $args['before_widget'];

			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . $instance['title'] . $args['after_title'];
			} ?>
			<div class="social-follower is-light-text">
				<?php if ( ! empty( $instance['facebook_page'] ) ) : ?>
					<div class="follower-el bg-facebook">
						<a target="_blank" href="https://facebook.com/<?php echo esc_html( $instance['facebook_page'] ); ?>" class="facebook" title="Facebook" rel="noopener nofollow"></a>
						<span class="left-el">
							<span class="follower-icon"><i class="rbi rbi-facebook" aria-hidden="true"></i></span>
							<?php
							$data         = [
								'facebook_page' => $instance['facebook_page'],
								'facebook_api'  => $instance['facebook_api'],
								'default'       => $instance['facebook_count'],
								'widget_id'     => $args['widget_id'],
							];
							$facebook_fan = pixwell_follower_fb( $data );
							if ( ! empty( $facebook_fan ) ) : ?>
								<span class="num-count h6"><?php echo pixwell_pretty_number( $facebook_fan ) ?></span>
								<span class="text-count h6"><?php echo pixwell_translate( 'fans' ); ?></span>
							<?php else : ?>
								<span class="num-count h6"><?php echo pixwell_translate( 'facebook' ); ?></span>
							<?php endif; ?>
						</span>
						<span class="right-el"><?php echo pixwell_translate( 'like' ); ?></span>
					</div>
				<?php endif;

				/** twitter counter */
				if ( ! empty( $instance['twitter_user'] ) ) :
					$data = [
						'user'      => $instance['twitter_user'],
						'default'   => $instance['twitter_count'],
						'widget_id' => $args['widget_id'],
					];
					$twitter_follower = pixwell_follower_twitter( $data ); ?>
					<div class="follower-el bg-twitter">
						<a target="_blank" href="https://twitter.com/<?php echo esc_html( $instance['twitter_user'] ); ?>" class="twitter" title="Twitter" rel="noopener nofollow"></a>
						<span class="left-el">
							<span class="follower-icon"><i class="rbi rbi-x-twitter" aria-hidden="true"></i></span>
							<?php if ( ! empty( $twitter_follower ) ) : ?>
								<span class="num-count h6"><?php echo pixwell_pretty_number( $twitter_follower ); ?></span>
								<span class="text-count h6"><?php echo pixwell_translate( 'followers' ); ?></span>
							<?php else : ?>
								<span class="num-count h6"><?php echo pixwell_translate( 'twitter' ); ?></span>
							<?php endif; ?>
						</span>
						<span class="right-el"><?php echo pixwell_translate( 'follow' ); ?></span>
					</div>
				<?php endif;

				/** Pinterest count */
				if ( ! empty( $instance['pinterest_user'] ) ) :
					$data = [
						'user'      => $instance['pinterest_user'],
						'default'   => $instance['pinterest_count'],
						'widget_id' => $args['widget_id'],
					];
					$pinterest_follower = pixwell_follower_pin( $data ); ?>
					<div class="follower-el bg-pinterest">
						<a target="_blank" href="https://pinterest.com/<?php echo esc_html( $instance['pinterest_user'] ); ?>" class="pinterest" title="Pinterest" rel="noopener nofollow"></a>
						<span class="left-el">
							<span class="follower-icon"><i class="rbi rbi-pinterest-i" aria-hidden="true"></i></span>
							<?php if ( ! empty( $pinterest_follower ) ) : ?>
								<span class="num-count h6"><?php echo pixwell_pretty_number( $pinterest_follower ); ?></span>
								<span class="text-count h6"><?php echo pixwell_translate( 'followers' ); ?></span>
							<?php else : ?>
								<span class="num-count h6"><?php echo pixwell_translate( 'pinterest' ); ?></span>
							<?php endif; ?>
						</span>
						<span class="right-el"><?php echo pixwell_translate( 'pin' ); ?></span>
					</div>
				<?php endif;

				if ( ! empty( $instance['instagram_user'] ) ) :
					if ( ! empty( $instance['instagram_count'] ) ) {
						$instagram_follower = intval( $instance['instagram_count'] );
					} ?>
					<div class="follower-el bg-instagram">
						<a target="_blank" href="https://instagram.com/<?php echo esc_html( $instance['instagram_user'] ); ?>" class="instagram" title="Instagram" rel="noopener nofollow"></a>
						<span class="left-el">
								<span class="follower-icon"><i class="rbi rbi-instagram" aria-hidden="true"></i></span>
								<?php if ( ! empty( $instagram_follower ) ) : ?>
									<span class="num-count h6"><?php echo pixwell_pretty_number( $instagram_follower ); ?></span>
									<span class="text-count h6"><?php echo pixwell_translate( 'followers' ); ?></span>
								<?php else : ?>
									<span class="num-count h6"><?php echo pixwell_translate( 'instagram' ); ?></span>
								<?php endif; ?>
							</span>
						<span class="right-el"><?php echo pixwell_translate( 'follow' ); ?></span>
					</div>
				<?php endif;

				if ( ! empty( $instance['telegram_link'] ) ) :
					if ( ! empty( $instance['telegram_count'] ) ) {
						$telegram_follower = intval( $instance['telegram_count'] );
					} ?>
					<div class="follower-el bg-telegram">
						<a target="_blank" href="<?php echo esc_html( $instance['telegram_link'] ); ?>" class="telegram" title="Telegram" rel="noopener nofollow"></a>
						<span class="left-el">
								<span class="follower-icon"><i class="rbi rbi-telegram" aria-hidden="true"></i></span>
								<?php if ( ! empty( $telegram_follower ) ) : ?>
									<span class="num-count h6"><?php echo pixwell_pretty_number( $telegram_follower ); ?></span>
									<span class="text-count h6"><?php echo pixwell_translate( 'members' ); ?></span>
								<?php else : ?>
									<span class="num-count h6"><?php echo pixwell_translate( 'telegram' ); ?></span>
								<?php endif; ?>
							</span>
						<span class="right-el"><?php echo pixwell_translate( 'join' ); ?></span>
					</div>
				<?php endif;

				if ( ! empty( $instance['tiktok_link'] ) ) :
					if ( ! empty( $instance['tiktok_count'] ) ) {
						$telegram_follower = intval( $instance['tiktok_count'] );
					} ?>
					<div class="follower-el bg-tiktok">
						<a target="_blank" href="<?php echo esc_html( $instance['tiktok_link'] ); ?>" class="tiktok" title="tiktok" rel="noopener nofollow"></a>
						<span class="left-el">
						<span class="follower-icon"><i class="rbi rbi-tiktok" aria-hidden="true"></i></span>
							<?php if ( ! empty( $telegram_follower ) ) : ?>
								<span class="num-count h6"><?php echo pixwell_pretty_number( $telegram_follower ); ?></span>
								<span class="text-count h6"><?php echo pixwell_translate( 'followers' ); ?></span>
							<?php else : ?>
								<span class="num-count h6"><?php echo pixwell_translate( 'tiktok' ); ?></span>
							<?php endif; ?>
                         </span>
						<span class="right-el"><?php echo pixwell_translate( 'follow' ); ?></span>
					</div>
				<?php endif; ?>
			</div>
			<?php echo $args['after_widget'];
		}

		function update( $new_instance, $old_instance ) {

			$instance                    = $old_instance;
			$instance['title']           = strip_tags( $new_instance['title'] );
			$instance['facebook_page']   = strip_tags( $new_instance['facebook_page'] );
			$instance['facebook_api']    = strip_tags( $new_instance['facebook_api'] );
			$instance['facebook_count']  = strip_tags( $new_instance['facebook_count'] );
			$instance['twitter_user']    = strip_tags( $new_instance['twitter_user'] );
			$instance['twitter_count']   = strip_tags( $new_instance['twitter_count'] );
			$instance['pinterest_user']  = strip_tags( $new_instance['pinterest_user'] );
			$instance['pinterest_count'] = strip_tags( $new_instance['pinterest_count'] );
			$instance['instagram_user']  = strip_tags( $new_instance['instagram_user'] );
			$instance['instagram_count'] = strip_tags( $new_instance['instagram_count'] );
			$instance['telegram_link']   = strip_tags( $new_instance['telegram_link'] );
			$instance['telegram_count']  = strip_tags( $new_instance['telegram_count'] );
			$instance['tiktok_link']     = strip_tags( $new_instance['tiktok_link'] );
			$instance['tiktok_count']    = strip_tags( $new_instance['tiktok_count'] );

			delete_transient( 'social_follower' );

			return $instance;
		}

		function form( $instance ) {

			$defaults = [
				'title'           => '',
				'facebook_page'   => '',
				'facebook_api'    => '',
				'facebook_count'  => '',
				'twitter_user'    => '',
				'twitter_count'   => '',
				'pinterest_user'  => '',
				'pinterest_count' => '',
				'instagram_user'  => '',
				'instagram_count' => '',
				'telegram_link'   => '',
				'telegram_count'  => '',
				'tiktok_link'     => '',
				'tiktok_count'    => '',
			];
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Widget Title', 'pixwell-core' ) ?></strong></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php if ( ! empty( $instance['title'] ) ) {
					echo esc_attr( $instance['title'] );
				} ?>"/>
			</p>
			<h3><?php esc_html_e( 'Facebook Settings', 'pixwell-core' ) ?></h3>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'facebook_page' ) ); ?>"><strong><?php esc_html_e( 'FanPage Name', 'pixwell-core' ); ?></strong></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook_page' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook_page' ) ); ?>" value="<?php echo esc_attr( $instance['facebook_page'] ); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'facebook_api' ) ); ?>"><?php esc_html_e( 'Facebook App Token', 'pixwell-core' ); ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook_api' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook_api' ) ); ?>" value="<?php echo esc_attr( $instance['facebook_api'] ); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'facebook_count' ) ); ?>"><strong><?php esc_html_e( 'Fallback Counter Value', 'pixwell-core' ); ?></strong></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook_count' ) ); ?>" value="<?php echo esc_attr( $instance['facebook_count'] ); ?>"/>
			</p>
			<p><?php esc_html_e( 'Input a fallback value for the total number of fans. This value will be displayed when the token expires or does not work as expected.', 'pixwell-core' ); ?></p>
			<h3><?php esc_html_e( 'Twitter Settings', 'pixwell-core' ) ?></h3>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'twitter_user' ) ); ?>"><strong><?php esc_html_e( 'Twitter Name', 'pixwell-core' ); ?></strong></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter_user' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_user' ) ); ?>" value="<?php echo esc_attr( $instance['twitter_user'] ); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'twitter_count' ) ); ?>"><strong><?php esc_html_e( 'Fallback Counter Value', 'pixwell-core' ); ?></strong></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_count' ) ); ?>" value="<?php echo esc_attr( $instance['twitter_count'] ); ?>"/>
			</p>
			<p><?php esc_html_e( 'Input a fallback value for the total number of fans. This value will be displayed when the token expires or does not work as expected.', 'pixwell-core' ); ?></p>
			<h3><?php esc_html_e( 'Pinterest Settings', 'pixwell-core' ) ?></h3>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest_user' ) ); ?>"><strong><?php esc_html_e( 'Pinterest User Name', 'pixwell-core' ); ?></strong>
				</label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest_user' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest_user' ) ); ?>" value="<?php echo esc_attr( $instance['pinterest_user'] ); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest_count' ) ); ?>"><strong><?php esc_html_e( 'Fallback Counter Value', 'pixwell-core' ); ?></strong></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest_count' ) ); ?>" value="<?php echo esc_attr( $instance['pinterest_count'] ); ?>"/>
			</p>
			<p><?php esc_html_e( 'Input a fallback value for the total number of fans. This value will be displayed when the counter code does not work as expected.', 'pixwell-core' ); ?></p>
			<h3><?php esc_html_e( 'Instagram Settings', 'pixwell-core' ) ?></h3>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'instagram_user' ) ); ?>"><strong><?php esc_html_e( 'Instagram User Name', 'pixwell-core' ); ?></strong>
				</label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram_user' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram_user' ) ); ?>" value="<?php echo esc_attr( $instance['instagram_user'] ); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'instagram_count' ) ); ?>"><strong><?php esc_html_e( 'Instagram Follower Value', 'pixwell-core' ); ?></strong></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram_count' ) ); ?>" value="<?php echo esc_attr( $instance['instagram_count'] ); ?>"/>
			</p>
			<h3><?php esc_html_e( 'Telegram Settings', 'pixwell-core' ) ?></h3>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'telegram_link' ) ); ?>"><strong><?php esc_html_e( 'Telegram Channel or Invite URL', 'pixwell-core' ); ?></strong>
				</label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'telegram_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'telegram_link' ) ); ?>" value="<?php echo esc_html( $instance['telegram_link'] ); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'telegram_count' ) ); ?>"><strong><?php esc_html_e( 'Telegram Members Value', 'pixwell-core' ); ?></strong></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'telegram_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'telegram_count' ) ); ?>" value="<?php echo esc_attr( $instance['telegram_count'] ); ?>"/>
			</p>
			<h3><?php esc_html_e( 'Tiktok Settings', 'pixwell-core' ) ?></h3>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'tiktok_link' ) ); ?>"><strong><?php esc_html_e( 'Tiktok Page URL', 'pixwell-core' ); ?></strong>
				</label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tiktok_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tiktok_link' ) ); ?>" value="<?php echo esc_html( $instance['tiktok_link'] ); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'tiktok_count' ) ); ?>"><strong><?php esc_html_e( 'Tiktok Members Value', 'pixwell-core' ); ?></strong></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tiktok_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tiktok_count' ) ); ?>" value="<?php echo esc_attr( $instance['tiktok_count'] ); ?>"/>
			</p>
			<?php
		}
	}
endif;