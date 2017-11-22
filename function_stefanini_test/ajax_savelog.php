<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       yancinerio.com
 * @since      1.0.0
 *
 * @package    Stefanini_Test
 * @subpackage Stefanini_Test/admin/partials
 */
?>
<?php 
	
	add_action( 'wp_ajax_save_logs', 'ajax_insertLog' );

    function ajax_insertLog() {
    	global $wpdb;
    	$current_user = wp_get_current_user();
      	$user = $current_user->ID;
	    $date  = date("Y-m-d H:i:s");  
	    $postid  = $_POST['value'];  
		$data = array('user_id' => $user,
	       	'action_date' => $date,
	       	'post_id' => $postid,
			'created_at' => $date );
		

		$table = $wpdb->prefix . "action_logs"; 

	    try {
	    	$insert = $wpdb->insert( $table, $data);
	    } catch (Exception $e) {
	    
	    }
	}
	// add_action( 'wp_ajax_get_logs', 'ajax_getLogs' );

 //    function ajax_getLogs() {
 //    	global $wpdb;
    	
	// 	$table = $wpdb->prefix . "action_logs"; 

	//     try {
	//     	$results = $wpdb->get_results( $wpdb->prepare("SELECT * FROM `wp_action_logs`") );
			
	//     	echo json_encode($results);
	//     } catch (Exception $e) {
	    
	//     }
	// }
    
?> 


