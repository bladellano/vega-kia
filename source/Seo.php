<?php

namespace Source;

use CoffeeCode\Optimizer\Optimizer;

class Seo
{
    protected $optmizer;

    public function __construct(string $schema="website")
    {
        $this->optmizer = new Optimizer();
        
        $this->optmizer->openGraph(
            SITE['root'],
            "pt_BR",
            $schema
        )->publisher(
            SITE['fb_page'],
            SITE['fb_author']
        )->facebook(
            SITE['app_id']
        );
    }

    public function render( string $title, string $description, string $url, string $image, bool $follow = true):string
    {
        $seo = $this->optmizer->optimize(
            $title,
            $description,
            $url,
            $image,
            $follow
        );
        return $seo->render();
    }
}