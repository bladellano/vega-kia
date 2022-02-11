<?php

namespace Source\Models\Car;

use CoffeeCode\DataLayer\DataLayer;

class CarVersao extends DataLayer
{
    public function __construct()
    {
        parent::__construct("vc_versoes", ["nome", "ano", "modelo","descricao","id_carro"]);
    }
}
