<img class="menu-background" src="/images/menu-3206749_1920.jpg" alt="background"></img>
<div class="container my-5">
    <div class="row">
        <?php foreach($categories as $cat) { 
            echo
        '<div class="col-md-4 col-lg-3 p-3">
            <a class="menu-link" href="/menu/dishes/'.$cat['catcode'].'">
                <div class="card h-100 menu-selection">
                    <img class="card-img-top menu-image" src="/images/categories/'.$cat['img'].'" alt="Card image cap">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="card-title">'.$cat['name'].'</h5>
                        <small class="card-text text-justify my-2">'.$cat['txt'].'</small>
                        <p class="card-text mt-auto"><small class="text-muted">'.$cat['ndishes'].' dishes</small></p>
                    </div>
                </div>
            </a>
        </div>';
        }?>
    </div>
</div>
