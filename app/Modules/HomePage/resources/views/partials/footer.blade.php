<!-- Footer Content -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary form-card">
            <div class="card-header">
                <h3 class="card-title pt-2 pb-2">Footer</h3>
            </div>
            <div class="card-body demo-vertical-spacing">

                <div class="form-group row has-feedback">
                    <div id="browseimagepp_footer_background">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row has-feedback">
                                    <div id="browseimagepp_footer_background">
                                        <div class="row">
                                            <div class="col-md-12 addImages">
                                                <label class="center-block image-upload"
                                                    for="footer_background">

                                                    <figure>
                                                        <img src="{{ !empty($data['footer_background']) ? url($data['footer_background']) : url('/assets-2/img/1350x540.jpg') }}"
                                                            class="img-responsive img-thumbnail"
                                                            id="footer_background_preview" width="1350px"
                                                            height="540px">
                                                    </figure>
                                                    <input type="hidden" id="footer_background_base64"
                                                        name="footer_background_base64" value="">
                                                    @if (!empty($data['footer_background']))
                                                        <input type="hidden" name="footer_background"
                                                            value="{{ $data['footer_background'] }}" />
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 pb-3">
                                <h4 id="footer_background">
                                    <label for="footer_background" class="required-star">Footer
                                        Background Image</label>
                                </h4>
                                <p class="text-success fw-bold small">[File Format: *.jpg/ .jpeg/
                                    .png | Width 1350PX, Height 540PX]</p>
                                <span id="footer_background_err" class="text-danger"
                                    style="font-size: 10px;"></span>
                                <input type="file" class="form-control" name="footer_background"
                                    id="footer_background"
                                    onchange="imageUploadWithCropping(this, 'footer_background_preview', 'footer_background_base64')"
                                    size="1350x540">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row has-feedback">
                    <div id="browseimagepp_footer_logo">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row has-feedback">
                                    <div id="browseimagepp_footer_logo">
                                        <div class="row">
                                            <div class="col-md-12 addImages">
                                                <label class="center-block image-upload"
                                                    for="footer_logo">

                                                    <figure>
                                                        <img src="{{ !empty($data['footer_logo']) ? url($data['footer_logo']) : url('images/no_image.png') }}"
                                                            class="img-responsive img-thumbnail"
                                                            id="footer_logo_preview" width="150px"
                                                            height="150px">
                                                    </figure>
                                                    <input type="hidden" id="footer_logo_base64"
                                                        name="footer_logo_base64" value="">
                                                    @if (!empty($data['footer_logo']))
                                                        <input type="hidden" name="footer_logo"
                                                            value="{{ $data['footer_logo'] }}" />
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 pb-3">
                                <h4 id="footer_logo">
                                    <label for="footer_logo" class="required-star">Footer
                                        Logo</label>
                                </h4>
                                <p class="text-success fw-bold small">[File Format: *.jpg/ .jpeg/
                                    .png | Width 300PX, Height 300PX]</p>
                                <span id="footer_logo_err" class="text-danger"
                                    style="font-size: 10px;"></span>
                                <input type="file" class="form-control" name="footer_logo"
                                    id="footer_logo"
                                    onchange="imageUploadWithCropping(this, 'footer_logo_preview', 'footer_logo_base64')"
                                    size="300x300">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group row mb-4">
                    {!! Form::label('footer_desc', 'Footer Desc', ['class' => 'col-md-3 control-label required-star']) !!}
                    <div class="col-md-9">
                        {!! Form::text('footer_desc', old('footer_desc', $homePage->footer_desc ?? ''), [
                            'class' => 'form-control required',
                            'placeholder' => 'Footer Desc',
                        ]) !!}
                    </div>
                </div>


                <div class="form-group row mb-4">
                    {!! Form::label('footer_copyright', 'Footer Copyright', ['class' => 'col-md-3 control-label required-star']) !!}
                    <div class="col-md-9">
                        {!! Form::text('footer_copyright', old('footer_copyright', $homePage->footer_copyright ?? ''), [
                            'class' => 'form-control required',
                            'placeholder' => 'Footer Copyright',
                        ]) !!}
                    </div>
                </div>

                <div class="form-group row mb-4">
                    {!! Form::label('location', 'Location', ['class' => 'col-md-3 control-label required-star']) !!}
                    <div class="col-md-9">
                        {!! Form::text('location', old('location', $homePage->location ?? ''), [
                            'class' => 'form-control required',
                            'placeholder' => 'Location',
                        ]) !!}
                    </div>
                </div>
                <div class="form-group row mb-4">
                    {!! Form::label('email', 'Email', ['class' => 'col-md-3 control-label required-star']) !!}
                    <div class="col-md-9">
                        {!! Form::text('email', old('email', $homePage->email ?? ''), [
                            'class' => 'form-control required',
                            'placeholder' => 'Email',
                        ]) !!}
                    </div>
                </div>
                <div class="form-group row mb-4">
                    {!! Form::label('instagram', 'Header', ['class' => 'col-md-3 control-label required-star']) !!}
                    <div class="col-md-9">
                        {!! Form::text('instagram', old('instagram', $homePage->instagram ?? ''), [
                            'class' => 'form-control required',
                            'placeholder' => 'Instagram',
                        ]) !!}
                    </div>
                </div>

                <div class="form-group row mb-4">
                    {!! Form::label('facebook', 'Facebook', ['class' => 'col-md-3 control-label required-star']) !!}
                    <div class="col-md-9">
                        {!! Form::text('facebook', old('facebook', $homePage->facebook ?? ''), [
                            'class' => 'form-control required',
                            'placeholder' => 'Facebook',
                        ]) !!}
                    </div>
                </div>

                <div class="form-group row mb-4">
                    {!! Form::label('twitter', 'Twitter', ['class' => 'col-md-3 control-label required-star']) !!}
                    <div class="col-md-9">
                        {!! Form::text('twitter', old('twitter', $homePage->twitter ?? ''), [
                            'class' => 'form-control required',
                            'placeholder' => 'Twitter',
                        ]) !!}
                    </div>
                </div>

                <div class="form-group row mb-4">
                    {!! Form::label('whatsapp', 'WhatsApp', ['class' => 'col-md-3 control-label required-star']) !!}
                    <div class="col-md-9">
                        {!! Form::text('whatsapp', old('whatsapp', $homePage->whatsapp ?? ''), [
                            'class' => 'form-control required',
                            'placeholder' => 'WhatsApp',
                        ]) !!}
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
