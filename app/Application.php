<?php

namespace App;

use Hateoas\HateoasBuilder;
use Hateoas\UrlGenerator\SymfonyUrlGenerator;
use JMS\Serializer\SerializerBuilder;
use Silex\Application as SilexApplication;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Symfony\Component\Yaml\Yaml;

class Application extends SilexApplication
{
    private $env;

    public function __construct($env)
    {
        $this->env = $env;

        parent::__construct();
        $app = $this;

        \Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
        $parameters = Yaml::parse(file_get_contents(__DIR__.'/config.yml'));

        // Monolog
        $app->register(new MonologServiceProvider(), array(
            'monolog.logfile' => __DIR__.'/logs/'.$this->getEnv().'.log',
        ));

        // Database connection
        $app->register(new DoctrineServiceProvider(), array(
            'db.options' => array(
                'driver' => 'pdo_mysql',
                'host' => $parameters['database_host'],
                'dbname' => $parameters['database_name'],
                'user' => $parameters['database_user'],
                'password' => $parameters['database_password'],
                'charset' => 'utf8',
            ),
        ));

        // Hateoas serializer
        $app['serializer'] = function () use ($app) {
            $jmsSerializerBuilder = SerializerBuilder::create();

            return HateoasBuilder::create($jmsSerializerBuilder)
                ->setUrlGenerator(null, new SymfonyUrlGenerator($app['url_generator']))
                ->build();
        };

        // Routing
        require __DIR__.'/routing.php';
    }

    public function getEnv()
    {
        return $this->env;
    }
}
