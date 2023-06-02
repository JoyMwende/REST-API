<?php

/**
 * @package Rest_Api
 */

 class ProductRoute{

    public function register_routes(){
        register_rest_route(
            'products/v1',
            '/products',
            [
                'methods' => 'GET',
                'callback' => [$this, 'get_products'],
                'permission_callback' => [$this, 'endpoint_authentication']
            ]
        );
        
        register_rest_route(
            'products/v1',
            '/products/(?P<id>\d+)',
            [
                'methods' => 'GET',
                'callback' => [$this, 'get_product'],
                'permission_callback' => [$this, 'endpoint_authentication']
                ]
            );

        register_rest_route(
            'products/v1',
            '/products',
            [
                'methods' => 'POST',
                'callback' => [$this, 'create_product'],
                'permission_callback' => [$this, 'endpoint_authentication']
            ]
        );
        
        register_rest_route(
            'products/v1',
            '/products/(?P<id>\d+)',
            [
                'methods' => 'PUT',
                'callback' => [$this, 'update_product'],
                'permission_callback' => [$this, 'endpoint_authentication']
                ]
            );
            
            register_rest_route(
                'products/v1',
                '/products/(?P<id>\d+)',
                [
                    'methods' => 'DELETE',
                    'callback' => [$this, 'delete_product'],
                    'permission_callback' => [$this, 'endpoint_authentication']
                    ]
                );
                
            register_rest_route(
                'products/v1',
                '/products/deleted',
                [
                    'methods' => 'GET',
                    'callback' => [$this, 'get_deleted_products'],
                    'permission_callback' => [$this, 'endpoint_authentication']
                ]
            );
            }
            
            public function get_products(){
        global $wpdb;
        $table = $wpdb->prefix . 'products';
        $products = $wpdb->get_results("SELECT * FROM $table WHERE is_deleted = 0");
        return $products;
    }

    public function get_product($request){
        global $wpdb;
        $table = $wpdb->prefix . 'products';
        $id = $request['id'];
        $product = $wpdb->get_row("SELECT * FROM $table WHERE id = $id");
        return $product;
    }

    public function create_product($request){
        global $wpdb;
        $table = $wpdb->prefix . 'products';
        $product = [
            'product_name' => $request['product_name'],
            'product_brand' => $request['product_brand'],
            'product_desc' => $request['product_desc'],
            'initial_price' => $request['initial_price'],
            'product_price' => $request['product_price'],
            'product_SKU' => $request['product_SKU'],
            'product_image' => $request['product_image'],
        ];
        $newproduct = $wpdb->insert($table, $product);
        return $newproduct;
    }

    public function update_product($request){
        global $wpdb;
        $table = $wpdb->prefix . 'products';
        $product = [
            'product_name' => $request['product_name'],
            'product_brand' => $request['product_brand'],
            'product_desc' => $request['product_desc'],
            'initial_price' => $request['initial_price'],
            'product_price' => $request['product_price'],
            'product_SKU' => $request['product_SKU'],
            'product_image' => $request['product_image'],
        ];
        $id = $request['id'];
        $condition = ['id' => $id];
        $updateproduct = $wpdb->update($table, $product, $condition);
        return $updateproduct;
    }

    public function delete_product($request){
        global $wpdb;
        $table = $wpdb->prefix . 'products';
        $id = $request['id'];
        $condition = ['id' => $id];
        $deleteproduct = $wpdb->update($table, ['is_deleted' => 1], $condition);
        return $deleteproduct;
    }

    public function get_deleted_products(){
        global $wpdb;
        $table = $wpdb->prefix . 'products';
        $products = $wpdb->get_results("SELECT * FROM $table WHERE is_deleted = 1");
        return $products;
    }

    function endpoint_authentication(){
        if(is_user_logged_in()){
            return true;
        } else {
            return false;
        }
       
    }
}