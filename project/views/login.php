<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="/public/index.php?page=login">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

