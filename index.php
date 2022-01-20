<?php

class Productos
{
    private $user = "9fd0d753d2813b2376100d3d4d9b434c";
    private $clave = "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";
    private $tienda = "geekerypro.myshopify.com";

    private function consultaurl($api)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://$this->user:$this->clave@$this->tienda$api",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    public function test()
    {

        $api = "/admin/api/2022-01/products.json";
        $test = $this->consultaurl($api);
        return $test;

    }

    public function consultarProducto()
    {

        $api = "/admin/api/2022-01/productos/4236662590.json";
        $test = $this->consultaurl($api);
        return $test;

    }

    public function getProductById($id)
    {
        $api = "/admin/api/2022-01/products.json";
        $test = $this->consultaurl($api);
        return $test;
    }
    public function getProductPrice($id)
    {
        $api = "/admin/api/2022-01/products.json";
        $test = $this->consultaurl($api);
        return $test;
    }
    public function updateProduct($id, array $data)
    {
        $api = "/admin/api/2022-01/products.json";
        $test = $this->consultaurl($api);
        return $test;
    }
    public function getOrderById($id)
    {
        $api = "/admin/api/2022-01/products.json";
        $test = $this->consultaurl($api);
        return $test;
    }
    public function getProducts()
    {
        $api = "/admin/api/2022-01/products.json";
        $test = $this->consultaurl($api);
        return $test;
    }
    public function getCustomerByEmail($email)
    {
        $api = "/admin/api/2022-01/products.json";
        $test = $this->consultaurl($api);
        return $test;
    }
    public function getCustomerOrders($customerId)
    {
        $api = "/admin/api/2022-01/products.json";
        $test = $this->consultaurl($api);
        return $test;
    }
    public function createCollection($data)
    {
        $api = "/admin/api/2022-01/products.json";
        $test = $this->consultaurl($api);
        return $test;
    }
}

$test = new Productos();
$producto = $test->test();
echo $producto['products'][0]['id'];



//echo $test->consultarProducto();
