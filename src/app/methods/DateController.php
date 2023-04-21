<?php

namespace MyApp\User;

use Phalcon\Mvc\Controller;

class DateController extends Controller
{
    public function indexAction()
    {
        print_r("<h3>".date("Y-m-d")."<h3>");
        // print_r("<h3>".date("h-i-sa")."<h3>");
    }
}
