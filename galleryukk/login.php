<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Galeri Foto</title>
    <style>
        @charset "utf-8";

        /* CSS Document */
        * {
            padding: 0;
            margin: 0;
            font-family: 'Quicksand', sans-serif;
            box-sizing: border-box;
        }

        body {
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #e1eec3, #2C3E50);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .box-login {
            width: 300px;
            min-height: 200px;
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .box-login h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 500;
            color: #333;
        }

        .input-control {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .input-control:focus {
            border-color: #3498DB;
            outline: none;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.1);
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #2C3E50;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2C3E50;
        }

        .box-login p {
            margin-top: 15px;
            color: #777;
            font-size: 14px;
            text-align: center;
        }

        .box-login a {
            color: #2C3E50;
            font-weight: 500;
        }

        .box-login a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control" required>
            <input type="password" name="pass" placeholder="Password" class="input-control" required>
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
        <?php
        session_start();
        include 'db.php';

        // Initialize login attempts session variable if not set
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 0;
        }

        if (isset($_POST['submit'])) {
            $user = mysqli_real_escape_string($conn, $_POST['user']);
            $pass = mysqli_real_escape_string($conn, $_POST['pass']);

            // Check if the username exists in the database
            $cekUser = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '" . $user . "'");

            if (mysqli_num_rows($cekUser) > 0) {
                $d = mysqli_fetch_object($cekUser);
                // Verify the password
                if (password_verify($pass, $d->password)) {
                    // Successful login
                    $_SESSION['status_login'] = true;
                    $_SESSION['a_global'] = $d;
                    $_SESSION['id'] = $d->admin_id;
                    $_SESSION['admin_name'] = $d->admin_name; // Simpan admin_name ke session
                    $_SESSION['login_attempts'] = 0; // Reset attempts after successful login
                    echo '<script>window.location="dashboard.php"</script>';
                } else {
                    // Incorrect password
                    $_SESSION['login_attempts'] += 1;
                    if ($_SESSION['login_attempts'] >= 3) {
                        echo '<script>
                alert("Password salah 3 kali. Apakah Anda lupa password? Klik OK untuk membuat akun baru.");
                window.location.href = "registrasi.php";
            </script>';
                    } else {
                        echo '<script>alert("Password salah. Coba lagi.");</script>';
                    }
                }
            } else {
                // Username not found
                echo '<script>
        alert("Username tidak terdaftar. Silakan registrasi terlebih dahulu.");
        window.location.href = "registrasi.php";
    </script>';
            }
        }
        ?>

        <p>Belum punya akun? Daftar <a href="registrasi.php">Disini</a></p>
        <p>Atau Klik <a href="index.php">Kembali</a></p>
    </div>
</body>

</html>