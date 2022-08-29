<style>
     .navbar-nav .nav-link.active{
        background-color: blue;
        border-radius: 10px;
        color: white;
        font-weight: 600;
    }

</style>
<div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName=='home' ? 'active' : '' ?>"  href="20220824-09-combine.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName=='list' ? 'active' : '' ?>" href="data-list.php">資料列表</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName=='insert' ? 'active' : '' ?>" href="data-insert.php">新增資料</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>