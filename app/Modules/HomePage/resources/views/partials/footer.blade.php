<!-- Footer Content -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary form-card">
            <div class="card-header">
                <h3 class="card-title pt-2 pb-2">Footer</h3>
            </div>
            <div class="card-body demo-vertical-spacing">

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
                    {!! Form::label('footer_contact_text', 'Footer Content Text', [
                        'class' => 'col-md-3 control-label required-star',
                    ]) !!}
                    <div class="col-md-9">
                        {!! Form::text('footer_contact_text', old('footer_contact_text', $homePage->footer_contact_text ?? ''), [
                            'class' => 'form-control required',
                            'placeholder' => 'Footer Content Text',
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

                <div class="form-group row mb-4">
                    {!! Form::label('popup_title_upper', 'Popup Title Upper', ['class' => 'col-md-3 control-label required-star']) !!}
                    <div class="col-md-9">
                        {!! Form::text('popup_title_upper', old('popup_title_upper', $homePage->popup_title_upper ?? ''), [
                            'class' => 'form-control required',
                            'placeholder' => 'Enter Title Upper Text',
                        ]) !!}
                    </div>
                </div>

                <div class="form-group row mb-4">
                    {!! Form::label('map', 'Map', ['class' => 'col-md-3 control-label required-star']) !!}
                    <div class="col-md-9">
                        {!! Form::text('map', old('map', $homePage->map ?? ''), [
                            'class' => 'form-control required',
                            'placeholder' => 'Enter Map',
                        ]) !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
