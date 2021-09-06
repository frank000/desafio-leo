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

        list($values, $valuesIdentificadores, $data) = $this->montaParametros($data);

        if(empty($values) || empty($valuesIdentificadores))
           return false;

        $stmt = $this->db->prepare('INSERT INTO ' . strtolower($this->class) .  "($values)".
            " VALUES({$valuesIdentificadores})");

        $stmt->execute($data);

        return ($stmt->rowCount()) ? true: false;
    }

    public function editar($data = [])
    {
        if(count($data) == 0 || !isset($data['id']) || empty($data['id']) )
            return false;

        $id = $data['id'];
        list($values, $data) = $this->montaParametrosEdit($data);

        if(empty($values))
            return false;

        $stmt = $this->db->prepare('UPDATE ' . strtolower($this->class) . ' SET ' . $values.
            " WHERE id = {$id}");

        $stmt->execute($data);

        return ($stmt->rowCount()) ? true: false;
    }

    public function deletar($id = [])
    {
        if(empty($id))
            return false;

        $stmt = $this->db->prepare('UPDATE ' . strtolower($this->class) . " SET status = 'I'".
            " WHERE id = {$id}");

        $stmt->execute();

        return ($stmt->rowCount()) ? true: false;
    }

    /**
     * @param $data
     * @return array
     */
    protected function montaParametros($data)
    {
        $keys = array_keys($data);
        $values = '';
        $valuesIdentificadores = '';
        foreach ($keys as $i => $key) {
            if (!empty($data[$key])) {
                if ($i != 0)
                    $values .= ', ';

                $values .= $key;

                if ($i != 0)
                    $valuesIdentificadores .= ', ';
                $valuesIdentificadores .= ' :' . $key . '';
            }

        }
        return array($values, $valuesIdentificadores, $data);
    }

    /**
     * @param $data
     * @return array
     */
    protected function montaParametrosEdit($data)
    {
        unset($data['id']);
        $keys = array_keys($data);
        $values = '';
        $valuesIdentificadores = '';
        foreach ($keys as $i => $key) {
            if (!empty($data[$key])) {
                if ($i != 0)
                    $values .= ', ';

                $values .= $key . ' = :' . $key ;


            }

        }
        return array($values, $data);
    }

}