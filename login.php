<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('uinsuka.jpg'); /* Ganti dengan URL gambar */
            background-size: cover; /* Gambar akan menutupi seluruh layar */
            background-position: center; /* Gambar ada di tengah */
            background-repeat: no-repeat; /* Gambar tidak akan terulang */
        }


        .login-container {
            backdrop-filter: blur(15px); /* Blur effect */
            background: rgba(255, 255, 255, 0.2); /* Transparent white */
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        .login-container h1 {
            color: #fff;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .login-container input {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
        }

        .login-container input:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        .login-container button {
            width: 100%;
            padding: 12px 15px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 25px; /* Ellips shape */
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .login-container button:hover {
            box-shadow: 0 0 15px #007bff, 0 0 30px #007bff;
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="validate.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
