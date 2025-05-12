<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h2>Регистрация</h2>
        <form method="POST" action="">
            <input type="text" name="login" placeholder="Логин" required>
            <input type="text" name="number" placeholder="Номер телефона" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Зарегистрироваться</button>
        </form>
        <p>Уже есть аккаунт? <a href="index.php">Войти</a></p>
        <?php
        include 'db.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_POST['login'];
            $number = $_POST['number'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = "SELECT * FROM users WHERE login='$login'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                echo "<p class='error'>Логин уже занят</p>";
            } else {
                $query = "INSERT INTO users (login, number, email, password, role) VALUES ('$login', '$number', '$email', '$password', 'client')";
                if (mysqli_query($conn, $query)) {
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<p class='error'>Ошибка: " . mysqli_error($conn) . "</p>";
                }
            }
        }
        ?>
    </div>
</body>
</html>