# Prueba tecnica

Mediante el uso de una API podremos obtener el precio agregado  (promedio, mínimo y máximo) por m2 un
código postal de la alcaldía Álvaro Obregón utilizando datos del Gobierno de la Ciudad de México,

## Requerimientos
- Php v8.1 o superior
- MSQL 5.7.x o superior

El proyecto esta construido con el framework laravel en su version 11 (https://laravel.com/docs/11.x) que nos ofrece las caracteristicas que necesitamos para trabajar con APIs de una manera practica y sencilla.

#### Instalar dependencias
`composer install`

#### Generar llave del proyecto
`php artisan key:generate`

#### Ejecutar migraciones
`php artisan migrate`

#### Ejecutar pruebas
`php artisan test`

## Documentacion - Obtener precio por M2

### Busqueda de peliculas
La busqueda consta de  campo necesario:

* uso_construccion

#### Endpoint
`Type: GET`
`/price-m2/zip-codes/{zip_code}/aggregate/{max|min|avg}?construction_type={1-7}`


#### Respuesta
`200 Success - PROMEDIO`
```js
{
    "status": true,
    "payload": {
        "type": "avg",
        "price_unit": 1420,
        "price_unit_construction": 3120,
        "elements": 100
    }
}
```

`200 Success - MÁXIMO`
```js
{
    "status": true,
    "payload": {
        "type": "max",
        "price_unit": 4520,
        "price_unit_construction": 5120,
        "elements": 80
    }
}
```

`200 Success - MÍNIMO`
```js
{
    "status": true,
    "payload": {
        "type": "min",
        "price_unit": 1250,
        "price_unit_construction": 2120,
        "elements": 60
    }
}
```
