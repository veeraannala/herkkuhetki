<div class="row">
    <div class="col">
    <?php foreach ($categories as $category): ?>
        

                <?php
                if ($category['categoryID'] === $id) {
            ?>
            <h3 class="mt-3 mb-3">Muokkaa tuotekategoriaa "<?=$category['name']?>"</h3>
        <div class="col-5">
            <form class="mb-5">
                <div class="form-row">
                    <div class="col">
                        <label class="m-3" for="newname">Uusi nimi: </label>
                    </div>
                    <div class="col">
                        <input id="newname" name="newname" value="<?=$category['name']?>" type="text" class="form-control" ></input>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label class="m-3" for="newparentID">Yläkategoria: </label>
                    </div>
                    <div class="col">
                        <select class="form-control" id="newparentID" name="category">
                            <?php foreach ($categories as $parcategory): 
                    if ($parcategory['parentID'] === null) {
                        
                    ?>
                            <option><?=$parcategory['name']?></option>
                            <?php 
                    }
                     endforeach; ?>
                        </select>
                    </div>
                </div>
                <?= anchor('admin/update/' . $category['categoryID'], ' <button>Muokkaa</button>')?>
                <?php } 
            endforeach; ?>

            </form>
        </div>
    </div>
</div>