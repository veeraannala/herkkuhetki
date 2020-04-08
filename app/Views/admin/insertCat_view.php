<div class="row">
    <div class="col">
    <?php
    if ($id === 'X'){?>
        <h3 class="mt-3 mb-3">Lisää yläkategoria</h3>
        <div class="col-5">
            <form method="post" action="<?= site_url('admin/addCat/')?>" class="mb-5">
                <div class="form-row">
                    <div class="col">
                        <label class="m-3" for="name">Nimi: </label>
                    </div>
                    <div class="col">
                        <input id="name" name="name" type="text" class="form-control"></input>
                        <input name="parentid" type="hidden" value="NULL">
                    </div>
                </div>
                <button>Lisää</button>
            </form>
        </div>
        <?php
    } else {
        foreach ($categories as $category): ?>
        
        <?php
            if ($category['categoryID'] === $id) {
                    ?>
            <h3 class="mt-3 mb-3">Lisää alikategoria yläkategoriaan "<?=$category['name']?>"</h3>
        <div class="col-5">
            <form method="post" action="<?= site_url('admin/addCat')?>" class="mb-5">
                <div class="form-row">
                    <div class="col">
                        <label class="m-3" for="name">Nimi: </label>
                    </div>
                    <div class="col">
                        <input id="name" name="name"  type="text" class="form-control" ></input>
                        <input name="parentid" type="hidden" value="<?=$category['categoryID']?>">
                    </div>
                </div>

                <button>Lisää</button>
                <?php
                }
        endforeach;
    }?>

            </form>
        </div>
    </div>
</div>