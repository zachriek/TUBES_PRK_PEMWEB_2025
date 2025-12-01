<?php

class HomeController extends Controller
{
  public function index()
  {
    $data = [
      'title' => 'BeliLokal - Home',
    ];

    $this->view('home/index', $data);
  }
}
