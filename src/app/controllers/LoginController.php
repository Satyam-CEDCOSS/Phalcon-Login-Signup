<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class LoginController extends Controller
{
    public function indexAction()
    {
        // Redirected to View
    }



    public function loginAction()
    {
        $data = $this->request->getPost();
        if (isset($data['delivered'])) {
            $this->cookies->set('email', $this->request->getPost()['email']);
            $this->cookies->set('password', $this->request->getPost()['password']);
        }
        $sql = 'SELECT * FROM Users WHERE email = :email: AND password = :password:';
        $query = $this->modelsManager->createQuery($sql);
        $cars = $query->execute(
            [
                'email' => $data['email'],
                'password' => $data['password']
            ]
        );
        if (isset($cars[0])) {
            $this->session->set("login", "yes");
            $this->view->message = "success";
        } else {
            $this->view->message = "error";
        }
    }

    public function dashboardAction()
    {
        $response = new Response();
        unset($this->session->login);
        $this->response->redirect('login');
    }
}
