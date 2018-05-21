<?php

namespace application\controllers;

use application\lib\Db;
use application\core\Controller;

class MainController extends Controller
{
	public function indexAction()
	{
		// Content for page
		$vars = [
			'buttons' => [
				['Категории','#','category'],
				['Поиск','#','search'],
				['Мой магазин','/members/market',''],
				['Регистрация','/account/registration', ''],
				['Авторизация','/account/login', '']
			],
		];

		if(!empty($_REQUEST['name'])){
			exit(json_encode(['status' => $_REQUEST, 'message' => 'message']));
		}
		// Render page
		$this->view->render('Golden Hands', $vars);
	}

	public function ajaxpreviewpostAction()
	{
		$this->view->layout = 'ajaxPreviewPost';

		if (!empty($_REQUEST)) {
			$find = $this->model->getPost($_REQUEST['card']);
			$img_url = json_decode($find->img_url);
			$vars = [
				'name' => $find-> name,
				'inform' => $find-> inform,
				'category' => $find-> category,
				'img_url' => $img_url,
			];
		}

		$this->view->render('Golden Hands', $vars);
	}
}
