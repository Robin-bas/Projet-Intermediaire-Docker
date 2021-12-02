<?php

namespace Controller;

use Model\UserManager;

class UserController extends BaseController
{
    public function executeIndex(int $number = 5)
    {
        $manager = new UserManager();
        $index = $manger->getUsers($number);

        return $this->render("Home", $index , "User/index");
    }

    public function executeShow()
    {
        $manager = new UserManager();
        $article = $manager->getUserById($this->params['id']);

        if (!$article) {
            header('Location: /');
            exit();
        }

        return $this->render($article->getTitle(), ['article' $article], 'User/show');
    }
}