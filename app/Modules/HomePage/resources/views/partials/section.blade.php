<!-- Section -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary form-card">
            <div class="card-header">
                <h3 class="card-title pt-2 pb-2">Section</h3>
            </div>
            <div class="card-body demo-vertical-spacing">
                <div class="input-group row mb-4">
                    <div class="col-md-12">
                        <div id="section-fields">
                            @php
                                $section_labels = old(
                                    'section_label',
                                    json_decode($homePage->section_label ?? '[]', true),
                                );
                                $section_titles = old(
                                    'section_title',
                                    json_decode($homePage->section_title ?? '[]', true),
                                );
                                $section_subtitles = old(
                                    'section_subtitle',
                                    json_decode($homePage->section_subtitle ?? '[]', true),
                                );
                                $section_count = max(
                                    count($section_labels),
                                    count($section_titles),
                                    count($section_subtitles),
                                );
                            @endphp
                            @for ($i = 0; $i < $section_count; $i++)
                                <div class="section-group border p-3 mb-3">
                                    <div class="form-group mb-2">
                                        {!! Form::label('section_label[]', 'Label') !!}
                                        {!! Form::text('section_label[]', $section_labels[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter section label',
                                        ]) !!}
                                    </div>
                                    <div class="form-group mb-2">
                                        {!! Form::label('section_title[]', 'Title') !!}
                                        {!! Form::text('section_title[]', $section_titles[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter section title',
                                        ]) !!}
                                    </div>
                                    <div class="form-group mb-2">
                                        {!! Form::label('section_subtitle[]', 'Subtitle') !!}
                                        {!! Form::text('section_subtitle[]', $section_subtitles[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter section subtitle',
                                        ]) !!}
                                    </div>
                                    <button type="button" class="btn btn-secondary remove-section">Remove</button>
                                </div>
                            @endfor
                        </div>
                        <button type="button" id="add-section" class="btn btn-primary mt-2">Add Section</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    // Section ==============================
    $('#add-section').click(function() {
        let html = `
        <div class="section-group border p-3 mb-3">
            <div class="form-group mb-2">
                <label>Label</label>
                <input type="text" name="section_label[]" class="form-control" placeholder="Enter label">
            </div>
            <div class="form-group mb-2">
                <label>Title</label>
                <input type="text" name="section_title[]" class="form-control" placeholder="Enter title">
            </div>
            <div class="form-group mb-2">
                <label>Subtitle</label>
                <input type="text" name="section_subtitle[]" class="form-control" placeholder="Enter subtitle">
            </div>
            <button type="button" class="btn btn-secondary remove-section">Remove</button>
        </div>`;
        $('#section-fields').append(html);
    });

    $(document).on('click', '.remove-section', function() {
        $(this).closest('.section-group').remove();
    });
</script>
