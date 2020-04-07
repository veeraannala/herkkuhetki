<div class="row">
    <div class="col-6 mb-3">
        <h1>Lisää tuotteita</h1>

        <p>Lisää tuotteita</p>
        
        <form>
            <div class="form-group">
                <label for="name">Tuotteen nimi</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="price">Tuotteen hinta €</label>
                <input type="number" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label for="type">Hinnan tyyppi</label>
                <select class="form-control" name="type">
                    <option>100 g</option>
                    <option>kpl</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Tuotteen kuvaus</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Tuotteen kuva</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-group">
                <label for="stock">Tuotteen varastomäärä</label>
                <input type="number" class="form-control" name="stock">
            </div>
            <div class="form-group">
                <label for="category">Tuotekategoria</label>
                <select class="form-control" name="category">
                    <?php foreach ($categories as $category): 
                    if ($category['parentID'] !== null) {
                            ?>
                            <option><?= $category['parentID'] . " - " . $category['name']?></option>
                       <?php } endforeach ?>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="themecategory">Teemakategoria</label>
                <select class="form-control" name="themecategory">
                    <option>Ei teemakategoriaa</option>
                    <?php foreach ($themecategories as $themecategory): ?>
                        <option><?=$themecategory['name']?></option>
                        <?php endforeach?>
                </select>
            </div>


        <button type="submit" class="btn btn-danger">Lisää tuote</button>
        </form>
    </div>
</div>