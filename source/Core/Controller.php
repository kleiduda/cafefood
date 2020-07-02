<?php

namespace Source\Core;


use Source\Support\Message;
use Source\Support\Seo;

/**
 * Class Controller
 * @author Kleiton Freitas
 * @package Source\Core
 */
class Controller
{
    /** @var View*/
    protected $view;
    /**@var Seo */
    protected $seo;
    /** @var Message */
    protected $message;


    /**
     * Controller constructor.
     * @param string|null $pathToView
     */
    public function __construct(string $pathToView = null)
    {
        $this->view = new View($pathToView);
        $this->seo = new Seo();
        $this->message = new Message();
    }
}