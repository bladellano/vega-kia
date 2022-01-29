<?php

namespace Source\Controllers;

use Source\Models\Product as ModelProduct;
use CoffeeCode\Uploader\Image;
use CoffeeCode\Paginator\Paginator;

/**
 * Class Product
 * @package Source\Controllers
 */
class Product extends Controller
{

    /**
     * Product constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);
    }

    /**
     * Muda o status do produto
     */
    public function toggleStatus(): void
    {
        $data = filter_var_array($_REQUEST, FILTER_SANITIZE_STRIPPED);

        $product = (new ModelProduct())->findById($data['id']);

        $product->status = $data['status'];

        if (!$product->save()) {
            die($this->ajaxResponse("message", [
                "type" => "error",
                "message" => $product->fail()->getMessage()
            ]));
        }
    }

    /**
     * Lista todos os produtos
     */
    public function products(): void
    {
        $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRIPPED);

        $products = new ModelProduct();
        $perPage = 9;
        $paginator = new Paginator(site() . "/produtos?page=", 'Página', ["Primeira página", "Primeira"], ["Última página", "Última"]);
        $paginator->pager($products->find()->count(), $perPage, $page, 2);

        $products = $products->find()->limit($paginator->limit())->offset($paginator->offset())->order("id DESC")->fetch(true);

        echo $this->view->render("theme/products", [
            "title" => "Lista de Produtos",
            "products" =>  $products,
            "pages" => $paginator->render()
        ]);
        return;
    }

    /**
     * Monta tela de cadastro do produto
     */
    public function create(): void
    {
        echo $this->view->render("theme/create", [
            "title" => "Cadastro de Produto",
        ]);
    }

    /**
     * @param $data
     */
    public function edit($data): void
    {
        $product = (new ModelProduct())->findById($data['id']);

        die($this->view->render("theme/create", [
            "title" => "Edição de Produtos",
            "product" => $product,
        ]));
    }

    /**
     * @param $data
     * @throws \Exception
     */
    public function register($data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        /**
         * Tratando imagem do produto
         */
        $image = null;
        $upload = new Image('storage/images', 'products');

        if (!$_FILES['image']['error'] && in_array($_FILES['image']["type"], $upload::isAllowed())) {
            $image = $upload->upload($_FILES['image'], md5(uniqid(time())));
        }

        if (in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $product = new ModelProduct();
        $product->name = $data['name'];
        $product->price = moneyToDB($data['price']);
        $product->amount = $data['amount'];
        $product->description = $data['description'];
        $product->image = $image;

        if (!$product->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $product->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Produto cadastrado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("product.create")
        ]);
        return;
    }

    /**
     * @param $data
     */
    public function update($data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $product = (new ModelProduct())->findById($data['id']);

        /**
         * Tratando imagem do produto
         */
        $upload = new Image('storage/images', 'products');
        if (!$_FILES['image']['error'] && in_array($_FILES['image']["type"], $upload::isAllowed())) {
            /**
             * Apaga já existente.
             */
            if (file_exists($product->image))
                unlink($product->image);

            $image = $upload->upload($_FILES['image'], md5(uniqid(time())));
        } else {
            $image = $product->image;
        }

        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = moneyToDB($data['price']);
        $product->amount = $data['amount'];
        $product->image = $image;

        if (!$product->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $product->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Produto alterado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => site() . "/produtos/editar/{$product->id}"
        ]);

        return;
    }


    /**
     * @param $data
     */
    public function delete($data): void
    {
        $product = (new ModelProduct())->findById($data['id']);

        /**
         * Se existir imagem, apaga da pasta.
         */
        if (file_exists($product->image))
            unlink($product->image);

        if (!$product->destroy()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $product->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Produto excluído com sucesso!");

        $this->router->redirect("product.products");

        return;
    }
}
