<?php

/**
 * Base d'un controleur
 */
abstract class Controller
{
    /**
     * Paramètres de l'url
     */
    protected $params = [];

    public function __construct($params = [])
    {
        $this->params = $params;
    }

    public function __call($method, $args)
    {
        throw new \Exception("Method $method not found in controller " . get_class($this));
    }
}
