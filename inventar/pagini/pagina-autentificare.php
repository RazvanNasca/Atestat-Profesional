<h1> Autentificare </h1>

<?php
if ( isset($_GET['eroare']))
{
    ?>
    <div class="alert alert-danger">
        
        Date eronate.
    </div>
    <?php
}
?>
<form method="POST" action="login.php">
    <div class="form-group">
        <label class="control-label" for="username">
            User
        </label>
        <input type="text" name="username" id="username" class="form-control">
    </div>
    
    <div class="form-group">
        <label class="control-label" for="password">
            Parolă
        </label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    
    <div class="form-group text-right">
        <button type="submit" class="btn btn-dark">
            Sign in
        </button>
    </div>
</form>