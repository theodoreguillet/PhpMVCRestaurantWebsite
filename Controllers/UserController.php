<?php

require_once "../Core/Controller.php";
require_once "../Core/Session.php";
require_once "../Core/Router.php";
require_once "../Core/View.php";
require_once "../Models/User.php";

define('PSEUDO_MIN_SIZE', 5);
define('PSEUDO_MAX_SIZE', 20);
define('PASSWORD_MIN_SIZE', 5);
define('PASSWORD_MAX_SIZE', 40);
define('EMAIL_MAX_SIZE', 40);

class UserController extends Controller {
    public function LoginActionGet() {
        View::render("layout", [
            "content" => View::generate("User/login"),
            "nav" => "home"
        ]);
    }

    public function LoginActionPost() {
        if(!isset($this->params['username']) || !isset($this->params['password'])) {
            return Router::redirect("/");
        }
        $pseudo = $this->params['username'];
        $password = $this->params['password'];

        $error = $this->logUser($pseudo, $password);
        if(!$error) {
            return Router::redirect("/");
        }

        View::render("layout", [
            "content" => View::generate("User/login", [
                "error" => $error
            ]),
            "nav" => "home"
        ]);
    }

    public function RegisterActionGet() {
        View::render("layout", [
            "content" => View::generate("User/register"),
            "nav" => "home"
        ]);
    }

    public function RegisterActionPost() {
        if(!isset($this->params['username']) || 
            !isset($this->params['email']) || 
            !isset($this->params['password'])
        ) {
            return Router::redirect("/");
        }
        $pseudo = $this->params['username'];
        $email = $this->params['email'];
        $password = $this->params['password'];
        
        $error = $this->registerUser($pseudo, $email, $password);
        if(!$error) {
            return Router::redirect("/");
        }

        View::render("layout", [
            "content" => View::generate("User/register", [
                "error" => $error
            ]),
            "nav" => "home"
        ]);
    }

    public function LogoutAction() {
        Session::close();
        Router::redirect("/");
    }

    /**
     * Connecte un utilisateur ou retourne un code d'erreur
     */
    private function logUser($pseudo, $password) {
        // Verify pseudo and password
        if(strlen($pseudo) < PSEUDO_MIN_SIZE || strlen($pseudo) > PSEUDO_MAX_SIZE) {
            return "pseudo";
        }
        if(strlen($password) < PASSWORD_MIN_SIZE || strlen($password) > PASSWORD_MAX_SIZE) {
            return "password";
        }

        $error = null;
        $user = User::getOne($pseudo);
        if($user) {
            if(password_verify($password, $user['passwd'])) {
                Session::setUser($user);
            } else {
                $error = "password";
            }
        } else {
            $error = "pseudo";
        }
        return $error;
    }

    /**
     * Enregister un nouvel utilisateur ou retourne un code d'erreur
     */
    private function registerUser($pseudo, $email, $password) {
        $error = null;

        // Verify pseudo, email and password
        if(strlen($pseudo) < PSEUDO_MIN_SIZE || strlen($pseudo) > PSEUDO_MAX_SIZE) {
            return "badpseudo";
        }
        if(strlen($pseudo) > EMAIL_MAX_SIZE || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "bademail";
        }
        if(strlen($password) < PASSWORD_MIN_SIZE || strlen($password) > PASSWORD_MAX_SIZE) {
            return "badpassword";
        }

        // Check if user already exists
        $existingUsers = User::findByPseudoOrEmail($pseudo, $email);
        if(empty($existingUsers)) {
            // Add user
            $passwdHash = password_hash($password, PASSWORD_DEFAULT);
            User::addOne($pseudo, $email, $passwdHash);
        } else if($existingUsers[0]['pseudo'] === $pseudo) {
            $error = "pseudoexist";
        } else if($existingUsers[0]['email'] === $email) {
            $error = "emailexist";
        }
        return $error;
    }
}