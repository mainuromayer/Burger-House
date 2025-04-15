<!-- Banner Grid -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary form-card">
            <div class="card-header">
                <h3 class="card-title pt-2 pb-2">Banner Grid</h3>
            </div>
            <div class="card-body demo-vertical-spacing">
                <div class="form-group row mb-4">
                    <div class="col-md-12">
                        <div id="banner-grid-fields">
                            @php
                                $banner_grid_subjects = old(
                                    'banner_grid_subject',
                                    json_decode($homePage->banner_grid_subject ?? '[]', true),
                                );
                                $banner_grid_titles = old(
                                    'banner_grid_title',
                                    json_decode($homePage->banner_grid_title ?? '[]', true),
                                );
                                $banner_grid_images = old(
                                    'banner_grid_image',
                                    json_decode($homePage->banner_grid_image ?? '[]', true),
                                );
                                $banner_grid_count = max(
                                    count($banner_grid_subjects),
                                    count($banner_grid_titles),
                                    count($banner_grid_images),
                                );
                            @endphp
                            @for ($i = 0; $i < $banner_grid_count; $i++)
                                <div class="banner-grid-group border p-3 mb-3">
                                    <div class="form-group mb-2">
                                        {!! Form::label('banner_grid_subject[]', 'Subject') !!}
                                        {!! Form::text('banner_grid_subject[]', $banner_grid_subjects[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter grid subtitle',
                                        ]) !!}
                                    </div>
                                    <div class="form-group mb-2">
                                        {!! Form::label('banner_grid_title[]', 'Title') !!}
                                        {!! Form::text('banner_grid_title[]', $banner_grid_titles[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter banner grid title',
                                        ]) !!}
                                    </div>

                                    <div class="form-group mb-2 row has-feedback">
                                        <div id="browseimagepp_banner_grid_image">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row has-feedback">
                                                        <div id="browseimagepp_banner_grid_image">
                                                            <div class="row">
                                                                <div class="col-md-12 addImages">
                                                                    <label class="center-block image-upload"
                                                                        for="banner_grid_image_{{ $i }}">
                                                                        <figure>
                                                                            <img src="{{ !empty($banner_grid_images[$i]) ? url($banner_grid_images[$i]) : url('/assets-2/img/banner-grid/555x180.jpg') }}"
                                                                                class="img-responsive img-thumbnail"
                                                                                id="banner_grid_image_preview_{{ $i }}"
                                                                                style="width:555px; height:180px; object-fit:cover;">
                                                                        </figure>
                                                                        <input type="hidden"
                                                                            id="banner_grid_image_base64_{{ $i }}"
                                                                            name="banner_grid_image_base64[]" value="">
                                                                        @if (!empty($banner_grid_images[$i]))
                                                                            <input type="hidden" name="banner_grid_image[]"
                                                                                value="{{ $banner_grid_images[$i] }}" />
                                                                        @endif
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 pb-3">
                                                    <h4 id="banner_grid_image_{{ $i }}">
                                                        <label for="banner_grid_image_{{ $i }}"
                                                            class="required-star">Banner Grid Image</label>
                                                    </h4>
                                                    <p class="text-success fw-bold small">[File Format: *.jpg/ .jpeg/
                                                        .png | Width 555PX, Height 180PX]</p>
                                                    <span id="banner_grid_image_err_{{ $i }}" class="text-danger"
                                                        style="font-size: 10px;"></span>
                                                    <input type="file" class="form-control"
                                                        name="banner_grid_image_file[]" id="banner_grid_image_{{ $i }}"
                                                        onchange="imageUploadWithCropping(this, 'banner_grid_image_preview_{{ $i }}', 'banner_grid_image_base64_{{ $i }}')"
                                                        size="555x180">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-secondary remove-banner-grid">Remove</button>
                                </div>
                            @endfor
                        </div>
                        <button type="button" id="add-banner-grid" class="btn btn-primary mt-2">Add Banner Grid</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let bannerGridCount = {{ $banner_grid_count ?? 0 }};

    $('#add-banner-grid').click(function () {
        bannerGridCount++;
        let index = bannerGridCount;

        let html = `
        <div class="banner-grid-group border p-3 mb-3">
            <div class="form-group mb-2">
                <label>Subject</label>
                <input type="text" name="banner_grid_subject[]" class="form-control" placeholder="Enter grid subtitle">
            </div>
            <div class="form-group mb-2">
                <label>Title</label>
                <input type="text" name="banner_grid_title[]" class="form-control" placeholder="Enter banner grid title">
            </div>

            <div class="form-group mb-2 row has-feedback">
                <div class="row">
                    <div class="col-md-12 addImages">
                        <label class="center-block image-upload" for="banner_grid_image_${index}">
                            <figure>
                                <img src="/assets-2/img/banner-grid/555x180.jpg"
                                    class="img-responsive img-thumbnail"
                                    id="banner_grid_image_preview_${index}" style="width:555px; height:180px; object-fit:cover;">
                            </figure>
                            <input type="hidden" id="banner_grid_image_base64_${index}" name="banner_grid_image_base64[]" value="">
                        </label>
                    </div>
                    <div class="col-md-12 pb-3">
                        <h4><label for="banner_grid_image_${index}" class="required-star">Banner Grid Image</label></h4>
                        <p class="text-success fw-bold small">[File Format: *.jpg/ .jpeg/ .png | Width 555PX, Height 180PX]</p>
                        <span id="banner_grid_image_err_${index}" class="text-danger" style="font-size: 10px;"></span>
                        <input type="file" class="form-control" name="banner_grid_image_file[]"
                            id="banner_grid_image_${index}"
                            onchange="imageUploadWithCropping(this, 'banner_grid_image_preview_${index}', 'banner_image_base64_${index}')"
                            size="555x180">
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-secondary remove-banner-grid">Remove</button>
        </div>`;

        $('#banner-grid-fields').append(html);
    });

    $(document).on('click', '.remove-banner-grid', function () {
        $(this).closest('.banner-grid-group').remove();
    });
</script>
