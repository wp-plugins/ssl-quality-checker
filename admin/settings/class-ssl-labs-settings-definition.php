<?php
/**
 *
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    SSL_Labs
 * @subpackage SSL_Labs/includes
 */

/**
 * The Settings definition of the plugin.
 *
 *
 * @package    SSL_Labs
 * @subpackage SSL_Labs/includes
 * @author     Your Name <email@example.com>
 */
class SSL_Labs_Settings_Definition {

	public static $plugin_name = 'ssl-labs';

	/**
	 * [apply_tab_slug_filters description]
	 *
	 * @param  array $default_settings [description]
	 *
	 * @return array                   [description]
	 */
	static private function apply_tab_slug_filters( $default_settings ) {

		$extended_settings[] = array();
		$extended_tabs       = self::get_tabs();

		foreach ( $extended_tabs as $tab_slug => $tab_desc ) {

			$options = isset( $default_settings[ $tab_slug ] ) ? $default_settings[ $tab_slug ] : array();

			$extended_settings[ $tab_slug ] = apply_filters( 'ssl_quality_checker_settings_' . $tab_slug, $options );
		}

		return $extended_settings;
	}

	/**
	 * [get_default_tab_slug description]
	 * @return [type] [description]
	 */
	static public function get_default_tab_slug() {

		return key( self::get_tabs() );
	}

	/**
	 * Retrieve settings tabs
	 *
	 * @since    1.0.0
	 * @return    array    $tabs    Settings tabs
	 */
	static public function get_tabs() {

		$tabs                = array();
		$tabs['default_tab'] = __( 'Settings', self::$plugin_name );
//		$tabs['second_tab']  = __( 'Second Tab', self::$plugin_name );
//        $tabs['third_tab']  = __( 'Third Tab', self::$plugin_name );

		return apply_filters( 'ssl_quality_checker_settings_tabs', $tabs );
	}

