<?php

namespace Source\Models\Car;

use CoffeeCode\DataLayer\DataLayer;

class CarCidade extends DataLayer
{
    public function __construct()
    {
        parent::__construct("vc_cidades", ["nome", "id_estado"]);
    }
}
