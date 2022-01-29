<?php

namespace Source\Models\Car;

use CoffeeCode\DataLayer\DataLayer;

class CarUnidadeLoja extends DataLayer
{
    public function __construct()
    {
        parent::__construct("vc_unidades_lojas", ["nome"]);
    }
}
