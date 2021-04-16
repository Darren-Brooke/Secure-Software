<?php
session_start();
include_once 'scripts/token.php';
include 'header.php';
include 'navbar.php';
?>
<div class="container-fluid">
<title>Register</title>
    <!-- Page Content  -->
    <div class="row justify-content-center">
        <div class="col-11 col-md-6">
            <h2>Sign Up</h2>
            <p>Please fill this form to create an account.</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11 col-md-6">
            <form method="POST" action="scripts/register.php">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="Username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input name="password2" type="password" class="form-control" id="password2" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <label for="team">User Team</label>
                    <select name="team" class="form-control" id="team">
                        <option>Team A</option>
                        <option>Team B</option>
                        <option>Team C</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="admin">Admin Status</label>
                    <select name="admin" class="form-control" id="admin">
                        <option>user</option>
                        <option>admin</option>
                    </select>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Register</button>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            </form>
        </div>
    </div>
</div>
</div>
<?php
include 'footer.php';
?>