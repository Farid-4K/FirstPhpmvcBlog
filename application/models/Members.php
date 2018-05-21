<?php

namespace application\models;

use application\core\Model;
use Imagick;

class Members extends Model {

	public function getUserInformation() {
		$user = $this->db->findOne('markets', 'id = ?', [$_SESSION['authorize']['id']]);
		return $user;
	}

	public function getProductsList() {
		$list = $this->db->find('products', 'author = ?', [$_SESSION['authorize']['id']]);
		return $list;
	}

	public function addProduct($post) {
		/* Проверка данных */
		if ((!empty($post['name'])) or (!empty($post['inform']))){
			if (!empty($_SESSION['authorize']['id'])) {
				/* Обработка строк */
				$name = htmlspecialchars($post['name']);
				$inform = htmlspecialchars($post['inform']);

				/* Загрузка изображения, если есть */
				
				if (isset($_FILES)){
					$tmp_name = $_FILES["file"]["tmp_name"];
					$name_img = basename($_FILES["file"]['name']);
					$filename = 'public/users/product/'.$name_img.hash('tiger128,4',$name_img).'.jpg';
					/* Перемещение */
					move_uploaded_file($tmp_name, $filename);
				}
				
				/* Подключение к таблице с продуктами */
				$db = $this->db->dispense('products');

				$db-> name = $name;
				$db-> inform = $inform;
				$db-> image = $filename;
				$db-> date = htmlspecialchars(date("Y:m:d:H:i:s"));
				$db-> author = $_SESSION['authorize']['id'];
				$this->db->store($db);
				$this->message = 'Успешно';
				return true;
			} else {
				$this->error = 'Авторизируйтесь заного'; 
				return false;
			}
		} else {
			$this->error = 'Поля название и описание должны быть заполнены'; 
			return false;
		}
	}
}