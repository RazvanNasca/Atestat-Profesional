<?php
    session_start();
    include ("module/modul-conectare.php");
    include ("module/modul-functii.php");
    include ("module/modul-setari.php");
    
       
    $clean = [
        //valorile primite cu post le punem aici si le escapuim
        'nume' => mysqli_real_escape_string($link, $_POST['nume']),
        'email' => mysqli_real_escape_string($link, $_POST['email']),
        'continut' => mysqli_real_escape_string($link, $_POST['continut']),
        'pagina' => mysqli_real_escape_string($link, $_POST['pagina'])
    ];
    $query = "insert INTO comentarii (nume, email, continut, pagina, data) VALUES (
        '{$clean['nume']}',
        '{$clean['email']}',
        '{$clean['continut']}',
        '{$clean['pagina']}',
        NOW()
    )";//acest query il adaptezi in functie de nevoie
    
    mysqli_query($link, $query);
    
    header("Location: ./?pagina={$clean['pagina']}");
    
    