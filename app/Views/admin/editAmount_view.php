<div class="row mt-3">
    <div class="col">
        <h3>Muokkaa tuotteiden määrää varastossa</h3>

        <table class="table table-striped table-sm">
        <!-- Fetches product info from controller-->
            <?php foreach ($products as $product):?>
                            
            
                <tr>
                   <!-- print product name --> 
                    <td><?=$product['name']?></td>
                    <!-- print product amount in stock -->
                    <td><?=$product['stock']?></td>
                    <!-- Button that goes through function updateAmo which changes products amount in stock -->
                    <td><?= anchor('admin/updateAmo/' . $product['id'], ' <button>Muuta</button>')?></td>
                    
                </tr>

              
            <?php  endforeach; ?>

        </table>

    </div>
</div>