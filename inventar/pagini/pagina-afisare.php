<h1> Filtrare dupa preț</h1>

<?php
    $pret = 0;
    
    if (isset($_GET['pret']))
        $pret = floatval($_GET['pret']);
?>

<form>
    <input type="hidden" name="pagina" value="afisare">
    <div class="form-group">
        <label class="control-label" for="pret">
            Preț (lei)
        </label>
        <input type="text" name="pret" id="pret" class="form-control" placeholder="Ex: 25">
    </div>
    
    <div class="form-group text-right">
        <button type="submit" class="btn btn-dark">
            Caută
        </button>
    </div>
</form>

<?php
    if(isset($_GET['pret']))
    {
        $query = "SELECT * FROM inventar WHERE PRET <='{$pret}'"; //acest query trebuie modificat
        $rez = Query_Select($query); 
    
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
                        'DATA_IN' => 'Data intrării în stoc'
                    ]
            );
        }
    }
?>