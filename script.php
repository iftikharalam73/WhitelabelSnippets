<?php

/*Remove WordPress ORG from menu bar*/
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
  $wp_admin_bar->remove_node( 'wp-logo' );
}

/*Disable Admin Bar for All Users Except Administrators*/
add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

/*replace the heading "Dashboard" on the dashboard page*/
function my_custom_dashboard_name(){
        if ( $GLOBALS['title'] != 'Dashboard' ){
            return;
        }

        $GLOBALS['title'] =  __( 'Welcome Back' ); 
    }

    add_action( 'admin_head', 'my_custom_dashboard_name' );

/*change wordpress dashboard future credit*/
function change_admin_footer(){
	 echo '<span id="footer-note">Powered by <a href="https://iftikharalam.com/" target="_blank">Iftikhar Alam</a>.</span>';
	}
add_filter('admin_footer_text', 'change_admin_footer');

/*Customize “Howdy” message in admin area*/
function howdy_message($translated_text, $text, $domain) {
$new_message = str_replace('Howdy', 'Welcome', $text);
return $new_message;
}
add_filter('gettext', 'howdy_message', 10, 3);

/*Hidetheme File Editor*/
define( 'DISALLOW_FILE_EDIT', true);

/*Redirect Users After Logout*/
add_action('wp_logout','auto_redirect_external_after_logout');
function auto_redirect_external_after_logout(){
  wp_redirect( 'index.php' );
  exit();
}

/*Wordpress Login Error Messages*/
function no_wordpress_errors(){
  return 'Something is wrong!';
}
add_filter( 'login_errors', 'no_wordpress_errors' );

/*Hide A WordPress Plugin*/
add_filter( 'all_plugins', 'hide_plugins');
function hide_plugins($plugins)
{
		// Hide IAM Security
		if(is_plugin_active('IAM Security/iam-security.php')) {
				unset( $plugins['IAM Security/iam-security.php'] );
		}
		return $plugins;
}


/*Dashboard Custom CSS*/
/*function my_admin_styles() {
	echo '<style>
.dig_gs_log_men .dig-nav-tab-active {
    display: none;
}

	</style>';
}
add_action('admin_head' , 'my_admin_styles');
