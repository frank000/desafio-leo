<?php

abstract class ModelAbstract
{

    const INATIVO = 'I';

    const ATIVO = 'A';

    const DIR_IMG = './imagens/';
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

    public function save($data = [], $file = nulll)
    {
        if(count($data) == 0)
            return false;

        //salva arquivo
        $this->handleFile($file, $data);

        list($values, $valuesIdentificadores, $data) = $this->montaParametros($data);

        if(empty($values) || empty($valuesIdentificadores))
           return false;


        $stmt = $this->db->prepare('INSERT INTO ' . strtolower($this->class) .  "($values)".
            " VALUES({$valuesIdentificadores})");

        $stmt->execute($data);

        return ($stmt->rowCount()) ? true: false;
    }

    public function editar($data = [], $file = null)
    {
        if(count($data) == 0 || !isset($data['id']) || empty($data['id']) )
            return false;

        //salva arquivo
        $this->handleFile($file, $data);
        $id = $data['id'];

        if(!is_null($file) && !empty($file['name']))
        {
            $fileParaExcluir = $this->getById($id)->getImagem();

            if(!is_null($fileParaExcluir) && file_exists(self::DIR_IMG.$fileParaExcluir))
            {
                unlink(self::DIR_IMG.$fileParaExcluir);
            }
        }

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
    protected function montaParametros(&$data)
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
            else
            {
                unset($data[$key]);//retiro o node vazio
            }

        }
        return array($values, $valuesIdentificadores, $data);
    }

    /**
     * @param $data
     * @return array
     */
    protected function montaParametrosEdit(&$data)
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
            else
            {
                unset($data[$key]);//retiro o node vazio
            }

        }
        return array($values, $data);
    }

    /**
     * @param $file
     * @param $data
     * @return mixed
     */
    protected function handleFile($file, &$data)
    {
        if (!is_null($file)) {
            $ext = strtolower(substr($file['name'], -4)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s")  . $ext; //Definindo um novo nome para o arquivo

            $result = move_uploaded_file($file['tmp_name'], self::DIR_IMG . $new_name); //Fazer upload do arquivo
            if ($result)
                $data['imagem'] = $new_name;

        }
    }

}