<?php

require_once "../Core/Controller.php";
require_once "../Core/Session.php";
require_once "../Core/View.php";
require_once "../Core/Router.php";

class IndexController extends Controller {
    public function IndexAction() {
        if(!Session::isLogged()) {
            return Router::redirect("/user/login");
        }
        View::render("layout", [
            "content" => View::generate("Home/index"),
            "nav" => "home"
        ]);
    }
}