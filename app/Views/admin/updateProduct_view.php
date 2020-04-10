<div class="row">
    <div class="col-6 mb-3">
        <h1>Lisää tuotteita</h1>

        <p>Lisää tuotteita</p>
        
        <form method="post" action="<?= site_url('admin/addProduct/')?>">
            <div class="form-group">
                <label for="name">Tuotteen nimi</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Tuotteen hinta €</label>
                <input type="number" class="form-control" name="price" required>
            </div>
            <div class="form-group">
                <label for="type">Hinnan tyyppi</label>
                <select class="form-control" name="type" required>
                    <option value="100 g">100 g</option>
                    <option value="kpl">kpl</option>
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
                <input type="number" class="form-control" name="stock" required>
            </div>
            <div class="form-group">
                <label for="category">Tuotekategoria</label>
                <select class="form-control" name="category" required>
                    <?php foreach ($categories as $category): 
                    if ($category['parentID'] !== null) {
                            ?>
                            <option value="<?= $category['categoryID']?>"><?= $category['parentID'] . " - " . $category['name']?></option>
                       <?php } endforeach ?>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="themecategory">Teemakategoria</label>
                <select class="form-control" name="themecategory">
                    <option value="NULL">Ei teemakategoriaa</option>
                    <?php foreach ($themecategories as $themecategory): ?>
                        <option value="<?= $themecategory['id'] ?>"><?=$themecategory['name']?></option>
                        <?php endforeach?>
                </select>
            </div>


        <button type="submit" class="btn btn-danger">Lisää tuote</button>
        </form>


    </div>
</div>

