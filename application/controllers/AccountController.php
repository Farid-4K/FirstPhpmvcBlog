<?php 
namespace application\controllers;

use application\lib\Db;
use application\core\Controller;

class AccountController extends Controller
{
	public function loginAction()
	{
		if (!empty($_POST)) {
			if (!$this->model->login($_POST)) {
				$this->view->message('Ошибка авторизации', $this->model->error);
			} else {
				$this->view->location('members/market');
			}
		}
		
		// Render page
		$this->view->layout = 'account';
		$this->view->render('Login');
	}

	public function registrationAction()
	{
		if (!empty($_POST)) {
			if (!$this->model->validateFormReg($_POST)) {
				$this->view->message('Ошибка регистрации', $this->model->error);
			} else {
				$this->model->registration();
				$this->view->location('members/market');
			}
		}
		
		$this->view->layout = 'account';
		$this->view->render('Registration');
	}
}