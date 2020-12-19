<?php

class Session {
    /**
     * Retourne si l'utilisateur est connecté
     */
    public static function isLogged() {
        if(!self::isSessionStarted()) {
            session_start();
        }
        return isset($_SESSION["user"]);
    }

    /**
     * Retourne l'utilisateur connecté
     */
    public static function getUser() {
        if(!self::isLogged()) {
            return null;
        }
        return $_SESSION["user"];
    }
    
    /**
     * Définit l'utilisateur connecté
     */
    public static function setUser($user) {
        if(!self::isSessionStarted()) {
            session_start();
        }
        $_SESSION["user"] = $user;
    }

    /**
     * Termine la session
     */
    public static function close() {
        if(self::isLogged()) {
            unset($_SESSION);
            session_destroy();
        }
    }

    private static function isSessionStarted()
    {
        if ( php_sapi_name() !== 'cli' ) {
            if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                return session_status() === PHP_SESSION_ACTIVE ? true : false;
            } else {
                return session_id() === '' ? false : true;
            }
        }
        return false;
    }
}
