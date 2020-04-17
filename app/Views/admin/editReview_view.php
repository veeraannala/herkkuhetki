<div class="row">
    <div class="col">
        <h1>Muokkaa tuotteiden arvosteluja</h1>
        <!-- prints reviews to table -->
        <table class="table table-striped table-sm">

        <!-- Fetches product info from controller-->

            <tr>
            <th>Tuotenimi</th>
            <th>Päivämäärä</th>
            <th>Kommentti</th>
            <th>Tähdet</th>
            <th></th>
            </tr>
            <?php foreach ($products as $prod):?>
            <?php foreach ($reviews as $revi): ?>
             <?php   if ($revi['product_id'] === $prod['id']) { ?>

                    <tr>
                        <td><?=$prod['name']?></td>
                        <td><?= date_format (new DateTime($revi['reviewDate']), 'd/m/Y H:i:s');?></td>
                        <td class="m-3"><?=$revi['review'] ?></td>
                        <td><?= $revi['stars']?> <i class="fa fa-star star" aria-hidden="true"></i></td>
                        <td class="m-3"><?= anchor('admin/deleteReview/' . $revi['id'], ' <button>Poista</button>')?></td>
                    </tr>
                    
                <?php } else { 

                        echo "";
                        
                     } ?>
            <?php  endforeach; ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>