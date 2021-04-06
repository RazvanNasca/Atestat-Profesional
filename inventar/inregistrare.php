<?php
    session_start();
    include ("module/modul-conectare.php");
    include ("module/modul-functii.php");
    include ("module/modul-setari.php");
    
    if(login())
    {
        CreareAlerta("Esti deja autentificat!", "danger");
        header("Location: ./");
        die();
    }
    
    $clean = [
        //valorile primite cu post le punem aici si le escapuim
        'user' => mysqli_real_escape_string($link, $_POST['user']),
        'parola' => Parola($_POST['parola']),
        'parola2' => Parola( $_POST['parola2']),
    ];
    
    if($clean["parola"]!=$clean["parola2"])
       {
        CreareAlerta("Parolele nu sunt identice!" , "danger");
        header("Location: ./?pagina=inregistrare");
        die();
       }
    
    $q="SELECT id FROM utilizatori WHERE user='{$clean["user"]}'";
    $rez=mysqli_query($link,$q);
    if(mysqli_num_rows($rez)>0)
      {
        CreareAlerta("Utiliozator existent!" , "danger");
        header("Location: ./?pagina=inregistrare");
        die();
       }
    
    $query = "insert INTO utilizatori (user, parola) VALUES (
        '{$clean['user']}',
        '{$clean['parola']}'
    )";//acest query il adaptezi in functie de nevoie
    
    mysqli_query($link, $query);
    
    CreareAlerta("Inregistrare cu succes", "success");
    
    header("Location: ./?pagina=autentificare");
    
    