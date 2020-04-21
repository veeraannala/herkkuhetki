<h3 class="mt-4">Kaikki tuotteen arvostelut</h3>

        <div class="row"> 
              <div class="col-12 col-lg-9">
                <!-- Prints 3 reviews -->
                
                <table class="table table-striped mt-3">
                        <th>Päivämäärä</th>
                        <th>Kommentti</th>
                        <th>Tähdet</th>
                <?php foreach ($review as $re): ?>
                <form class="form-group" method="post" action="<?= site_url('shop/showReview/' . $re['product_id'])?>">
                 
                <tr>
                    <td><?= date_format (new DateTime($re['reviewDate']), 'd/m/Y');?></td>
                    <td><?=$re['review']?></td>
                    <td><?php if ($re['stars'] > 0) {
                        echo $re['stars']; ?>
                        <i class="fa fa-star star" aria-hidden="true"></i>
                 <?php } else {
                        echo "0"; ?>
                        <i class="fa fa-star star" aria-hidden="true"></i>
                   <?php }
                    ?></td>
                    </tr>

                <?php endforeach; ?>
                </table>