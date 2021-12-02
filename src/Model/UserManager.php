<?php 

class UserManager extends BaseManager
{
    /**  
    * @param int|null $number
    * @return array
    */

    public function getUsers(int $number = null ):array
    {
        if ($number) {
            $query = $this->db->prepare('SELECT * FROM users ORDER BY id DESC LIMIT:limit');
            $query-> bindValue(':limit', $number, \PDO::PARAM_INT);
            $query->execute();
        } else {
            $query = $this->db->query('SELECT * FROM users ORDER BY id DESC');
        }
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\User');

        return $query->fetchAll();
    }

    /**  
    * @param int $id
    * @return User|bool
    */
    public function getUsersById(int $id):array
    {

        $query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $query-> bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\User');

        return $query->fetch();
    }
}