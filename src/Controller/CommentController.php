<?php

namespace Controller;

use Model\CommentManager;

class CommentController extends BaseController
{
    public function executeIndex(int $number = 5)
    {
        $manager = new CommentManager();
        $index = $manger->getComments($number);

        return $this->render("Home", $index , "comment/index");
    }

    public function executeShow()
    {
        $manager = new CommentManager();
        $comment = $manager->getCommentsById($this->params['id']);

        if (!$comment) {
            header('Location: /');
            exit();
        }

        return $this->render($comment->getContent(), ['comment' => $comment], 'comment/show');
    }
}