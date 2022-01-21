<?php

class Productos
{
    private $user = "9fd0d753d2813b2376100d3d4d9b434c";
    private $clave = "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";
    private $tienda = "geekerypro.myshopify.com";

    private function autenticacion($api, $metodo, $data = '')
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://$this->user:$this->clave@$this->tienda$api",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "$metodo",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            CURLOPT_POSTFIELDS => "$data"
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }
    public function allproductos()
    {
        $api = "/admin/api/2022-01/products.json";
        $resultado = $this->autenticacion($api, 'GET');
        return $resultado;
    }
    public function getProductById($id)
    {
        $api = "/admin/api/2022-01/products/" . $id . ".json";
        $resultado = $this->autenticacion($api, 'GET');
        return  $resultado;
    }
    public function getProductPrice($id)
    {
        $api = "/admin/api/2022-01/products/" . $id . ".json";
        $resultado = $this->autenticacion($api, 'GET');
        $precio = $resultado['product']['variants'][0]['price'];
        return $precio;
    }
    public function updateProduct($id, $data)
    {
        $api = "/admin/api/2022-01/products/$id.json";
        $res = json_encode($data);
        $resultado = $this->autenticacion($api, 'PUT', "$res");
        return $resultado;
    }
}

$resultado = new Productos();
$producto = 7529282044131;
$res = ['product' => ['title' => 'Camiseta Replote']];
$respuesta = $resultado->updateProduct($producto, $res);
echo json_encode($respuesta);


/*


    public function getOrderById($id)
    {
        $api = "/admin/api/2022-01/products.json";
        $resultado = $this->autenticacion($api);
        return $resultado;
    }
    public function getProducts()
    {
        $api = "/admin/api/2022-01/products.json";
        $resultado = $this->autenticacion($api);
        return $resultado;
    }
    public function getCustomerByEmail($email)
    {
        $api = "/admin/api/2022-01/products.json";
        $resultado = $this->autenticacion($api);
        return $resultado;
    }
    public function getCustomerOrders($customerId)
    {
        $api = "/admin/api/2022-01/products.json";
        $resultado = $this->autenticacion($api);
        return $resultado;
    }
    public function createCollection($data)
    {
        $api = "/admin/api/2022-01/products.json";
        $resultado = $this->autenticacion($api);
        return $resultado;
    }

























{
    "product": {
        "id": 7529282044131,
        "title": "New product title",
        "body_html": "Camiseta tipo Polo de color Azul",
        "vendor": "geekerypro",
        "product_type": "Ropa y accesorios",
        "created_at": "2022-01-20T13:17:39-05:00",
        "handle": "camiseta-polo",
        "updated_at": "2022-01-20T18:31:29-05:00",
        "published_at": "2022-01-20T13:18:39-05:00",
        "template_suffix": "",
        "status": "active",
        "published_scope": "web",
        "tags": "",
        "admin_graphql_api_id": "gid://shopify/Product/7529282044131",
        "variants": [
            {
                "id": 42366625906915,
                "product_id": 7529282044131,
                "title": "XL / Azul",
                "price": "50000.25",
                "sku": "123",
                "position": 1,
                "inventory_policy": "deny",
                "compare_at_price": "42000.00",
                "fulfillment_service": "manual",
                "inventory_management": "shopify",
                "option1": "XL",
                "option2": "Azul",
                "option3": null,
                "created_at": "2022-01-20T13:17:39-05:00",
                "updated_at": "2022-01-20T17:24:55-05:00",
                "taxable": true,
                "barcode": "321",
                "grams": 100,
                "image_id": null,
                "weight": 100.0,
                "weight_unit": "g",
                "inventory_item_id": 44461130088675,
                "inventory_quantity": 999,
                "old_inventory_quantity": 999,
                "requires_shipping": true,
                "admin_graphql_api_id": "gid://shopify/ProductVariant/42366625906915"
            }
        ],
        "options": [
            {
                "id": 9590705488099,
                "product_id": 7529282044131,
                "name": "Tamaño",
                "position": 1,
                "values": [
                    "XL"
                ]
            },
            {
                "id": 9590705520867,
                "product_id": 7529282044131,
                "name": "Color",
                "position": 2,
                "values": [
                    "Azul"
                ]
            }
        ],
        "images": [
            {
                "id": 36545986822371,
                "product_id": 7529282044131,
                "position": 1,
                "created_at": "2022-01-20T13:17:41-05:00",
                "updated_at": "2022-01-20T13:17:41-05:00",
                "alt": null,
                "width": 500,
                "height": 500,
                "src": "https://cdn.shopify.com/s/files/1/0624/7874/5827/products/Disenosintitulo.png?v=1642702661",
                "variant_ids": [],
                "admin_graphql_api_id": "gid://shopify/ProductImage/36545986822371"
            }
        ],
        "image": {
            "id": 36545986822371,
            "product_id": 7529282044131,
            "position": 1,
            "created_at": "2022-01-20T13:17:41-05:00",
            "updated_at": "2022-01-20T13:17:41-05:00",
            "alt": null,
            "width": 500,
            "height": 500,
            "src": "https://cdn.shopify.com/s/files/1/0624/7874/5827/products/Disenosintitulo.png?v=1642702661",
            "variant_ids": [],
            "admin_graphql_api_id": "gid://shopify/ProductImage/36545986822371"
        }
    }
}











*/