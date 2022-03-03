<?php

namespace app\controllers;

use app\entities\User;
use app\storages\UserStorage;
use common\Controller;
use common\http\Request;
use common\http\Response;
use common\routes\Route;

class UsersController extends Controller
{
    /**
     * @throws \ReflectionException
     */
    #[Route('/users', name: 'users')]
    public function indexAction(UserStorage $userStorage): Response
    {
        $users = $userStorage->selectAll();
        return $this->render(fileName: 'users/index', params: [
            'users' => $users,
        ]);
    }

    /**
     * @throws \ReflectionException
     */
    #[Route('/users/entries', name: 'user_entries')]
    public function entriesAction(Request $request, UserStorage $userStorage): Response
    {
        $userId = $request->query('id');
        /** @var User $user */
        $user = $userStorage->selectOne($userId);

        return $this->render('users/entries', [
            'entries' => $user->getEntries(),
        ]);
    }
}