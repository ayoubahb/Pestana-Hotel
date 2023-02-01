<?php

class HomeController{
  public function index($page){
    require 'views/'.$page.'.php';
  }
}