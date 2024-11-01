<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://witoni.com
 * @since      1.0.0
 *
 * @package    ultimate_facebook_buttons
 * @subpackage ultimate_facebook_buttons/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<style>
p.submit {margin-left: 10px;}
</style>

      
    <?php
    
        
        if( isset( $_GET[ 'tab' ] ) ) {
            $active_tab = $_GET[ 'tab' ];
        }else{
            
            $active_tab = "default";
        }
    ?>  


     <!-- Navigation Tabs -->   
      <h2 class="nav-tab-wrapper">
            <a href="?page=ultimate-facebook-buttons" class="nav-tab <?php echo $active_tab == 'default' ? 'nav-tab-active' : ''; ?>">FB Settings</a>
            <a href="?page=ultimate-facebook-buttons&tab=display-settings" class="nav-tab <?php echo $active_tab == 'display-settings' ? 'nav-tab-active' : ''; ?>">Display Settings</a>
            <!--<a href="?page=ultimate-facebook-buttons&tab=custom-code" class="nav-tab <?php echo $active_tab == 'campaign' ? 'nav-tab-active' : ''; ?>">Custom Code</a>-->
        </h2>



        <!-- Options Panel Wrapper Starts Here -->
        <div class="wrap" style="width: 60%;">
        <?php if($active_tab == "default"){ ?>
        
        <h2>Profile Settings</h2>
         <hr />
          
           
           
          <div id="profiledetails" style="background: #fff; border-radius: 10px; margin-bottom: 50px;">
          
           
           

             <form method="post" action="options.php">
             
             
                <?php settings_fields( 'ufb-profile-settings-group' ); ?>
                <?php do_settings_sections( 'ufb-profile-settings-group' ); ?>
                
                <table class="form-table" style="margin-left: 10px;">
                
                <tr valign="top">
                <th scope="row">Facebook ID or Username</th>
                <td>
                <fieldset>
                <?php $get_profile_name = esc_attr( get_option( 'ufb-profile-name') ); ?>
                
                <input type="text" name="ufb-profile-name" value="<?php echo  $get_profile_name; ?>"/>
                
                
                </fieldset>
                </td>
                </tr>
                
                
                <!--<tr valign="top">
                <th scope="row">Profile Image</th>
                <td>
                <fieldset>
                <?php $get_profile_img_status = esc_attr( get_option('ufb-profile-image') ); ?>
                <label><input type="radio" name="ufb-profile-image" value="default" <?php if(isset($get_profile_img_status) && ($get_profile_img_status == "" || $get_profile_img_status == "default")): echo "checked"; endif; ?> /><?php echo __( 'Default', 'ultimate-facebook-buttons' ); ?></label><br />
                <label><input type="radio" name="ufb-profile-image" onclick="javascript:yesnoCheck();" value="custom" <?php if(isset($get_profile_img_status) && ($get_profile_img_status != "" && $get_profile_img_status == "custom")): echo "checked"; endif; ?>/><?php echo __( 'Custom Image', 'ultimate-facebook-buttons' ); ?></label><br />
                
                </fieldset>
                </td>
                </tr>
                
                
                <tr valign="top" >
                <th scope="row"></th>
                <td>
                <fieldset>
                <?php $get_profile_upload_img_url = esc_attr( get_option('ufb-profile-upload') ); ?>
                
                <input id="upload-custom-profile-img" type="url" size="21" name="ufb-profile-upload" value="<?php if(isset($get_profile_upload_img_url) && $get_profile_upload_img_url != ""): echo $get_profile_upload_img_url; endif; ?> " />
                <input id="upload-custom-profile-img-button" class="button" type="button" value="<?php echo __( 'Upload Profile Image', 'ultimate-facebook-buttons' ); ?>" />
                   
                
                </fieldset>
                </td>
                </tr>-->
                
                
                
                </table>
                
               <?php submit_button(); ?> 
                
              </form>  
              
            </div><!--- Profile Details Div Ends Herer -->
            
        
         <h2>Button Settings</h2>
         <hr />
          
           
           
          <div id="buttonsettings" style="background: #fff; border-radius: 10px; margin-bottom: 50px;">
          
           
           

             <form method="post" action="options.php">
             
             
                <?php settings_fields( 'ufb-button-settings-group' ); ?>
                <?php do_settings_sections( 'ufb-button-settings-group' ); ?>
                
                <table class="form-table" style="margin-left: 10px;">
                
                <tr valign="top">
                <th scope="row">Buttons To Display</th>
                <td>
                <fieldset>
                
                <?php $get_btn_settings_like = esc_attr( get_option('ufb-btn-settings-like') );?>
                <?php $get_btn_settings_share = esc_attr( get_option('ufb-btn-settings-share') );?>
                <?php $get_btn_settings_profile_link = esc_attr( get_option('ufb-btn-settings-profile-link') );?>
                
                <label><input type="checkbox" name="ufb-btn-settings-like" value="like" <?php if(isset($get_btn_settings_like) && $get_btn_settings_like == "like"): echo "checked"; endif; ?> /><?php echo __( 'Like', 'ultimate-facebook-buttons' ); ?></label><br />
                <label><input type="checkbox" name="ufb-btn-settings-share" value="share" <?php if(isset($get_btn_settings_share) && $get_btn_settings_share == "share"): echo "checked"; endif; ?>/><?php echo __( 'Share', 'ultimate-facebook-buttons' ); ?></label><br />
                <label><input type="checkbox" name="ufb-btn-settings-profile-link" value="profile" <?php if(isset($get_btn_settings_profile_link) && $get_btn_settings_profile_link == "profile"): echo "checked"; endif; ?>/><?php echo __( 'Profile Link', 'ultimate-facebook-buttons' ); ?></label><br />
                
                
                </fieldset>
                </td>
                </tr>
                
                
                <tr valign="top">
                <th scope="row">Button Size</th>
                <td>
                <fieldset>
                <?php $get_ufb_btn_size = esc_attr( get_option('ufb-btn-size') );?>
                <label><input type="radio" name="ufb-btn-size" value="small" <?php if(isset($get_ufb_btn_size) && ($get_ufb_btn_size == "small" || $get_ufb_btn_size == "")): echo "checked"; endif; ?> /><?php echo __( 'Small', 'ultimate-facebook-buttons' ); ?></label><br />
                <!--<label><input type="radio" name="ufb-btn-size" value="medium" <?php if(isset($get_ufb_btn_size) && $get_ufb_btn_size == "medium"): echo "checked"; endif; ?> /><?php echo __( 'Medium', 'ultimate-facebook-buttons' ); ?></label><br />-->
                <label><input type="radio" name="ufb-btn-size" value="large" <?php if(isset($get_ufb_btn_size) && $get_ufb_btn_size == "large"): echo "checked"; endif; ?> /><?php echo __( 'Large', 'ultimate-facebook-buttons' ); ?></label>

                </fieldset>
                </td>
                </tr>
                
                
                <!--<tr valign="top">
                <th scope="row">Buttons Position</th>
                <td>
                <fieldset>
                
                <?php $get_ufb_btn_ac_pos = esc_attr( get_option('ufb-btn-position-ac') );?>
                <?php $get_ufb_btn_bc_pos = esc_attr( get_option('ufb-btn-position-bc') );?>
                
                <label><input type="checkbox" name="ufb-btn-position-ac" value="above" <?php if(isset($get_ufb_btn_ac_pos) && $get_ufb_btn_ac_pos == "above"): echo "checked"; endif; ?> /><?php echo __( 'Above Content', 'ultimate-facebook-buttons' ); ?></label><br />
                <label><input type="checkbox" name="ufb-btn-position-bc" value="below" <?php if(isset($get_ufb_btn_bc_pos) && $get_ufb_btn_bc_pos == "below"): echo "checked"; endif; ?> /><?php echo __( 'Below Content', 'ultimate-facebook-buttons' ); ?></label><br />
                
                
                </fieldset>
                </td>
                </tr>-->
                
                
                
                <tr valign="top">
                <th scope="row">Excerpt</th>
                <td>
                <fieldset>
                <?php $get_ufb_btn_exc_status = esc_attr( get_option('ufb-btn-excerpt-status') ); ?>
                
                <label><input type="checkbox" name="ufb-btn-excerpt-status" value="excerpt" <?php if(isset($get_ufb_btn_exc_status) && $get_ufb_btn_exc_status == "excerpt"): echo "checked"; endif; ?> /><?php echo __( 'Show Buttons In Excerpt', 'ultimate-facebook-buttons' ); ?></label><br />
                
                
                </fieldset>
                </td>
                </tr>
                
                
                <!--<tr valign="top">
                <th scope="row">Meta(Sharing) Image</th>
                <td>
                <fieldset>
                <?php $get_shr_img = esc_attr( get_option('ufb-shr-image') ); ?>
                <?php $get_shr_custom_img_url = esc_attr( get_option('ufb-shr-custom-img') ); ?>
                
                <label><input type="radio" name="ufb-shr-image" value="post" <?php if(isset($get_shr_img) && ($get_shr_img == "post" || $get_shr_img == "")): echo "checked"; endif; ?> /><?php echo __( 'Post/Page Featured Image', 'ultimate-facebook-buttons' ); ?></label><br />
                <label><input type="radio" name="ufb-shr-image" value="custom" <?php if(isset($get_shr_img) && $get_shr_img == "custom"): echo "checked"; endif; ?> /><?php echo __( 'Custom Image', 'ultimate-facebook-buttons' ); ?></label><br />
                
                <label>
                <input id="upload-custom-shr-img" type="url" size="21" name="ufb-shr-custom-img" value="<?php echo $get_shr_custom_img_url; ?>" />
                <input id="upload-featured-img-button" class="button" type="button" value="Upload Image" />
                </label><br />
                
                
                </fieldset>
                </td>
                </tr>
                
                
                
                <tr valign="top">
                <th scope="row">Meta(Sharing) Description</th>
                <td>
                <fieldset>
                <?php $get_shr_description = esc_attr( get_option('ufb-shr-description') ); ?>
                
                <label><textarea name="ufb-shr-description"  cols="50" rows="5" placeholder="Enter Custom Description To Show On All Post/Page OR Leave it blank to use default post/pages meta descriptions."><?php echo $get_shr_description; ?></textarea></label><br />
                
                </fieldset>
                </td>
                </tr>-->
                
                
                
                
                </table>
                
               <?php submit_button(); ?> 
                
              </form>  
              
            </div><!--- Button Settings Div Ends Herer -->
            
            
            <h2>Like Button Settings</h2>
         <hr />
          
           
           
          <div id="likedetails" style="background: #fff; border-radius: 10px;">
          
           
           

             <form method="post" action="options.php">
             
             
                <?php settings_fields( 'ufb-like-settings-group' ); ?>
                <?php do_settings_sections( 'ufb-like-settings-group' ); ?>
                
                <table class="form-table" style="margin-left: 10px;">
                
                <tr valign="top">
                <th scope="row">Like Button Layout</th>
                <td>
                <fieldset>
                <?php $get_like_btn_layout = esc_attr( get_option('ufb-like-btn-layout') ); ?>
                
                <label><input type="radio" name="ufb-like-btn-layout" value="standard" <?php if(isset($get_like_btn_layout) && ($get_like_btn_layout == "standard" || $get_like_btn_layout == "")): echo "checked"; endif; ?>/><?php echo __( 'Standard', 'ultimate-facebook-buttons' ); ?></label><br />
                <label><input type="radio" name="ufb-like-btn-layout" value="button" <?php if(isset($get_like_btn_layout) && $get_like_btn_layout == "button" ): echo "checked"; endif; ?>/><?php echo __( 'Button', 'ultimate-facebook-buttons' ); ?></label><br />
                <label><input type="radio" name="ufb-like-btn-layout" value="button_count" <?php if(isset($get_like_btn_layout) && $get_like_btn_layout == "button_count"): echo "checked"; endif; ?>/><?php echo __( 'Button Count', 'ultimate-facebook-buttons' ); ?></label><br />
                <label><input type="radio" name="ufb-like-btn-layout" value="box_count" <?php if(isset($get_like_btn_layout) && $get_like_btn_layout == "box_count" ): echo "checked"; endif; ?> /><?php echo __( 'Box Count', 'ultimate-facebook-buttons' ); ?></label>
                
                </fieldset>
                </td>
                </tr>
                
                
                <tr valign="top">
                <th scope="row">Like Button Action</th>
                <td>
                <fieldset>
                <?php $get_like_btn_action= esc_attr( get_option('ufb-like-btn-action') ); ?>
                
                <label><input type="radio" name="ufb-like-btn-action" value="like" <?php if(isset($get_like_btn_action) && ($get_like_btn_action == "like" || $get_like_btn_action == "")): echo "checked"; endif; ?>/><?php echo __( 'Like', 'ultimate-facebook-buttons' ); ?></label><br />
                <label><input type="radio" name="ufb-like-btn-action" value="recommend" <?php if(isset($get_like_btn_action) && $get_like_btn_action == "recommend"): echo "checked"; endif; ?> /><?php echo __( 'Recommend', 'ultimate-facebook-buttons' ); ?></label><br />

                </fieldset>
                </td>
                </tr>
                
                
                
                </table>
                
               <?php submit_button(); ?> 
                
              </form>  
              
            </div><!--- Like Button Div Ends Herer -->
            
            <?php } else if($active_tab == "display-settings"){ ?> <!-- Display Settings Starts Here -->
            
              <h2>Display Settings</h2>
              <hr />
              
              
              
          <div id="displaysettings" style="background: #fff; border-radius: 10px;">
          
           
           

             <form method="post" action="options.php">
             
             
                <?php settings_fields( 'ufb-display-settings-group' ); ?>
                <?php do_settings_sections( 'ufb-display-settings-group' ); ?>
                
                
                <table class="form-table" style="margin-left: 10px;">
                
                <tr valign="top">
                <th scope="row">Display Buttons At Posts</th>
                <td>
                <fieldset>
                <?php $get_btn_pos_posts = esc_attr( get_option('display-buttons-posts') ); ?>
                
                <select name="display-buttons-posts">
                <option value="none" <?php if(isset($get_btn_pos_posts) && $get_btn_pos_posts == "none"): echo "selected"; endif; ?> ><?php echo __( 'None', 'ultimate-facebook-buttons' ); ?></option>
                <option value="top" <?php if(isset($get_btn_pos_posts) && $get_btn_pos_posts == "top"): echo "selected"; endif; ?> ><?php echo __( 'Top', 'ultimate-facebook-buttons' ); ?></option>
                <option value="bottom" <?php if(isset($get_btn_pos_posts) && $get_btn_pos_posts == "bottom"): echo "selected"; endif; ?> ><?php echo __( 'Bottom', 'ultimate-facebook-buttons' ); ?></option>
                <option value="top-bottom" <?php if(isset($get_btn_pos_posts) && $get_btn_pos_posts == "top-bottom"): echo "selected"; endif; ?> ><?php echo __( 'Top & Bottom', 'ultimate-facebook-buttons' ); ?></option>
                </select>
                
                </fieldset>
                </td>
                </tr>
                
                
                
                <tr valign="top">
                <th scope="row">Display Buttons At Pages</th>
                <td>
                <fieldset>
                <?php $get_btn_pos_pages = esc_attr( get_option('display-buttons-pages') ); ?>
                
                <select name="display-buttons-pages">
                <option value="none" <?php if(isset($get_btn_pos_posts) && $get_btn_pos_posts == "none"): echo "selected"; endif; ?> ><?php echo __( 'None', 'ultimate-facebook-buttons' ); ?></option>
                <option value="top" <?php if(isset($get_btn_pos_pages) && $get_btn_pos_pages == "top"): echo "selected"; endif; ?> ><?php echo __( 'Top', 'ultimate-facebook-buttons' ); ?></option>
                <option value="bottom" <?php if(isset($get_btn_pos_pages) && $get_btn_pos_pages == "bottom"): echo "selected"; endif; ?> ><?php echo __( 'Bottom', 'ultimate-facebook-buttons' ); ?></option>
                <option value="top-bottom" <?php if(isset($get_btn_pos_pages) && $get_btn_pos_pages == "top-bottom"): echo "selected"; endif; ?> ><?php echo __( 'Top & Bottom', 'ultimate-facebook-buttons' ); ?></option>
                </select>
                
                </fieldset>
                </td>
                </tr>
                
                
                <tr valign="top">
                <th scope="row">Display Buttons At Excerpts</th>
                <td>
                <fieldset>
                <?php $get_btn_pos_excerpts = esc_attr( get_option('display-buttons-excerpts') ); ?>
                
                <select name="display-buttons-excerpts">
                <option value="none" <?php if(isset($get_btn_pos_excerpts) && $get_btn_pos_excerpts == "none"): echo "selected"; endif; ?> ><?php echo __( 'None', 'ultimate-facebook-buttons' ); ?></option>
                <option value="top" <?php if(isset($get_btn_pos_excerpts) && $get_btn_pos_excerpts == "top"): echo "selected"; endif; ?> ><?php echo __( 'Top', 'ultimate-facebook-buttons' ); ?></option>
                <option value="bottom" <?php if(isset($get_btn_pos_excerpts) && $get_btn_pos_excerpts == "bottom"): echo "selected"; endif; ?> ><?php echo __( 'Bottom', 'ultimate-facebook-buttons' ); ?></option>
                <option value="top-bottom" <?php if(isset($get_btn_pos_excerpts) && $get_btn_pos_excerpts == "top-bottom"): echo "selected"; endif; ?> ><?php echo __( 'Top & Bottom', 'ultimate-facebook-buttons' ); ?></option>
                </select>
                
                </fieldset>
                </td>
                </tr>
                
                
                
                <tr valign="top">
                <th scope="row">Display Buttons At Frontpage</th>
                <td>
                <fieldset>
                <?php $get_btn_pos_front = esc_attr( get_option('display-buttons-front') ); ?>
                
                <select name="display-buttons-front">
                <option value="none" <?php if(isset($get_btn_pos_posts) && $get_btn_pos_posts == "none"): echo "selected"; endif; ?> ><?php echo __( 'None', 'ultimate-facebook-buttons' ); ?></option>
                <option value="top" <?php if(isset($get_btn_pos_front) && $get_btn_pos_front == "top"): echo "selected"; endif; ?> ><?php echo __( 'Top', 'ultimate-facebook-buttons' ); ?></option>
                <option value="bottom" <?php if(isset($get_btn_pos_front) && $get_btn_pos_front == "bottom"): echo "selected"; endif; ?> ><?php echo __( 'Bottom', 'ultimate-facebook-buttons' ); ?></option>
                <option value="top-bottom" <?php if(isset($get_btn_pos_front) && $get_btn_pos_front == "top-bottom"): echo "selected"; endif; ?> ><?php echo __( 'Top & Bottom', 'ultimate-facebook-buttons' ); ?></option>
                </select>
                
                </fieldset>
                </td>
                </tr>
                
                
                
                <tr valign="top">
                <th scope="row">Display Buttons At Archive</th>
                <td>
                <fieldset>
                <?php $get_btn_pos_archive = esc_attr( get_option('display-buttons-archive') ); ?>
                
                <select name="display-buttons-archive">
                <option value="none" <?php if(isset($get_btn_pos_posts) && $get_btn_pos_posts == "none"): echo "selected"; endif; ?> ><?php echo __( 'None', 'ultimate-facebook-buttons' ); ?></option>
                <option value="top" <?php if(isset($get_btn_pos_archive) && $get_btn_pos_archive == "top"): echo "selected"; endif; ?> ><?php echo __( 'Top', 'ultimate-facebook-buttons' ); ?></option>
                <option value="bottom" <?php if(isset($get_btn_pos_archive) && $get_btn_pos_archive == "bottom"): echo "selected"; endif; ?> ><?php echo __( 'Bottom', 'ultimate-facebook-buttons' ); ?></option>
                <option value="top-bottom" <?php if(isset($get_btn_pos_archive) && $get_btn_pos_archive == "top-bottom"): echo "selected"; endif; ?> ><?php echo __( 'Top & Bottom', 'ultimate-facebook-buttons' ); ?></option>
                </select>
                
                </fieldset>
                </td>
                </tr>
                
                
                </table>
                
                <?php submit_button(); ?> 
                
             </form>
             
          </div>      
            
            
           <?php } else if($active_tab == "custom-code"){ ?> <!-- Display Settings Ends Here & Custom Code Starts Here -->      
                
             <h2>Custom Code</h2>
         <hr />
          
           
           
          <div id="csscodemodule" style="background: #fff; border-radius: 10px; margin-bottom: 50px;">
          
           
           

             <form method="post" action="options.php">
             
             
                <?php settings_fields( 'ufb-profile-settings-group' ); ?>
                <?php do_settings_sections( 'ufb-profile-settings-group' ); ?>   
                
                
                <table class="form-table" style="margin-left: 10px;">
                
                <tr valign="top">
                <th scope="row">Write Custom CSS</th>
                <td>
                <fieldset>
                <?php $get_custom_css_status = esc_attr( get_option('ufb-enable-custom-css') ); ?>
                
                <label><input type="checkbox" name="ufb-enable-custom-css" value="customcss" <?php if(isset($get_custom_css_status) && $get_custom_css_status == "customcss" ): echo "checked"; endif; ?>/><?php echo __( 'Activate Custom CSS', 'ultimate-facebook-buttons' ); ?></label><br />
                
                <label><input type="c" name="ufb-enable-custom-css" value="customcss" <?php if(isset($get_custom_css_status) && $get_custom_css_status == "customcss" ): echo "checked"; endif; ?>/><?php echo __( 'Activate Custom CSS', 'ultimate-facebook-buttons' ); ?></label><br />
                
                </fieldset>
                </td>
                </tr>
                
                
                </table>
                
               <?php submit_button(); ?>  
                
             </form>   
              
           
           <?php } ?>
        
        </div><!-- wrap class ends here -->
