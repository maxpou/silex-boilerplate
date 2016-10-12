# Social network API

A lightweight [Silex](http://silex.sensiolabs.org/) application which provide an API with [HAL](http://stateless.co/hal_specification.html)/HATEOAS.

## Installation

1. Adapt `app/config.yml` file according to your database configuration (host, user and password)
2. Install PHP dependencies: `composer install`
3. Run a server: `composer run` (or manually `php -S 0.0.0.0:4000 -t web/`)

**Note:** The demo need a database. The SQL file is available in `app/demo.sql`.

## Using

Open [Postman](https://www.getpostman.com/docs/introduction)/[DHC](https://restlet.com/products/dhc/) at http://localhost:4000/  
Then navigate into the API.

*Demo* API Endpoints:

* http://127.0.0.1:4000/: home
* http://127.0.0.1:4000/users: List of the users
* http://127.0.0.1:4000/users/{id}: Retrieve a specific user

**Note:** A `dev mode` is also available at http://localhost:4000/index_dev.php. It's include the Web Profiler (Symfony web debug toolbar).

## What's inside?

* [doctrine/dbal](http://silex.sensiolabs.org/doc/providers/doctrine.html): The doctrine service provider (for easy database access).
* [symfony/yaml](http://symfony.com/doc/current/components/yaml.html): The Symfony YAML component (useful for parameters).
* [monolog/monolog](http://silex.sensiolabs.org/doc/providers/monolog.html): Because, we can't imagine an app without logs!
* [willdurand/hateoas](https://github.com/willdurand/hateoas): A PHP library to build HATEOAS REST web services.

## Tests

Run test with:

* `composer test`: run the PHPUnit tests
* `composer coverage`: run the PHPUnit tests + generate a code coverage (report folder)
