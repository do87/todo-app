<?php
require_once '../abstracts/AbstractComponent.php';

class NavigationController extends AbstractComponent {
    private $headerTemplateFile = '../templates/header.php';
    private $footerTemplateFile = '../templates/footer.php';

    function getView($component = 'header') {
        ob_start();
        if ($component === 'header') {
            include($this->headerTemplateFile);
        } else {
            include($this->footerTemplateFile);
        }
        return ob_get_clean();
    }
}