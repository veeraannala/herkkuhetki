<div class="row mt-3">
    <div class="col-6 mb-3">
        <h1>Lisää tuotteita</h1>


        <?php if(isset($errorname)) { ?>
            <p class="errormessage">Virhe tuotteen lisäämisessä. Tuotteen nimi ei voi olla sama kuin jo olemassa olevalla tuotteella.</p>
        <?php } else if(isset($errorimage)) {?>
            <p class="errormessage">Virhe tuotteen lisäämisessä. Kuvan sallitut muodot ovat .JPG, .JPEG, .GIF, .PNG ja maksimikoko on 4MB.</p>
        <?php } ?>
        
        <form method="post" enctype="multipart/form-data" action="<?= site_url('admin/addProduct/')?>">
            <div class="form-group">
                <label for="name">Tuotteen nimi</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Tuotteen hinta €</label>
                <input type="number" class="form-control" name="price" step="0.01" value="0" required>
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
                <label for="keywords">Tuotteen avainsanat</label>
                <textarea class="form-control" name="keywords" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Tuotteen kuva</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-group">
                <label for="stock">Tuotteen varastomäärä</label>
                <input type="number" class="form-control" name="stock" value="0" required>
            </div>
            <div class="form-group">
                <label for="category">Tuotekategoria</label>
                <select class="form-control" name="category" required>
                    <?php foreach ($categories as $category): 
                    if ($category['parentID'] !== null) {
                        $categoryParent = "";
                        foreach ($categories as $parentcategory): 
                            if ($category['parentID'] === $parentcategory['categoryID']){
                                $categoryParent = $parentcategory['name'];
                            }
                        endforeach;
                            ?>
                            <option value="<?= $category['categoryID']?>"><?= $categoryParent . " - " . $category['name']?></option>
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

