<?php
namespace Restaurant\Controllers;
class User {
    private $usersTable;
    public function __construct($usersTable) {
        $this->usersTable = $usersTable;
    }
    public function deleteSubmit() {
        $users = $this->usersTable->delete($_POST['id']);

        header('location: /user/list');
    }
    public function list() {
        $users = $this->usersTable->findAll();
        return [
            'template' => 'userlist.html.php',
            'title' => 'User list',
            'variables' => [
                'users' => $users
            ]
            ];
    }
    public function home(){
        return [
            'template' => 'home.html.php',
            'title' => 'Kate\'s kitchen'
        ];
    }
    //make user an admin
    public function allowSubmit() {
        $data['id'] = $_POST['id'];
        $data['role'] = 'admin';
        $this->usersTable->save($data);
        header('location: /user/list');
      }
      //block user's permission
      public function blockSubmit() {
        $data['id'] = $_POST['id'];
        $data['role'] = '';
        $this->usersTable->save($data);
        header('location: /user/list');
      }
    public function editSubmit() {
        $data = $_POST['user'];
        if(isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
    
        $this->usersTable->save($data);
        //var_dump($_SESSION);
        if(isset($_SESSION['admin'])) {
            header('location: /user/list');
            exit();
        }
        header('location: /page/home');
    }
        public function edit() {
            if (isset($_GET['id'])) {
                $result = $this->usersTable->find('id', $_GET['id'])[0];
            }
            return [
                'template' => 'signin.html.php',
                'variables' => [
                    'user' => $result  ?? null
                ],
                'title' => 'Save user'
            ];
        }
        //user's login
        public function loginSubmit() {
            if (isset($_POST['submit'])) {
                //find the right user in database, where the username matches the typed in username by the user
                $passStmt= $this->usersTable->find('username', $_POST['username']);
                //var_dump($passStmt);
                $user = $passStmt[0]??NULL;
                if ($user == NULL) {
                    $errors = [];
                    $errors[] = 'Login failed';
                    return $this->login($errors);
                }
                //check if password matches the username in the database 
                if (password_verify($_POST['password'], $user->password)) {
                    //if yes, person is logged in, and we can set the sessions, and they can store variables for future use
                    $_SESSION ['loggedin'] = true;
                    $_SESSION ['id'] = $user->id;
                    $_SESSION ['name'] = $user->username;
                    $_SESSION ['role'] = $user->role;
            
                    /*check if person is an admin.
                    In that case using === because want to check if :
                    $a === $b	Identical, so if $a is equal to $b, and they are of the same type.
                    https://www.php.net/manual/en/language.operators.comparison.php*/
                    if($user->role === 'admin') {
                        /* if person is an admin it sets the session to admin
                        and directs them to admin page */
                        $_SESSION ['admin'] = true;
                        header('location: /page/admin');
                       
                       }
                   else {
                    header('location: /page/home');
                   }
                }
                //If they didn't type in correct credentials display an error message
                else {
                    $errors = [];
                    $errors[] = 'Login failed';
                    return $this->login($errors);
                }
            }
            }
            public function login($errors=[]) {
                return [
                    'template' => 'login.html.php',
                    'variables' => ['errors' => $errors],
                    'title' => 'Log in'
                ];
            }
            public function logout() {
                session_destroy();
                header('location: /page/home');

            }
    }