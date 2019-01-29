<?php

class Router
{
    private $_ctrl;

    public function routerReq()
    {
        try
        {
            $url="";
            if (isset($_GET["url"]))
            {
                $url = explode('/',filter_var($_GET["url"],FILTER_SANITIZE_URL));
                $controller = ucfirst(strtolower($url[0]));
                $controllerFile = "Controllers/".$controller.".php";
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
                require_once ("Controllers/HomePage.php");
                $this->_ctrl = new HomePage();
            }
        }
        catch (Exception $e)
        {
            echo("Erreur : " . $e ->getMessage() ) ;
        }
    }
}