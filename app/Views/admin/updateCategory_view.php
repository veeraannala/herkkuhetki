<div class="row">
    <div class="col">
        <h3 class="mt-3 mb-3">Muokkaa tuotekategorioita</h3>
        <div class="col-8">
        <?php
        if (isset($errormessage)){
            if ($errormessage === 'Cannot delete or update a parent row: a foreign key constraint fails (`herkkuhetki`.`product`, CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `productcategory` (`categoryID`))') {
                ?>
                <p class="errormessage">Et voi poistaa tuotekategoriaa, joka sisältää tuotteita.</p>
            <?php
            } else if ($errormessage === 'Cannot delete or update a parent row: a foreign key constraint fails (`herkkuhetki`.`productcategory`, CONSTRAINT `productcategory_ibfk_1` FOREIGN KEY (`parentID`) REFERENCES `productcategory` (`categoryID`))') {
                ?>
                <p class="errormessage">Et voi poistaa kategoriaa, jolla on alikategorioita.</p>
            <?php 
            }
        }
        
        ?>
            <table class="table table-striped table-sm">
                
                <?php foreach ($categories as $category): 
                if ($category['parentID'] === null) {
            ?>
                <tr>
                    <th class="m-3"><?=$category['name']?></th>
                    <td></td>
                    <td><?= anchor('admin/updateCat/' . $category['categoryID'], ' <button>Muokkaa</button>')?></td>
                    <td><?= anchor('admin/deleteCat/' . $category['categoryID'], ' <button>Poista</button>')?></td>
                </tr>




                <?php foreach ($categories as $subcategory):
                            
                    if ($subcategory['parentID'] === $category['categoryID']) {
            ?>
                <tr>
                    <td></td>
                    <td><?=$subcategory['name']?></td>
                    <td><?= anchor('admin/updateCat/' . $subcategory['categoryID'], ' <button>Muokkaa</button>')?></td>
                    <td><?= anchor('admin/deleteCat/' . $subcategory['categoryID'], ' <button>Poista</button>')?></td>
                    <?php
                              } ?>
                </tr>

                <?php endforeach; ?>
                <tr class="mb-5">
                    <td></td>
                    <td><?= anchor('admin/insertCat/' . $category['categoryID'], ' <button>Lisää alikategoria</button>')?></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php } 
            endforeach; ?>
                <tr>
                    <th><?= anchor('admin/insertCat/' . 'X', ' <button>Lisää pääkategoria</button>')?></th>
                </tr>
            </table>
        </div>
    </div>
</div>