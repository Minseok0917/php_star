<?php

namespace Core\Core;

class View 
{
    public function __construct($page, $data)
    {
        extract($data);
        require_once(__ROOT . __DS . "views" . __DS . "layout" . __DS . "header.php");
        require_once(__ROOT . __DS . "views" . __DS . $page . ".php");
        require_once(__ROOT . __DS . "views" . __DS . "layout" . __DS . "footer.php");
    }
}
