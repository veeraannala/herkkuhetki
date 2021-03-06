<div class="row mt-3">
    <div class="col-lg-6 mb-3 col-md-8">
        <h1>Lisää tuotteita</h1>


        <?php if(isset($errorname)) { ?>
            <p class="errormessage">Virhe tuotteen lisäämisessä. Tuotteen nimi ei voi olla sama kuin jo olemassa olevalla tuotteella.</p>
        <?php } else if(isset($errorimage)) {?>
            <p class="errormessage">Virhe tuotteen lisäämisessä. Kuvan sallitut muodot ovat .JPG, .JPEG, .GIF, .PNG ja maksimikoko on 4MB.</p>
        <?php } ?>
        
        <form method="post" enctype="multipart/form-data" action="<?= site_url('admin/addProduct/')?>">
            <div class="form-group">
                <label for="name">Tuotteen nimi</label>
                <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" maxlength="255" required>
                <small id="nameHelp" class="form-text text-muted">Tuotenimen on oltava yksilöllinen.</small>
            </div>
            <div class="form-group">
                <label for="price">Tuotteen hinta €</label>
                <input type="number" class="form-control" name="price" value="<?php if(isset($_POST['price'])) echo $_POST['price']; else echo "0" ?>" step="0.01" required>
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
                <textarea class="form-control" name="description" rows="3"><?php if(isset($_POST['description'])) echo $_POST['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="keywords">Tuotteen avainsanat</label>
                <textarea class="form-control" name="keywords" rows="1"><?php if(isset($_POST['keywords'])) echo $_POST['keywords']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Tuotteen kuva</label>
                <input type="file" class="form-control-file" name="image">
                <small id="imageHelp" class="form-text text-muted">Hyväksytyt tiedostomuodot .JPG, .JPEG, .GIF ja .PNG. Maksimikoko 4MB.</small>
            </div>
            <div class="form-group">
                <label for="stock">Tuotteen varastomäärä</label>
                <input type="number" class="form-control" name="stock" value="<?php if(isset($_POST['stock'])) echo $_POST['stock']; else echo "0"?>" required>
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

