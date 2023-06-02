<?php

/**
 * @package Rest_Api
 */

 /**
    * Plugin Name: REST API for Fetching Products
    * Description: Plugin for fetching products
    * Author: Joy Mwende
    * Author URI: http://github.com/.......
    * Plugin URI: http://github.com/.......
    * Version: 1.0.0
    * License: GPLv2 or later
  */

  if(!defined('ABSPATH')){
      die;
  }
  require_once(plugin_dir_path(__FILE__) . 'product-routes.php');


  global $namespace;
$namespace = 'products/v1';

  class Product_controller{

    public function activate(){
        $this->create_product();
    }

    public function create_product(){
        global $wpdb;
        $table = $wpdb->prefix . 'products';
        $product_info = "CREATE TABLE IF NOT EXISTS " . $table . "(
            id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            product_name text NOT NULL,
            product_brand text NOT NULL,
            product_desc text NOT NULL,
            initial_price int NOT NULL,
            product_price int NOT NULL,
            product_SKU text NOT NULL,
            product_image text NOT NULL,
            is_deleted int DEFAULT 0
        );";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($product_info);
    }
    
      function endpoint_authentication(){
        if(is_user_logged_in()){
            return true;
        } else {
            return false;
        }
       
    }

  }
  
  $controller = new Product_controller();
  register_activation_hook(__FILE__, array($controller, 'activate'));

  add_action('rest_api_init', 'pms_routes');
  function pms_routes(){
    

    $product_routes = new ProductRoute();
    $product_routes->register_routes();
  }
