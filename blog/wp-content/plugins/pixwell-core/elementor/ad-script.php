<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use function pixwell_get_adsense;

defined( 'ABSPATH' ) || exit;

/**
 * Class
 *
 * @package pixwellElementor\Widgets
 */
class Ad_Script extends Widget_Base {

	public function get_name() {

		return 'pixwell-ad-script';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Ad Script', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-favorite';
	}

	public function get_categories() {

		return [ 'pixwell-fw' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general', [
				'label' => esc_html__( 'General Settings', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a description for this adverting box.', 'pixwell-core' ),
				'default'     => esc_html__( '- Advertisement -', 'pixwell-core' ),
			]
		);
		$this->add_control(
			'code',
			[
				'label'       => esc_html__( 'Ad/Adsense Code', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input your custom ad or Adsense code. Use Adsense units code to ensure it display exactly where you put. The widget will not work if you are using auto ads.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'size',
			[
				'label'       => esc_html__( 'Ad Size', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select a custom size for this ad if you use adsense ad units.', 'pixwell-core' ),
				'options'     => [
					'0' => esc_html__( 'Do not Override', 'pixwell-core' ),
					'1' => esc_html__( 'Custom Size Below', 'pixwell-core' ),
				],
				'default'     => '0',
			]
		);

		$this->add_control(
			'ad_size_desktop',
			[
				'label'       => esc_html__( 'Size on Desktop', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select a size on the desktop device.', 'pixwell-core' ),
				'options'     => [
					'0'  => esc_html__( 'Hide on Desktop', 'pixwell-core' ),
					'1'  => esc_html__( 'Leaderboard (728x90)', 'pixwell-core' ),
					'2'  => esc_html__( 'Banner (468x60)', 'pixwell-core' ),
					'3'  => esc_html__( 'Half banner (234x60)', 'pixwell-core' ),
					'4'  => esc_html__( 'Button (125x125)', 'pixwell-core' ),
					'5'  => esc_html__( 'Skyscraper (120x600)', 'pixwell-core' ),
					'6'  => esc_html__( 'Wide Skyscraper (160x600)', 'pixwell-core' ),
					'7'  => esc_html__( 'Small Rectangle (180x150)', 'pixwell-core' ),
					'8'  => esc_html__( 'Vertical Banner (120 x 240)', 'pixwell-core' ),
					'9'  => esc_html__( 'Small Square (200x200)', 'pixwell-core' ),
					'10' => esc_html__( 'Square (250x250)', 'pixwell-core' ),
					'11' => esc_html__( 'Medium Rectangle (300x250)', 'pixwell-core' ),
					'12' => esc_html__( 'Large Rectangle (336x280)', 'pixwell-core' ),
					'13' => esc_html__( 'Half Page (300x600)', 'pixwell-core' ),
					'14' => esc_html__( 'Portrait (300x1050)', 'pixwell-core' ),
					'15' => esc_html__( 'Mobile Banner (320x50)', 'pixwell-core' ),
					'16' => esc_html__( 'Large Leaderboard (970x90)', 'pixwell-core' ),
					'17' => esc_html__( 'Billboard (970x250)', 'pixwell-core' ),
				],
				'default'     => '1',
			]
		);
		$this->add_control(
			'ad_size_tablet',
			[
				'label'       => esc_html__( 'Size on Tablet', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select a size on the tablet device.', 'pixwell-core' ),
				'options'     => [
					'0'  => esc_html__( 'Hide on Desktop', 'pixwell-core' ),
					'1'  => esc_html__( 'Leaderboard (728x90)', 'pixwell-core' ),
					'2'  => esc_html__( 'Banner (468x60)', 'pixwell-core' ),
					'3'  => esc_html__( 'Half banner (234x60)', 'pixwell-core' ),
					'4'  => esc_html__( 'Button (125x125)', 'pixwell-core' ),
					'5'  => esc_html__( 'Skyscraper (120x600)', 'pixwell-core' ),
					'6'  => esc_html__( 'Wide Skyscraper (160x600)', 'pixwell-core' ),
					'7'  => esc_html__( 'Small Rectangle (180x150)', 'pixwell-core' ),
					'8'  => esc_html__( 'Vertical Banner (120 x 240)', 'pixwell-core' ),
					'9'  => esc_html__( 'Small Square (200x200)', 'pixwell-core' ),
					'10' => esc_html__( 'Square (250x250)', 'pixwell-core' ),
					'11' => esc_html__( 'Medium Rectangle (300x250)', 'pixwell-core' ),
					'12' => esc_html__( 'Large Rectangle (336x280)', 'pixwell-core' ),
					'13' => esc_html__( 'Half Page (300x600)', 'pixwell-core' ),
					'14' => esc_html__( 'Portrait (300x1050)', 'pixwell-core' ),
					'15' => esc_html__( 'Mobile Banner (320x50)', 'pixwell-core' ),
					'16' => esc_html__( 'Large Leaderboard (970x90)', 'pixwell-core' ),
					'17' => esc_html__( 'Billboard (970x250)', 'pixwell-core' ),
				],
				'default'     => '2',
			]
		);
		$this->add_control(
			'ad_size_mobile',
			[
				'label'       => esc_html__( 'Size on Mobile', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select a size on the mobile device.', 'pixwell-core' ),
				'options'     => [
					'0'  => esc_html__( 'Hide on Desktop', 'pixwell-core' ),
					'1'  => esc_html__( 'Leaderboard (728x90)', 'pixwell-core' ),
					'2'  => esc_html__( 'Banner (468x60)', 'pixwell-core' ),
					'3'  => esc_html__( 'Half banner (234x60)', 'pixwell-core' ),
					'4'  => esc_html__( 'Button (125x125)', 'pixwell-core' ),
					'5'  => esc_html__( 'Skyscraper (120x600)', 'pixwell-core' ),
					'6'  => esc_html__( 'Wide Skyscraper (160x600)', 'pixwell-core' ),
					'7'  => esc_html__( 'Small Rectangle (180x150)', 'pixwell-core' ),
					'8'  => esc_html__( 'Vertical Banner (120 x 240)', 'pixwell-core' ),
					'9'  => esc_html__( 'Small Square (200x200)', 'pixwell-core' ),
					'10' => esc_html__( 'Square (250x250)', 'pixwell-core' ),
					'11' => esc_html__( 'Medium Rectangle (300x250)', 'pixwell-core' ),
					'12' => esc_html__( 'Large Rectangle (336x280)', 'pixwell-core' ),
					'13' => esc_html__( 'Half Page (300x600)', 'pixwell-core' ),
					'14' => esc_html__( 'Portrait (300x1050)', 'pixwell-core' ),
					'15' => esc_html__( 'Mobile Banner (320x50)', 'pixwell-core' ),
					'16' => esc_html__( 'Large Leaderboard (970x90)', 'pixwell-core' ),
					'17' => esc_html__( 'Billboard (970x250)', 'pixwell-core' ),
				],
				'default'     => '3',
			]
		);
		$this->end_controls_section();
	}

	/**
	 * render layout
	 */
	protected function render() {

		if ( function_exists( 'pixwell_get_adsense' ) ) {
			$settings               = $this->get_settings();
			$settings['uuid']       = 'uid_' . $this->get_id();
			$settings['no_spacing'] = true;
			echo pixwell_get_adsense( $settings );
		}
	}
}