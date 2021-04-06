<?php
    $comentarii = Query_Select("SELECT * FROM comentarii WHERE pagina='{$pagina}'");
?>
<h1>
    Comentarii
    <span class="badge badge-secondary">
        <?=Count($comentarii)?>
    </span>
</h1>
<?php
    foreach($comentarii as $comentariu)
    {
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?=$comentariu['nume']?></h5>
                <p class="card-text">
                    <?=nl2br($comentariu['continut'])?>
                </p>
                
            </div>
            <div class="card-footer text-muted">
                <?=$comentariu['data']?>
            </div>
        </div>
        <?php
    }
?>
<h2>Adaugare comentariu</h2>
<form action="adaugare-comentariu.php" method="POST">
    <input type="hidden" name="pagina" value="<?=$pagina?>">
    <div class="form-group">
        <label for="nume" class="control-label">
            Numele dumneavoastră
        </label>
        <input type="text" name="nume" id="nume" class="form-control" placeholder="Ex: Mircea">
    </div>
    
    <div class="form-group">
        <label for="email" class="control-label">
            Adresă email
        </label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Ex: mircea123@gmail.com">
    </div>
    
    <div class="form-group">
        <label for="continut" class="control-label">
            Mesajul dumneavoastră
        </label>
        <textarea name="continut" id="continut" class="form-control" placeholder="Ex: Super produse!"></textarea>
    </div>
    
    <div class="form-group text-right">
        <button type="submit" class="btn btn-dark">Adaugare</button>
    </div>
    
</form>