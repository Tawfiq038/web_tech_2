<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="/public/index.php">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <br><br>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <br><br>
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>
            <br><br>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
