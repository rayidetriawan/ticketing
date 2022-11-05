@extends('layouts.master')
@section('title', 'Detail Ticket')
{{-- @section('nav_active_my_ticket', 'active') --}}
@section('content')
    @if ($cekreview != null)
    <div id="loginModals" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('add.rating') }}" method="POST">
                @csrf
                <input type="hidden" id="idTIket" name="idTIket" value="{{ $cekreview->idTiket }}">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-body login-modal p-5 pb-4">
                        <h5 class="text-white fs-20">Berikan ratingmu</h5>
                        <p class="text-white-50 mb-0">
                            Untuk penilaian kinerja tim IT internal, Berikanlah Rating Sesuai Kinerja Teknisi.
                        </p>
                        <h5 class="text-white fs-15 mt-4 mb-0">Review</h5>
                        <p class="text-white-50 mb-0 fs-15"> Ticket #{{ $cekreview->idTiket }} -
                            {{ $cekreview->subjek_masalah }}</p>
                            <p class="text-white-50 mb-0 fs-15"> Waktu Pengerjaan : @tanggal($cekreview->tgl_proses) -
                                @tanggal($cekreview->tgl_solved)</p>
                        <div class="mb-0">
                            <div class="form-group">
                                <div class="col">
                                    <div class="rate">
                                        <input type="radio" id="star5" class="rate" name="rating" value="5" />
                                        <label for="star5" title="5">5 stars</label>
                                        <input type="radio" id="star4" class="rate" name="rating" value="4" />
                                        <label for="star4" title="4">4 stars</label>
                                        <input type="radio" id="star3" class="rate" name="rating" value="3" />
                                        <label for="star3" title="3">3 stars</label>
                                        <input type="radio" id="star2" class="rate" name="rating" value="2">
                                        <label for="star2" title="2">2 stars</label>
                                        <input type="radio" id="star1" class="rate" name="rating" value="1" />
                                        <label for="star1" title="1">1 star</label>
                                        <input type="radio" checked id="star0" class="rate" name="rating" value="0" hidden/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body p-4">
                        
                            <button type="submit" id="btnSubmit" class="btn btn-primary w-100">Submit</button>
                            <div id="loading" style="display:none;">
                                <button type="button" class="btn btn-primary btn-load w-100" disabled>
                                    <span class="d-flex align-items-center">
                                        <span class="spinner-border flex-shrink-0" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </span>
                                        <span class="flex-grow-1 ms-2">
                                            Loading...
                                        </span>
                                    </span>
                                </button>
                            </div>
                        
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-n4 mx-n4 mb-n5">
                <div class="bg-soft-success">
                    <div class="card-body pb-4 mb-5">
                        <div class="row">
                            <div class="col-md mt-5 mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-auto">

                                    </div>
                                    <!--end col-->
                                    <div class="col-md">
                                        <h4 class="fw-semibold" id="ticket-title">#{{ $data->idTiket }} -
                                            {{ $data->subjek_masalah }}</h4>
                                        <div class="hstack gap-3 flex-wrap">
                                            <div class="text-muted"><i class="ri-building-line align-bottom me-1"></i><span
                                                    id="ticket-client">{{ $user->cabang->branch_name }}</span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Create Date : <span class="fw-medium "
                                                    id="create-date">@tanggal($data->created_at)</span></div>
                                            <div class="vr"></div>
                                            <div class="badge rounded-pill bg-info fs-12" id="ticket-priority">
                                                {{ $data->kondisi->nama_kondisi }}</div>
                                            <div class="vr"></div>
                                            @if ($data->status == 1)
                                                <div class="badge rounded-pill bg-warning fs-12" id="ticket-priority">
                                                    Menunggu Aproval Internal</div>
                                            @elseif($data->status == 2)
                                                <div class="badge rounded-pill bg-warning fs-12" id="ticket-priority">
                                                    Aproval Internal</div>
                                            @elseif($data->status == 3)
                                                <div class="badge rounded-pill bg-warning fs-12" id="ticket-priority">
                                                    Menunggu Aproval Teknisi</div>
                                            @elseif($data->status == 4)
                                                <div class="badge rounded-pill bg-info fs-12" id="ticket-priority">Sedang
                                                    Dalam Pengerjaan</div>
                                            @elseif($data->status == 5)
                                                <div class="badge rounded-pill bg-danger fs-12" id="ticket-priority">
                                                    Ditolak</div>
                                            @elseif($data->status == 0)
                                                <div class="badge rounded-pill bg-success fs-12" id="ticket-priority">
                                                    Solved</div>
                                            @endif
                                            @if($data->ratting['rating'] != null)
                                            <div class="vr"></div>
                                            <span>
                                                <span class="badge bg-light text-body fs-12 fw-medium">
                                                    <i class="mdi mdi-star text-warning me-1"></i> {{ $data->ratting['rating'] }}
                                                </span>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div><!-- end card body -->
                </div>
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ticket Details</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless align-middle mb-0">
                            <tbody>
                                <tr>
                                    <td class="fw-medium">Ticket</td>
                                    <td>{{ $data->idTiket }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Reported</td>
                                    <td id="t-client">{{ $data->karyawan->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Teknisi</td>
                                    <td>
                                        @if ($data->id_teknisi != null)
                                            {{ $data->teknisi->nama }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Kategori</td>
                                    <td> {{ $data->kategori->nama_kategori }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Status</td>
                                    <td>
                                        @if ($data->status == 1)
                                            <span class="badge bg-warning"> Menunggu Aproval Internal</span>
                                        @elseif($data->status == 2)
                                            <span class="badge bg-warning"> Aproval Internal</span>
                                        @elseif($data->status == 3)
                                            <span class="badge bg-info"> Menunggu Aproval Teknisi</span>
                                        @elseif($data->status == 4)
                                            <span class="badge bg-primary"> Sedang Dalam Pengerjaan</span>
                                        @elseif($data->status == 5)
                                            <span class="badge bg-danger"> Ditolak</span>
                                        @elseif($data->status == 0)
                                            <span class="badge bg-success"> Solved</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Progress</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar @if ($data->status != 5) bg-success @else bg-danger @endif"
                                                role="progressbar" style="width: {{ $data->progress }}%"
                                                aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                {{ $data->progress }}%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Kondisi</td>
                                    <td>
                                        <span class="badge bg-info"
                                            id="t-priority">{{ $data->kondisi->nama_kondisi }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Tanggal Proses</td>
                                    <td id="c-date">
                                        @if(!empty($data->tgl_proses)) @tanggal($data->tgl_proses)
                                        @else -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Tanggal Selesai</td>
                                    <td>
                                        @if(!empty($data->tgl_solved)) @tanggal($data->tgl_solved)
                                        @else -
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title fw-semibold mb-0">Files Attachment</h6>
                </div>
                <div class="card-body">
                    @if ($data->foto)
                        @foreach (json_decode($data->dokumenfoto->file) as $foto)
                            <div class="d-flex align-items-center border border-dashed p-2 mt-2 rounded">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light rounded">
                                        <i class="ri-image-line fs-20 text-primary"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1"><a href="javascript:void(0);">{{ $foto }}</a></h6>
                                </div>
                                <div class="hstack gap-3 fs-16">
                                    <a href="{{ asset('file_ticket/' . $foto) }}" target="_blank" class="text-muted"><i
                                            class="ri-download-2-line"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if ($data->file)
                        @foreach (json_decode($data->dokumenfile->file) as $file)
                            <div class="d-flex align-items-center border border-dashed p-2 mt-2 rounded">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light rounded">
                                        <i class="ri-file-line fs-20 text-primary"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1"><a href="javascript:void(0);">{{ $file }}</a></h6>
                                </div>
                                <div class="hstack gap-3 fs-16">
                                    <a href="{{ asset('file_ticket/' . $file) }}" target="_blank" class="text-muted"><i
                                            class="ri-download-2-line"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-body p-4 mb-0">
                    <h6 class="fw-semibold text-uppercase mb-3">Ticket Description</h6>
                    <p class="text-muted">{{ $data->deskripsi_masalah }}</p>
                </div>
                <!--end card-body-->
                <div class="card-body p-4">
                    <h5 class="card-title mb-3">Tracking Ticket</h5>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tracking as $no => $item)
                                    <tr>
                                        <td>{{ $tracking->firstItem() + $no }}</td>
                                        <td>@tanggal($item->created_at)</td>
                                        <td>
                                            @if ($item->status == 'Solved')
                                                <div class="text-success">
                                                    <i class="ri-checkbox-circle-line fs-17 align-middle"></i>
                                                    {{ $item->status }}
                                                </div>
                                            @elseif($item->status == 'Ditolak')
                                                <div class="text-danger">
                                                    <i class="ri-close-circle-line fs-17 align-middle"></i>
                                                    {{ $item->status }}
                                                </div>
                                            @else
                                                <div class="text-info">
                                                    <i class="ri-checkbox-circle-line fs-17 align-middle"></i>
                                                    {{ $item->status }}
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->deskripsi)
                                                {{ $item->deskripsi }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs me-1">
                                                        <span
                                                            class="avatar-title bg-soft-info text-info rounded-circle fs-16">
                                                            <?php
                                                            $s = $item->karyawan['nama'];
                                                            
                                                            if (preg_match_all('/\b(\w)/', strtoupper($s), $m)) {
                                                                $v = implode('', $m[1]);
                                                            }
                                                            
                                                            echo $v;
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    {{ $item->karyawan['nama'] }}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                    <!-- end table responsive -->
                    @if ($data->status != 5 and $data->status != 0)
                        <form action="{{ route('ticket.updateStatus') }}" method="POST" class="mt-5">
                            @csrf
                            <input type="hidden" value="{{ $data->idTiket }}" name="idTiket">
                            <input type="hidden" value="{{ Auth::user()->username }}" name="idUser">
                            <input type="hidden" value="komentar" name="aksi">
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <label for="exampleFormControlTextarea1"
                                        class="form-label @error('komentar') text-danger @enderror"">Leave a
                                        Comments</label>
                                    <textarea name="komentar" class="form-control  @error('komentar') is-invalid @enderror" id="komentar"
                                        rows="3" placeholder="Enter comments">{{ old('komentar') }}</textarea>
                                    @error('komentar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 text-end">
                                    <button type="submit" id="btnSubmitedit" class="btn btn-success">Post
                                        Comments</button>
                                    <div id="loadingedit" style="display:none;">
                                        <button type="button" class="btn btn-success btn-load" disabled>
                                            <span class="d-flex align-items-center">
                                                <span class="spinner-border flex-shrink-0" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </span>
                                                <span class="flex-grow-1 ms-2">
                                                    Loading...
                                                </span>
                                            </span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    @endif
                </div>
                <!-- end card body -->
            </div>
            <!--end card-->
        </div>
        <!--end col-->

    </div>
    <!--end row-->
@endsection
@push('before-scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="{{ asset('assets/libs/rater-js/index.js') }}"></script>
    <script src="{{ asset('assets/js/pages/rating.init.js') }}"></script>
@endpush
@push('scripts')

    @if ($cekreview != null)
    <script>
        $(document).ready(function() {

            $('#loginModals').modal('show');

        });
    </script>
    @endif

    @if (session('message'))
        <script>
            Toastify({
                text: "{{ session('message') }}",
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #0ab39c, #2982aa)",
                },
                //onClick: function(){} // Callback after click
            }).showToast();
        </script>
    @endif
    <script type="text/javascript">
        $('#btnSubmit').click(function() {
            $(this).css('display', 'none');
            $('#loading').show();
            return true;
        });
    </script>
    <script type="text/javascript">
        $('#btnSubmitedit').click(function() {
            $(this).css('display', 'none');
            $('#loadingedit').show();
            return true;
        });
    </script>
@endpush
