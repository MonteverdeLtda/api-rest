# Monteverde LTDA - Servicios Ambientales y Forestales
---
## PHP-REST-API (v2) - Developed by [FelipheGomez](https://github.com/Feliphegomez)
Script PHP 7 de un solo archivo que agrega una API REST a una base de datos InnoDB MySQL 5.6. PostgreSQL 9.1 y MS SQL Server 2012 son totalmente compatibles.

NOTA: Esta es la implementación de referencia de [TreeQL](https://treeql.org) en PHP.

## Requerimientos

  - PHP 7.0 o superior con controladores PDO para MySQL, PgSQL o SqlSrv habilitados
  - MySQL 5.6 / MariaDB 10.0 o superior para características espaciales en MySQL
  - PostGIS 2.0 o superior para características espaciales en PostgreSQL 9.1 o superior
  - SQL Server 2012 o superior (2017 para soporte de Linux)

##  Problemas conocidos

- ¿Ver los enteros como cadenas de texto? Asegúrese de habilitar la extensión nd_pdo_mysql y deshabilite pdo_mysql .

## Instalación

Esta es una aplicación de un solo archivo! Sube "`api.php`" a algún lugar y disfruta!

Para el desarrollo local, puede ejecutar el servidor web incorporado de PHP:

    php -S localhost:8080

Pruebe el script abriendo la siguiente URL:

    http://localhost:8080/api.php/records/posts/1

No olvide modificar la configuración en la parte inferior del archivo.

Alternativamente, puede integrar este proyecto en el marco web de su elección, ver:

- [API de REST automática para Laravel](https://tqdev.com/2019-automatic-rest-api-laravel)
- [API de REST automática para Symfony 4](https://tqdev.com/2019-automatic-rest-api-symfony)
- [API de REST automática para SlimPHP](https://tqdev.com/2019-automatic-api-slimphp-3)

## Configuración

Edite las siguientes líneas en la parte inferior del archivo "`api.php`":

    $config = new Config([
        'username' => 'xxx',
        'password' => 'xxx',
        'database' => 'xxx',
    ]);

Estas son todas las opciones de configuración y su valor predeterminado entre paréntesis:

- "driver": `mysql`, `pgsql` or `sqlsrv` (`mysql`)
- "address": Nombre de host del servidor de base de datos (`localhost`)
- "port": puerto TCP del servidor de la base de datos (predeterminado en el controlador predeterminado)
- "username": nombre de usuario del usuario que se conecta a la base de datos (no predeterminado)
- "password": contraseña del usuario que se conecta a la base de datos (no predeterminada)
- "database": Base de datos a la que se realiza la conexión (no predeterminado)
- "middlewares": lista de middlewares para cargar (`cors`)
- "controllers": lista de controladores para cargar (`records,geojson,openapi`)
- "openApiBase": información de OpenAPI (`{"info":{"title":"PHP-CRUD-API","version":"1.0.0"}}`)
- "cacheType": `TempFile`, `Redis`, `Memcache`, `Memcached` or `NoCache` (`TempFile`)
- "cachePath": ruta / dirección del caché (por defecto al directorio temporal del sistema)
- "cacheTime": número de segundos que el caché es válido (`10`)
- "debug": muestra los errores en el encabezado "X-Debug-Info" (`false`)
- "basePath": ruta de base de URI de la API (determinada de forma predeterminada utilizando PATH_INFO)

## Limitaciones

Estas limitaciones también estaban presentes en v1:

  - Las claves primarias deben ser de incremento automático (de 1 a 2 ^ 53) o UUID
  - Las claves primarias o externas compuestas no son compatibles
  - No se admiten escrituras complejas (transacciones)
  - Las consultas complejas que llaman a funciones (como "concat" o "suma") no son compatibles
  - La base de datos debe soportar y definir restricciones de clave externa

Estas limitaciones y restricciones se aplican:

  - Las claves primarias deben ser de incremento automático (de 1 a 2 ^ 53) o UUID
  - Las claves primarias o externas compuestas no son compatibles
  - No se admiten escrituras complejas (transacciones)
  - Las consultas complejas que llaman a funciones (como "concat" o "suma") no son compatibles
  - La base de datos debe soportar y definir restricciones de clave externa
  
## Caracteristicas

Las siguientes características son compatibles:

	- Un solo archivo PHP, fácil de implementar.
	- Muy poco código, fácil de adaptar y mantener.
	- Admite variables POST como entrada (x-www-form-urlencoded)
	- Admite un objeto JSON como entrada
	- Admite una matriz JSON como entrada (inserción por lotes)
	- Desinfectar y validar la entrada utilizando devoluciones de llamada
	- Sistema de permisos para bases de datos, tablas, columnas y registros.
	- Los diseños de bases de datos multiusuario son compatibles
	- Soporte CORS multi-dominio para peticiones de dominio cruzado
	- Soporte para la lectura de resultados combinados de varias tablas.
	- Soporte de búsqueda en múltiples criterios
	- Paginación, clasificación, lista de las N principales y selección de columnas
	- Detección de relaciones con resultados anidados (belongsTo, hasMany y HABTM)
	- Soporte de incremento atómico mediante PATCH (para contadores)
	- Campos binarios soportados con codificación base64
	- Campos y filtros espaciales / SIG compatibles con WKT y GeoJSON
	- Generar documentación de API utilizando herramientas OpenAPI.
	- Autenticación a través de token JWT o nombre de usuario / contraseña
	- Soporte para leer la estructura de la base de datos en JSON
	- Soporte para modificar la estructura de la base de datos utilizando el punto final REST
	- Se incluye middleware para mejorar la seguridad.
	- Cumple con las normas: PSR-2, PSR-4, PSR-7, PSR-15 y PSR-17

## Caracteristicas

Estas características coinciden con las características en v1 (ver rama "v1"):

  - [x] Un solo archivo PHP, fácil de implementar.
  - [x] Muy poco código, fácil de adaptar y mantener.
  - [ ] ~~Transmisión de datos, bajo consumo de memoria.~~
  - [x] Admite variables POST como entrada (x-www-form-urlencoded)
  - [x] Admite un objeto JSON como entrada
  - [x]  Admite una matriz JSON como entrada (inserción por lotes)
  - [ ] ~~Admite la carga de archivos desde formularios web (multipart / form-data)~~
  - [ ] ~~Salida JSON condensada: la primera fila contiene nombres de campo~~
  - [x] Desinfectar y validar la entrada utilizando devoluciones de llamada
  - [x] Sistema de permisos para bases de datos, tablas, columnas y registros.
  - [x] Los diseños de bases de datos multiusuario son compatibles
  - [x] Soporte CORS multi-dominio para peticiones de dominio cruzado
  - [x] Soporte para la lectura de resultados combinados de varias tablas.
  - [x] Soporte de búsqueda en múltiples criterios
  - [x] Paginación, búsqueda, clasificación y selección de columnas.
  - [x] Detección de relaciones con resultados anidados (belongsTo, hasMany y HABTM)
  - [ ] ~~Relación "transforma" (de JSON condensado) para PHP y JavaScript~~
  - [x] Soporte de incremento atómico mediante PATCH (para contadores)
  - [x] Campos binarios soportados con codificación base64
  - [x] Campos y filtros espaciales / SIG compatibles con WKT
  - [ ] ~~Soporte de datos no estructurados a través de JSON / JSONB~~
  - [x] Generar documentación de API utilizando herramientas OpenAPI
  - [x] Autenticación a través de token JWT o nombre de usuario / contraseña
  - [ ] ~~Soporte de SQLite~~

 NB: Sin marca significa: aún no implementado. Striken significa: no será implementado.

### Características adicionales

Estas características son nuevas y no se incluyeron en v1.

  - No refleja en cada solicitud (mejor rendimiento)
  - Los filtros complejos (con "y" y "o") son compatibles
  - Soporte para salida de estructura de base de datos en JSON
  - Soporte para datos booleanos y binarios en todos los motores de bases de datos
  - Soporte para datos relacionales en lectura (no solo en operación de lista)
  - Soporte para middleware para modificar todas las operaciones (también lista)
  - Informe de errores en JSON con el estado HTTP correspondiente
  - Soporte para autenticación básica y vía proveedor de autenticación (JWT)
  - Soporte para funcionalidad básica de firewall.

## Middleware o lógica de intercambio de información entre aplicaciones

Puede habilitar el siguiente middleware utilizando el parámetro de configuración "middlewares":

- "firewall": limita el acceso a direcciones IP específicas
- "cors":  soporte para solicitudes CORS (habilitado por defecto)
- "xsrf": Bloquee los ataques XSRF usando el método 'Double Submit Cookie'
- "ajaxOnly": restringe las solicitudes que no son AJAX para evitar ataques XSRF
- "dbAuth": Soporte para "Autenticación de base de datos"
- "jwtAuth": soporte para "autenticación JWT"
- "basicAuth": Soporte para "Autenticación básica"
- "authorization": restringe el acceso a ciertas tablas o columnas
- "validation": devuelve errores de validación de entrada para reglas personalizadas
- "ipAddress": rellene un campo protegido con la dirección IP en crear
- "sanitation": aplicar saneamiento de entrada en crear y actualizar
- "multiTenancy": restringe el acceso de los inquilinos en un escenario con múltiples inquilinos
- "pageLimits": restringe las operaciones de lista para evitar el raspado de la base de datos
- "joinLimits": restringe los parámetros de unión para evitar el raspado de la base de datos
- "customization": proporciona controladores para la personalización de solicitudes y respuestas

El parámetro de configuración "middlewares" es una lista separada por comas de middlewares habilitados.
Puede ajustar el comportamiento del middleware utilizando parámetros de configuración específicos del middleware:

- "firewall.reverseProxy": se establece en "true" cuando se utiliza un proxy inverso ("")
- "firewall.allowedIpAddresses": lista de direcciones IP que pueden conectarse ("")
- "cors.allowedOrigins": los orígenes permitidos en los encabezados CORS ("*")
- "cors.allowHeaders": los encabezados permitidos en la solicitud CORS ("Content-Type, X-XSRF-TOKEN")
- "cors.allowMethods": los métodos permitidos en la solicitud CORS ("OPTIONS, GET, PUT, POST, DELETE, PATCH")
- "cors.allowCredentials": para permitir credenciales en la solicitud CORS ("true")
- "cors.exposeHeaders":  encabezados de lista blanca a los que los navegadores pueden acceder ("")
- "cors.maxAge": el tiempo que la concesión de CORS es válida en segundos ("1728000")
- "xsrf.excludeMethods": los métodos que no requieren la protección XSRF ("OPTIONS, GET")
- "xsrf.cookieName": el nombre de la cookie de protección XSRF ("XSRF-TOKEN")
- "xsrf.headerName": el nombre del encabezado de protección XSRF ("X-XSRF-TOKEN")
- "ajaxOnly.excludeMethods": los métodos que no requieren AJAX ("OPTIONS, GET")
- "ajaxOnly.headerName": el nombre del encabezado requerido ("X-Requested-With")
- "ajaxOnly.headerValue": el valor del encabezado requerido ("XMLHttpRequest")
- "dbAuth.mode": configúrelo como "opcional" si desea permitir el acceso anónimo ("required")
- "dbAuth.usersTable": la tabla que se utiliza para almacenar los usuarios en ("usuarios")
- "dbAuth.usernameColumn": la columna de la tabla de usuarios que contiene los nombres de usuario ("username")
- "dbAuth.passwordColumn": la columna de la tabla de usuarios que contiene las contraseñas ("password")
- "dbAuth.returnedColumns": las columnas que se devuelven al iniciar sesión correctamente, significa "todas" ("")
- "jwtAuth.mode": configúrelo como "opcional" si desea permitir el acceso anónimo ("required")
- "jwtAuth.header": nombre del encabezado que contiene el token JWT ("X-Autorización")
- "jwtAuth.leeway": el número aceptable de segundos de inclinación del reloj ("5")
- "jwtAuth.ttl":  el número de segundos que el token es válido ("30")
- "jwtAuth.secret": el secreto compartido utilizado para firmar el token JWT con ("")
- "jwtAuth.algorithms": los algoritmos permitidos, vacío significa 'todos' ("")
- "jwtAuth.audiences": las audiencias permitidas, vacío significa 'todos' ("")
- "jwtAuth.issuers": los emisores que están permitidos, vacío significa 'todos' ("")
- "basicAuth.mode": configúrelo como "opcional" si desea permitir el acceso anónimo ("required")
- "basicAuth.realm": texto que se le solicitará al mostrar el inicio de sesión ("Username and password required")
- "basicAuth.passwordFile": el archivo que debe leerse para las combinaciones de nombre de usuario / contraseña (".htpasswd")
- "authorization.tableHandler": controlador para implementar las reglas de autorización de tablas ("")
- "authorization.columnHandler": controlador para implementar las reglas de autorización de columna ("")
- "authorization.recordHandler": controlador para implementar reglas de filtro de autorización de registros ("")
- "validation.handler": controlador para implementar reglas de validación para valores de entrada ("")
- "ipAddress.tables": tablas para buscar columnas para reemplazar con la dirección IP ("")
- "ipAddress.columns": columnas para proteger y anular con la dirección IP en crear ("")
- "sanitation.handler": controlador para implementar reglas de saneamiento para valores de entrada ("")
- "multiTenancy.handler": controlador para implementar reglas simples de tenencia múltiple ("")
- "pageLimits.pages": el número de página máximo que permite una operación de lista ("100")
- "pageLimits.records": el número máximo de registros devueltos por una operación de lista ("1000")
- "joinLimits.depth": la profundidad máxima (longitud) que se permite en una ruta de unión ("3")
- "joinLimits.tables": el número máximo de tablas a las que puede unirse ("10")
- "joinLimits.records": el número máximo de registros devueltos para una entidad unida ("1000")
- "customization.beforeHandler": Controlador para implementar la personalización de la solicitud ("")
- "customization.afterHandler": controlador para implementar la personalización de la respuesta ("")

Si no especifica estos parámetros en la configuración, se utilizan los valores predeterminados (entre paréntesis).

## TreeQL, un GraphQL pragmático

[TreeQL](https://treeql.org) permite crear un "árbol" de objetos JSON en función de la estructura de la base de datos SQL (relaciones) y su consulta.

Se basa libremente en el estándar REST y también está inspirado en json: api.

### Lista + CRUD

La tabla de publicaciones de ejemplo tiene solo unos pocos campos:

    posts  
    =======
    id     
    title  
    content
    created

Las siguientes operaciones de la lista CRUD + actúan en esta tabla.

#### Crear

Si desea crear un registro, la solicitud se puede escribir en formato de URL como:

    POST /records/posts

Tienes que enviar un cuerpo que contiene:

    {
        "title": "Black is the new red",
        "content": "This is the second post.",
        "created": "2018-03-06T21:34:01Z"
    }

Y devolverá el valor de la clave principal del registro recién creado:

    2

#### Leer

Para leer un registro de esta tabla, la solicitud se puede escribir en formato de URL como:

    GET /records/posts/1

Donde "1" es el valor de la clave principal del registro que desea leer. Volverá

    {
        "id": 1
        "title": "Hello world!",
        "content": "Welcome to the first post.",
        "created": "2018-03-05T20:12:56Z"
    }

En las operaciones de lectura puede aplicar uniones.

#### actualizar

Para actualizar un registro en esta tabla, la solicitud se puede escribir en formato de URL como:

    PUT /records/posts/1

Donde "1" es el valor de la clave principal del registro que desea actualizar. Enviar como un cuerpo:

    {
        "title": "Adjusted title!"
    }

Esto ajusta el título del post. Y el valor de retorno es el número de filas que se establecen:

    1

#### Borrar

Si desea eliminar un registro de esta tabla, la solicitud se puede escribir en formato de URL como:

    DELETE /records/posts/1

Y devolverá el número de filas eliminadas:

    1

#### Lista

Para listar los registros de esta tabla, la solicitud se puede escribir en formato de URL como:

    GET /records/posts

It will return:

    {
        "records":[
            {
                "id": 1,
                "title": "Hello world!",
                "content": "Welcome to the first post.",
                "created": "2018-03-05T20:12:56Z"
            }
        ]
    }

En las operaciones de lista puede aplicar filtros y uniones.

### Filtros

Los filtros proporcionan la funcionalidad de búsqueda, en la lista de llamadas, usando el parámetro "filtro". Debe especificar el nombre de la columna, una coma, el tipo de coincidencia, otra coma y el valor que desea filtrar. Estos son tipos de concordancia soportados:

  - "cs": contiene cadena (cadena contiene valor)
  - "sw": comienza con (la cadena comienza con el valor)
  - "ew": termina con (final de cadena con valor)
  - "eq": igual (la cadena o el número coinciden exactamente)
  - "lt": menor que (el número es menor que el valor)
  - "le": menor o igual (el número es menor o igual al valor)
  - "ge": mayor o igual (el número es mayor o igual que el valor)
  - "gt": mayor que (el número es mayor que el valor)
  - "bt": entre (el número está entre dos valores separados por comas)
  - "in": in (el número o la cadena está en una lista de valores separados por comas)
  - "is": es nulo (el campo contiene el valor "NULL")

Puede negar todos los filtros al anteponer un carácter "n", de modo que "eq" se convierta en "neq". Ejemplos de uso del filtro son:

    GET /records/categories?filter=name,eq,Internet
    GET /records/categories?filter=name,sw,Inter
    GET /records/categories?filter=id,le,1
    GET /records/categories?filter=id,ngt,2
    GET /records/categories?filter=id,bt,1,1

Salida:

    {
        "records":[
            {
                "id": 1
                "name": "Internet"
            }
        ]
    }

En la siguiente sección profundizaremos en cómo puede aplicar varios filtros en una sola llamada de lista.

### Filtros múltiples

Los filtros pueden aplicarse aplicando el parámetro "filtro" en la URL. Por ejemplo la siguiente URL: 

    GET /records/categories?filter=id,gt,1&filter=id,lt,3

solicitará todas las categorías "donde id> 1 e id <3". Si desea "where id = 2 o id = 4" debe escribir:

    GET /records/categories?filter1=id,eq,2&filter2=id,eq,4
    
Como ve, agregamos un número al parámetro "filtro" para indicar que se debe aplicar "OR" en lugar de "AND".
Tenga en cuenta que también puede repetir "filter1" y crear un "AND" dentro de un "OR". Dado que también puede ir un nivel más profundo al agregar una letra (af), puede crear casi cualquier árbol de condiciones razonablemente complejo.

NOTA: solo puede filtrar en la tabla solicitada (no incluida en ella) y los filtros solo se aplican en la lista de llamadas.

### Seleccion de columna

Por defecto, todas las columnas están seleccionadas.
Con el parámetro "incluir" puede seleccionar columnas específicas.
Puede usar un punto para separar el nombre de la tabla del nombre de la columna. Las columnas múltiples deben estar separadas por comas. Se puede utilizar un asterisco ("*") como comodín para indicar "todas las columnas". Similar a "incluir" puede usar el parámetro "excluir" para eliminar ciertas columnas:

```
GET /records/categories/1?include=name
GET /records/categories/1?include=categories.name
GET /records/categories/1?exclude=categories.id
```

Salida:

```
    {
        "name": "Internet"
    }
```

NOTA: las columnas que se utilizan para incluir entidades relacionadas se agregan automáticamente y no se pueden dejar fuera de la salida.

### Ordenando

Con el parámetro "orden" se puede ordenar. Por defecto, la clasificación está en orden ascendente, pero al especificar "desc" esto se puede revertir:

```
GET /records/categories?order=name,desc
GET /records/categories?order=id,desc&order=name
```

Salida:

```
    {
        "records":[
            {
                "id": 3
                "name": "Web development"
            },
            {
                "id": 1
                "name": "Internet"
            }
        ]
    }
```

NOTA: puede ordenar en múltiples campos utilizando múltiples parámetros de "orden". No se puede ordenar en columnas "unidas".

### Tamaño limite

El parámetro "tamaño" limita el número de registros devueltos. Esto se puede usar para las N listas principales junto con el parámetro "orden" (usar orden descendente).

```
GET /records/categories?order=id,desc&size=1
```

Salida:

```
    {
        "records":[
            {
                "id": 3
                "name": "Web development"
            }
        ]
    }
```

NOTA: si también desea conocer el número total de registros, puede utilizar el parámetro "página".

### Paginación

El parámetro "página" contiene la página solicitada. El tamaño de página predeterminado es 20, pero se puede ajustar (por ejemplo, a 50).

```
GET /records/categories?order=id&page=1
GET /records/categories?order=id&page=1,50
```

Salida:

```
    {
        "records":[
            {
                "id": 1
                "name": "Internet"
            },
            {
                "id": 3
                "name": "Web development"
            }
        ],
        "results": 2
    }
```

NOTA: como las páginas que no están ordenadas no pueden paginarse, las páginas se ordenarán por clave principal.

### Union de Tablas

Digamos que usted tiene una tabla de publicaciones que tiene comentarios (realizados por los usuarios) y que las publicaciones pueden tener etiquetas.

    posts    comments  users     post_tags  tags
    =======  ========  =======   =========  ======= 
    id       id        id        id         id
    title    post_id   username  post_id    name
    content  user_id   phone     tag_id
    created  message

Cuando desee enumerar las publicaciones con sus usuarios y etiquetas de comentarios, puede solicitar dos rutas de "árbol":

    posts -> comments  -> users
    posts -> post_tags -> tags

Estas rutas tienen la misma raíz y esta solicitud se puede escribir en formato de URL como:

    GET /records/posts?join=comments,users&join=tags

Aquí puede omitir la tabla intermedia que vincula las publicaciones a las etiquetas. En este ejemplo, verá los tres tipos de relaciones de tabla (hasMany, belongsTo y hasAndBelongsToMany) en efecto:

- "post" tiene muchos "comments"
- "comment" pertenece a "user"
- "post" tiene y pertenece a muchas "tags"

Esto puede llevar a los siguientes datos JSON:

    {
        "records":[
            {
                "id": 1,
                "title": "Hello world!",
                "content": "Welcome to the first post.",
                "created": "2018-03-05T20:12:56Z",
                "comments": [
                    {
                        id: 1,
                        post_id: 1,
                        user_id: {
                            id: 1,
                            username: "mevdschee",
                            phone: null,
                        },
                        message: "Hi!"
                    },
                    {
                        id: 2,
                        post_id: 1,
                        user_id: {
                            id: 1,
                            username: "mevdschee",
                            phone: null,
                        },
                        message: "Hi again!"
                    }
                ],
                "tags": []
            },
            {
                "id": 2,
                "title": "Black is the new red",
                "content": "This is the second post.",
                "created": "2018-03-06T21:34:01Z",
                "comments": [],
                "tags": [
                    {
                        id: 1,
                        message: "Funny"
                    },
                    {
                        id: 2,
                        message: "Informational"
                    }
                ]
            }
        ]
    }

Verá que se detectan las relaciones "belongsTo" y el valor al que se hace referencia reemplaza el valor de la clave externa.
En el caso de "hasMany" y "hasAndBelongsToMany", el nombre de la tabla se utiliza una nueva propiedad en el objeto.

### Operaciones por lotes

Cuando desee crear, leer, actualizar o eliminar, puede especificar varios valores de clave principal en la URL. También debe enviar una matriz en lugar de un objeto en el cuerpo de la solicitud para crear y actualizar.

Para leer un registro de esta tabla, la solicitud se puede escribir en formato de URL como:

    GET /records/posts/1,2

El resultado puede ser:

    [
            {
                "id": 1,
                "title": "Hello world!",
                "content": "Welcome to the first post.",
                "created": "2018-03-05T20:12:56Z"
            },
            {
                "id": 2,
                "title": "Black is the new red",
                "content": "This is the second post.",
                "created": "2018-03-06T21:34:01Z"
            }
    ]

De forma similar, cuando desea realizar una actualización por lotes, la solicitud en formato de URL se escribe como:

    PUT /records/posts/1,2

Donde "1" y "2" son los valores de las claves primarias de los registros que desea actualizar. El cuerpo debe contener el mismo número de objetos, ya que hay claves primarias en la URL:

    [   
        {
            "title": "Adjusted title for ID 1"
        },
        {
            "title": "Adjusted title for ID 2"
        }        
    ]

Esto ajusta los títulos de los mensajes. Y los valores de retorno son el número de filas que se establecen:

    1,1

Lo que significa que había dos operaciones de actualización y cada una de ellas había establecido una fila.
Las operaciones por lotes utilizan transacciones de la base de datos, por lo que o bien todas tienen éxito o todas fallan (las exitosas se devuelven).

### Soporte espacial

Para el soporte espacial hay un conjunto adicional de filtros que se pueden aplicar en columnas de geometría y que comienzan con una "s":

  - "sco": contiene espacial (la geometría contiene otra)
  - "scr": cruces espaciales (la geometría cruza otra)
  - "sdi": separación espacial (la geometría es diferente de otra)
  - "seq": espacial igual (la geometría es igual a otra)
  - "sin": intersecciones espaciales (la geometría se interseca con otra)
  - "sov": superposiciones espaciales (la geometría se superpone a otra)
  - "sto": toques espaciales (la geometría toca a otra)
  - "swi": espacial dentro (la geometría está dentro de otra)
  - "sic": el espacio está cerrado (la geometría es cerrada y simple)
  - "sis": espacial es simple (la geometría es simple)
  - "siv": el espacio es válido (la geometría es válida)

Estos filtros se basan en los estándares OGC y también lo es la especificación WKT en la que se representan las columnas de geometría.

#### GeoJSON

El soporte de GeoJSON es una vista de solo lectura en las tablas y registros en formato GeoJSON. Estas solicitudes son compatibles:

    method path                  - operation - description
    ----------------------------------------------------------------------------------------
    GET    /geojson/{table}      - list      - lists records as a GeoJSON FeatureCollection
    GET    /geojson/{table}/{id} - read      - reads a record by primary key as a GeoJSON Feature

El "`/geojson`" punto final utiliza el "`/records`" punto interno y hereda toda la funcionalidad, como las combinaciones y los filtros.
También admite un parámetro de "geometría" para indicar el nombre de la columna de geometría en caso de que la tabla tenga más de una.
Para las vistas de mapa, admite el parámetro "bbox" en el que puede especificar las coordenadas superior izquierda y inferior derecha (separadas por comas).
Los siguientes tipos de geometría son compatibles con la implementación de GeoJSON:

  - Point - Punto
  - MultiPoint
  - LineString
  - MultiLineString
  - Polygon - Polígono
  - MultiPolygon

La funcionalidad GeoJSON está habilitada de forma predeterminada, pero se puede deshabilitar usando la configuración de "controladores".

### Autenticación

Actualmente hay tres tipos de autenticación soportados. Todos ellos almacenan el usuario autenticado en el `$_SESSION` súper global.
Esta variable se puede usar en los controladores de autorización para decidir si o no sombeody debería tener acceso de lectura o escritura a ciertas tablas, columnas o registros.
La siguiente descripción general muestra los tipos de middleware de autenticación que puede habilitar.

| Nombre   | Middleware | Autenticado a través de    | Los usuarios se almacenan en | Variable de sesion      |
| -------- | ---------- | -------------------------- | ---------------------------- | ----------------------- |
| Database | dbAuth     | '/login' punto final       | 	tabla de base de datos      | `$_SESSION['user']`     |
| Basic    | basicAuth  | 'Authorization' Encabezado | '.htpasswd' archivo          | `$_SESSION['username']` |
| JWT      | jwtAuth    | 'Authorization' Encabezado | proveedor de identidad       | `$_SESSION['claims']`   |

A continuación encontrará más información sobre cada uno de los tipos de autenticación.

#### Autenticación de base de datos

El middleware de autenticación de base de datos define dos nuevas rutas:

    method path       - parameters               - description
    ----------------------------------------------------------------------------------------
    POST   /login     - username + password      - logs a user in by username and password
    POST   /logout    -                          - logs out the currently logged in user

Un usuario puede iniciar sesión enviando su nombre de usuario y contraseña al punto final de inicio de sesión (en formato JSON).
El usuario autenticado (con todas sus propiedades) se almacenará en la `$_SESSION['user']` variable.
El usuario puede cerrar la sesión enviando una solicitud POST con un cuerpo vacío al punto final de cierre de sesión.
Las contraseñas se almacenan como hashes en la columna de contraseña en la tabla de usuarios.
Para generar el valor de hash para la contraseña 'pass2' puede ejecutar en la línea de comando:

    php -r 'echo password_hash("pass2", PASSWORD_DEFAULT)."\n";'

¡Es IMPORTANTE restringir el acceso a la tabla de usuarios utilizando el middleware de "authorization", de lo contrario, todos los usuarios pueden agregar, modificar o eliminar libremente cualquier cuenta!
La configuración mínima se muestra a continuación:

    'middlewares' => 'dbAuth,authorization',
    'authorization.tableHandler' => function ($operation, $tableName) {
        return $tableName != 'users';
    },

Tenga en cuenta que este middleware utiliza cookies de sesión y almacena el estado de inicio de sesión en el servidor.

#### Autenticación básica

El tipo Básico es compatible con un archivo (por defecto '.htpasswd') que contiene a los usuarios y sus contraseñas (con hash) separadas por dos puntos (':').
Cuando las contraseñas se ingresan en texto sin formato, se llenan automáticamente.
El nombre de usuario autenticado se almacenará en la `$_SESSION['username']` variable.
Debe enviar un encabezado de "Autorización" que contenga un nombre de usuario y una contraseña codificados en base64 url ​​y separados por dos puntos después de la palabra "Basic".

    Authorization: Basic dXNlcm5hbWUxOnBhc3N3b3JkMQ

Este ejemplo envía la cadena "username1: password1".

#### Autenticación JWT

El tipo JWT requiere que otro servidor (SSO / Identity) firme un token que contiene notificaciones.
Ambos servidores comparten un secreto para que puedan firmar o verificar que la firma es válida.
Las reclamaciones se almacenan en la variable `$_SESSION['claims']` .
Debe enviar un encabezado "Autorización X" que contenga un encabezado, cuerpo y token de token con codificación url base64, cuerpo y firma después de la palabra "Bearer" ([lea más acerca de JWT aquí](https://jwt.io/)).
El estándar dice que necesita usar el encabezado "Authorization", pero esto es problemático en Apache y PHP.

    X-Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWUsImlhdCI6IjE1MzgyMDc2MDUiLCJleHAiOjE1MzgyMDc2MzV9.Z5px_GT15TRKhJCTHhDt5Z6K6LRDSFnLj8U5ok9l7gw

Este ejemplo envía los reclamos firmados:

    {
      "sub": "1234567890",
      "name": "John Doe",
      "admin": true,
      "iat": "1538207605",
      "exp": 1538207635
    }

NOTA: la implementación de JWT solo admite los algoritmos basados ​​en RSA y HMAC.

##### Configurar y probar la autenticación JWT con Auth0.

Primero necesitas crear una cuenta en [Auth0](https://auth0.com/auth/login).
Una vez que haya iniciado sesión, debe crear una aplicación (su tipo no importa).
Recoger el `Domain` y el `Client ID` IDy mantenerlos para un uso posterior. Luego, cree una API: asígnele un nombre y complete el identifiercampo con la URL de su punto final de API.

Luego tienes que configurar la `jwtAuth.secret` onfiguración en tu archivo `api.php`.
DNo lo llene con `secret` lo que encontrará en la configuración de la aplicación Auth0, sino con un certificado público.
Para encontrarlo, vaya a la configuración de su aplicación, luego en "Configuración adicional".
Ahora encontrará una pestaña "Certificados" donde encontrará su clave pública en el campo Certificado de firma.

Asegúrese de llenar estas tres variables:

 - `authUrl` con su dominio Auth0
 - `clientId` con su ID de cliente
 - `audience` con la URL de la API que creó en Auth0

⚠️ Si no llena el parámetro de audiencia, no funcionará porque no obtendrá un JWT válido.

También puede cambiar la `url` variable, utilizada para probar la API con autenticación.

[Más información](https://auth0.com/docs/api-auth/tutorials/verify-access-token)

##### Configure y pruebe la autenticación JWT con Firebase

Primero debe crear un proyecto de Firebase en la [Consola Firebase](https://console.firebase.google.com/).
Agregue una aplicación web a este proyecto y capture el fragmento de código para su uso posterior.

Luego tienes que configurar la `jwtAuth.secret` configuración en tu archivo `api.php`.
Agarra la clave pública a través de esta [URL](https://www.googleapis.com/robot/v1/metadata/x509/securetoken@system.gserviceaccount.com).
Puede haber varios certificados, solo toma el correspondiente a tu `kid` (si no sabes qué es, solo pruébalos todos hasta que ingreses).
Ahora, simplemente llene jwtAuth.secretcon su clave pública.

También puede cambiar la urlvariable, utilizada para probar la API con autenticación.

[Más información](https://firebase.google.com/docs/auth/admin/verify-id-tokens#verify_id_tokens_using_a_third-party_jwt_library)

## Operaciones de autorización

El modelo de Autorización actúa sobre "operations". Los más importantes se enumeran aquí:

    method path                  - operation - description
    ----------------------------------------------------------------------------------------
    GET    /records/{table}      - list      - lists records
    POST   /records/{table}      - create    - creates records
    GET    /records/{table}/{id} - read      - reads a record by primary key
    PUT    /records/{table}/{id} - update    - updates columns of a record by primary key
    DELETE /records/{table}/{id} - delete    - deletes a record by primary key
    PATCH  /records/{table}/{id} - increment - increments columns of a record by primary key

El "`/openapi`" punto final solo mostrará lo que está permitido en su sesión.
También tiene una operación especial de "documento" que le permite ocultar tablas y columnas de la documentación.

Para los puntos finales que comienzan con "`/columns`" están las operaciones "reflect" y "remodel".
Estas operaciones pueden mostrar o cambiar la definición de la base de datos, tabla o columna.
Esta funcionalidad está desactivada por defecto y por una buena razón (¡cuidado!).
Agregue las "columns" al controlador en la configuración para habilitar esta funcionalidad.

### Autorizar tablas, columnas y registros.

Por defecto, todas las tablas y columnas son accesibles. Si desea restringir el acceso a algunas tablas, puede agregar el middleware de "authorization" 
y definir una función de '"authorization.tableHandler"' "autorización.tabla de lectura" que devuelva '"false"' para estas tablas.

    'authorization.tableHandler' => function ($operation, $tableName) {
        return $tableName != 'license_keys';
    },

El ejemplo anterior restringirá el acceso a la tabla 'license_keys' para todas las operaciones.

    'authorization.columnHandler' => function ($operation, $tableName, $columnName) {
        return !($tableName == 'users' && $columnName == 'password');
    },

El ejemplo anterior restringirá el acceso al campo 'contraseña' de la tabla 'usuarios' para todas las operaciones.

    'authorization.recordHandler' => function ($operation, $tableName) {
        return ($tableName == 'users') ? 'filter=username,neq,admin' : '';
    },

El ejemplo anterior no permitirá el acceso a los registros de usuario donde el nombre de usuario es "admin". Esta construcción agrega un filtro a cada consulta ejecutada.

NOTA: debe manejar la creación de registros no válidos con un controlador de validación (o saneamiento).

### Entrada desinfectante o saneada

Por defecto, todas las entradas son aceptadas y enviadas a la base de datos. Si desea eliminar (ciertas) etiquetas HTML antes de almacenarlas, 
puede agregar el middleware 'sanitation' y definir una función 'sanitation.handler' que devuelva el valor ajustado.

    'sanitation.handler' => function ($operation, $tableName, $column, $value) {
        return is_string($value) ? strip_tags($value) : $value;
    },

El ejemplo anterior eliminará todas las etiquetas HTML de las cadenas en la entrada.

### Validando entrada

Por defecto se acepta toda la entrada. Si desea validar la entrada, puede agregar el middleware 'validation' 
y definir una función 'validation.handler' que devuelva un valor booleano que indique si el valor es válido o no.

    'validation.handler' => function ($operation, $tableName, $column, $value, $context) {
        return ($column['name'] == 'post_id' && !is_numeric($value)) ? 'must be numeric' : true;
    },

Cuando editas un comentario con id 4 usando:

    PUT /records/comments/4

Y envías como cuerpo:

    {"post_id":"two"}

Luego, el servidor devolverá un código de estado HTTP '422' y un mensaje de error agradable:

    {
        "code": 1013,
        "message": "Input validation failed for 'comments'",
        "details": {
            "post_id":"must be numeric"
        }
    }

Puede analizar esta salida para hacer que los campos de formulario aparezcan con un borde rojo y su mensaje de error correspondiente.

### Soporte multi-tenencia

Puede usar el middleware "multiTenancy" cuando tenga una base de datos de múltiples inquilinos.
Si sus inquilinos están identificados por la columna "customer_id" puede usar el siguiente controlador:

    'multiTenancy.handler' => function ($operation, $tableName) {
        return ['customer_id' => 12];
    },

Esta construcción agrega un filtro que requiere que "customer_id" sea "12" a cada operación (excepto para "crear").
También establece la columna "customer_id" en "crear" a "12" y elimina la columna de cualquier otra operación de escritura.

### Evitar el raspado de la base de datos

Puede utilizar el middleware "joinLimits" y "pageLimits" para evitar el raspado de la base de datos.
El middleware "joinLimits" limita la profundidad de la tabla, el número de tablas y el número de registros devueltos en una operación de unión.
Si desea permitir 5 uniones directas directas con un máximo de 25 registros cada una, puede especificar:

    'joinLimits.depth' => 1,
    'joinLimits.tables' => 5,
    'joinLimits.records' => 25,

El middleware "pageLimits" limita el número de página y los registros de números devueltos por una operación de lista.
Si no desea permitir más de 10 páginas con un máximo de 25 registros cada una, puede especificar:

    'pageLimits.pages' => 10,
    'pageLimits.records' => 25,

NOTA: el número máximo de registros también se aplica cuando no hay un número de página especificado en la solicitud.

### Manejadores de personalización

Puede utilizar el middleware de "personalización" para modificar la solicitud y respuesta e implementar cualquier otra funcionalidad.

    'customization.beforeHandler' => function ($operation, $tableName, $request, $environment) {
        $environment->start = microtime(true);
    },
    'customization.afterHandler' => function ($operation, $tableName, $response, $environment) {
        return $response->withHeader('X-Time-Taken', microtime(true) - $environment->start);
    },

El ejemplo anterior agregará un encabezado "X-Time-Taken" con el número de segundos que ha tomado la llamada a la API.

### Archivos subidos

Las cargas de archivos se admiten a través de [FileReader API](https://caniuse.com/#feat=filereader), consulte el [Ejemplo](##EjemploUploadImage).

## Especificación de openapi

En el punto final "/openapi" se sirve la especificación de OpenAPI 3.0 (anteriormente llamada "Swagger").
Es una documentación instantánea legible por máquina de su API. Para obtener más información, echa un vistazo a estos enlaces:

- [Swagger Editor](https://editor.swagger.io/) se puede usar para ver y depurar la especificación generada.
- [Especificación OpenAPI](https://swagger.io/specification/) es un manual para crear una especificación OpenAPI.
- [Swagger Petstore](https://petstore.swagger.io/) es una documentación de ejemplo que se genera utilizando OpenAPI.

## Cache

Hay 4 motores de caché que pueden configurarse mediante el parámetro de configuración "cacheType":

- TempFile (por defecto)
- Redis
- Memcache
- Memcached

Puede instalar las dependencias de los últimos tres motores ejecutando:

    sudo apt install php-redis redis
    sudo apt install php-memcache memcached
    sudo apt install php-memcached memcached

El motor predeterminado no tiene dependencias y usará archivos temporales en la ruta "temporal" del sistema.

Puede usar el parámetro de configuración "cachePath" para especificar la ruta del sistema de archivos para los archivos temporales o, 
en caso de que use un "cacheType" no predeterminado, el nombre de host (opcionalmente con puerto) del servidor de caché.

## Tipos

Estos son los tipos admitidos con su longitud / precisión / escala predeterminadas:

character types
- varchar(255)
- clob

boolean types:
- boolean

integer types:
- integer
- bigint

floating point types:
- float
- double

decimal types:
- decimal(19,4)

date/time types:
- date
- time
- timestamp

binary types:
- varbinary(255)
- blob

other types:
- geometry / * tipo no jdbc, extensión con soporte limitado * /

## Enteros de 64 bits en JavaScript

JavaScript no es compatible con enteros de 64 bits. Todos los números se almacenan como valores de punto flotante de 64 bits.
La mantisa de un número de punto flotante de 64 bits es solo de 53 bits y es por eso que todos los números enteros mayores a 53 bits pueden causar problemas en JavaScript.

## Errores

Los siguientes errores pueden ser reportados:

| Error | Código de respuesta HTTP   | Mensaje (original)                | Mensaje (Español)                          |
| ------| -------------------------- | --------------------------------- | ------------------------------------------ | 
| 1000  | 404 Not found              | Route not found                   | Ruta no encontrada                         |
| 1001  | 404 Not found              | Table not found                   | Tabla no encontrada                        |
| 1002  | 422 Unprocessable entity   | Argument count mismatch           | Discrepancia en el recuento de argumentos  |
| 1003  | 404 Not found              | Record not found                  | Registro no encontrado                     |
| 1004  | 403 Forbidden              | Origin is forbidden               | El origen esta prohibido                   |
| 1005  | 404 Not found              | Column not found                  | Columna no encontrada                      |
| 1006  | 409 Conflict               | Table already exists              | La tabla ya existe                         |
| 1007  | 409 Conflict               | Column already exists             | La columna ya existe                       |
| 1008  | 422 Unprocessable entity   | Cannot read HTTP message          | No se puede leer el mensaje HTTP           |
| 1009  | 409 Conflict               | Duplicate key exception           | Excepción de clave duplicada               |
| 1010  | 409 Conflict               | Data integrity violation          | Violación de integridad de datos           |
| 1011  | 401 Unauthorized           | Authentication required           | Autenticacion requerida                    |
| 1012  | 403 Forbidden              | Authentication failed             | Autenticación fallida                      |
| 1013  | 422 Unprocessable entity   | Input validation failed           | La validación de entrada falló             |
| 1014  | 403 Forbidden              | Operation forbidden               | Operación prohibida                        |
| 1015  | 405 Method not allowed     | Operation not supported           | Operación no soportada                     |
| 1016  | 403 Forbidden              | Temporary or permanently blocked  | Temporal o permanentemente bloqueado       |
| 1017  | 403 Forbidden              | Bad or missing XSRF token         | Token XSRF malo o faltante                 |
| 1018  | 403 Forbidden              | Only AJAX requests allowed        | Solo se permiten peticiones AJAX           |
| 1019  | 403 Forbidden              | Pagination Forbidden              | Paginación Prohibida                       |
| 9999  | 500 Internal server error  | Unknown error                     | Error desconocido                          |

Se utiliza la siguiente estructura JSON:

    {
        "code":1002,
        "message":"Argument count mismatch in '1'"
    }

NOTA: Cualquier respuesta que no sea de error tendrá un estado: 200 OK

## Pruebas

Estoy probando principalmente en Ubuntu y tengo las siguientes configuraciones de prueba:

  - (Docker) Debian 9 con PHP 7.0, MariaDB 10.1, PostgreSQL 9.6 (PostGIS 2.3)
  - (Docker) Ubuntu 16.04 con PHP 7.0, MariaDB 10.0, PostgreSQL 9.5 (PostGIS 2.2) y SQL Server 2017
  - (Docker) Ubuntu 18.04 con PHP 7.2, MySQL 5.7, PostgreSQL 10.4 (PostGIS 2.4)

Esto no cubre todos los entornos (todavía), así que notifíqueme sobre las pruebas fallidas e informe su entorno.
,,Intentaré cubrir las configuraciones más relevantes en la carpeta "docker" del proyecto.

## Ejemplo de configuración de Nginx
```
server {
    listen 80 default_server;
    listen [::]:80 default_server;

    root /var/www/html;
    index index.php index.html index.htm index.nginx-debian.html;
    server_name server_domain_or_IP;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ [^/]\.php(/|$) {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        try_files $fastcgi_script_name =404;
        set $path_info $fastcgi_path_info;
        fastcgi_param PATH_INFO $path_info;
        fastcgi_index index.php;
        include fastcgi.conf;
        fastcgi_pass unix:/run/php/php7.0-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

### Docker

Instale la ventana acoplable utilizando los siguientes comandos y luego cierre la sesión e inicie sesión para que los cambios surtan efecto:

    sudo apt install docker.io
    sudo usermod -aG docker ${USER}

Para ejecutar las pruebas de la ventana acoplable, ejecute "build_all.sh" y "run_all.sh" desde el directorio de la ventana acoplable. La salida debe ser:

    ================================================
    Debian 9 (PHP 7.0)
    ================================================
    [1/4] Starting MariaDB 10.1 ..... done
    [2/4] Starting PostgreSQL 9.6 ... done
    [3/4] Starting SQLServer 2017 ... skipped
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 95 tests ran in 2651 ms, 0 failed
    pgsql: 95 tests ran in 573 ms, 0 failed
    sqlsrv: skipped, driver not loaded
    ================================================
    Ubuntu 16.04 (PHP 7.0)
    ================================================
    [1/4] Starting MariaDB 10.0 ..... done
    [2/4] Starting PostgreSQL 9.5 ... done
    [3/4] Starting SQLServer 2017 ... done
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 95 tests ran in 2670 ms, 0 failed
    pgsql: 95 tests ran in 550 ms, 0 failed
    sqlsrv: 95 tests ran in 6624 ms, 0 failed
    ================================================
    Ubuntu 18.04 (PHP 7.2)
    ================================================
    [1/4] Starting MySQL 5.7 ........ done
    [2/4] Starting PostgreSQL 10.4 .. done
    [3/4] Starting SQLServer 2017 ... skipped
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 95 tests ran in 3186 ms, 0 failed
    pgsql: 95 tests ran in 556 ms, 0 failed
    sqlsrv: skipped, driver not loaded

La ejecución de prueba anterior (incluido el inicio de las bases de datos) toma menos de un minuto en mi máquina.

    $ ./run.sh 
    1) debian9
    2) ubuntu16
    3) ubuntu18
    > 3
    ================================================
    Ubuntu 18.04 (PHP 7.2)
    ================================================
    [1/4] Starting MySQL 5.7 ........ done
    [2/4] Starting PostgreSQL 10.4 .. done
    [3/4] Starting SQLServer 2017 ... skipped
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 95 tests ran in 3186 ms, 0 failed
    pgsql: 95 tests ran in 556 ms, 0 failed
    sqlsrv: skipped, driver not loaded
    root@b7ab9472e08f:/php-crud-api# 

Como puede ver, la secuencia de comandos "run.sh" le da acceso a un aviso en un entorno de docker elegido.
En este entorno se montan los archivos locales. Esto permite una fácil depuración en diferentes entornos.
Puede escribir "exit" cuando haya terminado.