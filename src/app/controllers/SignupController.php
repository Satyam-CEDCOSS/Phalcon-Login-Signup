<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{

    public function IndexAction()
    {
        // Redirected to View
    }

    public function registerAction()
    {
        $this->cookies->set('email', $this->request->getPost()['email']);
        $this->cookies->set('password', $this->request->getPost()['password']);

        $user = new Users();

        $user->assign(
            $this->request->getPost(),
            [
                'name',
                'email',
                'password'
            ]
        );

        $success = $user->save();

        $this->view->success = $success;

        if ($success) {
            $this->view->message = "Register succesfully";
        } else {
            $this->view->message = "Not Register succesfully due to following\
             reason: <br>" . implode("<br>", $user->getMessages());
        }
    }
}
