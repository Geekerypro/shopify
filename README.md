
# Prueba Tecnica: Libreria Shopify y Analisis de caracteres

## **_Parte I -> Conexion a Shopify consumo de API de Shopify_**
### Libreria Shopify
Para crear esta libreria y poder realizar el ejercicio con una tienda real se creo una tienda en shopify y se generaron los accesos de api key y token 

Librería de métodos que permite manipular datos de una tienda en linea de Shopify.
La libreria cuenta con una clase llamada Shopify la cual tiene una serie de metodo que permite hacer la interaccion con la tienda de Shopify

Esta clase se encuentra en el archivo  [shopify/shopify.php](https://github.com/Geekerypro/shopify/blob/master/shopify.php)

### Estructura de la Clase
* Metodo: __construct()
    El constructor inicializa las variables de conexion, con la ayuda del metodo "datosConexion()" trae los datos desde el archivo config (por seguridad lo datos de conexion deben estar en un archivo externo)

* Metodo: datosConexion()
    Metodo privado que trae los datos desde el archivo config

* Metodo: autenticacion($api, $metodo, $data = '')
    Metodo privado que autentica la conexion de las api de shopify


### Metodos Disponibles para interactaul con Shopify:

* getProductById($id)
    Metodo que recibe por parametro el id del producto y retorna la informacion del producto
* getProductPrice($id)
    Metodo que recibe por parametro el id del producto y retorna el precio del producto en formato float
* updateProduct($id, $data)
    Metodo que recibe por parametro el id del producto y un array con la informacion para actaulizar y el metodo retorna la informacion del producto actaulizada
* getOrderById($id)
    Metodo que recibe por parametro el id de una orden y el metodo retorna la informacion de la orden
* getProducts()
    Este metodo no recibe parametros y retorna la lista de productos
* getCustomerByEmail($email)
    Metodo que recibe por parametro el un correo electronico y el metodo retorna la informacion del cliente propietario del correo si el correo no existe retorna un array vacio
* getCustomerOrders($customerId)
    Metodo que recibe por parametro el id del cliente y el metodo retorna la informacion de todas las ordenes asociasadas el ciente
* createCollection($data)
    Metodo que permite crear una coleccion este metodo recibe como parametro un array y este metodo retorna la informacion de la nueva coleccion que fie creada
* addToCollection($collectionId, $productId)
    Metodo que permite asociar productos a una coleccion este metodo recibe como parametro el id de la coleccion y el id del producto y el metodo asocia el producto a la coleccion y devuel la informacion de la coleccion donde se puede ve el producto que fua asociado


### Datos para hacer pruebas

* $idProducto1 = 7529282044131;
* $idProducto2 = 7529926197475;
* $idProducto3 = 7530907336931;
* $idProducto4 = 7530909040867;
* $idOrden1 = 4640464077027;
* $idOrden2 = 4641501774051;
* $idOrden3 = 4640464077027;
* $email1 = "ferchosh89@gmail.com";
* $email2 = "feli123@gmail.com";
* $email3 = "camila345@gmail.com";
* $email4 = "juan123@gmail.com";
* $idCliente1 = 6059881496803;
* $idCliente2 = 6060854608099;
* $idCliente3 = 6060855623907;
* $idCliente4 = 6060855001315;
* $nuevaColeccion1 = ['custom_collection' => ['title' => 'Tecnologia']];
* $nuevaColeccion2 = ['custom_collection' => ['title' => 'Juegos']];
* $nuevaColeccion3 = ['custom_collection' => ['title' => 'Hogar']];
* $idcoleccion = 397570048227;

## **_Parte II -> Analisis de caracteres repetidos en una cadena de caracteres._**
### Analisis de caracteres
Esta funcion "charsIguales($string)" analizar si existe la misma cantidad de caracteres repetidos en una cadena de caracteres, la funcion recibe como parametro un string (cadena de caracteres) y devuelve true si el string tiene la misma cantidad de caracteres repetidos de lo contrario devuelve false

Esta funcion se encuentra en el archivo [shopify/chars.php](https://github.com/Geekerypro/shopify/blob/master/chars.php)

### Resultado de las pruebas con la funcion "charsIguales($string)"

* aaabbbzzz -- true
* xvccvxxvccvx -- true
* uuuiiii -- false
* abcde -- true
* quac -- true
* www -- true
* x -- true
* abb -- false
* AAACCC -- true
* 000111 -- true
* abcdefghijklmnñopqrstuvwz -- true
* "" -- true
