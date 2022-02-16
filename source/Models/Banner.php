<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Banner extends DataLayer
{
    public function __construct()
    {
        parent::__construct("banners", ["title", "description", "content", "image"]);
    }

    public function save(): bool
    {

        if (empty($this->title) || !filter_var($this->title, FILTER_DEFAULT)) {
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
