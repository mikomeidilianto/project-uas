<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login - Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url('Admin/assets/css/style-login.css') ?>?v=1.0">

</head>

<body>
    
    <div class="login-container">
        <div class="login-card">
            <h3>Welcome!</h3>
            <form>
                <label class="form-label" for="username">Username</label>
                <input type="text" id="username" class="form-input" placeholder="Enter your username" required />

                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" class="form-input" placeholder="Enter your password" required />

                <button type="submit" class="btn">Log In</button>
            </form>
            <div class="forgot-password">
                <a href="#">Forgot Password?</a>
            </div>
        </div>
    </div>
</body>

</html>