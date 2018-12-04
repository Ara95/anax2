<?php

namespace Anax\Page;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A default page rendering class.
 */
class PageRender implements PageRenderInterface, InjectionAwareInterface
{
    use InjectionAwareTrait;



    /**
     * Render a standard web page using a specific layout.
     *
     * @param array   $data   variables to expose to layout view.
     * @param integer $status code to use when delivering the result.
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.ExitExpression)
     *
     */
    public function renderPage($data, $status = 200)
    {
        $data["stylesheets"] = ["css/style.css"];

        $view = $this->di->get("view");

        $navbar = require ANAX_APP_PATH . "/config/navbar.php";

        // Add common header, navbar and footer
        $view->add("header", [], "header");
        $view->add("navbar", ["navbar" => $navbar], "navbar");
        $view->add("footer", [], "footer");

        // Add layout, render it, add to response and send.
        $view->add("default1/layout", $data, "layout");
        $body = $view->renderBuffered("layout");
        $this->di->get("response")->setBody($body)
                                  ->send($status);
        exit;
    }
}
