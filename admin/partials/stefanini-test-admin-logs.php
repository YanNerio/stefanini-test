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

global $wpdb;
$table = $wpdb->prefix . "action_logs";
$results = $wpdb->get_results( "SELECT * FROM ".$table);
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="container">

    <div class="alert alert-info"><?php echo esc_html(get_admin_page_title()); ?></div>
	
	<div class="clearfix">&nbsp</div>

	<table id="logs" class="table table-striped " cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>User id</th>
                <th>Post Id</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i = 1;
        foreach ($results as $result) : ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $result->action_date; ?></td>
            <td><?php echo $result->user_id; ?></td>
            <td><?php echo $result->post_id; ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>

</div>

