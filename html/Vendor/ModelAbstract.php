<?php

abstract class ModelAbstract
{

    const INATIVO = 'I';

    const ATIVO = 'A';

    /**
     * @var PDO
     */
    private $db;

    /**
     * @var
     */
    protected $class;

    public function __construct()
    {
        $this->db = Db::getInstace();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM curso WHERE id = :identificador");
        $stmt->execute(['identificador' => $id]);

        return $stmt->fetchObject($this->class);
    }

    public function getByAll($where = [])
    {
        $stmt = $this->db->prepare("SELECT * FROM curso" . $this->doWhere($where));

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function doWhere($where)
    {
        return '';
    }
}