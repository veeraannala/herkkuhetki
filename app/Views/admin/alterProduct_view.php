<?php helper('form'); ?>
<div class="row mt-3">
    <div class="col-6 mb-3">
        <h3>Muokkaa tuotetta</h3>
        <?php if(isset($errorname)) { ?>
            <p class="errormessage">Virhe tuotteen lisäämisessä. Tuotteen nimi ei voi olla sama kuin jo olemassa olevalla tuotteella.</p>
        <?php } else if(isset($errorimage)) {?>
            <p class="errormessage">Virhe tuotteen lisäämisessä. Kuvan sallitut muodot ovat .JPG, .JPEG, .GIF, .PNG ja maksimikoko on 4MB.</p>
        <?php } ?>

        <form method="post" enctype="multipart/form-data" action="<?= site_url('admin/changeProduct/')?>">
            <div class="form-group">
                <label for="newname">Tuotteen nimi</label>
                <input type="text" class="form-control" name="newname" value="<?php if(isset($_POST['newname'])) echo $_POST['newname']; else echo $product['name']?>" maxlength="255" required>
                <small id="nameHelp" class="form-text text-muted">Tuotenimen on oltava yksilöllinen</small>
            </div>
            <div class="form-group">
                <label for="newprice">Tuotteen hinta €</label>
                <input type="number" class="form-control" name="newprice" step="0.01" value="<?php if(isset($_POST['newprice'])) echo $_POST['newprice']; else echo $product['price']?>" required>
            </div>
            <div class="form-group">
                <label for="newtype">Hinnan tyyppi</label>
                <?php
                    $types = [ 
                        '100 g' => '100 g',
                        'kpl' => 'kpl'
                    ];

                    $attributes = [
                        'class' => 'form-control'
                    ];

                    echo form_dropdown('newtype', $types, $product['type'], $attributes);
                ?>
            </div>

            <div class="form-group">
                <label for="newdescription">Tuotteen kuvaus</label>
                <textarea class="form-control" name="newdescription" rows="3" ><?php if(isset($_POST['newdescription'])) echo $_POST['newdescription']; else echo $product['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="newkeywords">Tuotteen avainsanat</label>
                <textarea class="form-control" name="newkeywords" rows="3" ><?php if(isset($_POST['newkeywords'])) echo $_POST['newkeywords']; else echo $product['keywords'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Tuotteen kuva</label>
                <input type="file" class="form-control-file" name="image">
                <small id="imageHelp" class="form-text text-muted">Hyväksytyt tiedostomuodot .JPG, .JPEG, .GIF ja .PNG. Maksimikoko 4MB.</small>
            </div>
            <div class="form-group">
                <label for="newcategory">Tuotekategoria</label>
                <?php 
                    $categoryOptions = array();
                    foreach ($categories as $category): 
                        if ($category['parentID'] !== null) {
                            $parentName = "";
                            foreach ($categories as $parent) {
                                if ($parent['categoryID'] === $category['parentID']) {
                                    $parentName = $parent['name'];
                                }
                            }
                            $categoryOptions += [ $category['categoryID'] => $parentName . ' - ' . $category['name'] ];
                        }
                    endforeach;
                    echo form_dropdown('newcategory', $categoryOptions, $product['category_id'], $attributes);
                 ?>
            </div>
            <div class="form-group">
                <label for="newthemecategory">Teemakategoria</label>
                
                <?php 
                    $themes = [
                        'NULL' => 'Ei teemakategoriaa'
                    ];
                    foreach ($themecategories as $themecategory):
                        $themes += [ $themecategory['id'] => $themecategory['name'] ];
                    endforeach;
                    echo form_dropdown('newthemecategory', $themes, $product['theme_id'], $attributes);

                ?>
            </div>
            <input type="hidden" name="id" value="<?=$product['id']?>">


        <button type="submit" class="btn btn-danger">Muokkaa</button>
        </form>
    </div>
</div>

