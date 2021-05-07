<?php
namespace Restaurant\Controllers;
class Page {
    function admin() {
      return [
        'template' => 'adminlist.html.php',
        'variables' => [],
        'title' => 'Admin'
    ];

    }
    public function faq() {
        return [
        'template' => 'faq.html.php',
        'title' => 'FAQ',
        'variables' => []
      ];
      }
      public function aboutus() {
        return [
        'template' => 'aboutus.html.php',
        'title' => 'About us',
        'variables' => []
      ];
      }
      
    function home() {
      return [
        'template' => 'home.html.php',
        'title' => 'Kate kitchen',
        'variables' => []
    ];
    }
}
