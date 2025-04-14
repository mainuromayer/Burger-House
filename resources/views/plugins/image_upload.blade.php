<style>
    .image-upload figure {
        position: relative;
        cursor: pointer;
    }

    .image-upload figure figcaption {
        position: absolute;
        bottom: 0;
        color: #fff;
        width: 100%;
        padding-left: 9px;
        padding-bottom: 5px;
        text-shadow: 0 0 10px #000;
    }
</style>

<div class="modal fade" id="ImageUploadModal" tabindex="-1" role="dialog" aria-labelledby="ImageUploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Logo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="upload_crop_area" class="d-block mx-auto" style="padding-bottom: 25px"></div>
            </div>
            <div class="modal-footer d-flex justify-content-between w-100">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="cropImageBtn" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('plugins/croppie-2.6.2/croppie.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/croppie-2.6.2/croppie.min.css') }}">

<script>
    let input_field, upload_crop_area, rawImg;
    let img_preview_div_id, base64_value_field_id;
    let viewport_width = 300, viewport_height = 300;

    function imageUploadWithCropping(input, img_preview_id, base64_value_target) {
        if (input.files && input.files[0]) {
            const mime_type = input.files[0].type;
            if (!(mime_type === 'image/jpeg' || mime_type === 'image/jpg' || mime_type === 'image/png')) {
                input.value = '';
                alert('Only PNG, JPEG, or JPG images are allowed.');
                return false;
            }

            input_field = input;
            img_preview_div_id = img_preview_id;
            base64_value_field_id = base64_value_target;

            // Custom size (optional)
            if (input.getAttribute('size')) {
                const size = input.getAttribute('size').split('x');
                viewport_width = parseInt(size[0]);
                viewport_height = parseInt(size[1]);
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                rawImg = e.target.result;
                $('#ImageUploadModal').modal('show');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#ImageUploadModal').on('shown.bs.modal', function () {
        upload_crop_area = $('#upload_crop_area');
        if (upload_crop_area.data('croppie')) {
            upload_crop_area.croppie('destroy');
        }

        document.getElementById('upload_crop_area').style.width = (viewport_width + 50) + "px";
        document.getElementById('upload_crop_area').style.height = (viewport_height + 50) + "px";

        upload_crop_area.croppie({
            viewport: {
                width: viewport_width,
                height: viewport_height,
                type: 'square'
            },
            enforceBoundary: true,
            enableResize: false
        });

        upload_crop_area.croppie('bind', { url: rawImg });
    });

    $('#cropImageBtn').on('click', function () {
        upload_crop_area.croppie('result', {
            type: 'base64',
            format: 'jpeg',
            size: { width: viewport_width, height: viewport_height }
        }).then(function (resp) {
            document.getElementById(img_preview_div_id).src = resp;
            document.getElementById(base64_value_field_id).value = resp;

            input_field.disabled = true;

            // Optional: Reset Button
            const previewContainer = document.getElementById(img_preview_div_id).closest('.addImages');
            if (!document.getElementById('reset_image_' + input_field.id)) {
                const resetBtn = document.createElement('button');
                resetBtn.type = 'button';
                resetBtn.className = 'btn btn-warning btn-xs mt-2';
                resetBtn.id = 'reset_image_' + input_field.id;
                resetBtn.innerText = 'Reset Image';
                resetBtn.onclick = function () {
                    resetImage([input_field.id, base64_value_field_id, img_preview_div_id], this);
                };
                previewContainer.appendChild(resetBtn);
            }

            $('#ImageUploadModal').modal('hide');
        });
        upload_crop_area.croppie('destroy');
    });

    $('#ImageUploadModal').on('hide.bs.modal', function () {
        if (upload_crop_area && upload_crop_area.data('croppie')) {
            upload_crop_area.croppie('destroy');
        }

        if (!document.getElementById(base64_value_field_id).value.trim()) {
            input_field.value = '';
        }
    });

    function resetImage([input_id, base64_id, preview_id], btn) {
        document.getElementById(input_id).value = '';
        document.getElementById(input_id).disabled = false;
        document.getElementById(base64_id).value = '';
        document.getElementById(preview_id).src = '{{ url("images/no_image.png") }}';
        btn.remove();
    }
</script>

