<!-- Menu Slider -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary form-card">
            <div class="card-header">
                <h3 class="card-title pt-2 pb-2">Menu Slider</h3>
            </div>
            <div class="card-body demo-vertical-spacing">
                <div class="form-group row mb-4">
                    <div class="col-md-12">
                        <div id="menu-slider-fields">
                            @php
                                $menu_slider_item_images = old(
                                    'menu_slider_item_image',
                                    json_decode($homePage->menu_slider_item_image ?? '[]', true),
                                );
                                $menu_slider_item_titles = old(
                                    'menu_slider_item_title',
                                    json_decode($homePage->menu_slider_item_title ?? '[]', true),
                                );
                                $menu_slider_item_subtitles = old(
                                    'menu_slider_item_subtitle',
                                    json_decode($homePage->menu_slider_item_subtitle ?? '[]', true),
                                );
                                $menu_slider_count = max(
                                    count($menu_slider_item_images),
                                    count($menu_slider_item_titles),
                                    count($menu_slider_item_subtitles),
                                );
                            @endphp
                            @for ($i = 0; $i < $menu_slider_count; $i++)
                                <div class="menu-slider-group border p-3 mb-3">

                                    <div class="form-group mb-2 row has-feedback">
                                        <div id="browseimagepp_menu_slider_item_image">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row has-feedback">
                                                        <div id="browseimagepp_menu_slider_item_image">
                                                            <div class="row">
                                                                <div class="col-md-12 addImages">
                                                                    <label class="center-block image-upload"
                                                                        for="menu_slider_item_image_{{ $i }}">
                                                                        <figure>
                                                                            <img src="{{ !empty($menu_slider_item_images[$i]) ? url($menu_slider_item_images[$i]) : url('/assets-2/img/menu-slider/410x270.jpg') }}"
                                                                                class="img-responsive img-thumbnail"
                                                                                id="menu_slider_item_image_preview_{{ $i }}"
                                                                                width="410px" height="270px">
                                                                        </figure>
                                                                        <input type="hidden"
                                                                            id="menu_slider_item_image_base64_{{ $i }}"
                                                                            name="menu_slider_item_image_base64[]"
                                                                            value="">
                                                                        @if (!empty($menu_slider_item_images[$i]))
                                                                            <input type="hidden"
                                                                                name="menu_slider_item_image[]"
                                                                                value="{{ $menu_slider_item_images[$i] }}" />
                                                                        @endif
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 pb-3">
                                                    <h4 id="menu_slider_item_image_{{ $i }}">
                                                        <label for="menu_slider_item_image_{{ $i }}"
                                                            class="required-star">Menu Slider Item Image</label>
                                                    </h4>
                                                    <p class="text-success fw-bold small">[File Format: *.jpg/ .jpeg/
                                                        .png | Width 410PX, Height 270PX]</p>
                                                    <span id="menu_slider_item_image_err_{{ $i }}"
                                                        class="text-danger" style="font-size: 10px;"></span>
                                                    <input type="file" class="form-control"
                                                        name="menu_slider_item_image_file[]"
                                                        id="menu_slider_item_image_{{ $i }}"
                                                        onchange="imageUploadWithCropping(this, 'menu_slider_item_image_preview_{{ $i }}', 'menu_slider_item_image_base64_{{ $i }}')"
                                                        size="410x270">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2">
                                        {!! Form::label('menu_slider_item_title[]', 'Title') !!}
                                        {!! Form::text('menu_slider_item_title[]', $menu_slider_item_titles[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter menu slider title',
                                        ]) !!}
                                    </div>
                                    
                                    <div class="form-group mb-2">
                                        {!! Form::label('menu_slider_item_subtitle[]', 'Subtitle') !!}
                                        {!! Form::text('menu_slider_item_subtitle[]', $menu_slider_item_subtitles[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter menu slider subtitle',
                                        ]) !!}
                                    </div>
                                    <button type="button" class="btn btn-secondary remove-menu-slider">Remove</button>
                                </div>
                            @endfor
                        </div>
                        <button type="button" id="add-menu-slider" class="btn btn-primary mt-2">Add
                            Menu
                            Slider</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    // Menu Slider ==============================
    $('#add-menu-slider').click(function() {
        let html = `
                <div class="menu-slider-group border p-3 mb-3">

                    <div class="form-group mb-2 row has-feedback">
                        <div id="browseimagepp_menu_slider_item_image">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row has-feedback">
                                        <div id="browseimagepp_menu_slider_item_image">
                                            <div class="row">
                                                <div class="col-md-12 addImages">
                                                    <label class="center-block image-upload" for="menu_slider_item_image_{{ $i }}">
                                                        <figure>
                                                            <img src="{{ !empty($menu_slider_item_images[$i]) ? url($menu_slider_item_images[$i]) : url('/assets-2/img/menu-slider/410x270.jpg') }}"
                                                                class="img-responsive img-thumbnail"
                                                                id="menu_slider_item_image_preview_{{ $i }}" width="410px"
                                                                height="270px">
                                                        </figure>
                                                        <input type="hidden" id="menu_slider_item_image_base64_{{ $i }}"
                                                            name="menu_slider_item_image_base64[]" value="">
                                                        @if (!empty($menu_slider_item_images[$i]))
                                                            <input type="hidden" name="menu_slider_item_image[]"
                                                                value="{{ $menu_slider_item_images[$i] }}" />
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 pb-3">
                                    <h4 id="menu_slider_item_image_{{ $i }}">
                                        <label for="menu_slider_item_image_{{ $i }}" class="required-star">Menu Slider Item Image</label>
                                    </h4>
                                    <p class="text-success fw-bold small">[File Format: *.jpg/ .jpeg/ .png | Width 410PX, Height 270PX]</p>
                                    <span id="menu_slider_item_image_err_{{ $i }}" class="text-danger" style="font-size: 10px;"></span>
                                    <input type="file" class="form-control" name="menu_slider_item_image_file[]"
                                        id="menu_slider_item_image_{{ $i }}"
                                        onchange="imageUploadWithCropping(this, 'menu_slider_item_image_preview_{{ $i }}', 'menu_slider_item_image_base64_{{ $i }}')"
                                        size="410x270">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label>Title</label>
                        <input type="text" name="menu_slider_item_title[]" class="form-control" placeholder="Enter menu slider title">
                    </div>
                    <div class="form-group mb-2">
                        <label>Subtitle</label>
                        <input type="text" name="menu_slider_item_subtitle[]" class="form-control" placeholder="Enter menu slider subtitle">
                    </div>
                    <button type="button" class="btn btn-secondary remove-menu-slider">Remove</button>
                </div>`;
        $('#menu-slider-fields').append(html);
    });

    $(document).on('click', '.remove-menu-slider', function() {
        $(this).closest('.menu-slider-group').remove();
    });
</script>
