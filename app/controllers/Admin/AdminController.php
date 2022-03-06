<?php

namespace app\controllers\Admin;

#[Route('/admin')]
class AdminController extends \common\Controller
{
    #[Route('/index', name: 'route_index')]
    public function func()
    {

    }
}