<?php

require_once "../Core/Controller.php";
require_once "../Core/View.php";

class AboutUsController extends Controller {
    public function IndexAction() {
        View::render("layout", [
            "content" => View::generate("AboutUs/index"),
            "nav" => "aboutus"
        ]);
    }
}