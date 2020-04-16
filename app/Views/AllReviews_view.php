<h3>Kaikki tuotteen arvostelut</h3>

<?php foreach($review as $re): ?>
            <form class="form-group" method="post" action="<?= site_url('shop/BackToProduct/' . $re['product_id'])?>">
            <div>
                    <tr>
                    <th><?= date_format (new DateTime($re['reviewDate']), 'd/m/Y');?></th>
                    <th><?=$re['review']?></th>
                    <th><?=$re['stars']?></th>
                    </tr>

                    
            </div>

                <?php endforeach; ?>
                <button class="btn mt-3">Takaisin</button>
                </form>