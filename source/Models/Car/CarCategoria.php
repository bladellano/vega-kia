<?php

namespace Source\Models\Car;

use CoffeeCode\DataLayer\DataLayer;

class CarCategoria extends DataLayer
{
    public function __construct()
    {
        parent::__construct("vc_categorias", ["nome"]);
    }
}
