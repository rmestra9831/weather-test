<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <nav
                class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid px-0">
                    <a class="navbar-brand font-weight-bolder ms-sm-3  d-none d-md-block"
                        href=" https://demos.creative-tim.com/material-kit-pro/index " rel="tooltip"
                        title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                        Browser Weather test
                    </a>
                    {{-- Vista Movil --}}
                    <a class="navbar-brand font-weight-bolder ms-sm-3  d-block d-md-none"
                        href=" https://demos.creative-tim.com/material-kit-pro/index " rel="tooltip"
                        title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                        Browser Weather test
                    </a>
                    {{-- icono animado del menú hamburguesa movil --}}
                    <button class="navbar-toggler shadow-none ms-md-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    {{-- Items de Vista Desktop --}}
                    <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
                        <ul class="navbar-nav navbar-nav-hover ms-auto">
                            <li class="nav-item mx-2">
                                <a role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center"
                                    id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-icons opacity-6 me-2 text-md">dashboard</i>
                                    Historial
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>