<?php
if(login())
{
?>
<h1> Adăugare produs </h1>

<?php
    AfisareFormularAdaugare(
        "adaugare.php",
        [
            'COD' => 'Cod',
            'DENUMIREA' => 'Denumire',
            'PRET' => 'Preț (lei)',
            'DATA_IN' => 'Data intrării în stoc'
        ]
    );

}
else
{
    ?>
    User neautentificat!
    <?php
}
    
?>