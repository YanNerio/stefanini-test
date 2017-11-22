(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

$(document).ready(function(){
    
    $("button").click(function (event) {
    	var id = $("#postid").val();
    	getData(id);
    	save_log(id);
    }); 
    getData();
    //getLogs();
	$('#logs').DataTable();
  });
	function getData(id){
    	var arrayData = [];
    	var _url;
		
    	if(id){
    		_url = "http://jsonplaceholder.typicode.com/posts/"+id+"/comments"; 
    	}else{
    		_url = "http://jsonplaceholder.typicode.com/posts/1/comments"; 
    	}
    	$.ajax({
	        url: _url,
	        async: false,
	        dataType: 'json',
	        success: function (data) {
				for (var i = 0, len = data.length; i < len; i++) {
					arrayData.push([ '<a href="#" target="_blank">'+data[i].id+'</a>', data[i].postId, data[i].name, data[i].email,data[i].body]);
				}
				inittable(arrayData, 'posts');
				
        	}
    	}); 
    }
	function inittable(data, table) {	
		//console.log(data);
		var datatable = $('#'+table+'').DataTable();
		datatable.clear().draw();
	    datatable.rows.add(data); 
	    datatable.columns.adjust().draw(); 
	}
	function save_log(id) {
		if( id != ""){
	  		var ajaxurl = savelogs.ajaxUrl;
	  		var _data = {action: 'save_logs', value: id };
	  		
	    	jQuery.ajax({
	          	type: 'post', 
	          	url: ajaxurl,
	          	dataType: 'json',
	          	data : _data,
	          	cache: false,
	          	success: function(data){
		          	$('.message').append("<div class='alert alert-success'>Log saved</div>");
		          	setTimeout(function() {
				        $(".message").hide()
				    }, 5000);
	          	}
	       	});
		}
		else{			
		    $('.message').append("<div class='alert alert-danger'>Enter the Id</div>");
		    setTimeout(function() {
		        $(".message").hide()
		    }, 5000);
		}
	}

})( jQuery );

