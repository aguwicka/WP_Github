<?php

class Github_Api_Plugin {

    public function __construct() {
        // Hook into the admin menu
        add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );

        // Add Settings and Fields
        add_action( 'admin_init', array( $this, 'setup_sections' ) );
        add_action( 'admin_init', array( $this, 'setup_fields' ) );
    }

    public function create_plugin_settings_page() {
        // Add the menu item and page
        $page_title = 'Github Settings Page';
        $menu_title = 'Github Plugin';
        $capability = 'manage_options';
        $slug = 'github_fields';
        $callback = array( $this, 'plugin_settings_page_content' );
        $icon = 'dashicons-admin-plugins';
        $position = 100;

        add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
    }

    public function plugin_settings_page_content() {?>
        <div class="wrap">
            <h2>Github Settings Page</h2><?php
            if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ){
                $this->admin_notice();
            } ?>
            <form method="POST" action="options.php">
                <?php
                settings_fields( 'github_fields' );
                do_settings_sections( 'github_fields' );
                submit_button();
                ?>
            </form>
        </div> <?php
    }

    public function admin_notice() { ?>
        <div class="notice notice-success is-dismissible">
            <p>Your settings have been updated!</p>
        </div><?php
    }

    public function setup_sections() {
        add_settings_section( 'our_first_section', '', array( $this, 'section_callback' ), 'github_fields' );
    }

    public function section_callback( $arguments ) {
        $arguments['id'];
    }

    public function setup_fields() {
        $fields = array(
            array(
                'uid' => 'git_user',
                'label' => 'Git user',
                'section' => 'our_first_section',
                'type' => 'text',
                'placeholder' => 'Git user',
            )
        );
        foreach( $fields as $field ){

            add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'github_fields', $field['section'], $field );
            register_setting( 'github_fields', $field['uid'] );
        }
    }

    public function field_callback( $arguments ) {

        $value = get_option( $arguments['uid'] );

        if( ! $value ) {
            $value = $arguments['default'];
        }

        printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );

    }

}
new Github_Api_Plugin();