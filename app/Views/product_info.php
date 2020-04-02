<div class="row">

    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-sm-12 col-lg-6 p-3">
                <img class="img-fluid" src="images/lolly.jpg">
            </div>
            <div class="col-sm-12 col-lg-6 p-3">
                <h2 class="pb-4">Tikkukaramellit</h2>
                <p>Tikkareita kansalle!</p>
                <p>Varastossa</p>
                <form method="post" action="<?= site_url('cart/insert')?>">
                    <label for="amount">Määrä:</label>
                    <input type="hidden" name="product" value="200">
                    <input class="mb-3" id="amount" name="amount" type="number" step="1" value="1" min="1">
                    <h5>Hinta 1678,56 €</h5>
                    <button class="btn">Lisää ostoskoriin</button>
                </form>
            </div>
        </div>


        <div class="row">
            <div class="col-12 col-lg-9 p-3">
                <p>Tässä on mahtava määrä tikkareita. Paljon ja herkullisia.</p>
                <p>Tikkarit sisältävät runsaan määrän sokeria ja kaikkea muuta epäterveellistä. Oikeasti ne ovat myös
                    aika
                    pahoja
                    ja niillä saa hampaansa rikki, jos niitä puraisee heikolla hampaalla. Lapset kuitenkin yleensä
                    tykkäävät
                    niistä.
                    Jotkut kokevat tikkukaramellien syömisen seksuaalisesti kiihottavana.</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="row">
            <div class="col-12 p-3">
                <p>Tänne voi tulla jotain lisätietoja toimituksesta, toimitusajoista ynnä muusta yleisestä
                    toiminnasta.
                </p>
                <p>Vaikka postikulut tai jotain muuta höpinää.</p>
            </div>
        </div>
    </div>
</div>