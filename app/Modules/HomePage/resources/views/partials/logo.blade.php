<!-- Logo -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary form-card">
            <div class="card-header">
                <h3 class="card-title pt-2 pb-2">Logo</h3>
            </div>
            <div class="card-body demo-vertical-spacing">

                {!! Form::hidden('id', $homePage->id ?? null) !!}

                <div class="form-group row has-feedback">
                    <div id="browseimagepp">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row has-feedback">
                                    <div id="browseimagepp">
                                        <div class="row">
                                            <div class="col-md-12 addImages">
                                                <label class="center-block image-upload" for="logo">
                                                    <figure>
                                                        <img src="{{ !empty($data['logo']) ? url($data['logo']) : url('images/no_image.png') }}"
                                                            class="img-responsive img-thumbnail" id="logo_preview"
                                                            width="150px" height="150px">
                                                    </figure>
                                                    <input type="hidden" id="logo_base64" name="logo_base64"
                                                        value="">
                                                    @if (!empty($data['logo']))
                                                        <input type="hidden" name="logo"
                                                            value="{{ $data['logo'] }}" />
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 pb-3">
                                <h4 id="logo">
                                    <label for="logo" class="required-star ">Logo</label>
                                </h4>
                                <p class="text-success fw-bold small">[File Format: *.jpg/ .jpeg/ .png |
                                    Width
                                    300PX, Height 300PX]</p>
                                <span id="user_err" class="text-danger" style="font-size: 10px;"></span>
                                <input type="file" class="form-control" name="logo" id="logo_input"
                                    onchange="imageUploadWithCropping(this, 'logo_preview', 'logo_base64')"
                                    size="300x300">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
