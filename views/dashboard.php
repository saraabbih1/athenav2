<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

  
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">


<aside class="w-64 bg-slate-800 text-white flex flex-col">
    <div class="p-4 text-xl font-bold border-b border-slate-700">Athena</div>
    <nav class="flex-1 p-4 space-y-2">
        <a href="/athenav2/views/dashboard.php" class="block px-3 py-2 rounded hover:bg-slate-700">Dashboard</a>
        <a href="athenav2/views/project.php" class="block px-3 py-2 rounded hover:bg-slate-700">Projects</a>
        <a href="athenav2/views/sprints.php" class="block px-3 py-2 rounded hover:bg-slate-700">Sprints</a>
        <a href="/athenav2/views/tasks.php" class="block px-3 py-2 rounded hover:bg-slate-700">Tasks</a>
    </nav>

    <div class="p-4 border-t border-slate-700">
        <a href="/athenav2/views/logout" class="text-red-400 hover:underline">Logout</a>
    </div>
</aside>
<main class="flex-1 p-6">
</main>
</body>
</html>
