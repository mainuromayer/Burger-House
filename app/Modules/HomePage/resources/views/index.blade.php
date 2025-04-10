@extends('layouts.admin')

@section('header-resources')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <style>.select2 { width: 100% !important; }</style>
@endsection

@section('content')
    {!! Form::open([
        'route' => 'homepage.store',
        'method' => 'post',
        'id' => 'form_id',
        'enctype' => 'multipart/form-data',
        'files' => true,
        'role' => 'form'
    ]) !!}

    <div class="row">
        <div class="col-md-12 p-5 pt-3">
            <div class="card card-outline card-primary form-card">
                <div class="card-header">
                    <h3 class="card-title pt-2 pb-2">Home Page</h3>
                </div>

                <div class="card-body demo-vertical-spacing">
                    {!! Form::hidden('id', $homePage->id ?? null) !!}

                    <div class="input-group row mb-4">
                        {!! Form::label('call_delivery_number', 'Call Delivery Number', ['class' => 'col-md-3 control-label required-star']) !!}
                        <div class="col-md-9">
                            {!! Form::text('call_delivery_number', old('call_delivery_number', $homePage->call_delivery_number ?? ''), [
                                'class' => 'form-control required',
                                'placeholder' => 'Enter Delivery Number',
                            ]) !!}
                        </div>
                    </div>

                    <div class="input-group row mb-4">
                        {!! Form::label('banner_subtitle', 'Banner Subtitle', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            <div id="banner-subtitle-fields">
                                @php
                                    $subtitles = old('banner_subtitle', json_decode($homePage->banner_subtitle ?? '[]', true));
                                @endphp
                                @foreach ($subtitles as $index => $subtitle)
                                    <div class="mb-2">
                                        <label>Banner {{ $index + 1 }}</label>
                                        <div class="input-group">
                                            {!! Form::text('banner_subtitle[]', $subtitle, ['class' => 'form-control', 'placeholder' => 'Enter subtitle']) !!}
                                            <button type="button" class="btn btn-danger remove-field">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-banner-subtitle" class="btn btn-primary mt-2">Add Subtitle</button>
                        </div>
                    </div>

                    <div class="input-group row mb-4">
                        {!! Form::label('banner_title', 'Banner Title', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            <div id="banner-title-fields">
                                @php
                                    $titles = old('banner_title', json_decode($homePage->banner_title ?? '[]', true));
                                @endphp
                                @foreach ($titles as $title)
                                    <div class="input-group mb-2">
                                        {!! Form::text('banner_title[]', $title, ['class' => 'form-control', 'placeholder' => 'Enter title']) !!}
                                        <button type="button" class="btn btn-danger remove-field">Remove</button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-banner-title" class="btn btn-primary mt-2">Add Title</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection

@section('footer-script')
    <script>
        let subtitleCount = {{ count($subtitles) }};

        $('#add-banner-subtitle').click(function () {
            subtitleCount++;
            let html = `
                <div class="mb-2">
                    <label>Banner ${subtitleCount}</label>
                    <div class="input-group">
                        <input type="text" name="banner_subtitle[]" class="form-control" placeholder="Enter subtitle">
                        <button type="button" class="btn btn-danger remove-field">Remove</button>
                    </div>
                </div>`;
            $('#banner-subtitle-fields').append(html);
        });

        $('#add-banner-title').click(function () {
            let html = `
                <div class="input-group mb-2">
                    <input type="text" name="banner_title[]" class="form-control" placeholder="Enter title">
                    <button type="button" class="btn btn-danger remove-field">Remove</button>
                </div>`;
            $('#banner-title-fields').append(html);
        });

        $(document).on('click', '.remove-field', function () {
            $(this).closest('.input-group').remove();
        });
    </script>
@endsection
