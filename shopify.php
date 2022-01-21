<?php

class Shopify
{
    private $usuario;
    private $clave;
    private $tienda;

    /*
    El constructor inicializa las variables de conexion, con la ayuda del 
    metodo "datosConexion()" trae los datos desde el archivo config (por
    seguridad lo datos de conexion deben estar en un archivo externo)
    */
    function __construct()
    {
        $listaDatos = $this->datosConexion();
        foreach ($listaDatos as $key) {
            $this->usuario = $key['usuario'];
            $this->clave = $key['clave'];
            $this->tienda = $key['tienda'];
        }
    }

    // Metodo privado que trae los datos desde el archivo config
    private function datosConexion()
    {
        $ruta = $_SERVER['DOCUMENT_ROOT'] . '/shopify/';
        $jsonData = file_get_contents($ruta . '/config');
        return json_decode($jsonData, true);
    }

    // metodo privado que autentica la conexion a las api de shopify
    private function autenticacion($api, $metodo, $data = '')
    {
        $conexion = curl_init();
        curl_setopt_array($conexion, array(
            CURLOPT_URL => "https://$this->usuario:$this->clave@$this->tienda$api",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "$metodo",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            CURLOPT_POSTFIELDS => "$data"
        ));
        $response = curl_exec($conexion);
        curl_close($conexion);
        return json_decode($response, true);
    }

    // Metodo que recibe por parametro el id del producto y retorna la informacion del producto
    public function getProductById($id)
    {
        $api = "/admin/api/2022-01/products/$id.json";
        $resultado = $this->autenticacion($api, 'GET');
        return  $resultado;
    }

    /*
    Metodo que recibe por parametro el id del producto y retorna el
    precio del producto en formato float
    */
    public function getProductPrice($id)
    {
        $api = "/admin/api/2022-01/products/$id.json";
        $resultado = $this->autenticacion($api, 'GET');
        $precio = $resultado['product']['variants'][0]['price'];
        return $precio;
    }

    /*
    Metodo que recibe por parametro el id del producto y un array con la informacion para actaulizar
    y el metodo retorna la informacion del producto actaulizada
    */
    public function updateProduct($id, $data)
    {
        $api = "/admin/api/2022-01/products/$id.json";
        $res = json_encode($data);
        $resultado = $this->autenticacion($api, 'PUT', "$res");
        return $resultado;
    }

    /*
    Metodo que recibe por parametro el id de una orden 
    y el metodo retorna la informacion de la orden
    */
    public function getOrderById($id)
    {
        $api = "/admin/api/2022-01/orders/$id.json";
        $resultado = $this->autenticacion($api, 'GET');
        return $resultado;
    }

    /*
    Este metodo no recibe parametros y retorna la lista de productos
    */
    public function getProducts()
    {
        $api = "/admin/api/2022-01/products.json";
        $resultado = $this->autenticacion($api, 'GET');
        return $resultado;
    }

    /*
    Metodo que recibe por parametro el un correo electronico y el metodo retorna
    la informacion del cliente propietario del correo si el correo no existe retorna un array vacio
    */
    public function getCustomerByEmail($email)
    {
        $api = "/admin/api/2022-01/customers/search.json?query=email:$email";
        $resultado = $this->autenticacion($api, 'GET');
        return $resultado;
    }

    /*
    Metodo que recibe por parametro el id del cliente y el metodo retorna
    la informacion de todas las ordenes asociasadas el ciente
    */
    public function getCustomerOrders($customerId)
    {
        $api = "/admin/api/2022-01/customers/$customerId/orders.json";
        $resultado = $this->autenticacion($api, 'GET');
        return $resultado;
    }

    /*
    Metodo que permite crear una coleccion este metodo recibe como parametro un array y este metodo retorna
    la informacion de la nueva coleccion que fie creada
    */
    public function createCollection($data)
    {
        $api = "/admin/api/2022-01/custom_collections.json";
        $param = json_encode($data);
        $resultado = $this->autenticacion($api, 'POST', "$param");
        return $resultado;
    }

    /*
    Metodo que permite asociar productos a una coleccion este metodo recibe como parametro 
    el id de la coleccion y el id del producto y el metodo asocia el producto a la coleccion
    y devuel la informacion de la coleccion donde se puede ve el producto que fua asociado
    */
    public function addToCollection($collectionId, $productId)
    {
        $api = "/admin/api/2022-01/collects.json";
        $data = ['collect' => ['product_id' => $productId, 'collection_id' => $collectionId]];
        $param = json_encode($data);
        $resultado = $this->autenticacion($api, 'POST', "$param");
        return $resultado;
    }
}

$camiseta = 7529282044131;
$pantalon = 7529926197475;
$orden = 4640464077027;
$email = "ferchosh89@gmail.com";
$cliente = 6059881496803;
$coleccion = ['custom_collection' => ['title' => 'Ropa']];
$idcoleccion = 397570048227;

$resultado = new Shopify();
$respuesta = $resultado->getCustomerByEmail($email);
echo json_encode($respuesta);
