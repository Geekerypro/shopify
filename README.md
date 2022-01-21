# shopify

librería de métodos funcionales para Shopify

/*
El constructor que inicializa las variables de conexion, con la ayuda del
metodo "datosConexion()" trae los datos desde el archivo config
*/
function __construct()

// Metodo privado que trae los datos desde el archivo config
private function datosConexion()

// metodo privado que autentica la conexion a las api de shopify
private function autenticacion($api, $metodo, $data = '')

// Metodo que recibe por parametro el id del producto y retorna la informacion del producto
public function getProductById($id)

// Metodo que recibe por parametro el id del producto y retorna el precio del producto en formato float
public function getProductPrice($id)

/*
Metodo que recibe por parametro el id del producto y un array con la informacion para actaulizar
y el metodo retorna la informacion del producto actaulizada
*/
public function updateProduct($id, $data)

/*
Metodo que recibe por parametro el id de una orden
y el metodo retorna la informacion de la orden
*/
public function getOrderById($id)

/*
Este metodo no recibe parametros y retorna la lista de productos
*/
public function getProducts()

/*
Metodo que recibe por parametro el un correo electronico y el metodo retorna
la informacion del cliente propietario del correo si el correo no existe retorna un array vacio
*/
public function getCustomerByEmail($email)

/*
Metodo que recibe por parametro el id del cliente y el metodo retorna
la informacion de todas las ordenes asociasadas el ciente
*/
public function getCustomerOrders($customerId)


/*
Metodo que permite crear una coleccion este metodo recibe como parametro un array y este metodo retorna
la informacion de la nueva coleccion que fie creada
*/
public function createCollection($data)

/*
Metodo que permite asociar productos a una coleccion este metodo recibe como parametro
el id de la coleccion y el id del producto y el metodo asocia el producto a la coleccion
y devuel la informacion de la coleccion donde se puede ve el producto que fua asociado
*/
public function addToCollection($collectionId, $productId)
