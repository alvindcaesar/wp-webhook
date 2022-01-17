<?php

/**
 * Plugin Name: WP Webhook
 * Plugin URI: https://alvindcaesar.com/
 * Author: Alvind Caesar
 * Author URI: https://alvindcaesar.com/
 * Description: WP Webhook Test
 * Version: 0.1.0
 * License: 0.1.0
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: wp-webhook
*/

if ( ! defined('WPINC')) {
  die;
}

add_action('save_post', 'ace_save_post_webhook', 10, 2 );

function ace_save_post_webhook( $post_id, $post ) {
  $message = 'Post #' . $post_id . ' has been created with title - ' . $post->post_title;
  $url = 'https://hook.integromat.com/k8v15cis5cfy153dkj7cfega4lrkvcjf';
  $args = array(
    'body' => array(
      'message' => $message
    )
  );
  wp_remote_post( $url, $args );
} 