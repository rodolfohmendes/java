<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        $client = new SoapClient(null, [
            'location' => 'http://localhost/server.php',
            'uri' => 'http://localhost',
            'trace' => true
        ]);

        $response = $client->login($username, $password);

        if ($response === "OK") {
            $_SESSION['user'] = $username;
            header("Location: home.php");
            exit;
        } else {
            $error = "Login inválido.";
        }
    } catch (SoapFault $e) {
        $error = "Erro SOAP: " . $e->getMessage();
    }
}
?>

<form method="POST">
    <h2>Login</h2>
    <p style="color:red"><?= $error ?? "" ?></p>
    Usuário: <input type="text" name="username"><br>
    Senha: <input type="password" name="password"><br>
    <input type="submit" value="Entrar">
</form>
