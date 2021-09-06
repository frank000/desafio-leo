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

    public function save($data = [])
    {
        if(count($data) == 0)
            return false;

        $keys = array_keys($data);
        $values = '';
        $valuesIdentificadores = '';
        foreach ($keys as $i => $key)
        {
            if(!empty($data[$key]))
            {
                if($i != 0)
                    $values .= ', ';

                $values .= $key;

                if($i != 0)
                    $valuesIdentificadores .= ', ';
                $valuesIdentificadores .= ' :' . $key . '';
            }

        }
        if(empty($values) || empty($valuesIdentificadores))
           return false;

        $stmt = $this->db->prepare('INSERT INTO ' . strtolower($this->class) .  "($values)".
            " VALUES({$valuesIdentificadores})");

        $stmt->execute($data);

        return ($stmt->rowCount()) ? true: false;
    }
}