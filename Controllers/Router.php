<?php
require_once('Views/View.php');


class Router
{
    private $_ctrl;
    private $_view;

    public function routereq()
    {
        try
        {
            //Chargement automatique des classes
            spl_autoload_register(function($class){
                require 'Models/'.$class.'.php';
            });

            $url = '';

            // Le contrôleur est inclus selon l'action de l'utilisateur
            if(isset($_GET['url']))
            {
                $url = explode('/',filter_var($_GET['url'], 
                FILTER_SANITIZE_URL));

                $controler = ucfirst(strtolower($url[0]));
                $controlerClass = $controler."Controller";
                $controlerFile = "Controllers/".$controlerClass.".php";

                // cherche si le fichier existe, sinon il ne trouve pas
                if(file_exists($controlerFile))
                {
                    require_once($controlerFile);
                    $this->_ctrl = new $controlerClass($url);
                }
                else
                {
                    throw new Exception('Page introuvable...'.$controlerClass);
                }
            }
            else
            {
                require_once("Controllers/HomeController.php");
                $this->_ctrl = new HomeController($url);
            }

        }
        catch(Exception $e)
        {
            $errorMsg = $e->getMessage();
            $this->_view = new View('ViewError');
            $this->_view->generate(array('errorMsg' => $errorMsg));
        }
    }
}