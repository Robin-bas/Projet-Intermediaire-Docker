<?php

namespace Controller;

use Model\PostManager;

class PostController extends BaseController
{
    public function executeIndex(int $number = 5)
    {
        $manager = new PostManager();
        $index = $manger->getPosts($number);

        return $this->render("Home", $index , "post/index");
    }

    public function executeShow()
    {
        $manager = new PostManager();
        $post = $manager->getPostsById($this->params['id']);

        if (!$post) {
            header('Location: /');
            exit();
        }

        return $this->render($post->getName(), ['post' => $post], 'post/show');
    }
}