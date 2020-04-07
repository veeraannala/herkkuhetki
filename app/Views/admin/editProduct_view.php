<div class="row">
    <div class="col">
        <h1>Muokkaa tuotteita</h1>

        <table class="table table-striped table-sm">
        <?php foreach ($categories as $category): 
                if ($category['parentID'] === null) {
            ?>
                <tr>
                    <th class="m-3"><?=$category['categoryID'] . " - " .$category['name']?></th>
                </tr>

                <?php foreach ($categories as $subcategory):
                            
                    if ($subcategory['parentID'] === $category['categoryID']) {
            ?>
                <tr>
                    
                    <th><?=$subcategory['name']?></th>
                    
                    <?php
                              } ?>
                </tr>

              
                <?php  endforeach; ?>
              
                <?php } 
            endforeach; ?>

        </table>

    </div>
</div>