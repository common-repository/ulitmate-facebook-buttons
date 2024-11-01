<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://witoni.com
 * @since      1.0.0
 *
 * @package    ultimate_facebook_buttons
 * @subpackage ultimate_facebook_buttons/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    ultimate_facebook_buttons
 * @subpackage ultimate_facebook_buttons/admin
 * @author     Your Name <support@witoni.com>
 */
class ultimate_facebook_buttons_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $ultimate_facebook_buttons    The ID of this plugin.
	 */
	private $ultimate_facebook_buttons;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $ultimate_facebook_buttons       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $ultimate_facebook_buttons, $version ) {

		$this->ultimate_facebook_buttons = $ultimate_facebook_buttons;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ultimate_facebook_buttons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ultimate_facebook_buttons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
        wp_enqueue_media(); /** Load WP Styles For Image Upload Popup **/
		wp_enqueue_style( $this->ultimate_facebook_buttons, plugin_dir_url( __FILE__ ) . 'css/ultimate-facebook-buttons-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ultimate_facebook_buttons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ultimate_facebook_buttons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->ultimate_facebook_buttons, plugin_dir_url( __FILE__ ) . 'js/ultimate-facebook-buttons-admin.js', array( 'jquery' ), $this->version, false );

	}
    
    
    /**
     * Register UFB Settings
     * Panel In Admin Menu
     * 
     * @since 1.0.0
     */
    public function register_ufb_settings_panel() {
       add_menu_page(
        __( 'Ultimate Facbook Button', 'ultimate-facebook-buttons' ),
        'Ultimate Facebook Buttons',
        'manage_options',
        'ultimate-facebook-buttons',
        array($this, 'ultimate_facebook_buttons_callback' ),
        'dashicons-facebook',
        6
       );
    }
    
    
    
    
    
    /**
     * Settings Panel
     * Callback Function
     * 
     * @since 1.0.0
     */
    public function ultimate_facebook_buttons_callback() {
       
       include_once 'partials/ultimate-facebook-buttons-admin-display.php';
    }
    
    
    
    
    
    /**
	 * Render the UFB 
     * Profile Settings
     *  
	 * @since  1.0.0
	 */
    public function profile_settings() {
    
	//register our settings
	register_setting( 'ufb-profile-settings-group', 'ufb-profile-name' );
    register_setting( 'ufb-profile-settings-group', 'ufb-profile-image' );
    register_setting( 'ufb-profile-settings-group', 'ufb-profile-upload' );
    
   }
   
   
   
   
   
   /**
	 * Render the UFB 
     * Button Settings
     *  
	 * @since  1.0.0
	 */
    public function button_settings() {
    
	//register our settings
	register_setting( 'ufb-button-settings-group', 'ufb-btn-settings-like' );
    register_setting( 'ufb-button-settings-group', 'ufb-btn-settings-share' );
    register_setting( 'ufb-button-settings-group', 'ufb-btn-settings-profile-link' );
    register_setting( 'ufb-button-settings-group', 'ufb-btn-size' );
    register_setting( 'ufb-button-settings-group', 'ufb-btn-position-ac' );
    register_setting( 'ufb-button-settings-group', 'ufb-btn-position-bc' );
    register_setting( 'ufb-button-settings-group', 'ufb-btn-excerpt-status' );
    register_setting( 'ufb-button-settings-group', 'ufb-shr-image' );
    register_setting( 'ufb-button-settings-group', 'ufb-shr-custom-img' );
    register_setting( 'ufb-button-settings-group', 'ufb-shr-description' );
    
   }
   
   
   
   
   
   
  /**
    * Render the UFB 
    * Like Button Settings
    *  
    * @since  1.0.0
    */
    public function like_settings() {
    
    //register our settings
    register_setting( 'ufb-like-settings-group', 'ufb-like-btn-layout' );
    register_setting( 'ufb-like-settings-group', 'ufb-like-btn-action' );
    
    } 
    
    
    
    
    
    
   /**
    * Render the UFB 
    * Display Button Settings
    *  
    * @since  1.0.0
    */
    public function display_settings() {
    
    //register our settings
    register_setting( 'ufb-display-settings-group', 'display-buttons-posts' );
    register_setting( 'ufb-display-settings-group', 'display-buttons-pages' );
    register_setting( 'ufb-display-settings-group', 'display-buttons-excerpts' );
    register_setting( 'ufb-display-settings-group', 'display-buttons-front' );
    register_setting( 'ufb-display-settings-group', 'display-buttons-archive' );
    
    } 
    
    


}

