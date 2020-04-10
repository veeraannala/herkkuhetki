<div class="row">
    <div class="col">
        <h1>Muokkaa tuotteita</h1>

        <?php foreach ($categories as $category):
        ?>
            <h2><?=$category['name'] ?></h2>

        <table class="table table-striped table-sm">

        <tr>
            <th>Kategoria</th>
            <th>Nimi</th>
            <th>Hinta €</th>
            <th>Kuva</th>
            <th>Hinnoittelu</th> 
            <th>Teemakategoria</th>
            </tr>
            
        <?php foreach ($products as $product): 
            
            if ($product['parentID'] == $category['categoryID']) {    
            ?>
                <tr>
                <td class="m-3"><?=$product['category'] ?></td>
                    <td class="m-3"><?=$product['productName'] ?></td>
                    <td class="m-3"><?=$product['price'] ?></td>
                    <td class="m-3"><?=$product['image'] ?></td>
                    <td class="m-3"><?=$product['type'] ?></td>
                    <td class="m-3"><?=$product['theme'] ?></td>
                </tr>
                
              
                <?php } endforeach ?>
                
        </table>
    <?php endforeach ?>
    </div>
</div>