<?php

namespace Source\Models\Car;

use CoffeeCode\DataLayer\DataLayer;

class CarImage extends DataLayer
{
    public function __construct()
    {
        parent::__construct("vc_imagens_carros", ["imagem", "imagem_thumb", "id_carro"]);
    }

    public function save_(): bool
    {

        if (empty($this->imagem) || !filter_var($this->imagem, FILTER_DEFAULT)) {
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
