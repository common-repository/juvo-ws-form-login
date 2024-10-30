<?php

namespace WSForm_Login\Integrations\Members;

class Unblock
{

    public function unblock(bool $is_private) {

        global $post;
        if (empty($post)) {
            return $is_private;
        }

        $ids_to_unblock= [
            cmb2_get_option( 'wsform_login', 'login', null ),
            cmb2_get_option( 'wsform_login', 'forgot_password', null ),
            cmb2_get_option( 'wsform_login', 'reset_password', null ),
            cmb2_get_option( 'wsform_login', 'registration', null )
        ];

        if (in_array($post->ID, $ids_to_unblock)) {
            return false;
        }

        return true;

    }

    public function unblock_rest_api(bool $is_private) {

        // Allow ws form rest api requests
        if (strpos($_SERVER['REQUEST_URI'], 'wp-json/ws-form') !== false) {
            return false;
        }

        return $is_private;

    }

}