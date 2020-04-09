<div class="row">
    <div class="col">
        <h1>Muokkaa tuotteita</h1>

        <table class="table table-striped table-sm">

        <tr>
            <th>Id</th>
            <th>Nimi</th>
            <th>Hinta €</th>
            <th>Kuva</th>
            <th>Hinnoittelu</th>
            <th>Kategoria</th>
            <th>Teemakategoria</th>
            </tr>
        <?php foreach ($products as $product): 
            ?>
                <tr>
                    <th class="m-3"><?=$product['id'] ?></th>
                    <th class="m-3"><?=$product['productName'] ?></th>
                    <th class="m-3"><?=$product['price'] ?></th>
                    <th class="m-3"><?=$product['image'] ?></th>
                    <th class="m-3"><?=$product['type'] ?></th>
                    <th class="m-3"><?=$product['category'] ?></th>
                    <th class="m-3"><?=$product['theme'] ?></th>
                </tr>
                
              
                <?php endforeach; ?>

        </table>

    </div>
</div>