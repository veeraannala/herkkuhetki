<div class="row">
    <div class="col">
        <h1>Muokkaa tuotteita</h1>

        <table class="table table-striped table-sm">
            <th>testi1</th>
            <th>testi2</th>
            <th>testi3</th>

            <?php foreach ($reviews as $revi): ?>

                <tr>
                    <td class="m-3"><?=$revi['product_id'] ?></td>
                    <td><?= date_format (new DateTime($revi['reviewDate']), 'd/m/Y');?></td>
                    <td class="m-3"><?=$revi['review'] ?></td>
                    <td class="m-3"><?=$revi['stars'] ?></td>
                    <td class="m-3"><?= anchor('admin/alterReview/' . $revi['id'], ' <button>Muokkaa</button>')?></td>
                    <td class="m-3"><?= anchor('admin/deleteReview/' . $revi['id'], ' <button>Poista</button>')?></td>
                </tr>
                
              
            <?php endforeach; ?>
                
        </table>
    </div>
</div>