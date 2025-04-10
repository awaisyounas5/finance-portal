@extends('layouts.master')

@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid dashboard-3">
        <div class="row">
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header card-no-border pb-0">
                        <div class="header-top daily-revenue-card">
                            <h4>Primary Equity</h4>
                        </div>
                    </div>
                    <div class="card-body pb-0 total-sells">
                        <div class="d-flex align-items-center gap-3">
                            <div class="flex-shrink-0"><img src="{{ asset('assets/images/dashboard-3/icon/coin1.png') }}" alt="icon"></div>
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center gap-2">
                                    <h2>12,463</h2>
                                    <div class="d-flex total-icon">
                                        <p class="mb-0 up-arrow bg-light-success"><i class="fa fa-arrow-up text-success"></i></p><span class="f-w-500 font-success">+ 20.08% </span>
                                    </div>
                                </div>
                                <p class="text-truncate">Jan 2024</p>
                            </div>
                        </div>
                        <div id="admissionRatio"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header card-no-border pb-0">
                        <div class="header-top daily-revenue-card">
                            <h4>Balanced Equity</h4>
                        </div>
                    </div>
                    <div class="card-body pb-0 total-sells-2">
                        <div class="d-flex align-items-center gap-3">
                            <div class="flex-shrink-0"><img src="{{ asset('assets/images/dashboard-3/icon/shopping1.png') }}" alt="icon"></div>
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center gap-2">
                                    <h2>78,596</h2>
                                    <div class="d-flex total-icon">
                                        <p class="mb-0 up-arrow bg-light-danger"><i class="fa fa-arrow-up text-danger"></i></p><span class="f-w-500 font-danger">- 10.02%</span>
                                    </div>
                                </div>
                                <p class="text-truncate">Aug 2024</p>
                            </div>
                        </div>
                        <div id="order-value"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header card-no-border pb-0">
                        <div class="header-top daily-revenue-card">
                            <h4>Balanced Fixed</h4>
                        </div>
                    </div>
                    <div class="card-body pb-0 total-sells-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="flex-shrink-0"><img src="{{ asset('assets/images/dashboard-3/icon/sent1.png') }}" alt="icon"></div>
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center gap-2">
                                    <h2>95,789</h2>
                                    <div class="d-flex total-icon">
                                        <p class="mb-0 up-arrow bg-light-success"><i class="fa fa-arrow-up text-success"></i></p><span class="f-w-500 font-success">+ 13.23%</span>
                                    </div>
                                </div>
                                <p class="text-truncate">May 2024</p>
                            </div>
                        </div>
                        <div id="daily-value"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header card-no-border pb-0">
                        <div class="header-top daily-revenue-card">
                            <h4>Primarily Fixed</h4>
                        </div>
                    </div>
                    <div class="card-body pb-0 total-sells-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="flex-shrink-0"><img src="{{ asset('assets/images/dashboard-3/icon/revenue1.png') }}" alt="icon"></div>
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center gap-2">
                                    <h2>41,954</h2>
                                    <div class="d-flex total-icon">
                                        <p class="mb-0 up-arrow bg-light-danger"><i class="fa fa-arrow-up text-danger"></i></p><span class="f-w-500 font-danger">- 17.06%</span>
                                    </div>
                                </div>
                                <p class="text-truncate">July 2024</p>
                            </div>
                        </div>
                        <div id="daily-revenue"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header card-no-border pb-0">
                        <div class="header-top">
                            <h4>Equity Overview</h4>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div id="salse-overview"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection