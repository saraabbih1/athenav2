<?php




require_once __DIR__ . "/../core/Database.php";
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = Database::connect();

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND status = 1");
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role']    = $user['role'];

       header("Location: /athenav2/index.php?page=dashboard");
        exit;
    } else {
        $error = "Email ou mot de passe incorrect";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Login
        </h2>

        <?php if (isset($error) && $error): ?>
            <p class="bg-red-100 text-red-600 text-sm p-3 rounded mb-4 text-center">
                <?= $error ?>
            </p>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <input 
                    type="email" 
                    name="email" 
                    required 
                    placeholder="Email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div>
                <input 
                    type="password" 
                    name="password" 
                    required 
                    placeholder="Password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <button 
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-semibold"
            >
                Login
            </button>
        </form>
    </div>

</body>
</html>

