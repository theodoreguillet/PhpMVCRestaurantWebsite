<?php require(__DIR__."/../common/homeBackground.php");

if(!isset($error)) {
    $error = null;
}
$passwdErr = $error === "badpassword";
$emailErr = $error === "bademail" || $error === "emailexist";
$pseudoErr = $error === "badpseudo" || $error === "pseudoexist";

?>
<div class="login card">
    <article class="card-body">
        <a href="/user/login" class="float-right btn btn-outline-secondary">Sign in</a>
        <h4 class="card-title mb-4 mt-1">Sign up</h4>
        <form method="POST">
            <div class="form-group">
                <label <?= $emailErr ? 'class="text-danger"' : '' ?>>Your email</label>
                <input name="email" 
                    class="form-control <?= $emailErr ? "is-invalid" : "" ?>"
                    placeholder="Email" type="email">
                <?php
                if($error === "emailexist") {
                    echo '<small class="text-danger">Email already used</small>';
                } else if($error === "bademail") {
                    echo '<small class="text-danger">Incorrect email</small>';
                }
                ?>
            </div>
            <div class="form-group">
                <label <?= $pseudoErr ? 'class="text-danger"' : '' ?>>Your pseudo</label>
                <input name="username" minlength="5" maxlength="20"
                    class="form-control <?= $pseudoErr ? "is-invalid" : "" ?>"
                    placeholder="Username" type="text">
                <?php
                if($error === "pseudoexist") {
                    echo '<small class="text-danger">User already exist</small>';
                } else if($error === "badpseudo") {
                    echo '<small class="text-danger">Incorrect username</small>';
                }
                ?>
            </div>
            <div class="form-group <?= $passwdErr ? "has-error" : "" ?>">
                <label <?= $passwdErr ? 'class="text-danger"' : '' ?>>Your password</label>
                <input name="password" minlength="5" maxlength="40"
                class="form-control <?= $passwdErr ? "is-invalid" : "" ?>"
                placeholder="******" type="password">
                <?php
                if($error === "badpassword") {
                    echo '<small class="text-danger">Incorrect password</small>';
                }
                ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-orange btn-block">Register</button>
            </div>                                                        
        </form>
    </article>
</div>