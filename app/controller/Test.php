<?

namespace app\controller;

class Test {
    public function __call($name, $arguments) {
        dump($name);
        dump($arguments);
    }
    public static function __callStatic($name, $arguments) {
        dump("Static". $name);
        dump("Static". $arguments);
    }
}