	/**
	 * 'Whitelisted' SSL_Labs settings, filters are provided for each settings
	 * section to allow extensions and other plugins to add their own settings
	 *
	 *
	 * @since    1.0.0
	 * @return    mixed    $value    Value saved / $default if key if not exist
	 */
	static public function get_settings() {

		$settings[] = array();

//		$settings = array(
//			'default_tab' => array(
//				'default_tab_settings'       => array(
//					'name' => '<strong>' . __( 'Header', self::$plugin_name ) . '</strong>',
//					'type' => 'header'
//				),
//				'missing_callback'           => array(
//					'name' => '<strong>' . __( 'Missing Callback', self::$plugin_name ) . '</strong>',
//					'type' => 'non-exisit'
//				),
//				'checkbox'                   => array(
//					'name' => __( 'Checkbox', self::$plugin_name ),
//					'desc' => __( 'Checkbox', self::$plugin_name ),
//					'type' => 'checkbox'
//				),
//				'multicheck'                 => array(
//					'name'    => __( 'Multicheck', self::$plugin_name ),
//					'desc'    => __( 'Multicheck with 3 options', self::$plugin_name ),
//					'options' => array(
//						'wp-human'   => __( "I read the <a href='https://wphuman.com/blog/'>WP Human Blog</a>", self::$plugin_name ),
//						'tang-rufus' => __( "<a href='http://tangrufus.com/'>Tang Rufus' Blog</a> looks great", self::$plugin_name ),
//						'Filter'     => __( 'You can apply filters on this option!', self::$plugin_name )
//					),
//					'type'    => 'multicheck'
//				),
//				'multicheck_without_options' => array(
//					'name' => __( 'Multicheck', self::$plugin_name ),
//					'desc' => __( 'Multicheck without options', self::$plugin_name ),
//					'type' => 'multicheck'
//				),
//				'radio'                      => array(
//					'name'    => __( 'Radio', self::$plugin_name ),
//					'desc'    => __( 'Radio with 3 options', self::$plugin_name ),
//					'options' => array(
//						'wp-human'   => __( "I read the <a href='https://wphuman.com/blog/'>WP Human Blog</a>", self::$plugin_name ),
//						'tang-rufus' => __( "<a href='http://tangrufus.com/'>Tang Rufus' Blog</a> looks great", self::$plugin_name ),
//						'Filter'     => __( 'You can apply filters on this option!', self::$plugin_name )
//					),
//					'type'    => 'radio'
//				),
//				'radio_without_options'      => array(
//					'name' => __( 'Radio', self::$plugin_name ),
//					'desc' => __( 'Radio without options', self::$plugin_name ),
//					'type' => 'radio'
//				),
//				'text'                       => array(
//					'name' => __( 'Text', self::$plugin_name ),
//					'desc' => __( 'Text', self::$plugin_name ),
//					'type' => 'text'
//				),
//				'text_with_std'              => array(
//					'name' => __( 'Text with std', self::$plugin_name ),
//					'desc' => __( 'Text with std', self::$plugin_name ),
//					'std'  => __( 'std will be saved!', self::$plugin_name ),
//					'type' => 'text'
//				),
//				'email'                      => array(
//					'name' => __( 'Email', self::$plugin_name ),
//					'desc' => __( 'Email', self::$plugin_name ),
//					'type' => 'email'
//				),
//				'url'                        => array(
//					'name' => __( 'URL', self::$plugin_name ),
//					'desc' => __( 'By default, only http & https are allowed', self::$plugin_name ),
//					'type' => 'url'
//				),
//				'password'                   => array(
//					'name' => __( 'Password', self::$plugin_name ),
//					'desc' => __( 'Password', self::$plugin_name ),
//					'type' => 'password'
//				),
//				'number'                     => array(
//					'name' => __( 'Number', self::$plugin_name ),
//					'desc' => __( 'Number', self::$plugin_name ),
//					'type' => 'number'
//				),
//				'number_with_attributes'     => array(
//					'name' => __( 'Number', self::$plugin_name ),
//					'desc' => __( 'Max: 1000, Min: 20, Step: 30', self::$plugin_name ),
//					'max'  => 1000,
//					'min'  => 20,
//					'step' => 30,
//					'type' => 'number'
//				),
//				'textarea'                   => array(
//					'name' => __( 'Textarea', self::$plugin_name ),
//					'desc' => __( 'Textarea', self::$plugin_name ),
//					'type' => 'textarea'
//				),
//				'textarea_with_std'          => array(
//					'name' => __( 'Textarea with std', self::$plugin_name ),
//					'desc' => __( 'Textarea with std', self::$plugin_name ),
//					'std'  => __( 'std will be saved!', self::$plugin_name ),
//					'type' => 'textarea'
//				),
//				'select'                     => array(
//					'name'    => __( 'Select', self::$plugin_name ),
//					'desc'    => __( 'Select with 3 options', self::$plugin_name ),
//					'options' => array(
//						'wp-human'   => __( "I read the <a href='https://wphuman.com/blog/'>WP Human Blog</a>", self::$plugin_name ),
//						'tang-rufus' => __( "<a href='http://tangrufus.com/'>Tang Rufus' Blog</a> looks great", self::$plugin_name ),
//						'Filter'     => __( 'You can apply filters on this option!', self::$plugin_name )
//					),
//					'type'    => 'select'
//				),
//				'rich_editor'                => array(
//					'name' => __( 'Rich Editor', self::$plugin_name ),
//					'desc' => __( 'Rich Editor save as HTML markups', self::$plugin_name ),
//					'type' => 'rich_editor'
//				),
//			),
//			'second_tab'  => array(
//				'extend_me' => array(
//					'name' => 'Extend me',
//					'desc' => __( 'You can extend me via hooks and filters.', self::$plugin_name ),
//					'type' => 'text'
//				)
//			),
//            'third_tab' => array(
//                'shane_field' => array(
//                    'name' => 'Field Label',
//                    'desc' => __('Field description.', self::$plugin_name),
//                    'type' => 'email'
//                )
//
//            )
//
//		);
        $settings['default_tab']['email_site_admin'] = array(
            'name' => __( 'Email Site Admin', self::$plugin_name ),
            'desc' => __( 'Email report to the site administrator', self::$plugin_name ),
            'type' => 'checkbox'
        );
        $settings['default_tab']['email_address'] = array(
            'name' => __( 'Email Address', self::$plugin_name ),
            'desc' => __( 'Email address to send notifications. Leave blank to not send email notifications', self::$plugin_name ),
            'type' => 'email'
        );

        $settings['default_tab']['expected_grade'] = array(
            'name' => __( 'Minimum Grading', self::$plugin_name ),
            'desc' => __( 'Notify me if grade Is below the specified grade. Note: It is best to aim for a grade of B or above', self::$plugin_name ),
            'options' => array(
                'A+'    => __( "A+", self::$plugin_name ),
                'A-'    => __( "A-", self::$plugin_name ),
                'A'     => __( 'A', self::$plugin_name ),
                'B'     => __( 'B', self::$plugin_name ),
                'C'     => __( 'C', self::$plugin_name )
            ),
            'type' => 'select'
        );

		$settings['default_tab']['cronschedule'] = array(
			'name' => __('Scan Schedule', self::$plugin_name),
			'desc' => __('Set the time interval for the SSL checks', self::$plugin_name),
			'options' => array(
				'daily' => __('Daily', self::$plugin_name),
				'weekly' => array(__('Weekly', self::$plugin_name), true),
				'monthly' => __('Monthly', self::$plugin_name),
				'never' =>  __('Never', self::$plugin_name)
			),
			'type' => 'select'
		);
        $settings['default_tab']['force_email_send'] = array(
            'name' => __('Send email after each scan', self::$plugin_name),
            'desc' => __('Sends an email after each scan', self::$plugin_name),
            'type' => 'checkbox'
        );

		return self::apply_tab_slug_filters( $settings );
	}
}
