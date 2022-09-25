<?php

namespace App\Controllers;


class Controller{ //abstract parce qu'elle ne sera jamais instancier

    protected function view(string $path, array $params = null) // $path => chemin vers les view / $param => second paramètre optionnel
    {
        ob_start();  // Enclenche la temporisation de sortie (aucune donnée n'est envoyée au navigateur mais temporairement mise en tampon)
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        if ($params){
            $params = extract($params);
        }
        $content = ob_get_clean(); // Lit le contenu courant du tampon de sortie puis l'efface
        require VIEWS . 'layout.php';
    }

}

?>