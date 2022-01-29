<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Product
 * @package Source\Models
 */
class Product extends DataLayer
{
    /**
     * Product constructor.
     */
    public function __construct()
    {
        /**
         * Nome da tabela e um array com os campos obrigatórios
         */
        parent::__construct("products", ["name", "price", "description"]);
    }

    /**
     * @return bool
     */
    public function save(): bool
    {

        if (empty($this->name) || !filter_var($this->name, FILTER_DEFAULT)) {
            $this->fail = new \Exception("Informe o nome do produto");
            return false;
        }

        $result = $this->find("name = :n", "n={$this->name}")->count();

        if ($result && !$this->id) {
            $this->fail = new \Exception("Produto já existente ou com mesmo nome na base");
            return false;
        }

        if (!parent::save()) {
            return false;
        }

        return true;
    }
}
