<?

namespace app\controller;


class Main extends Controller{
    public function index() {
        dump($this->getRouter());
    }
}