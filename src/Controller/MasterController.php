<?php

namespace Gondr\Controller;

class MasterController
{
    public function render($page, $datas = [])
    {
        $view = new View($page, $datas);
    }
}