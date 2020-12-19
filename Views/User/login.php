<?php require(__DIR__."/../common/homeBackground.php") ?>
<div class="login card">
    <article class="card-body">
        <a href="/user/register" class="float-right btn btn-outline-secondary">Sign up</a>
        <h4 class="card-title mb-4 mt-1">Sign in</h4>
        <form method="POST">
            <div class="form-group">
                <label <?= isset($error) && $error === "pseudo" ? 'class="text-danger"' : '' ?>>Your pseudo</label>
                <input name="username" 
                    class="form-control <?= isset($error) && $error === "pseudo" ? "is-invalid" : "" ?>"
                    placeholder="Username" type="text">
                <?php
                if(isset($error) && $error === "pseudo") {
                    echo '<small class="text-danger">User does not exist</small>';
                }
                ?>
            </div>
            <div class="form-group <?= isset($error) && $error === "password" ? "has-error" : "" ?>">
                <label <?= isset($error) && $error === "password" ? 'class="text-danger"' : '' ?>>Your password</label>
                <input name="password" 
                class="form-control <?= isset($error) && $error === "password" ? "is-invalid" : "" ?>"
                placeholder="******" type="password">
                <?php
                if(isset($error) && $error === "password") {
                    echo '<small class="text-danger">Incorrect password</small>';
                }
                ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-orange btn-block">Login</button>
            </div>                                                        
        </form>
    </article>
</div>