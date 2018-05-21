<?php

namespace application\models;

use application\core\Model;
use Exception;
class Account extends Model
{

	public function registration()
	{
		
		$user_data = array(
			"name"        => htmlspecialchars($_POST['name']),
			"email"       => htmlspecialchars($_POST['email']),
			"category"    => htmlspecialchars($_POST['category']),
			"inform"      => htmlspecialchars($_POST['inform']),
			"password"    => password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT)
		);

		$user = $this->db->dispense('users');
		$market = $this->db->dispense('markets');
		$user -> email = $user_data["email"];
		$user -> email_reserv = '';
		$user -> password = $user_data["password"];
		$user -> phone = '';
		$user -> clock = date('d.m.Y H:i:s');
		$market -> name = $user_data["name"];
		$market -> inform = $user_data["inform"];
		$market -> category = $user_data["category"];
		$img_url = array(
			'img_post' => '/public/images/standart_market.jpg',
			'img_background' => '');
		$img_url = json_encode($img_url);
		$market -> img_url = $img_url;
		$this->db->store($user);
		$this->db->store($market);
		$_SESSION['user'] = $user;
		$_SESSION['authorize']['id'] = $user['id'];
		unset($user);
	}
	public function login()
	{
		$user = $this->db->findOne('users', 'email = ?', [$_POST['email']]);
		if (empty($user)) {
			$this-> error = 'Пользователь не найден';
			return false;
		} else {
			if(password_verify($_POST['password'], $user-> password) == $user-> password){
				$_SESSION['user'] = $user;
				$_SESSION['authorize']['id'] = $user['id'];
				return true;
			} else {
				$this-> error = 'Введенный пароль неверный';
				return false;
			}
		}
	}

	public function validateFormLog()
	{
		$find = $this->db->findOne('users', 'email = ?', [htmlspecialchars($_POST['email'])]);
		if (empty($find)) {
			$this-> error = 'Пользователь не найден';
			return false;
		} else {
			return true;
		}
	}
	public function validateFormReg($post)
	{
		$find = $this->db->findOne('users', 'email = ?', [htmlspecialchars($_POST['email'])]);
		$nameLen = iconv_strlen($post['name']);
		$passLen = iconv_strlen($post['password']);
		$textLen = iconv_strlen($post['inform']);
		if ($nameLen < 3 or $nameLen > 20) {
			$this-> error = 'Название должно содержать от 2 до 20 символов';
			return false;
		} elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
			$this-> error = 'E-mail указан неверно';
			return false;
		} elseif (!empty($find)) {
			$this-> error = 'Пользователь с такой почтой уже зарегестрирован';
			return false;
		} elseif ($passLen < 6) {
			$this-> error = 'Минимальная длинна пароля 6 символов';
			return false;
		} else {
			return true;
		}
	}
}