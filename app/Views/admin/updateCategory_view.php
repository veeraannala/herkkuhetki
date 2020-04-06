<div class="row">
    <div class="col">
        <h3>Muokkaa tuotekategorioita</h3>

        <ul class="">

            <?php foreach ($categories as $category): 
                if ($category['parentID'] === null) {
            ?>

            <li class=""><?=$category['name']?>
                <ul>
                <div class="">
                    <?php foreach ($categories as $subcategory):
                            
                              if ($subcategory['parentID'] === $category['categoryID']) {
                                  ?>
                    <li><?=$subcategory['name']?></li>
                    <?php
                              } ?>

                    <?php endforeach; ?>
                </div>
                </ul>
            </li>
            <?php } 
                        endforeach; ?>

        </ul>
    </div>
</div>