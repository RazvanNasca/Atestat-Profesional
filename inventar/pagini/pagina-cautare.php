<h1> Căutare produs </h1>

<?php
    //$nume;
    if (isset($_GET['nume']))
        $nume = DB_Escape_String($_GET['nume']);
?>

<form>
    <input type="hidden" name="pagina" value="cautare">
    <div class="form-group">
        <label class="control-label" for="nume">
            Numele produsului căutat
        </label>
        <input placeholder="Ex: pantent" type="text" name="nume" id="nume" class="form-control" value="<?=isset($_GET['nume'])?$_GET['nume']:""?>">
    </div>
    
    <div class="form-group text-right">
        <button type="submit" class="btn btn-dark">
            Caută
        </button>
    </div>
</form>

<?php
    if(isset($_GET['nume']))
    {
        $query = "SELECT * FROM inventar WHERE DENUMIREA LIKE '%{$nume}%'"; //acest query trebuie modificat
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
                        'PRET' => 'Pret',
                        'DATA_IN' => 'Data'
                    ]
            );
        }
    }
?>