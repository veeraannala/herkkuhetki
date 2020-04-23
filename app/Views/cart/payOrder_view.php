<div class="centerminheight pt-3 pb-5">
    <div class="col-md-6">
        <h3>Valitsemasi maksupalvelu: </h3>

        <p><?php if ($payment === 'credit') {
                    print 'luottokortti';
                } else if ($payment === 'klarna') {
                    print 'Klarna';
                } else if ($payment === 'bank') {
                    print 'verkkopankki';
                } else if ($payment === 'mobilepay') {
                    print 'Mobilepay';
                } 
            ?></p>
    </div>

    <div class="col-md-6">
        <h3>Tilauksen loppusumma: </h3>

        <p><?php
                if ($delivery === 'P') {
                    $sum += 5.9;
                } 
                print ($sum . ' €'); 
            ?></p>
    </div>

    <div class="col-md-6">
        <h3>Maksa tästä:</h3>
        <form class="row" method="post" action="<?= site_url('cart/payconfirm/' . $orderid)?>">
            <button class="btn">Klik</button>
        </form>
    </div>

    <div class="col-6">

    </div>

</div>