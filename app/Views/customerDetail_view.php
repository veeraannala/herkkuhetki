<div class="centerminheight customer">
    <div class="row col">
        <h1>Hei <?=$userdata['firstname']?></h1>
        
    </div> 
    <div class="row">
        <div class="col-md-6">
            <hr>
            <div class="card customercard mb-3 col-12">
                <div class="card-body text-dark ">
                    <h5 class="card-title">Yhteystietosi</h5>
                    <p>Nimi: <?=$userdata['firstname']. ' '. $userdata['lastname']?></p>
                    <p>Sähköposti: <?=$userdata['email']?></p>
                    <p>Osoite: <?=$userdata['address']?></p>
                    <p>Postinumero: <?=$userdata['postcode']?></p> 
                    <p>Postitoimipaikka: <?=$userdata['town']?></p>
                    <p>Puhelinnumero: <?=$userdata['phone']?></p>
                    <button class="btn mb-2">Muuta yhteystietoja</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <hr>
            <div class="card customercard mb-3 col-12">
                <div class="card-body text-dark ">
                    <h5 class="card-title">Edelliset tilauksesi</h5>
                   
                    <button class="btn mb-2">Katsele tilauksia</button>
                </div>
            </div>
        </div>
        
        
        </div>

        
    </div>
</div>