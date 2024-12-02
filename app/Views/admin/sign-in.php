<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login - Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('bijikopi.png') no-repeat center center/cover;
            margin: 0;
            padding: 0;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .login-card h3 {
            margin-bottom: 1rem;
            color: #b08e63;
            text-align: center;
        }

        .login-card p {
            text-align: center;
            color: #555;
            margin-bottom: 2rem;
        }

        .form-label {
            font-weight: 500;
            color: #333;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-input {
            width: 93%;
            padding: 0.8rem;
            border: 1px solid #b08e63;
            border-radius: 6px;
            margin-bottom: 1.5rem;
            background-color: #f9f4ef;
        }

        .form-input:focus {
            border-color: #b08e63;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 0.8rem;
            background: #b08e63;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #987350;
        }

        .forgot-password {
            text-align: center;
            margin-top: 1rem;
        }

        .forgot-password a {
            color: #b08e63;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
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