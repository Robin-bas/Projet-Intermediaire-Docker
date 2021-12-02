<?php
class Post
{
    private $id;
    private $author_id;
    private $title;
    private $image;
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
    public function getTitle()
    {
        return $this->title;
    }
    public function getImage()
    {
        return $this->image;
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

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setImage(bool $image)
    {
        $this->image = $image;
    }

    public function setContent(bool $content)
    {
        $this->content = $content;
    }
}