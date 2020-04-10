<?php helper('form'); ?>
<div class="row">
    <div class="col-6 mb-3">
        <h1>Muokkaa tuotetta</h1>

        <form method="post" action="<?= site_url('admin/changeProduct/')?>">
            <div class="form-group">
                <label for="newname">Tuotteen nimi</label>
                <input type="text" class="form-control" name="newname" value="<?= $product['name']?>" required>
            </div>
            <div class="form-group">
                <label for="newprice">Tuotteen hinta €</label>
                <input type="number" class="form-control" name="newprice" step="0.01" value="<?= $product['price']?>" required>
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
                <textarea class="form-control" name="newdescription" rows="3" ><?= $product['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="newimage">Tuotteen kuva</label>
                <input type="file" class="form-control-file" name="newimage">
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

