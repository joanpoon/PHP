<?php
$error = "";
$action = filter_input(INPUT_POST, "submit");
switch ($action) {
    case "Login":
        if (!empty($_POST["username"])) {
            $form_username = filter_input(INPUT_POST, "username");
        }
        if (!empty($_POST["password"])) {
            $form_password = filter_input(INPUT_POST, "password");
        }
        $servername = "localhost";
        $username = "icoolsho_ypoon";
        $password = "$!885-22-1798";
        $dbname = "icoolsho_ypoon";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT id, pw FROM user
        WHERE id='" . $form_username . "' AND pw='" . $form_password . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $one_row = $result->fetch_assoc();
            setcookie("username", $one_row["username"]);
            if (isset($_POST["remember_me"])) {

                setcookie("remember_username", $form_username, time() + 86400 * 10);
                setcookie("remember_password", $form_password, time() + 86400 * 10);
            } else {
                if (isset($_COOKIE["remember_username"])) {
                    setcookie("remember_username", "", time() - 86400 * 10);
                    setcookie("remember_password", "", time() - 86400 * 10);
                }
            }
            header('Location: login.php');
            exit();
        } else {
            $error = "Invalid username or password!";
        }
        break;
    case "Logout":
        setcookie("username", "", time() - 86400 * 10);
        header('Location: final.php');

        exit();
        break;
}
?>
<html>
    <link rel="stylesheet" type="text/css" href="final.css">
    <title>CSD 275 Final Project - Joan Poon</title>
    <h2>CSD 275 Final Project - Joan Poon</h2>

    <p><span class="error">Please enter your username and password to login</span></p>
    <p><span class="error">You can use: username "Joan" and password 123456 </span></p>
    <p><span class="error"><?php echo $error; ?></span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php if (empty($_COOKIE["username"])): ?>
            Username: <input type="text" name="username" value="<?php echo $_COOKIE[remember_username]; ?>">
            <br><br>
            Password: <input type="password" name="password" value="<?php echo $_COOKIE[remember_password]; ?>">
            <br><br>
            <input type="checkbox" name="remember_me">Remember me
            <br><br>
            <input type="submit" name="submit" value="Login" class="button1" >
            <br><br>
        <?php
        else:
            echo "Welcome " . $_COOKIE['username'];
            ?>
            <input type="submit" name="submit" value="Logout" class="button1" >
            
<?php endif; ?>
    </form>

</body>
</html>