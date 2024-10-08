<x-master-layout title="Master">
    @push('style')
    @endpush

    <div class="row">
        <div class="col-lg-8 col-12">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="card card-background card-background-mask-info h-100 tilt" data-tilt
                        style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
                        <div class="full-background"
                            style="background-image: url('https://demos.creative-tim.com/soft-ui-dashboard-pro/assets/img/curved-images/white-curved.jpeg')">
                        </div>
                        <div class="card-body pt-4 text-center">
                            <h2 class="text-white mb-0 mt-2 up">Earnings</h2>
                            <h1 class="text-white mb-0 up">$15,800</h1>
                            <span class="badge badge-lg d-block bg-gradient-dark mb-2 up">+15% since last
                                week</span>
                            <a href="javascript:;" class="btn btn-outline-white mb-2 px-5 up">View more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="d-flex">
                                <div>
                                    <div class="icon icon-shape bg-gradient-dark text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            $53,000
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body p-3">
                            <div class="d-flex">
                                <div>
                                    <div class="icon icon-shape bg-gradient-dark text-center border-radius-md">
                                        <i class="ni ni-planet text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Sessions</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            9,600
                                            <span class="text-success text-sm font-weight-bolder">+15%</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="d-flex">
                                <div>
                                    <div class="icon icon-shape bg-gradient-dark text-center border-radius-md">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Users
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            2,300
                                            <span class="text-success text-sm font-weight-bolder">+3%</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body p-3">
                            <div class="d-flex">
                                <div>
                                    <div class="icon icon-shape bg-gradient-dark text-center border-radius-md">
                                        <i class="ni ni-shop text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Sign-ups</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            348
                                            <span class="text-success text-sm font-weight-bolder">+12%</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mt-4 mt-lg-0">
            <div class="card">
                <div class="card-header p-3 pb-0">
                    <div class="row">
                        <div class="col-8 d-flex">
                            <div>
                                <img src="{{ asset('assets/img/team-3.jpg') }}" class="avatar avatar-sm me-2"
                                    alt="avatar image">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">Lucas Prila</h6>
                                <p class="text-xs">2h ago</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <span class="badge bg-gradient-info ms-auto float-end">Recommendation</span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 pt-1">
                    <h6>I need a Ruby developer for my new website.</h6>
                    <p class="text-sm">The website was initially built in PHP, I need a professional ruby
                        programmer to shift it.</p>
                    <div class="d-flex bg-gray-100 border-radius-lg p-3">
                        <h4 class="my-auto">
                            <span class="text-secondary text-sm me-1">$</span>3,000<span
                                class="text-secondary text-sm ms-1">/ month </span>
                        </h4>
                        <a href="javascript:;" class="btn btn-outline-dark mb-0 ms-auto">Apply</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-8 col-12">
            <div class="card">
                <div class="card-header p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">To do list</h6>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <small>23 - 30 March 2020</small>
                        </div>
                    </div>
                    <hr class="horizontal dark mb-0">
                </div>
                <div class="card-body p-3 pt-0">
                    <ul class="list-group list-group-flush" data-toggle="checklist">
                        <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                            <div class="checklist-item checklist-item-primary ps-2 ms-3">
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value id="flexCheckDefault">
                                    </div>
                                    <h6 class="mb-0 text-dark font-weight-bold text-sm">Check status</h6>
                                    <div class="dropstart float-lg-end ms-auto pe-0">
                                        <a href="javascript:;" class="cursor-pointer" id="dropdownTable2"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-secondary" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                            aria-labelledby="dropdownTable2" style>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                    action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Something
                                                    else
                                                    here</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center ms-4 mt-3 ps-1">
                                    <div>
                                        <p class="text-xs mb-0 text-secondary font-weight-bold">Date</p>
                                        <span class="text-xs font-weight-bolder">24 March 2019</span>
                                    </div>
                                    <div class="ms-auto">
                                        <p class="text-xs mb-0 text-secondary font-weight-bold">Project</p>
                                        <span class="text-xs font-weight-bolder">2414_VR4sf3#</span>
                                    </div>
                                    <div class="mx-auto">
                                        <p class="text-xs mb-0 text-secondary font-weight-bold">Company</p>
                                        <span class="text-xs font-weight-bolder">Creative Tim</span>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark mt-4 mb-0">
                        </li>
                        <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                            <div class="checklist-item checklist-item-dark ps-2 ms-3">
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value id="flexCheckDefault1"
                                            checked>
                                    </div>
                                    <h6 class="mb-0 text-dark font-weight-bold text-sm">Management discussion
                                    </h6>
                                    <div class="dropstart float-lg-end ms-auto pe-0">
                                        <a href="javascript:;" class="cursor-pointer" id="dropdownTable3"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-secondary" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                            aria-labelledby="dropdownTable3" style>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                    action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Something
                                                    else
                                                    here</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center ms-4 mt-3 ps-1">
                                    <div>
                                        <p class="text-xs mb-0 text-secondary font-weight-bold">Date</p>
                                        <span class="text-xs font-weight-bolder">24 March 2019</span>
                                    </div>
                                    <div class="ms-auto">
                                        <p class="text-xs mb-0 text-secondary font-weight-bold">Project</p>
                                        <span class="text-xs font-weight-bolder">4411_8sIsdd23</span>
                                    </div>
                                    <div class="mx-auto">
                                        <p class="text-xs mb-0 text-secondary font-weight-bold">Company</p>
                                        <span class="text-xs font-weight-bolder">Apple</span>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark mt-4 mb-0">
                        </li>
                        <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                            <div class="checklist-item checklist-item-warning ps-2 ms-3">
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value id="flexCheckDefault2"
                                            checked>
                                    </div>
                                    <h6 class="mb-0 text-dark font-weight-bold text-sm">New channel distribution
                                    </h6>
                                    <div class="dropstart float-lg-end ms-auto pe-0">
                                        <a href="javascript:;" class="cursor-pointer" id="dropdownTable"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-secondary" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                            aria-labelledby="dropdownTable" style>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                    action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Something
                                                    else
                                                    here</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center ms-4 mt-3 ps-1">
                                    <div>
                                        <p class="text-xs mb-0 text-secondary font-weight-bold">Date</p>
                                        <span class="text-xs font-weight-bolder">25 March 2019</span>
                                    </div>
                                    <div class="ms-auto">
                                        <p class="text-xs mb-0 text-secondary font-weight-bold">Project</p>
                                        <span class="text-xs font-weight-bolder">827d_kdl33D1s</span>
                                    </div>
                                    <div class="mx-auto">
                                        <p class="text-xs mb-0 text-secondary font-weight-bold">Company</p>
                                        <span class="text-xs font-weight-bolder">Slack</span>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark mt-4 mb-0">
                        </li>
                        <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                            <div class="checklist-item checklist-item-success ps-2 ms-3">
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value id="flexCheckDefault3">
                                    </div>
                                    <h6 class="mb-0 text-dark font-weight-bold text-sm">IOS App development</h6>
                                    <div class="dropstart float-lg-end ms-auto pe-0">
                                        <a href="javascript:;" class="cursor-pointer" id="dropdownTable1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-secondary" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                            aria-labelledby="dropdownTable1" style>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                    action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Something
                                                    else
                                                    here</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center ms-4 mt-3 ps-1">
                                    <div>
                                        <p class="text-xs mb-0 text-secondary font-weight-bold">Date</p>
                                        <span class="text-xs font-weight-bolder">26 March 2019</span>
                                    </div>
                                    <div class="ms-auto">
                                        <p class="text-xs mb-0 text-secondary font-weight-bold">Project</p>
                                        <span class="text-xs font-weight-bolder">88s1_349DA2sa</span>
                                    </div>
                                    <div class="mx-auto">
                                        <p class="text-xs mb-0 text-secondary font-weight-bold">Company</p>
                                        <span class="text-xs font-weight-bolder">Facebook</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mt-4 mt-lg-0">
            <div class="card overflow-hidden">
                <div class="card-header p-3 pb-0">
                    <div class="d-flex align-items-center">
                        <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                            <i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                        <div class="ms-3">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Tasks</p>
                            <h5 class="font-weight-bolder mb-0">
                                480
                            </h5>
                        </div>
                        <div class="progress-wrapper ms-auto w-25">
                            <div class="progress-info">
                                <div class="progress-percentage">
                                    <span class="text-xs font-weight-bold">60%</span>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-3 p-0">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="100"></canvas>
                    </div>
                </div>
            </div>
            <div class="card overflow-hidden mt-4">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="d-flex">
                                <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                    <i class="ni ni-delivery-fast text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Projects</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        115
                                    </h5>
                                </div>
                            </div>
                            <span class="badge badge-dot d-block text-start pb-0 mt-3">
                                <i class="bg-gradient-info"></i>
                                <span class="text-muted text-xs font-weight-bold">Done</span>
                            </span>
                            <span class="badge badge-dot d-block text-start">
                                <i class="bg-gradient-secondary"></i>
                                <span class="text-muted text-xs font-weight-bold">In progress</span>
                            </span>
                        </div>
                        <div class="col-lg-7 my-auto">
                            <div class="chart ms-auto">
                                <canvas id="chart-bar" class="chart-canvas" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('Script')
    @endpush
</x-master-layout>