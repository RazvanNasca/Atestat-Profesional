<h1> Listă produse </h1>

<?php
    $rez = Query_Select("SELECT * FROM inventar");  //acest query trebuie modificat
    
    if (Count($rez) == 0)
    {
        print("Niciun rezultat returnat!!!!!!!!!!!");
    }
    else
    {
        AfisareTabel($rez,
                     [
                      'COD' => 'Cod',
                      'DENUMIREA' => 'Denumire',
                      'PRET' => 'Preț (lei)',
                      'DATA_IN' => 'Data intrării pe stoc'
                    ]
        );
    }
?>
