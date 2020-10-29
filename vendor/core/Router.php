<?

namespace vendor\core;

class Router {
    protected static $routers = [];
    protected static $router = [];
    public function getRouters() {
        return self::$routers;
    }
    public function getRouter() {
        return self::$router;
    }

    public function add($pattern, $action = []) {
        if(!is_array($action) && !is_string($pattern)) return false;
        self::$routers[$pattern] = $action;
    }
    public function matchRouts($url) {
        foreach(self::$routers as $pattern => $v) {
            if(preg_match($pattern, $url, $mathes)) {
                if(empty($v)) {
                    self::$router = [
                        'controller' => self::convertStringDelim($mathes['controller']),
                        'action' => self::convertStringDelim($mathes['action'], false)
                    ];
                } else {
                    self::$router = $v;
                }
                if(empty(self::$router)) {
                    return false;
                } else {
                    return true;
                }
            }
        }
        return false;
    }

    public function dispath($url) {
        if(self::matchRouts($url)) {
            $controller = "app\\controller\\".self::$router['controller'];
            $action = self::$router['action'];
            self::autoloader();
            if(class_exists($controller)) {
                $initClass = new $controller(self::$router);
                $initClass->$action();
            } else {
                dump("$controller не найден");
            }
        } else {
            print_r("false");
        }
    }


    private function convertStringDelim($str, $firstChar = true):string {
        if($firstChar) {
           $tranformStr = preg_replace("/\_|\-/","",ucwords(strtolower($str),"-|_"));
        } else {
            $tranformStr = lcfirst(preg_replace("/\_|\-/","",ucwords(strtolower($str),"-|_")));
        }
        return $tranformStr;
    }

    private function autoloader() {
        
    }
}