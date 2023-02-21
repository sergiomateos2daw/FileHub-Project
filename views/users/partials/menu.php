<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= URL ?>users">Usuarios</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active  <?= in_array($_SESSION['id_rol'],$GLOBALS['crear'])? 'active':'disabled'?>" aria-current="page" href="<?=URL?>users/nuevo">Nuevo</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ordenar
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?=URL?>users/ordenar/id">ID</a></li>
                                <li><a class="dropdown-item" href="<?=URL?>users/ordenar/name">Nombre</a></li>
                                <li><a class="dropdown-item" href="<?=URL?>users/ordenar/email">Email</a></li>
                                <li><a class="dropdown-item" href="<?=URL?>users/ordenar/role_id">Rol</a></li>
                            </ul>
                        </li>

                    </ul>
                    <form class="d-flex" method="GET" action="<?=URL?>users/buscar">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="expresion">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>