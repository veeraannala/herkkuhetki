<div class="row">
    <div class="col">
        <h1>Muokkaa tuotteiden määrää varastossa</h1>

        <table class="table table-striped table-sm">
            <?php foreach ($products as $product):
                            
                    if ($product['id'] === $product['id']) {
            ?>
                <tr>
                    
                    <th><?=$product['name']?></th>
                    
                    <?php
                              } ?>
                </tr>

              
            <?php  endforeach; ?>

        </table>

    </div>
</div>