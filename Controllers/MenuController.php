<?php

require_once "../Core/Controller.php";
require_once "../Core/Session.php";
require_once "../Core/Router.php";
require_once "../Core/View.php";
require_once "../Models/Menu.php";

class MenuController extends Controller {
    public function IndexAction() {
        if(!Session::isLogged()) {
            return Router::redirect("/");
        }

        $categories = Menu::getAllCategories();

        View::render("layout", [
            "content" => View::generate("Menu/index", [
                "categories" => $categories
            ]),
            "nav" => "menu"
        ]);
    }

    public function DishesAction() {
        if(!Session::isLogged() || !isset($this->params["id"])) {
            return Router::redirect("/");
        }
        $catCode = $this->params["id"];

        $dishes = Menu::getDishesByCat($catCode);

        View::render("layout", [
            "content" => View::generate("Menu/dishes", [
                "dishes" => $dishes
            ]),
            "nav" => "menu"
        ]);
    }
}