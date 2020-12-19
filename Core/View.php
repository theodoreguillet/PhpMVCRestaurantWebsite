<?php

/**
 * Gère les vues
 */
class View
{
    /**
     * Affiche une vue
     */
    public static function render($view, $args = [])
    {
        $content = self::generate($view, $args);
        $view = self::generate("_document", [ "content" => $content ]);
        echo $view;
    }

    /**
     * Génère une vue ou un gabarit
     */
    public static function generate($view, $args = []) {
        $path = dirname(__DIR__) . "/Views/$view.php";
        if (is_readable($path)) {
          extract($args, EXTR_SKIP); // On crée les variables paramètres de la vue
          ob_start();
          require($path);
          return ob_get_clean();
        }
        else {
          throw new Exception("$path not found");
        }
    }
}
