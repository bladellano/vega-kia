<?php

namespace Source\Models\Car;

use CoffeeCode\DataLayer\DataLayer;

class CarModelo extends DataLayer
{
    public function __construct()
    {
        parent::__construct("vc_modelos_carros", ["nome", "ano", "modelo"]);
    }
}
