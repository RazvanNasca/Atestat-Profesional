<?php

    session_start();
    include ("module/modul-conectare.php");
    include ("module/modul-functii.php");
    include ("module/modul-setari.php");
    if( login() )
    {
        header("Location: ./");
        die();
    }
    if ( isset($_POST['username']) && isset($_POST['password']))
    {
    
        $clean=[];
        $clean['username']=trim($_POST['username']);
        $clean['password']=parola($_POST['password']);
        
        $q="SELECT id FROM utilizatori WHERE user='{$clean['username']}' AND parola='{$clean['password']}'";
        $rez=mysqli_query($link,$q);
        
        if (mysqli_num_rows($rez)==1 )
        {
            $row=mysqli_fetch_array($rez);
            $_SESSION['id_user']=$row['id'];
            header("Location: ./");
            //header("Location: ./chestii/ceva.txt");
            die();
        }
        else
        {
            header("Location: ./?pagina=autentificare&eroare");
            die();
        }
    }
    else
    {
        
        header("Location: ./?pagina=autentificare");
        die();
    }

?>