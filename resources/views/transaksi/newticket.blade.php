@extends('layouts.master')
@section('title', 'Create New Ticket')
@section('nav_active_new_ticket', 'active')
@section('content')


    <div class="row">
        <div class="col-xl-4">
            <div class="card ">
                <div class="card-header">
                    <h5 class="card-title mb-0">Pelapor Masalah</h5>
                </div>
                <div class="card-body pb-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block  mb-3">
                            <div class="avatar-lg me-1">
                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-1">
                                    <?php 
                                        $s = $user->nama;
    
                                        if(preg_match_all('/\b(\w)/',strtoupper($s),$m)) {
                                            $v = implode('',$m[1]); 
                                        }
    
                                        echo $v;
                                    ?>
                                </span>
                            </div>
                        </div>
                        <h5 class="fs-16 mb-1">{{ $user->nama }}</h5>
                        <p class="text-muted mb-0">{{ $user->departemen->nama_dept }} - {{ $user->jabatan->nama_jabatan }} - {{ $user->nik }}</p>
                        <span class="badge badge-pill bg-success" data-key="t-new"><i class="ri-map-pin-2-line"></i> {{ $user->cabang->branch_name }}</span>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-xl-8">
            <form action="{{ route('newticket.simpan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Deskripsi Masalah</h5>
                    </div>
                    <div class="card-body mb-2">
                        <div class="row">
                            <div class="col-xl-6">
                                <div>
                                    <label for="validationCustom04"
                                        class="form-label">Kategori Masalah</label>
                                    <select class="form-control" data-choices name="kategori" id="choices-single-default">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategori as $kg)
                                            <option value="{{ $kg->id }}" @if(old('kategori') == $kg->id) selected @endif>{{ $kg->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="pt-2">
                                    <label for="validationCustom04"
                                        class="form-label">Kondisi</label>
                                    <select class="form-control" data-choices name="kondisi" id="choices-single-default">
                                        <option value="">Pilih Kondisi</option>
                                        @foreach ($kondisi as $kn)
                                            <option value="{{ $kn->id }}" @if(old('kategori') == $kn->id) selected @endif>{{ $kn->nama_kondisi }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="pt-2">
                                    <label for="validationCustom02"
                                        class="form-label">Lampiran Gambar</label>
                                    <input name="foto[]" type="file" 
                                        class="form-control" multiple="multiple">
                                   
                                </div>
                                <div class="pt-2">
                                    <label for="validationCustom02"
                                        class="form-label">Lampiran File</label>
                                    <input name="file[]" type="file" 
                                        class="form-control" multiple="multiple">
                                   
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div>
                                    <label for="validationCustom04"
                                        class="form-label">Subjek Masalah</label>
                                    <input type="text" name="subjek" value="{{ old('subjek') }}"
                                        class="form-control" id="validationCustom04"
                                        autocomplete="off">
                                </div>
                                <div class="pt-2">
                                    <label for="exampleFormControlTextarea5" class="form-label">Deskripsi Masalah</label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="8">{{ old('deskripsi') }}</textarea>
                                    
                                </div>
                            </div>
                            @if($errors->any())
                            <div class="col-xl-12">
                                <hr>
                                    {!! implode('', $errors->all('
                                    
                                        <div class="d-flex mt-0">
                                                <div class="flex-shrink-0 mt-0">
                                                    <i class="ri-information-line text-danger mt-0"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-1 mt-0">
                                                    <p class="mt-0 mb-0 text-danger">:message</p>
                                                </div>
                                            </div>
                                    ')) !!}
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end mb-4">
                    <button type="submit" id="btnSubmit" class="btn btn-success btn-label waves-effect waves-light">
                        <i class="ri-save-2-line label-icon align-middle fs-16 me-2"></i> Submit
                    </button>
                    <button type="button" id="loading" style="display:none;" class="btn btn-success btn-load" disabled>
                        <span class="d-flex align-items-center">
                            <span class="spinner-border flex-shrink-0" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </span>
                            <span class="flex-grow-1 ms-2">
                                Loading...
                            </span>
                        </span>
                    </button>
                    
                    <button type="reset" class="btn btn-danger btn-label waves-effect waves-light">
                        <i class="ri-restart-line label-icon align-middle fs-16 me-2"></i> Reset
                    </button>
                    
                </div>
            </form>
        </div>
    </div>

@endsection

@push('before-scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
@endpush

@push('center-scripts')
    <script src="{{ asset('assets/libs/list.js/prismjs.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.js/list.pagination.js.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.js/listjs.init.js') }}"></script>
    <script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>

    {{-- <script src="{{ asset('assets/libs/sweetalert2.min.js') }}"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#carirow tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        @if ($errors->any())
            $(document).ready(function() {

                $('#exampleModalgrid').modal('show');

            });
        @endif

        @if ($errors->has('edit_nama'))

            $(document).ready(function() {

                $('#modaledit').modal('show');

            });
        @endif
    </script>

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
