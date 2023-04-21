<?php

namespace MyApp\User;

use Phalcon\Mvc\Controller;

class DateController extends Controller
{
    public function indexAction()
    {
        date_default_timezone_set("Asia/Calcutta");
        print_r("<h3>".date("Y-m-d")."<h3>");
        print_r("<h3>".date("h-i-sa")."<h3>");
    }
}
