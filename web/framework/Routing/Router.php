<?php
/**
 * 
 */

class Router
{

    private function checkPath()
    {
    	$errors = array();
    	foreach (func_get_args() as $path)
    	{
    		if (!file_exists($path))
    		{
                throw new Exception('File is not excist!', 500);
    		}
    	}

    	if ($errors)
    	{
    		foreach ($errors as $error)
    		{
    			echo $error . '<br>';
    		}
    		exit;
    	}
    }

    private function getURI()
    {
       /* if (!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }*/
        $uri = '';
        if (!empty($_SERVER['REQUEST_URI']))
        {
            $uri = $_SERVER['REQUEST_URI'];
        }

        if (($cutoff = strpos($uri, '?')) !== false)
        {
            $uri = substr($uri, 0, $cutoff);
        }
        return trim($uri, '/');
    }

	private function includeController($controllerClassName, $actionMethodName, $parameters)
    {
    	$pathControllerFile = ROOT . Config::getdirs('controllers') . '\\' . $controllerClassName . '.php';
        $this->checkPath($pathControllerFile);

        require_once $pathControllerFile;
        $controllerObject = new $controllerClassName;
        $controllerObject->$actionMethodName($parameters);
    }

    public function run()
    {
        $uri = $this->getURI();
        $isThere = false;
        Csrf::catch();

            foreach (Config::getroutes() as $uriPattern => $path) 
            {
                if (preg_match('/^' . $uriPattern . '$/', $uri)) 
                {
                    $internalRoute = preg_replace('/^' . $uriPattern . '$/', $path, $uri);       
                    $segments = explode('/', $internalRoute);

                    $controllerName = ucfirst(array_shift($segments));
                    $controllerClassName = $controllerName . 'Controller';

                    $actionName = ucfirst(array_shift($segments));
                    $actionMethodName = 'action' . $actionName;

                    $parameters = $segments;

                    $this->includeController($controllerClassName, $actionMethodName, $parameters);

                    $isThere = true;
                }  
            }

            if (!($isThere))
            {
                include_once ROOT . '/error.php';
            }
    }

}