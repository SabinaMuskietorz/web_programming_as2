<?php
namespace Restaurant\Controllers;
class Page {
  private $dishesTable;
    public function __construct($dishesTable, $categoriesTable, $reviewsTable, $usersTable) {
        $this->dishesTable = $dishesTable;
        $this->categoriesTable = $categoriesTable;
        $this->reviewsTable = $reviewsTable;
        $this->usersTable = $usersTable;
      }
      
      function admin() {
      $dishes = $this->dishesTable->findAll();
      return [
        'template' => 'adminlist.html.php',
        'variables' => ['dishes' => $dishes],
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
      public function categories() {
        $categories = $this->categoriesTable->findAll();
        return [
          'template' => 'categories.html.php',
          'title' => 'Categories',
          'variables' => ['categories' => $categories]
        ];
      }
      function manageusers() {
        $users = $this->usersTable->findAll();
        return [
          'template' => 'userlist.html.php',
          'title' => 'User',
          'variables' => ['users' => $users]
        ];
      }
      
      function home() {
        $categories = $this->categoriesTable->findAll();
      return [
        'template' => 'home.html.php',
        'title' => 'Kate\'s kitchen',
        'variables' => [
          'categories' => $categories
        ]
    ];
    }
}
