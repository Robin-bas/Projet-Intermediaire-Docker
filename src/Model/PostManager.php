<?php 

class PostManager extends BaseManager
{
    /**  
    * @param int|null $number
    * @return array
    */

    public function getPosts(int $number = null ):array
    {
        if ($number) {
            $query = $this->db->prepare('SELECT * FROM post ORDER BY id DESC LIMIT:limit');
            $query-> bindValue(':limit', $number, \PDO::PARAM_INT);
            $query->execute();
        } else {
            $query = $this->db->query('SELECT * FROM post ORDER BY id DESC');
        }
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Post');

        return $query->fetchAll();
    }

    /**  
    * @param int $id
    * @return Post|bool
    */
    public function getPostsById(int $id):array
    {

        $query = $this->db->prepare('SELECT * FROM post WHERE id = :id');
        $query-> bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Post');

        return $query->fetch();
    }

    /*public function createPost($author_id, $title, $image, $content)
    {
        $newPost = new Posts();

        /*$query = $this->db-prepare('INSERT INTO "Posts" (`Author_id`, `Title`, `Image`, `Content`) VALUES ('.$author_id.','.$titre.','.$image.','.$content.')');
        $query->execute();
    }*/
}