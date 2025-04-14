<!-- Banner -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary form-card">
            <div class="card-header">
                <h3 class="card-title pt-2 pb-2">Banner</h3>
            </div>
            <div class="card-body demo-vertical-spacing">
                <div class="input-group row mb-4">
                    <div class="col-md-12">
                        <div id="banner-fields">
                            @php
                                $banner_subtitles = old(
                                    'banner_subtitle',
                                    json_decode($homePage->banner_subtitle ?? '[]', true),
                                );
                                $banner_titles = old(
                                    'banner_title',
                                    json_decode($homePage->banner_title ?? '[]', true),
                                );
                                $banner_images = old(
                                    'banner_image',
                                    json_decode($homePage->banner_image ?? '[]', true),
                                );
                                $banner_prices = old(
                                    'banner_price_off',
                                    json_decode($homePage->banner_price_off ?? '[]', true),
                                );
                                $banner_count = max(
                                    count($banner_subtitles),
                                    count($banner_titles),
                                    count($banner_images),
                                    count($banner_prices),
                                );
                            @endphp
                            @for ($i = 0; $i < $banner_count; $i++)
                                <div class="banner-group border p-3 mb-3">
                                    <div class="form-group mb-2">
                                        {!! Form::label('banner_subtitle[]', 'Subtitle') !!}
                                        {!! Form::text('banner_subtitle[]', $banner_subtitles[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter subtitle',
                                        ]) !!}
                                    </div>
                                    <div class="form-group mb-2">
                                        {!! Form::label('banner_title[]', 'Title') !!}
                                        {!! Form::text('banner_title[]', $banner_titles[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter title',
                                        ]) !!}
                                    </div>

                                    <div class="input-group mb-2 row has-feedback">
                                        <div id="browseimagepp_banner_image">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row has-feedback">
                                                        <div id="browseimagepp_banner_image">
                                                            <div class="row">
                                                                <div class="col-md-12 addImages">
                                                                    <label class="center-block image-upload"
                                                                        for="banner_image_{{ $i }}">
                                                                        <figure>
                                                                            <img src="{{ !empty($banner_images[$i]) ? url($banner_images[$i]) : url('/assets-2/img/banner/625x490.jpg') }}"
                                                                                class="img-responsive img-thumbnail"
                                                                                id="banner_image_preview_{{ $i }}"
                                                                                width="625px" height="490px">
                                                                        </figure>
                                                                        <input type="hidden"
                                                                            id="banner_image_base64_{{ $i }}"
                                                                            name="banner_image_base64[]" value="">
                                                                        @if (!empty($banner_images[$i]))
                                                                            <input type="hidden" name="banner_image[]"
                                                                                value="{{ $banner_images[$i] }}" />
                                                                        @endif
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 pb-3">
                                                    <h4 id="banner_image_{{ $i }}">
                                                        <label for="banner_image_{{ $i }}"
                                                            class="required-star">Menu Slider Item Image</label>
                                                    </h4>
                                                    <p class="text-success fw-bold small">[File Format: *.jpg/ .jpeg/
                                                        .png | Width 625PX, Height 490PX]</p>
                                                    <span id="banner_image_err_{{ $i }}" class="text-danger"
                                                        style="font-size: 10px;"></span>
                                                    <input type="file" class="form-control"
                                                        name="banner_image_file[]" id="banner_image_{{ $i }}"
                                                        onchange="imageUploadWithCropping(this, 'banner_image_preview_{{ $i }}', 'banner_image_base64_{{ $i }}')"
                                                        size="625x490">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2">
                                        {!! Form::label('banner_price_off[]', 'Price Off') !!}
                                        {!! Form::text('banner_price_off[]', $banner_prices[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter price off',
                                        ]) !!}
                                    </div>
                                    <button type="button" class="btn btn-secondary remove-banner">Remove</button>
                                </div>
                            @endfor
                        </div>
                        <button type="button" id="add-banner" class="btn btn-primary mt-2">Add Banner</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Banner ==============================
    let bannerCount = {{ $banner_count ?? 0 }};

    $('#add-banner').click(function() {
        bannerCount++;
        let html = `
        <div class="banner-group border p-3 mb-3">
            <div class="form-group mb-2">
                <label>Subtitle</label>
                <input type="text" name="banner_subtitle[]" class="form-control" placeholder="Enter subtitle">
            </div>
            <div class="form-group mb-2">
                <label>Title</label>
                <input type="text" name="banner_title[]" class="form-control" placeholder="Enter title">
            </div>

            
<div class="input-group mb-2 row has-feedback">
                        <div id="browseimagepp_banner_image">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row has-feedback">
                                        <div id="browseimagepp_banner_image">
                                            <div class="row">
                                                <div class="col-md-12 addImages">
                                                    <label class="center-block image-upload" for="banner_image_{{ $i }}">
                                                        <figure>
                                                            <img src="{{ !empty($banner_images[$i]) ? url($banner_images[$i]) : url('/assets-2/img/banner/625x490.jpg') }}"
                                                                class="img-responsive img-thumbnail"
                                                                id="banner_image_preview_{{ $i }}" width="625px"
                                                                height="490px">
                                                        </figure>
                                                        <input type="hidden" id="banner_image_base64_{{ $i }}"
                                                            name="banner_image_base64[]" value="">
                                                        @if (!empty($banner_images[$i]))
                                                            <input type="hidden" name="banner_image[]"
                                                                value="{{ $banner_images[$i] }}" />
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 pb-3">
                                    <h4 id="banner_image_{{ $i }}">
                                        <label for="banner_image_{{ $i }}" class="required-star">Menu Slider Item Image</label>
                                    </h4>
                                    <p class="text-success fw-bold small">[File Format: *.jpg/ .jpeg/ .png | Width 625PX, Height 490PX]</p>
                                    <span id="banner_image_err_{{ $i }}" class="text-danger" style="font-size: 10px;"></span>
                                    <input type="file" class="form-control" name="banner_image_file[]"
                                        id="banner_image_{{ $i }}"
                                        onchange="imageUploadWithCropping(this, 'banner_image_preview_{{ $i }}', 'banner_image_base64_{{ $i }}')"
                                        size="625x490">
                                </div>
                            </div>
                        </div>
                    </div>

            <div class="form-group mb-2">
                <label>Price Off</label>
                <input type="text" name="banner_price_off[]" class="form-control" placeholder="Enter price off">
            </div>
            <button type="button" class="btn btn-secondary remove-banner">Remove</button>
        </div>`;
        $('#banner-fields').append(html);
    });

    $(document).on('click', '.remove-banner', function() {
        $(this).closest('.banner-group').remove();
    });
</script>
