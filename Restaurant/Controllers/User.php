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
        public function loginSubmit() {
            if (isset($_POST['submit'])) {
                //find the right user in database, where the username matches the typed in username by the user
                $passStmt= $this->usersTable->find('username', $_POST['username']);
                
                $user = $passStmt[0]??NULL;
                //check if password matches the username in the database 
                if (password_verify($_POST['password'], $user->password)) {
                    //if yes, person is logged in, and we can set the sessions, and they can store variables for future use
                    $_SESSION ['loggedin'] = true;
                    $_SESSION ['id'] = $user['iduser'];
                    $_SESSION ['name'] = $user['username'];
                    $_SESSION ['role'] = $user['role'];
            
                    /*check if person is an admin.
                    In that case using === because want to check if :
                    $a === $b	Identical, so if $a is equal to $b, and they are of the same type.
                    https://www.php.net/manual/en/language.operators.comparison.php*/
                    if($user['role'] === 'admin') {
                        /* if person is an admin it sets the session to admin and prints hello to admin
                        and directs them to admin page */
                        $_SESSION ['admin'] = true;
                       
                       }
                   else {
                       //if person is a normal user it prints hello to user and sets session to client
                    $_SESSION ['client'] = true;
                   
                    }
                }
                //If they didn't type in correct credentials display an error message
                else {
                    $errors = [];
                    $errors[] = 'Login failed';
                    return $this->login($errors);
                    
                    }

                }
               
                header('location: /page/home');
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
                echo '<p>You are now logged out</p>';

            }
    }