<?php
class Comment
{
    private $id;
    private $author_id;
    private $post_id;
    private $content;


    //getters
    public function getId()
    {
        return $this->id;
    }
    public function getAuthor_id()
    {
        return $this->author_id;
    }
    public function getPost_id()
    {
        return $this->post_id;
    }
    public function getContent()
    {
        return $this->content;
    }

    //setters
    public function setId(int $id)
    {
        $this->id = $id;
    } 

    public function setAuthor_id(string $author_id)
    {
        $this->author_id = $author_id;
    }

    public function setPost_id(string $post_id)
    {
        $this->post_id = $post_id;
    }

    public function setContent(bool $content)
    {
        $this->content = $content;
    }
}