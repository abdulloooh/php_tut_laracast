<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['id'])){
    $_SESSION['message'] = "You are already logged in";
    header("location:/dashboard");
    exit;
}
require "views/partials/header.php";
require "views/partials/nav.php";
?>
<!-- <h1>Hello word, welcome <?= $name ?></h1> -->
<ol>
    <?php foreach ($arrangement as $arrange): ?>
        <?php foreach ($arrange as $task) : ?>
            <li>
                <?php if ($task->completed) : ?>
                    <del><?= $task->description; ?></del>
                <?php else : ?>
                    <?= $task->description; ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    <?php endforeach; ?>
</ol>
<h3>Signup</h3>
<?php
if(isset($_SESSION['error'])){
        echo "<p style='background-color:lightgrey;color:red;width:30%;text-align:center;height:20px'>{$_SESSION['error']}</p>";
        session_destroy();
    }
    ?>
<form action="signup" method="POST">
   <input type="text" name="fullname" id="fullname" placeholder="Your full name" style="width:30%;display:block;height:3vh;"> <br>
   <input type="text" name="username" id="username" placeholder="username" style="width:30%;display:block;height:3vh;"> <br>
   <input type="text" name="phone" id="phone" placeholder="phone" style="width:30%;display:block;height:3vh;"> <br>
   <input type="password" name="password" id="password" placeholder="password" style="width:30%;display:block;height:3vh;"><br>
   <input type="password" name="cpassword" id="cpassword" placeholder="confirm password" style="width:30%;display:block;height:3vh;"><br>
   <button type="submit" style="width:30%;display:block;height:3vh;" name="signup", value ="signup">Submit</button> <br>
</form>
<h3>Login</h3>
<?php
// var_dump($_SESSION);
// var_dump($message);
    if(isset($_SESSION['message'])){
        echo "<p style='background-color:lightgrey;color:red;width:30%;text-align:center;height:20px'>{$_SESSION['message']}</p>";
        session_destroy();
    }
?>
<form action="login" method="post">
    <input type="text" name="user" id="user" placeholder="username" style="width:30%;display:block;height:3vh;"> <br>
    <input type="password" name="pass" id="pass" placeholder="password" style="width:30%;display:block;height:3vh;"><br>
    <button type="submit" style="width:30%;display:block;height:3vh;" name="login" value = "login">Submit</button> <br>
</form>

<?php require "views/partials/footer.php"; ?>