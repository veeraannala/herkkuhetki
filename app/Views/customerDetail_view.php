<div class="centerminheight customer">
    <div class="row col">
        <h1>Hei <?=$userdata[1]?></h1>
        
    </div> 
    <div class="row">
        <div class="col-md-6">
            <hr>
            <div class="card customercard mb-3 col-12">
                <div class="card-body text-dark ">
                    <h5 class="card-title">Yhteystietosi</h5>
                    <p>Nimi: <?=$userdata[1]. ' '. $userdata[2]?></p>
                    <p>Sähköposti: <?=$userdata[6]?></p>
                    <p>Osoite: <?=$userdata[3]?></p>
                    <p>Postinumero: <?=$userdata[4]?></p> 
                    <p>Postitoimipaikka: <?=$userdata[5]?></p>
                    <p>Puhelinnumero: <?=$userdata[7]?></p>
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