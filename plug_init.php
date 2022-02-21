<?php
/**
 * Plugin Name: connect to git
 * Plugin URI: https://github.com/aguwicka
 * Description: Tested plugin for company
 * Version: 1.0
 * Author: Anton Plashkevich
 * Author URI: https://github.com/aguwicka
 */

require_once 'wp_Github.php';
require_once 'git_curl.php';

function git_repo_shortcode() {
    ob_start();
    require_once 'template/git_template.php';
    return ob_get_clean();

}
add_shortcode('gitrepo', 'git_repo_shortcode');

function git_scripts() {
    wp_register_style( 'git-styles',  plugin_dir_url( __FILE__ ) . 'assets/css/git.css' );
    wp_enqueue_style( 'git-styles' );
}
add_action( 'wp_enqueue_scripts', 'git_scripts' );