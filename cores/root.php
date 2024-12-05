<?php

class root
{
    public static function execute($url)
    {
        $url = strip_tags((trim($url)));
        $url = trim($url, "/");

        if (is_numeric(strpos($url, "/"))) {
            $tab = explode("/", $url);
            if (count($tab) == 2) {
                $classe = $tab[0];
                $methode = $tab[1];
                if (file_exists('controllers/' . $classe . ".php")) {
                    require_once('controllers/' . $classe . ".php");
                    if (method_exists($classe, $methode)){
                        $reflect = new ReflectionMethod($classe, $methode);
                        $reflect->invoke(new $classe);
                    }else{
                        echo "Error 404 1";
                    }        
                } else {
                    echo "Error 404 2";
                }
            } else {
                $classe = $tab[0];
                $methode = $tab[1];
                $params = array_slice($tab, 2);
                if (file_exists('controllers/' . $classe . ".php")) {
                    require_once('controllers/' . $classe . ".php");
                    if (method_exists($classe, $methode)){
                        $reflect = new ReflectionMethod($classe, $methode);
                        $reflect->invokeArgs(new $classe, $params);
                    }else{
                        echo "Error 404 3";
                    }        
                } else {
                    echo "Error 404 4";
                }
                
            }
        } else {
            $classe = $url;
            if (file_exists('controllers/' . $classe . ".php")) {
                require_once('controllers/' . $classe . ".php");
                $reflect = new ReflectionMethod($classe, "index");
                $reflect->invoke(new $classe);
            } else {
                echo "Error 404 5 $classe";
            }
        }
    }
}
