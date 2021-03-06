<?php


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// database connection
$admin = new Neyrinck_Custom_Forms_Admin();
$database = $admin->get_settings();
$user = $database->db_user;
$password = $database->db_password;
$db = $database->db_name;
$server = $database->db_server;

$GLOBALS['ncf_database'] = $db;
$GLOBALS['ncf_user'] = $user;
$GLOBALS['ncf_password'] = $password;
$GLOBALS['ncf_server'] = $server;

add_shortcode('NCF_PRODUCT_DOWNLOAD_FORM', 'product_download_form');
add_shortcode('NCF_THANK_YOU_FOR_DOWNLOADING_SPILL', 'thank_you_for_downloading_spill');
add_shortcode('NCF_THANK_YOU_FOR_DOWNLOADING_VCP', 'thank_you_for_downloading_vcp');
add_shortcode('NCF_ECHO_LATEST_VCP_DOWNLOAD_LINKS', 'echo_latest_vcp_download_links');
add_shortcode('NCF_SUPPORT_FORM', 'support_form');
add_shortcode('NCF_CONTACT_FORM', 'contact_form');
add_shortcode('NCF_NEWSLETTER_SUBSCRIPTION_FORM', 'newsletter_subscription_form');
add_shortcode('NCF_ONLINE_ACTIVATION', 'neyrinck_online_activation_form2');
add_shortcode('NCF_ONLINE_ACTIVATION2', 'neyrinck_online_activation_form2');
add_shortcode('NCF_DEALERNEWS_SUBSCRIPTION_FORM', 'dealernews_subscription_form');
//add_shortcode('NCF_TEST_EDEN_PROXY', 'test_eden_proxy');
add_shortcode('NCF_VCP_TRIAL', 'neyrinck_vcp_trial_form');
add_shortcode('NCF_VCP_TRIAL_DEV', 'neyrinck_vcp_trial_form');

function neyrinck_vcp_trial_form_offline(){
	ob_start();
	include('offline.php');
	$form = ob_get_contents();
	ob_clean();
	ob_end_flush();
	return $form;
}

function neyrinck_vcp_trial_form(){
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'scripts/vcptrial.php');
	$form = ob_get_contents();
	ob_clean();
	ob_end_flush();
	return $form;
}

function neyrinck_online_activation_form(){
	ob_start();
	include('directdeposit.php');
	$form = ob_get_contents();
	ob_clean();
	ob_end_flush();
	return $form;
}

function neyrinck_online_activation_form2(){
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'scripts/activate.php');
	$form = ob_get_contents();
	ob_clean();
	ob_end_flush();
	return $form;
}

function dealernews_subscription_form(){
	ob_start();
	include('scripts/dealer-subscribe.php');
	$form = ob_get_contents();
	ob_clean();
	ob_end_flush();
	return $form;
}

function newsletter_subscription_form(){

	ob_start();
	include('scripts/subscription_form_reCaptcha.php');
	$form = ob_get_contents();
	ob_clean();
	ob_end_flush();

	return $form;
}



function contact_form(){
	ob_start();
	include('contact-form.php');
	$form = ob_get_contents();
	ob_clean();
	ob_end_flush();

	return $form;

}

function support_form(){
	ob_start();
	include('support-form.php');
	$form = ob_get_contents();
	ob_clean();
	ob_end_flush();

	return $form;

}

function product_download_form($atts){

	$product = $atts['product'];
	$downloadProduct =  $product;
	ob_start();
	include('download-form.php');
	$form = ob_get_contents();
	ob_clean();
	ob_end_flush();

	return $form;

}

function thank_you_for_downloading_spill(){
	ob_start();
	include('scripts/sms_spill.php');
	$form = ob_get_contents();
	ob_clean();
	ob_end_flush();

	return $form;
}

function thank_you_for_downloading_vcp(){
	ob_start();
	include('scripts/sms_vcp.php');
	$form = ob_get_contents();
	ob_clean();
	ob_end_flush();

	return $form;
}

function echo_latest_vcp_download_links(){
	ob_start();
	include('scripts/vcp-download-links.php');
	$form = ob_get_contents();
	ob_clean();
	ob_end_flush();

	return $form;


}

?>
