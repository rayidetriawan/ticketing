@extends('layouts.master')
@section('title', 'Report Teknisi')
@section('nav_active_report_teknisi', 'active')
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card crm-widget">
                <div class="card-body p-0">
                    <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-0">

                        <div class="col">
                            <div class="py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Total Ticket </h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-ticket-2-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                data-target="{{ $total }}">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <!-- end col -->
                        <!-- end col -->
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Waiting Approval Internal</h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-coupon-2-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                data-target="{{ $wainternal }}">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Waiting Approval Technition</h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-coupon-2-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                data-target="{{ $wateknisi }}">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Ticket Success</h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-check-double-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                data-target="{{ $sukses }}">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Ticket Reject</h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-close-circle-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                data-target="{{ $tolak }}">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="row">
            <div class="col-lg-12">
                <div>

                    <div id="teamlist">
                        <div class="team-list grid-view-filter row" id="team-member-list">
                            @foreach ($data as $no => $result)
                            <div class="col">
                                <div class="card team-box">
                                    <div class="team-cover "> <img src="{{ asset('assets/images/small/img-6.jpg') }}" alt=""
                                            class="img-fluid"> </div>
                                    <div class="card-body p-4">
                                        <div class="row align-items-center team-row">
                                            <div class="col team-settings">
                                                <div class="row">
                                                    <div class="col text-end dropdown"> <a href="javascript:void(0);"
                                                            data-bs-toggle="dropdown" aria-expanded="false"> <i
                                                                class="ri-more-fill fs-17"></i> </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="team-profile-img mb-0">
                                                    <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                        <div
                                                            class="avatar-title border bg-light text-primary rounded-circle text-uppercase">
                                                            <?php
                                                            $s = $result->nama;
                                                            
                                                            if (preg_match_all('/\b(\w)/', strtoupper($s), $m)) {
                                                                $v = implode('', $m[1]);
                                                            }
                                                            
                                                            echo $v;
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="team-content"> <a class="member-name"
                                                            data-bs-toggle="offcanvas" href="#member-overview"
                                                            aria-controls="member-overview">
                                                            <h5>{{ $result->nama }}</h5>
                                                        </a></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="row text-muted text-center">
                                                    <div class="col-12">
                                                        {{-- <p class="mb-1 mt-0 projects-num">Rating</p> --}}
                                                        <h5 class="text-muted mb-0">
                                                            <span>
                                                                <span class="badge badge-soft-info text-body fs-5 fw-medium">
                                                                    <i class="mdi mdi-star text-warning me-1"></i>
                                                                    {{ round($result->rating, 1) }}
                                                                </span>
                                                            </span>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col">
                                                <div class="text-end"> <a href="{{ route('report.teknisi.detail', $result->nik) }}"
                                                        class="btn btn-light view-btn">View Detail</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div><!-- end row -->
    {{-- <div class="row">
    <div class="col-xxl-3 col-md-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Tickets Solved</h4>
                
            </div>
            <div class="card-body pb-0">
                <div id="sales-forecast-chart" data-colors='["--vz-primary", "--vz-success", "--vz-warning"]' class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>

    <div class="col-xxl-3 col-md-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Tickets On Process</h4>
                
            </div>
            <div class="card-body pb-0">
                <div id="deal-type-charts" data-colors='["--vz-warning", "--vz-danger", "--vz-success"]' class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Feedback users</h4>
                
            </div>
            <div class="card-body px-0">
                
                <div id="revenue-expenses-charts" data-colors='["--vz-success", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('before-scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/pages/team.init.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-crm.init.js') }}"></script>
@endpush
