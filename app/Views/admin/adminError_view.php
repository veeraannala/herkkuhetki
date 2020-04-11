<div class="row">
    <div class="mt-3 col-9">
        <h2>Tuotekategorian poisto ei onnistunut.</h2>
        <?php
        if ($errormessage === 'Cannot delete or update a parent row: a foreign key constraint fails (`herkkuhetki`.`product`, CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `productcategory` (`categoryID`))') {
            ?>
            <p>Et voi poistaa tuotekategoriaa, joka sisältää tuotteita.</p>
        <?php
        } else if ($errormessage === 'Cannot delete or update a parent row: a foreign key constraint fails (`herkkuhetki`.`productcategory`, CONSTRAINT `productcategory_ibfk_1` FOREIGN KEY (`parentID`) REFERENCES `productcategory` (`categoryID`))') {
            ?>
            <p>Et voi poistaa kategoriaa, jolla on alikategorioita.</p>
        <?php 
        } else {
            print $errormessage;
        }
        
        ?>
        <p><?= anchor('admin/updateCategory','Takaisin')?></p>

    </div>   

</div>