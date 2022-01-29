<?php

namespace Source\Models\Car;

use CoffeeCode\DataLayer\DataLayer;

class CarCombustivel extends DataLayer
{
    public function __construct()
    {
        parent::__construct("vc_combustiveis", ["nome"]);
    }
}
