<?php
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'manager') {
    header("Location: index.php?page=dashboard");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<h2 class="text-xl font-bold mb-4">Create Project</h2>

<form method="POST" action="index.php?page=project_store" class="space-y-4 bg-white p-4 rounded shadow w-96">

    <input type="text" name="title" placeholder="Title" required class="w-full border p-2">

    <textarea name="description" placeholder="Description" class="w-full border p-2"></textarea>

    <input type="date" name="start_date" required class="w-full border p-2">

    <input type="date" name="end_date" required class="w-full border p-2">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Create
    </button>

</form>

</body>
</html>
