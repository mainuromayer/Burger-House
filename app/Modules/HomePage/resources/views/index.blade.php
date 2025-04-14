@extends('layouts.admin')

@section('header-resources')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <style>
        .select2 {
            width: 100% !important;
        }

        .banner-group,
        .banner-grid-group,
        .section-group,
        .menu-slider-group,
        .event-group,
        .gallery-group {
            background: #f1f1f1;
        }

        .nav-link.active {
            background: rgba(105, 108, 255, 0.16) !important;
            border-bottom: 2px solid #696cff !important;
        }
    </style>
@endsection

@section('content')
    {!! Form::open([
        'route' => 'homepage.store',
        'method' => 'post',
        'id' => 'form_id',
        'enctype' => 'multipart/form-data',
        'files' => true,
        'role' => 'form',
    ]) !!}

    <div class="row mb-4">
        <div class="col-md-3">
            <nav class="nav nav-tabs flex-column card">
                <a class="nav-link active" id="topbar1-tab" data-bs-toggle="tab" href="#topbarContent1" role="tab"
                    aria-controls="topbarContent1" aria-selected="true">Logo</a>
                <a class="nav-link" id="topbar2-tab" data-bs-toggle="tab" href="#topbarContent2" role="tab"
                    aria-controls="topbarContent2" aria-selected="false">Delivery Call</a>
                <a class="nav-link" id="topbar3-tab" data-bs-toggle="tab" href="#topbarContent3" role="tab"
                    aria-controls="topbarContent3" aria-selected="false">Banner</a>
                <a class="nav-link" id="topbar4-tab" data-bs-toggle="tab" href="#topbarContent4" role="tab"
                    aria-controls="topbarContent4" aria-selected="false">Banner Grid</a>
                <a class="nav-link" id="topbar5-tab" data-bs-toggle="tab" href="#topbarContent5" role="tab"
                    aria-controls="topbarContent5" aria-selected="false">Section</a>
                <a class="nav-link" id="topbar6-tab" data-bs-toggle="tab" href="#topbarContent6" role="tab"
                    aria-controls="topbarContent6" aria-selected="false">Menu Slider</a>
                <a class="nav-link" id="topbar7-tab" data-bs-toggle="tab" href="#topbarContent7" role="tab"
                    aria-controls="topbarContent7" aria-selected="false">Events</a>
                <a class="nav-link" id="topbar8-tab" data-bs-toggle="tab" href="#topbarContent8" role="tab"
                    aria-controls="topbarContent8" aria-selected="false">Gallery</a>
                <a class="nav-link" id="topbar9-tab" data-bs-toggle="tab" href="#topbarContent9" role="tab"
                    aria-controls="topbarContent9" aria-selected="false">Footer</a>
                <a class="nav-link" id="topbar10-tab" data-bs-toggle="tab" href="#topbarContent10" role="tab"
                    aria-controls="topbarContent10" aria-selected="false">Menu List</a>
            </nav>
        </div>
        <div class="col-md-9">
            <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="topbarContent1" role="tabpanel" aria-labelledby="topbar1-tab">
                    <!-- Logo -->
                    @include('HomePage::partials.logo')
                </div>
                <div class="tab-pane fade" id="topbarContent2" role="tabpanel" aria-labelledby="topbar2-tab">
                    <!-- Call Delivery Number -->
                    @include('HomePage::partials.call_delivery_number')
                </div>
                <div class="tab-pane fade" id="topbarContent3" role="tabpanel" aria-labelledby="topbar3-tab">
                    <!-- Banner -->
                    @include('HomePage::partials.banner')
                </div>
                <div class="tab-pane fade" id="topbarContent4" role="tabpanel" aria-labelledby="topbar4-tab">
                    <!-- Banner Grid -->
                    @include('HomePage::partials.banner_grid')
                </div>
                <div class="tab-pane fade" id="topbarContent5" role="tabpanel" aria-labelledby="topbar5-tab">
                    <!-- Section -->
                    @include('HomePage::partials.section')
                </div>
                <div class="tab-pane fade" id="topbarContent6" role="tabpanel" aria-labelledby="topbar6-tab">
                    <!-- Menu Slider -->
                    @include('HomePage::partials.menu_slider')
                </div>
                <div class="tab-pane fade" id="topbarContent7" role="tabpanel" aria-labelledby="topbar7-tab">
                    <!-- Events -->
                    @include('HomePage::partials.events')
                </div>
                <div class="tab-pane fade" id="topbarContent8" role="tabpanel" aria-labelledby="topbar8-tab">
                    <!-- Gallery -->
                    @include('HomePage::partials.gallery')
                </div>
                <div class="tab-pane fade" id="topbarContent9" role="tabpanel" aria-labelledby="topbar9-tab">
                    <!-- Footer Content -->
                    @include('HomePage::partials.footer')

                </div>
                <div class="tab-pane fade" id="topbarContent10" role="tabpanel" aria-labelledby="topbar10-tab">
                    <!-- Menu List -->
                    @include('HomePage::partials.menu_list')
                </div>
            </div>
        </div>
    </div>



    @include('plugins/image_upload')

    <div class="row">
        {!! Form::submit('Save', ['class' => 'btn btn-success mt-3']) !!}
    </div>
    {!! Form::close() !!}
@endsection

@section('footer-script')
    <script type="text/javascript" src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#form_id").validate({
                errorPlacement: function() {
                    return true;
                },
            });
        });
    </script>


@endsection

