<?php
namespace application\controllers;

use application\core\Controller;

class MembersController extends Controller {
	private $btn_menu;
	public function marketAction() {
		$user = $this->model->getUserInformation();
		$vars = [
			'name'         => $user->name,
			'information'  => $user->inform,
			'category'     => $user->category,
			'images'       => $user->img_url,
			'empty_inform' => 'Вы не указали описание',
			'empty_category' => 'Вы не указали категорию',
			'buttons' => [
				['Главная','/',''],
				['Редактировать','/members/edit',''],
				['Мой магазин','/members/market',''],
				['Выход','#', '#user_exit'],
			],
		];		
		$this->view->layout = 'market';
		$this->view->render('You market', $vars);
	}

	public function editAction() {
		$this->btn_menu = [
			['Товары','/members/edit/products/',''],
			['Дизайн магазина','#','search'],
			['Информация','#',''],
			['Мой магазин','/members/market', ''],
		];

		$vars = [
			'buttons' => $this->btn_menu,
		];

		$this->view->layout = 'members';
		$this->view->render('You market', $vars);
	}

	public function editProductsAction()
	{
		$list = $this->model->getProductsList();

		$this->btn_menu = [
			['Товары','/members/edit/products/',''],
			['Дизайн магазина','#','search'],
			['Информация','#',''],
			['Мой магазин','/members/market', ''],
		];

		$vars = [
			'empty_list' => 'У вас нет товаров',
			'list' => $list,
			'buttons' => $this->btn_menu,
		];

		if(!empty($_POST)){
			if(!$this->model->addProduct($_POST)){
				$this->view->message('Ошибка', $this->model->error);
			} else {
				$this->view->message('Готово', $this->model->message.'<br>'.date("H:i:s"));
			};
		}

		$this->view->layout = 'members';
		$this->view->render('You market', $vars);
	}
}