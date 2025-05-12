<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список пользователей</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    include 'db.php';
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit();
    }
    $role = $_SESSION['role'];
    ?>
    <div class="container">
        <h2>Список пользователей</h2>
        <form method="GET" class="search-form">
            <input type="text" name="search" placeholder="Поиск по логину, номеру или email">
            <button type="submit">Найти</button>
        </form>
        <div class="users-list">
            <?php
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $query = "SELECT login, number, email, status FROM users WHERE login LIKE '%$search%' OR number LIKE '%$search%' OR email LIKE '%$search%'";
            $result = mysqli_query($conn, $query);
            while ($user = mysqli_fetch_assoc($result)) {
                echo "<div class='user-card'>";
                echo "<p><strong>Логин:</strong> {$user['login']}</p>";
                echo "<p><strong>Номер:</strong> {$user['number']}</p>";
                echo "<p><strong>Email:</strong> {$user['email']}</p>";
                echo "<p><strong>Статус:</strong> " . ($user['status'] == 'blacklisted' ? 'В черном списке' : 'Активен') . "</p>";
                echo "</div>";
            }
            ?>
        </div>
        <?php if ($role == 'admin') { ?>
            <a href="admin.php" class="btn">Админ-панель</a>
        <?php } ?>
        <a href="index.php?logout=1" class="btn">Выйти</a>
    </div>
</body>
</html>