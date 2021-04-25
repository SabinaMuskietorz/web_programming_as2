<?php
namespace Restaurant\Controllers;
class User {
    private $usersTable;
    public function __construct($usersTable) {
        $this->usersTable = $usersTable;
    }
    public function delete() {
        $this->usersTable->delete($_POST['iduser']);

        header('location: /admin');
    }
    public function home(){
        return [
            'template' => 'home.html.php',
            'title' => 'Kate kitchen'
        ];
    }
    public function editSubmit() {
 
            $templateVars = [
                'iduser' => $_POST['id'],
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'role' => $_POST['role']

            ];
    
            $this->usersTable->save($templateVars);
            $output = 'User saved';
        }
        public function edit() {
            if (isset($_GET['iduser'])) {
                $result = $this->usersTable->find('iduser', $_GET['iduser']);
                $templateVars = $result[0];
            }
            else {
                $templateVars = false;
            }
            return [
                'template' => 'signin.html.php',
                'variables' => ['templateVars' => $templateVars],
                'title' => 'Edit user'
            ];
        }
    }