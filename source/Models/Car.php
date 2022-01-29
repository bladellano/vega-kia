<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Car extends DataLayer
{
    public function __construct()
    {
        parent::__construct("vc_carros", ["nome_titulo", "nome_subtitulo", "slug", "descricao", "id_modelo"]);
    }

    public function save_(): bool
    {

        if (empty($this->nome_titulo) || !filter_var($this->nome_titulo, FILTER_DEFAULT)) {
            $this->fail = new \Exception("Informe o título");
            return false;
        }

        $result = $this->find("slug = :s", "s={$this->slug}")->count();

        if ($result && !$this->id) {
            $this->fail = new \Exception("Registro já existente ou com mesmo nome na base");
            return false;
        }

        if (!parent::save()) {
            return false;
        }

        return true;
    }
}
