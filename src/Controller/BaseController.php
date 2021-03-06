<?php

abstract class BaseController
{
    protected $params;
    protected $template = __DIR__ . './../Views/template.php';
    protected $viewsDir = __DIR__ . './../Views';

    /**
     * BaseController constructor
     * @param string $action
     * @param null $id
     */
    public function __construct()
    {
        $this->params = $params;

        $method ='execute' . ucfirst($action);
        if (! is_callable([$this, $method]))
        {
            throw new \RuntimeException('L\'action "' . $method . '" n\'est pas définie sur ce module');
        }
        $this->$method();
    }

    /**
     * @param string $title
     * @param array $vars
     * @param string $view
     * @param mixed
     */
    public function render(string $title, array $vars, string $view)
    {
        $view = $this->viewDir . $view . '.view.php';
        ob_start();
        require $view;
        $content = ob_get_clean();
        return require $this->template;
    }
}