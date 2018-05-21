<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{

   public function getPost($id)
   {
      $find = $this->db->findOne('posts', ' id = ? ', [$id]);
      return $find;
   }

}
