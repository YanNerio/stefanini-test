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

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="container">

    <div class="alert alert-info"><?php echo esc_html(get_admin_page_title()); ?></div>
	<div class="form-inline">
	  	<div class="form-group">
		    <label for="postid">Enter the post Id</label>
		    <input type="text" class="form-control" id="postid" value="1">
		</div>	  	
	  	<button type="button" class="btn btn-primary">Load</button>
	</div>
	<div class="clearfix">&nbsp</div>
	<div class="message"></div>

	<table id="posts" class="table table-striped " cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Post Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Comment</th>
            </tr>
        </thead>
        
    </table>

</div>

