<?php

require_once "../Core/Controller.php";
require_once "../Core/Router.php";

class HomeController extends Controller {
    public function IndexAction() {
        return Router::redirect("/");
    }
}