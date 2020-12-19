<img class="menu-background" src="/images/menu-3206749_1920.jpg" alt="background"></img>
<div class="container my-5">
    <a href="/menu" class="d-block chevron-circle-left m-2"></a>
    <div class="row">
        <?php foreach($dishes as $dish) { 
            echo
        '<div class="col-md-4 col-lg-3 p-3">
            <div class="card h-100">
                <img class="card-img-top dish-image" src="/images/dishes/'.$dish['img'].'" alt="Card image cap">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">'.$dish['name'].'</h5>
                    <small class="card-text text-justify my-2">'.$dish['txt'].'</small>
                    <p class="card-text mt-auto"><small class="text-muted">'.$dish['price'].'€</small></p>
                </div>
            </div>
        </div>';
        }?>
    </div>
</div>
