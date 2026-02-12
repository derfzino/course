<?php
    include '../config.php';
    session_start();
?>
<?php
    if ($_SERVER ["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];


        $sql = "SELECT * FROM `users` WHERE username = :username";
        $stmp = $pdo->prepare($sql);
        $stmp->execute([':username' => $username]);

        $user = $stmp->fetch();

        if($user){
            if ($user['password'] === $password) {
                $_SESSION['uID'] = $user['id'];
                 $_SESSION['username'] = $user['username'];

                header('Location: /');
                exit;
            } else { 
                echo "Неверное имя пользователя или пароль.";
            }
        } else {
            echo "Пользователь не найден.";
        }
    } else {
        include 'auth.php';
    }
?>