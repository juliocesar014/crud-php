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

    if ($user->delete()) {
        header("Location: index.php");
    } else {
        echo "Erro ao excluir usuário.";
    }
}

$db->close();
