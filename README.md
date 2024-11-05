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

## Arquitectura de Software y Patrones de diseño
"Para el desarrollo de la API se utilizó la arquitectura orientada a servicios debido a su sencillo acoplamiento con la metodología TDD. Este enfoque no solo permite que cada servicio sea independiente y autónomo, sino que también facilita la creación de pruebas unitarias y de integración en fases tempranas del desarrollo. Al desarrollar cada componente de manera aislada, TDD asegura que los servicios funcionen correctamente desde el inicio, lo cual reduce los errores en producción y hace que el proceso de integración sea más eficiente.

## Despliegue
El proyecto fue desplegado en AWS haciendo uso de la capa gratuita, la url de la API es la siguiente:
- https://spot2.atechlatam.xyz/price-m2/zip-codes/011210/aggregate/min?uso_construccion=4

## Documentación
La documentacion puede ser consultada en el siguiente enlace:
- https://spot2.atechlatam.xyz/api/documentation
