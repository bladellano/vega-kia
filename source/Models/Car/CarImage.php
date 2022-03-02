<?php

namespace Source\Models\Car;

use CoffeeCode\DataLayer\DataLayer;

class CarImage extends DataLayer
{
    public function __construct()
    {
        parent::__construct("vc_imagens_carros", ["imagem", "imagem_thumb", "id_carro"]);
    }

}
