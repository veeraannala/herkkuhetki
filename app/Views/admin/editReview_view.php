<div class="row">
    <div class="col">
        <h1>Muokkaa tuotteita</h1>
        <!-- prints reviews to table -->
        <table class="table table-striped table-sm">
            <th>Tuote id</th>
            <th>Arvostelun id</th>
            <th>Päivämäärä</th>
            <th>Kommentti</th>
            <th>Tähdet</th>
            <th></th>
            <th></th>

            <?php foreach ($reviews as $revi): ?>

                <tr>
                    <td class="m-3"><?=$revi['product_id'] ?></td>
                    <td class="m-3"><?=$revi['id'] ?></td>
                    <td><?= date_format (new DateTime($revi['reviewDate']), 'd/m/Y H:i:s');?></td>
                    <td class="m-3"><?=$revi['review'] ?></td>
                    <td><?= $revi['stars']?> <i class="fa fa-star star" aria-hidden="true"></i></td>
                    <td class="m-3"><?= anchor('admin/deleteReview/' . $revi['id'], ' <button>Poista</button>')?></td>
                </tr>
                
              
            <?php endforeach; ?>
                
        </table>
    </div>
</div>