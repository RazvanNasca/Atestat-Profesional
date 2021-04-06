<?php
if(login())
{
?>
<h1> Sterge produs</h1>

<?php
    AfisareFormularAdaugare(
        "anulare.php",
        [
            'COD' => 'Codul produsului'
        ],
		"Sterge"
    );
}
else
{
    ?>
    User neautentificat
    <?php
}
    
?>