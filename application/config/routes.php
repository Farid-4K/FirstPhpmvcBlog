<?php

return [

   '' => [
      'controller' => 'main',
      'action'     => 'index',
   ],

   'ajaxpreviewpost' => [
      'controller' => 'main',
      'action'     => 'ajaxpreviewpost',
   ],

   'members/email/{token:[a-zA-Z0-9]+}' => [
      'controller' => 'members',
      'action'     => 'email',
   ],

   'account/login' => [
      'controller' => 'account',
      'action'     => 'login',
   ],

   'account/registration' => [
      'controller' => 'account',
      'action'     => 'registration',
   ],

   'members/blog' => [
      'controller' => 'members',
      'action'     => 'blog',
   ],

   'members/edit' => [
      'controller' => 'members',
      'action'     => 'editPosts',
   ],

   'members/edit/posts' => [
      'controller' => 'members',
      'action'     => 'editPosts',
   ],
];
