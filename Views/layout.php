<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 border-bottom">
    <div class="container">
        <a class="navbar-brand" href="/"><span class="brand">Feliciano</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item <?= $nav == "home" ? "active" : "" ?>">
                    <a class="nav-link p-3" href="/">HOME</a>
                </li>
                <li class="nav-item <?= $nav == "menu" ? "active" : "" ?>">
                    <a class="nav-link p-3" href="/menu">MENU</a>
                </li>
                <li class="nav-item <?= $nav == "aboutus" ? "active" : "" ?>">
                    <a class="nav-link p-3" href="/about-us">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary btn-md mx-3" href="/user/logout">Logout</a>
                </li>
            </ul>
        </div>
  </div>
</nav>
<?= $content ?>