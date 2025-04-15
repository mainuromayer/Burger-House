<!-- Gallery -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary form-card">
            <div class="card-header">
                <h3 class="card-title pt-2 pb-2">Gallery</h3>
            </div>
            <div class="card-body demo-vertical-spacing">
                <div class="form-group row mb-4">
                    <div class="col-md-12">
                        <div id="gallery-fields">
                            @php
                                $photo_gallery_images = old(
                                    'photo_gallery',
                                    json_decode($homePage->photo_gallery ?? '[]', true),
                                );
                                $gallery_count = count($photo_gallery_images);
                            @endphp
                            @for ($i = 0; $i < $gallery_count; $i++)
                                <div class="gallery-group border p-3 mb-3">
                                    <div class="form-group mb-2 row has-feedback">
                                        <div class="col-md-12 addImages">
                                            <label class="center-block image-upload" for="photo_gallery_{{ $i }}">
                                                <figure>
                                                    <img src="{{ !empty($photo_gallery_images[$i]) ? url($photo_gallery_images[$i]) : url('/assets-2/img/gallery/placeholder-1280x853.png') }}"
                                                        class="img-responsive img-thumbnail"
                                                        id="photo_gallery_preview_{{ $i }}"
                                                        style="width:1280px; height:853px; object-fit:cover;">
                                                </figure>
                                                <input type="hidden" id="photo_gallery_base64_{{ $i }}"
                                                    name="photo_gallery_base64[]" value="">
                                                @if (!empty($photo_gallery_images[$i]))
                                                    <input type="hidden" name="photo_gallery[]"
                                                        value="{{ $photo_gallery_images[$i] }}" />
                                                @endif
                                            </label>
                                        </div>
                                        <div class="col-md-12 pb-3">
                                            <h4>
                                                <label for="photo_gallery_{{ $i }}" class="required-star">Gallery Image</label>
                                            </h4>
                                            <p class="text-success fw-bold small">[File Format: *.jpg/ .jpeg/ .png | Width 1280PX, Height 853PX]</p>
                                            <span id="photo_gallery_err_{{ $i }}" class="text-danger" style="font-size: 10px;"></span>
                                            <input type="file" class="form-control" name="photo_gallery_file[]"
                                                id="photo_gallery_{{ $i }}"
                                                onchange="imageUploadWithCropping(this, 'photo_gallery_preview_{{ $i }}', 'photo_gallery_base64_{{ $i }}')"
                                                size="1280x853">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary remove-gallery">Remove</button>
                                </div>
                            @endfor
                        </div>
                        <button type="button" id="add-gallery" class="btn btn-primary mt-2">Add Gallery</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add new gallery item
    $('#add-gallery').click(function() {
        let index = $('#gallery-fields .gallery-group').length;
        let html = `
            <div class="gallery-group border p-3 mb-3">
                <div class="form-group mb-2 row has-feedback">
                    <div class="col-md-12 addImages">
                        <label class="center-block image-upload" for="photo_gallery_${index}">
                            <figure>
                                <img src="{{ url('/assets-2/img/gallery/placeholder-1280x853.png') }}" class="img-responsive img-thumbnail"
                                    id="photo_gallery_preview_${index}" style="width:1280px; height:853px; object-fit:cover;">
                            </figure>
                            <input type="hidden" id="photo_gallery_base64_${index}" name="photo_gallery_base64[]" value="">
                        </label>
                    </div>
                    <div class="col-md-12 pb-3">
                        <h4>
                            <label for="photo_gallery_${index}" class="required-star">Gallery Image</label>
                        </h4>
                        <p class="text-success fw-bold small">[File Format: *.jpg/ .jpeg/ .png | Width 1280PX, Height 853PX]</p>
                        <span id="photo_gallery_err_${index}" class="text-danger" style="font-size: 10px;"></span>
                        <input type="file" class="form-control" name="photo_gallery_file[]"
                            id="photo_gallery_${index}"
                            onchange="imageUploadWithCropping(this, 'photo_gallery_preview_${index}', 'photo_gallery_base64_${index}')"
                            size="1280x853">
                    </div>
                </div>
                <button type="button" class="btn btn-secondary remove-gallery">Remove</button>
            </div>`;
        $('#gallery-fields').append(html);
    });

    // Remove gallery item
    $(document).on('click', '.remove-gallery', function() {
        $(this).closest('.gallery-group').remove();
    });
</script>
