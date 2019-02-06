<?php

class Redirect
{
    private $_ctrl;

    public function getPage()
    {
        try
        {
            $url="";
            if (isset($_GET["url"]))
            {
                $url = explode('/',filter_var($_GET["url"],FILTER_SANITIZE_URL));
                $controller = ucfirst(strtolower($url[0]));
                $controllerFile = "app/Controllers/".$controller.".php";
                if(file_exists($controllerFile))
                {
                    require_once ($controllerFile);
                    $this->_ctrl = new $controller($_POST);
                }
                else {
                    throw new Exception("Page introuvable");
                }
            }
            else{
                require_once ("app/Controllers/principale.php");
                $this->_ctrl = new HomePage();
            }
        }
        catch (Exception $e)
        {
            echo("Erreur : " . $e ->getMessage() ) ;
        }
    }
}