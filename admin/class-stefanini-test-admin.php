<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       yancinerio.com
 * @since      1.0.0
 *
 * @package    Stefanini_Test
 * @subpackage Stefanini_Test/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Stefanini_Test
 * @subpackage Stefanini_Test/admin
 * @author     Yanci Nerio <nerioyanci@gmail.com>
 */
class Stefanini_Test_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the administration menu for this plugin into the Dashboard menu.
	 *
	 * @since    1.0.0
	 */

	public function add_plugin_admin_menu() {

	    /*
	     * Add a settings page for this plugin to the Settings menu.
	     *
	     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
	     *
	     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
	     *
	     */
	   
		add_menu_page( 'Stefanini Test', 'Stefanini Test', 'manage_options', $this->plugin_name, array($this, 'display_plugin_posts_page')
	    );
		add_submenu_page( $this->plugin_name, 'Stefanini Test', 'View Posts', 'manage_options', $this->plugin_name, array($this, 'display_plugin_posts_page'));
		add_submenu_page( $this->plugin_name, 'View Logs', 'View Logs','manage_options', $this->plugin_name.'-view-logs', array($this, 'display_plugin_logs_page'));
		// add_submenu_page( $this->plugin_name, 'Picture Parties Create Gallery', 'Send Downloadables','manage_options', $this->plugin_name.'-send-downloadables', array($this, 'display_send_downloadables_page'));
		// add_submenu_page( $this->plugin_name, 'Picture Parties Create Gallery', 'Galleries','manage_options', $this->plugin_name.'-galleries', array($this, 'display_galleries_page'));
	}

	 /**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */

	public function add_action_links( $links ) {
	    /*
	    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	    */
	   $settings_link = array(
	    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}

	/**
	 * Render the posts page for this plugin.
	 *
	 * @since    1.0.0
	 */

	public function display_plugin_posts_page() {
	    include_once( 'partials/stefanini-test-admin-display.php' );
	}

	/**
	 * Render the logs page for this plugin.
	 *
	 * @since    1.0.0
	 */

	public function display_plugin_logs_page() {
	    include_once( 'partials/stefanini-test-admin-logs.php' );
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
		 * defined in Stefanini_Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Stefanini_Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( "bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css", array(), $this->version, 'all' );
		wp_enqueue_style( "dataTables", "https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css", array(), $this->version, 'all' );
		wp_enqueue_style( "dataTables.bootstrap", "https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css", array(), $this->version, 'all' );

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/stefanini-test-admin.css', array(), $this->version, 'all' );

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
		 * defined in Stefanini_Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Stefanini_Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		// 	

		wp_enqueue_script( "bootstrap", "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js", array( 'jquery'  ), $this->version, false );
		wp_enqueue_script( "jquery.dataTables", 'https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js', array(), $this->version, false );
		wp_enqueue_script( "dataTables.bootstrap", 'https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js', array(), $this->version, false );
		
		
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/stefanini-test-admin.js', array( 'jquery' ), $this->version, false );

		wp_localize_script($this->plugin_name,
        'savelogs',
	        array(
	            'ajaxUrl' => admin_url( 'admin-ajax.php' )
	        )
    	);

	}

}
