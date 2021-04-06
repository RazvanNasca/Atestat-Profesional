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
        'DENUMIREA' => DB_Escape_String($_POST['DENUMIREA']),
        'PRET' => floatval($_POST['PRET']),
        'DATA_IN' => DB_Escape_String($_POST['DATA_IN'])
    ];
    $query = "insert INTO inventar (COD, DENUMIREA, PRET, DATA_IN) VALUES (
        '{$clean['COD']}',
        '{$clean['DENUMIREA']}',
        '{$clean['PRET']}',
        '{$clean['DATA_IN']}'
    )";
    
    Query_Insert($query);
    
    header("Location: ./?pagina=index");
    
    