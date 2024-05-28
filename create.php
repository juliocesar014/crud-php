<?php
require_once 'config/Database.php';
require_once 'models/User.php';

use Config\Database;
use Models\User;

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];

    if ($user->create()) {
        header("Location: index.php");
    } else {
        echo "Erro ao criar usuário.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Usuário</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Adicionar Novo Usuário</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php $db->close(); ?>
