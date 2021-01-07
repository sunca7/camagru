<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

// controllers, actions

class SiteControllers extends Controller
{
    public function home()
    {
        $params = [
            'name' => "Sunah"
        ];
        return $this->render('home', $params);
        // Application::$app->router->renderView('home', $params);
    }

    public function contact()
    {
        return $this->render('contact');
    }

    // sanitize inputs
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        return 'Handling submitte data';
    }

}