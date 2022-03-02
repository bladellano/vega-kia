<?php

namespace Source\Dash;

use Source\Dash\Controller as DashController;

class Leads extends DashController
{
    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function home(): void
    {
        $leads = (new \Source\Models\Lead)->find()->order('id DESC')->fetch(true) ?? [];

        echo $this->view->render("theme/admin/leads", [
            "title" => "Leads",
            "titleHeader" => "Registros",
            "leads" =>  $leads
        ]);
    }
}
