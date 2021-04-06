<?php
if(!login())
{   
?>

<h1> Inregistrare </h1>

<form method="POST" action="inregistrare.php">
    <div class="form-group">
        <label class="control-label" for="user">
            Nume utilizator
        </label>
        <input type="text" name="user" id="user" class="form-control">
    </div>
    
    <div class="form-group">
        <label class="control-label" for="parola">
            Parola
        </label>
        <input type="password" name="parola" id="parola" class="form-control">
    </div>
    
    <div class="form-group">
        <label class="control-label" for="parola2">
            Confirmarea parolei
        </label>
        <input type="password" name="parola2" id="parola2" class="form-control">
    </div>
    
 
    
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">
            INREGISTRARE!
        </button>
    </div>
</form>

<?php
}
else
{
    ?>
    Inregistrarea este disponibila doar pentru userii neautentificati!
    <?php
}
?>