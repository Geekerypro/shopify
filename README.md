
# Libreria Shopify Analisis de caracteres

## **_Parte I -> Conexion a Shopify consumo de API de Shopify_**
### Libreria Shopify
Librería de métodos que permite manipular datos de una tienda en linea de Shopify.
La libreria cuenta con una clase llamada Shopify la cual tiene una serie de metodo que permite hacer la interaccion con la tienda de Shopify

Esta clase se encuentra en el archivo  [shopify/shopify.php](https://github.com/Geekerypro/cafeteria/tree/master/config)

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


## **_Parte II -> Analisis de caracteres repetidos en una cadena de caracteres._**
### Analisis de caracteres
Esta funcion "charsIguales($string)" analizar si existe la misma cantidad de caracteres repetidos en una cadena de caracteres, la funcion recibe como parametro un string (cadena de caracteres) y devuelve true si el string tiene la misma cantidad de caracteres repetidos de lo contrario devuelve false

Esta funcion se encuentra en el archivo [shopify/chars.php](https://github.com/Geekerypro/cafeteria/tree/master/config)