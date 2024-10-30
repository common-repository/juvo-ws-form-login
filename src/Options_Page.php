<?php

namespace WSForm_Login;

class Options_Page
{

    public function register() {

        /**
         * Registers main options page menu item and form.
         */
        $main_options = new_cmb2_box(array(
            'id'           => 'metabox',
            'title'        => esc_html__('WS-Forms Login', 'wsform-login'),
            'object_types' => array('options-page'),
            'option_key'   => 'wsform_login', // The option key and admin menu page slug.
            'parent_slug'  => 'options-general.php', // Make options page a submenu item of the themes menu.
            'capability'   => 'manage_options', // Cap required to view options-page.
        ));

        $main_options->add_field(array(
            'name'       => __('Login Page', 'wsform-login'),
            'desc'       => __('Type the title of the page that contains the login form', 'wsform-login'),
            'id'         => 'login',
            'type'       => 'post_ajax_search',
            'query_args' => array(
                'post_type'      => array('post', 'page'),
                'posts_per_page' => -1
            )
        ));

        $main_options->add_field(array(
            'name'       => __('Forgot Password Page', 'wsform-login'),
            'desc'       => __('Type the title of the page that contains the forgot password form', 'wsform-login'),
            'id'         => 'forgot_password',
            'type'       => 'post_ajax_search',
            'query_args' => array(
                'post_type'      => array('post', 'page'),
                'posts_per_page' => -1
            )
        ));

        $main_options->add_field(array(
            'name'       => __('Reset Password Page', 'wsform-login'),
            'desc'       => __('Type the title of the page that contains the reset password form', 'wsform-login'),
            'id'         => 'reset_password',
            'type'       => 'post_ajax_search',
            'query_args' => array(
                'post_type'      => array('post', 'page'),
                'posts_per_page' => -1
            )
        ));

        $main_options->add_field(array(
            'name'       => __('Registration Page', 'wsform-login'),
            'desc'       => __('Type the title of the page that contains the registration form', 'wsform-login'),
            'id'         => 'registration',
            'type'       => 'post_ajax_search',
            'query_args' => array(
                'post_type'      => array('post', 'page'),
                'posts_per_page' => -1
            )
        ));

    }

}