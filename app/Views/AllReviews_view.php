<h3>Kaikki tuotteen arvostelut</h3>

<?php foreach($review as $re): ?>
            <div>
                    <tr>
                    <th><?= date_format (new DateTime($re['reviewDate']), 'd/m/Y');?></th>
                    <th><?=$re['review']?></th>
                    <th><?=$re['stars']?></th>
                    </tr>

                    
            </div>

                <?php endforeach; ?>