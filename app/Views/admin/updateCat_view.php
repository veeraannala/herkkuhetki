<div class="row">
    <div class="col">
        <h3 class="mt-3 mb-3">Muokkaa tuotekategoriaa</h3>
        <div class="col-8">
            <form>
                


                <?php foreach ($categories as $category): 
                if ($category['categoryID'] === $id) {
            ?>
                <label class="m-3"><?=$category['name']?></label>
                <input name="newname" value="<?=$category['name']?>">Uusi nimi</input>
                <?php } 
            endforeach; ?>
            </form>
        </div>
    </div>
</div>