<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    include 'db.php';
    if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
        header("Location: index.php");
        exit();
    }
    ?>
    <div class="container">
        <h2>Админ-панель</h2>
        <a href="dashboard.php" class="btn">Назад к списку</a>
        <div class="users-list">
            <?php
            $query = "SELECT * FROM users";
            $result = mysqli_query($conn, $query);
            while ($user = mysqli_fetch_assoc($result)) {
                echo "<div class='user-card'>";
                echo "<form method='POST' action=''>";
                echo "<input type='hidden' name='id' value='{$user['id']}'>";
                echo "<p><strong>Логин:</strong> <input type='text' name='login' value='{$user['login']}'></p>";
                echo "<p><strong>Номер:</strong> <input type='text' name='number' value='{$user['number']}'></p>";
                echo "<p><strong>Email:</strong> <input type='email' name='email' value='{$user['email']}'></p>";
                echo "<p><strong>Статус:</strong> ";
                echo "<select name='status'>";
                echo "<option value='active'" . ($user['status'] == 'active' ? ' selected' : '') . ">Активен</option>";
                echo "<option value='blacklisted'" . ($user['status'] == 'blacklisted' ? ' selected' : '') . ">В черном списке</option>";
                echo "</select></p>";
                echo "<button type='submit' name='update'>Сохранить</button>";
                echo "</form>";
                echo "</div>";
            }
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $login = $_POST['login'];
                $number = $_POST['number'];
                $email = $_POST['email'];
                $status = $_POST['status'];
                $query = "UPDATE users SET login='$login', number='$number', email='$email', status='$status' WHERE id=$id";
                mysqli_query($conn, $query);
                header("Location: admin.php");
                exit();
            }
            ?>
        </div>
    </div>
</body>
</html>