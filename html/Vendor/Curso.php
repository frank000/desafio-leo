<?php

class Curso extends ModelAbstract
{

    protected $class = 'Curso';

    private $id;

    private $nome;

    private $descricao;

    private $vagas;

    private $vagas_preenchidas;

    private $inicio;

    private $fim;

    private $status;

    private $imagem;

    public function __construct()
    {
        parent::__construct();

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Curso
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return Curso
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     * @return Curso
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVagas()
    {
        return $this->vagas;
    }

    /**
     * @param mixed $vagas
     * @return Curso
     */
    public function setVagas($vagas)
    {
        $this->vagas = $vagas;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVagasPreenchidas()
    {
        return $this->vagas_preenchidas;
    }

    /**
     * @param mixed $vagas_preenchidas
     * @return Curso
     */
    public function setVagasPreenchidas($vagas_preenchidas)
    {
        $this->vagas_preenchidas = $vagas_preenchidas;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInicio()
    {
        $date = date_create( $this->inicio);
        return date_format($date, 'Y-m-d');
    }

    /**
     * @param mixed $inicio
     * @return Curso
     */
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFim()
    {
        $date = date_create( $this->fim);
        return date_format($date, 'Y-m-d');
    }

    /**
     * @param mixed $fim
     * @return Curso
     */
    public function setFim($fim)
    {
        $this->fim = $fim;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return Curso
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem
     * @return Curso
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
        return $this;
    }

    public function doWhere($where)
    {
        $strWhere = '';
        if(count($where) > 0)
        {
            $strWhere .=  ' WHERE ';
        }
        if(isset($where['status']))
        {
            $strWhere .= "status =  '{$where['status']}'";
        }
        return $strWhere;
    }

}