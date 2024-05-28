<?php
require_once 'config/Database.php';
require_once 'models/User.php';

use Config\Database;
use Models\User;

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if (isset($_GET['id'])) {
    $user->id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];

        if ($user->update()) {
            header("Location: index.php");
        } else {
            echo "Erro ao atualizar usuário.";
        }
    } else {
        $user_data = $user->getSingleUser();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Usuário</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user_data['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_data['email']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php $db->close(); ?>
