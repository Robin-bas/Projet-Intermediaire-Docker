<?php 

class CommentManager extends BaseManager
{
    /**  
    * @param int|null $number
    * @return array
    */

    public function getComments(int $number = null ):array
    {
        if ($number) {
            $query = $this->db->prepare('SELECT * FROM comment ORDER BY id DESC LIMIT:limit');
            $query-> bindValue(':limit', $number, \PDO::PARAM_INT);
            $query->execute();
        } else {
            $query = $this->db->query('SELECT * FROM comment ORDER BY id DESC');
        }
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Comment');

        return $query->fetchAll();
    }

    /**  
    * @param int $id
    * @return Comment|bool
    */
    public function getCommentsById(int $id):array
    {

        $query = $this->db->prepare('SELECT * FROM comment WHERE id = :id');
        $query-> bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Comment');

        return $query->fetch();
    }
}