<?php

namespace Controller;

use Model\User;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController
{
    /**
     * Get all users in Db.
     *
     * @param Request     $request
     * @param Application $app
     *
     * @return JsonResponse
     */
    public function cgetAction(Request $request, Application $app)
    {
        $sql = 'SELECT id FROM users';
        $dataDb = $app['db']->fetchAll($sql);

        $users = array_map(function ($arrayUser) {
            $user = new User();

            return $user->fill($arrayUser);
        }, $dataDb);

        return new JsonResponse($app['serializer']->serialize($users, 'json'), 200, [], true);
    }

    /**
     * Get a specific user.
     *
     * @param Request     $request
     * @param Application $app
     *
     * @return JsonResponse
     */
    public function getAction(Request $request, Application $app)
    {
        $id = (int) $request->get('id');
        $sql = 'SELECT * FROM users WHERE id = ?';
        $dataDb = $app['db']->fetchAssoc($sql, [$id]);

        if (!$dataDb) {
            return new JsonResponse('User not found.', 404);
        }

        $user = new User();
        $user = $user->fill($dataDb);

        return new JsonResponse($app['serializer']->serialize($user, 'json'), 200, [], true);
    }
}
