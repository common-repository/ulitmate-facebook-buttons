<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://witoni.com
 * @since      1.0.0
 *
 * @package    ultimate_facebook_buttons
 * @subpackage ultimate_facebook_buttons/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    ultimate_facebook_buttons
 * @subpackage ultimate_facebook_buttons/public
 * @author     Your Name <support@witoni.com>
 */
class ultimate_facebook_buttons_Public {

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
	 * @param      string    $ultimate_facebook_buttons       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $ultimate_facebook_buttons, $version ) {

		$this->ultimate_facebook_buttons = $ultimate_facebook_buttons;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->ultimate_facebook_buttons, plugin_dir_url( __FILE__ ) . 'css/ultimate-facebook-buttons-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->ultimate_facebook_buttons, plugin_dir_url( __FILE__ ) . 'js/ultimate-facebook-buttons-public.js', array( 'jquery' ), $this->version, false );

	}
    
    
    
    
    
    
    /**
     * Load FB SDK
     * For JS
     * 
     * @since 1.0.0
     */
   public function fb_script(){
    
   echo '
       <div id="fb-root"></div>
       <script>(function(d, s, id) {
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) return;
       js = d.createElement(s); js.id = id;
       js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=333213557177973";
       fjs.parentNode.insertBefore(js, fjs);
       }(document, "script", "facebook-jssdk"));</script>
       ';
    
   }  
   
   
   
    
    
    /**
      * Display the
      * FB Buttons In Front-Page 
      * 
      * @since 1.0.0
      */
      public function display_buttons($content){
        
        
        
        if ( is_single() ) {
            
        global $top_buttons, $bottom_buttons;
         
        require_once 'partials/ultimate-facebook-buttons-public-variables.php';
         
             
            
        if( $get_btn_settings_profile == "profile" && $get_profile_name != "") {
         
         $profile_button = '<div class="ufb-btns"><ul><li class="fb_page"><a href="https://www.facebook.com/'.$get_profile_name.'/" target="_blank"><img src="'.plugin_dir_url(__FILE__).'/images/connect.png" class="ufb-btn-follow" /></a></li>';
         
         }
         
         
         if( isset($get_btn_settings_like) && ($get_btn_settings_like == "like" && $get_profile_name != "" )){
         
            
         $like_button =  '<li><div class="fb-like" data-href="http://facebook.com/'.$get_profile_name.'/" data-layout="'.$get_like_btn_layout.'" data-action="'.$get_like_btn_action.'" data-size="'.$get_like_btn_size.'" data-show-faces="false"></div></li>';
         
         }
         
         
         if( isset($get_btn_settings_share) && ($get_btn_settings_share == "share" && $get_profile_name != "" )){
         
         $current_url = "//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];    
          
         $share_button = '<li class="fb_share_btn"><div class="fb-share-button" data-href="'.$current_url.'" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ffacebook.com%2Fwitonisoftwares%2F&amp;src=sdkpreparse">Share</a></div></li></ul></div>';
         
         }
             
        
        
        
         if(isset($get_btn_position_posts) && $get_btn_position_posts == "top-bottom"){
            
         $top_buttons = $profile_button.$like_button.$share_button;
         
         $bottom_buttons = $profile_button.$like_button.$share_button;             
         
         }
         
         
         if(isset($get_btn_position_posts) && $get_btn_position_posts == "top"){
            
         $top_buttons = $profile_button.$like_button.$share_button;
         
         }
         
         
         if(isset($get_btn_position_posts) && $get_btn_position_posts == "bottom"){
            
         $bottom_buttons = $profile_button.$like_button.$share_button; 
         
         }
         
         
         if(isset($get_btn_position_posts) && $get_btn_position_posts == "none"){
         
         $top_buttons = '';   
         $bottom_buttons = ''; 
         
         }
         
         
         return $top_buttons.$content.$bottom_buttons;
            
        }
        
        
        
        
        if ( is_page() ) {
            
        global $top_buttons, $bottom_buttons;
         
        require_once 'partials/ultimate-facebook-buttons-public-variables.php';
         
             
            
        if( $get_btn_settings_profile == "profile" && $get_profile_name != "") {
         
         $profile_button = '<ul><li class="fb_page"><a href="https://www.facebook.com/'.$get_profile_name.'/" target="_blank"><img src="'.plugin_dir_url(__FILE__).'/images/connect.png" /></a></li>';
         
         }
         
         
         if( isset($get_btn_settings_like) && ($get_btn_settings_like == "like" && $get_profile_name != "" )){
         
            
         $like_button =  '<li><div class="fb-like" data-href="http://facebook.com/'.$get_profile_name.'/" data-layout="'.$get_like_btn_layout.'" data-action="'.$get_like_btn_action.'" data-size="'.$get_like_btn_size.'" data-show-faces="false"></div></li>';
         
         }
         
         
         if( isset($get_btn_settings_share) && ($get_btn_settings_share == "share" && $get_profile_name != "" )){
            
         $current_url = "//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];   
          
         $share_button = '<li class="fb_share_btn"><div class="fb-share-button" data-href="'.$current_url.'" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ffacebook.com%2Fwitonisoftwares%2F&amp;src=sdkpreparse">Share</a></div></li></ul>';
         
         }
             
        
        
        
         if(isset($get_btn_position_pages) && $get_btn_position_pages == "top-bottom"){
            
         $top_buttons = $profile_button.$like_button.$share_button;
         
         $bottom_buttons = $profile_button.$like_button.$share_button;             
         
         }
         
         
         if(isset($get_btn_position_pages) && $get_btn_position_pages == "top"){
            
         $top_buttons = $profile_button.$like_button.$share_button;
         
         }
         
         
         if(isset($get_btn_position_pages) && $get_btn_position_pages == "bottom"){
            
         $bottom_buttons = $profile_button.$like_button.$share_button; 
         
         }
         
         if(isset($get_btn_position_pages) && $get_btn_position_pages == "none"){
         
         $top_buttons = '';   
         $bottom_buttons = ''; 
         
         }
     
         
         return $top_buttons.$content.$bottom_buttons;
            
        }
        
        
        
        
        
        if ( is_archive() ) {
            
        global $top_buttons, $bottom_buttons;
         
        require_once 'partials/ultimate-facebook-buttons-public-variables.php';
         
             
            
        if( $get_btn_settings_profile == "profile" && $get_profile_name != "") {
         
         $profile_button = '<ul><li class="fb_page"><a href="https://www.facebook.com/'.$get_profile_name.'/" target="_blank"><img src="'.plugin_dir_url(__FILE__).'/images/connect.png" /></a></li>';
         
         }
         
         
         if( isset($get_btn_settings_like) && ($get_btn_settings_like == "like" && $get_profile_name != "" )){
         
            
         $like_button =  '<li><div class="fb-like" data-href="http://facebook.com/'.$get_profile_name.'/" data-layout="'.$get_like_btn_layout.'" data-action="'.$get_like_btn_action.'" data-size="'.$get_like_btn_size.'" data-show-faces="false"></div></li>';
         
         }
         
         
         if( isset($get_btn_settings_share) && ($get_btn_settings_share == "share" && $get_profile_name != "" )){
            
         $current_url = "//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];   
          
         $share_button = '<li class="fb_share_btn"><div class="fb-share-button" data-href="'.$current_url.'" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ffacebook.com%2Fwitonisoftwares%2F&amp;src=sdkpreparse">Share</a></div></li></ul>';
         
         }
             
        
        
        
         if(isset($get_btn_position_archive) && $get_btn_position_archive == "top-bottom"){
            
         $top_buttons = $profile_button.$like_button.$share_button;
         
         $bottom_buttons = $profile_button.$like_button.$share_button;             
         
         }
         
         
         if(isset($get_btn_position_archive) && $get_btn_position_archive == "top"){
            
         $top_buttons = $profile_button.$like_button.$share_button;
         
         }
         
         
         if(isset($get_btn_position_archive) && $get_btn_position_archive == "bottom"){
            
         $bottom_buttons = $profile_button.$like_button.$share_button; 
         
         }
         
         
         if(isset($get_btn_position_archive) && $get_btn_position_archive == "none"){
         
         $top_buttons = '';   
         $bottom_buttons = ''; 
         
         }
         
         
         return $top_buttons.$content.$bottom_buttons;
            
        }
        
        
        
        
        
        if ( is_home() ) {
            
        global $top_buttons, $bottom_buttons;
         
        require_once 'partials/ultimate-facebook-buttons-public-variables.php';
         
             
            
        if( $get_btn_settings_profile == "profile" && $get_profile_name != "") {
         
         $profile_button = '<ul><li class="fb_page"><a href="https://www.facebook.com/'.$get_profile_name.'/" target="_blank"><img src="'.plugin_dir_url(__FILE__).'/images/connect.png" /></a></li></ul>';
         
         }
         
         
         if( isset($get_btn_settings_like) && ($get_btn_settings_like == "like" && $get_profile_name != "" )){
         
            
         $like_button =  '<ul><li><div class="fb-like" data-href="http://facebook.com/'.$get_profile_name.'/" data-layout="'.$get_like_btn_layout.'" data-action="'.$get_like_btn_action.'" data-size="'.$get_like_btn_size.'" data-show-faces="false"></div></li></ul>';
         
         }
         
         
         if( isset($get_btn_settings_share) && ($get_btn_settings_share == "share" && $get_profile_name != "" )){
         
         $current_url = "//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];    
          
         $share_button = '<ul><li class="fb_share_btn"><div class="fb-share-button" data-href="'.$current_url.'" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ffacebook.com%2Fwitonisoftwares%2F&amp;src=sdkpreparse">Share</a></div></li></ul>';
         
         }
             
        
        
        
         if(isset($get_btn_position_front) && $get_btn_position_front == "top"){
            
         $top_buttons = $profile_button.$like_button.$share_button;
         
         }
         
         
         if(isset($get_btn_position_front) && $get_btn_position_front == "bottom"){
            
         $bottom_buttons = $profile_button.$like_button.$share_button;
         
         }
         
         
         if(isset($get_btn_position_front) && $get_btn_position_front == "top-bottom"){
            
         $top_buttons = $profile_button.$like_button.$share_button;
         
         $bottom_buttons = $profile_button.$like_button.$share_button; 
         
         }
         
         
         if(isset($get_btn_position_front) && $get_btn_position_front == "none"){
         
         $top_buttons = '';   
         $bottom_buttons = ''; 
         
         }
         
         
         return $top_buttons.$content.$bottom_buttons;
            
        }
        
        
      }
      
      
          
   
    
    /**
     * Display the
     * FB Buttons Above 
     * Excerpt
     * 
     * @since 1.0.0
     */
   public function display_buttons_excerpt( $excerpt){
    
    
            
        global $top_buttons, $bottom_buttons;
         
        require_once 'partials/ultimate-facebook-buttons-public-variables.php';
         
             
            
        if( $get_btn_settings_profile == "profile" && $get_profile_name != "") {
         
         $profile_button = '<ul><li class="fb_page"><a href="https://www.facebook.com/'.$get_profile_name.'/" target="_blank"><img src="'.plugin_dir_url(__FILE__).'/images/connect.png" /></a></li>';
         
         }
         
         
         if( isset($get_btn_settings_like) && ($get_btn_settings_like == "like" && $get_profile_name != "" )){
         
            
         $like_button =  '<li><div class="fb-like" data-href="http://facebook.com/'.$get_profile_name.'/" data-layout="'.$get_like_btn_layout.'" data-action="'.$get_like_btn_action.'" data-size="'.$get_like_btn_size.'" data-show-faces="false"></div></li>';
         
         }
         
         
         if( isset($get_btn_settings_share) && ($get_btn_settings_share == "share" && $get_profile_name != "" )){
            
         $current_url = "//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];   
          
         $share_button = '<li class="fb_share_btn"><div class="fb-share-button" data-href="'.$current_url.'" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ffacebook.com%2Fwitonisoftwares%2F&amp;src=sdkpreparse">Share</a></div></li></ul>';
         
         }
             
        
        
        
         if(isset($get_btn_position_excerpts) && $get_btn_position_excerpts == "top"){
            
         $top_buttons = $profile_button.$like_button.$share_button;
         
         }
         
         
         if(isset($get_btn_position_excerpts) && $get_btn_position_excerpts == "bottom"){
            
         $bottom_buttons = $profile_button.$like_button.$share_button;
         
         }
         
         
         if(isset($get_btn_position_excerpts) && $get_btn_position_excerpts == "top-bottom"){
            
         $top_buttons = $profile_button.$like_button.$share_button;
         
         $bottom_buttons = $profile_button.$like_button.$share_button; 
         
         }
         
         
         if(isset($get_btn_position_excerpts) && $get_btn_position_excerpts == "none"){
         
         $top_buttons = '';   
         $bottom_buttons = ''; 
         
         }
         
         
         return $top_buttons.$excerpt.$bottom_buttons;
            
        
         
         
          
          // }
 
         //return $excerpt;

       } 
       
       
       
  
   
  
  
}