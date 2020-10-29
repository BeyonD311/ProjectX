<?


namespace vendor\core;



abstract class Controller {


    /**
     * Current router 
     * @var array $router
     */
    protected $router;

    /**
     * Current view class
     * @var string $view
     */
    protected $view;

    /**
     * Current layout
     * @var string $layout
     */
    protected $layout;


    public function __construct($router) {
        $this->router = $router;
    }

    public function getRouter() {
        return $this->router;
    }
}