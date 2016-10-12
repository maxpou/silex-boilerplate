<?php

namespace Controller;

Use Model\Navigation\Home;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class HelloController
{
    /**
     * Home controller.
     *
     * @param Request     $request
     * @param Application $app
     *
     * @return JsonResponse
     */
    public function indexAction(Request $request, Application $app)
    {
        return new JsonResponse($app['serializer']->serialize(new Home(), 'json'), 200, [], true);
    }
}
