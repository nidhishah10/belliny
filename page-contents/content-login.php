     <?php
//Exit if Directly accessed
if (!defined('ABSPATH')) {
    exit;
}

/**
 * The Template Used For Displaying Home page Content
 *
 * @package WordPress
 * @subpackage Belliny
 * @since Belliny 1.0
 */
?><div id="main">
	 <div class="wrap">
	 	<?php 

 if (is_user_logged_in()){ 	 
  }else{ ?>

<div class="login-info">
	<div class="login-form">
		<form method="post">
			<h1>Dealer Login</h1>
			<p class="status"></p>
			<div class=username>
				<i class="icon-user-id"></i>
				<input id="username" type="text" name="username" required> 
			</div>
			<div class="pwd">
				<i class="icon-pwd"></i>
				<input id="password" type="password" name="password" required>
			</div>
			<input class="submit_button" type="button" id="login" value="Login" name="submit"> 
			<a class="close" href="">(close)</a>
			<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
		<input type="hidden" name="ajax-url" id="ajax-url" value="<?php echo admin_url('admin-ajax.php');?>" />
		</form>
	</div>
</div>	
  	<?php
	 

	 // wp_login_form( 

		//  array(
		// 		'echo'           => true,
		// 		// Default 'redirect' value takes the user back to the request URI.
		// 		'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) .'64.4.160.99/beliny/fabrics-brand/',
		// 		'form_id'        => 'loginform',
		// 		'label_username' => __( 'Your Username' ),
		// 		'label_password' => __( 'Your Password' ),
		// 		'label_remember' => __( 'Remember Me' ),
		// 		'label_log_in'   => __( 'Log In' ),
		// 		'id_username'    => 'user_login',
		// 		'id_password'    => 'user_pass',
		// 		'id_remember'    => 'rememberme',
		// 		'id_submit'      => 'wp-submit',
		// 		'remember'       => true,
		// 		'value_username' => '',
		// 		// Set 'value_remember' to true to default the "Remember me" checkbox to checked.
		// 		'value_remember' => false,
		// 	)
						
		// );
   }		?>	
</div>
</div>