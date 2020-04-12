<div class="row">
    <div class="col">
        <h1>Muokkaa tuotteiden määrää varastossa</h1>

        <table class="table table-striped table-sm">
        <!-- Fetches product info from controller-->
            <?php foreach ($products as $product):?>
                            
            
                <tr>
                   <!-- print product name --> 
                    <th><?=$product['name']?></th>
                    <!-- print product amount in stock -->
                    <th><?=$product['stock']?></th>
                    <!-- Button that goes through function updateAmo which changes products amount in stock -->
                    <td><?= anchor('admin/updateAmo/' . $product['id'], ' <button>Muuta</button>')?></td>
                    
                </tr>

              
            <?php  endforeach; ?>

        </table>

    </div>
</div>