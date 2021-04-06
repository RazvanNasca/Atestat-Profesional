<?php
    session_start();
    include ("module/modul-conectare.php");
    include ("module/modul-functii.php");
    include ("module/modul-setari.php");
    
    if( !login())
    {
        header("Location: ./");
        die();
    }
    
    $clean = [
        'COD' => intval($_POST['COD']),
    ];
    $query = "DELETE FROM inventar WHERE COD = '{$clean['COD']}'";//acest query il adaptezi in functie de nevoie
    
    Query_Delete($query);
    
    header("Location: ./?pagina=index");
    
    