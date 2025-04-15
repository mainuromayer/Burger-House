<!-- Events -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary form-card">
            <div class="card-header">
                <h3 class="card-title pt-2 pb-2">Events</h3>
            </div>
            <div class="card-body demo-vertical-spacing">
                <div class="form-group row mb-4">
                    <div class="col-md-12">
                        <div id="event-fields">
                            @php
                                $events_section_labels = old(
                                    'events_section_label',
                                    json_decode($homePage->events_section_label ?? '[]', true),
                                );
                                $events_section_titles = old(
                                    'events_section_title',
                                    json_decode($homePage->events_section_title ?? '[]', true),
                                );
                                $events_section_subtitles = old(
                                    'events_section_subtitle',
                                    json_decode($homePage->events_section_subtitle ?? '[]', true),
                                );
                                $events_item_images = old(
                                    'events_item_image',
                                    json_decode($homePage->events_item_image ?? '[]', true),
                                );
                                $event_count = max(
                                    count($events_section_labels),
                                    count($events_section_titles),
                                    count($events_section_subtitles),
                                    count($events_item_images),
                                );
                            @endphp
                            @for ($i = 0; $i < $event_count; $i++)
                                <div class="event-group border p-3 mb-3">
                                    <div class="form-group mb-2">
                                        {!! Form::label('events_section_label[]', 'Label') !!}
                                        {!! Form::text('events_section_label[]', $events_section_labels[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter event section label',
                                        ]) !!}
                                    </div>
                                    <div class="form-group mb-2">
                                        {!! Form::label('events_section_title[]', 'Title') !!}
                                        {!! Form::text('events_section_title[]', $events_section_titles[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter event section title',
                                        ]) !!}
                                    </div>
                                    <div class="form-group mb-2">
                                        {!! Form::label('events_section_subtitle[]', 'Subtitle') !!}
                                        {!! Form::text('events_section_subtitle[]', $events_section_subtitles[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter event section subtitle',
                                        ]) !!}
                                    </div>

                                    <div class="form-group mb-2 row has-feedback">
                                        <div class="col-md-12 addImages">
                                            <label class="center-block image-upload" for="events_item_image_{{ $i }}">
                                                <figure>
                                                    <img src="{{ !empty($events_item_images[$i]) ? url($events_item_images[$i]) : url('/assets-2/img/events/575x445.jpg') }}"
                                                        class="img-responsive img-thumbnail"
                                                        id="events_item_image_preview_{{ $i }}"
                                                        style="width:575px; height:445px; object-fit:cover;">
                                                </figure>
                                                <input type="hidden"
                                                    id="events_item_image_base64_{{ $i }}"
                                                    name="events_item_image_base64[]" value="">
                                                @if (!empty($events_item_images[$i]))
                                                    <input type="hidden" name="events_item_image[]"
                                                        value="{{ $events_item_images[$i] }}" />
                                                @endif
                                            </label>
                                        </div>
                                        <div class="col-md-12 pb-3">
                                            <h4><label for="events_item_image_{{ $i }}" class="required-star">Event Image</label></h4>
                                            <p class="text-success fw-bold small">[File Format: *.jpg/ .jpeg/ .png | Width 575PX, Height 445PX]</p>
                                            <span id="events_item_image_err_{{ $i }}" class="text-danger" style="font-size: 10px;"></span>
                                            <input type="file" class="form-control" name="events_item_image_file[]"
                                                id="events_item_image_{{ $i }}"
                                                onchange="imageUploadWithCropping(this, 'events_item_image_preview_{{ $i }}', 'events_item_image_base64_{{ $i }}')"
                                                size="575x445">
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-secondary remove-event">Remove</button>
                                </div>
                            @endfor
                        </div>
                        <button type="button" id="add-event" class="btn btn-primary mt-2">Add Event</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let eventIndex = {{ $event_count }}; // Start index from the current count

    $('#add-event').click(function() {
        let html = `
            <div class="event-group border p-3 mb-3">
                <div class="form-group mb-2">
                    <label>Label</label>
                    <input type="text" name="events_section_label[]" class="form-control" placeholder="Enter event section label">
                </div>
                <div class="form-group mb-2">
                    <label>Title</label>
                    <input type="text" name="events_section_title[]" class="form-control" placeholder="Enter event section title">
                </div>
                <div class="form-group mb-2">
                    <label>Subtitle</label>
                    <input type="text" name="events_section_subtitle[]" class="form-control" placeholder="Enter event section subtitle">
                </div>

                <div class="form-group mb-2 row has-feedback">
                    <div class="col-md-12 addImages">
                        <label class="center-block image-upload" for="events_item_image_${eventIndex}">
                            <figure>
                                <img src="/assets-2/img/events/575x445.jpg"
                                    class="img-responsive img-thumbnail"
                                    id="events_item_image_preview_${eventIndex}" style="width:575px; height:445px; object-fit:cover;">
                            </figure>
                            <input type="hidden" id="events_item_image_base64_${eventIndex}" name="events_item_image_base64[]" value="">
                        </label>
                    </div>
                    <div class="col-md-12 pb-3">
                        <h4><label for="events_item_image_${eventIndex}" class="required-star">Event Image</label></h4>
                        <p class="text-success fw-bold small">[File Format: *.jpg/ .jpeg/ .png | Width 575PX, Height 445PX]</p>
                        <span id="events_item_image_err_${eventIndex}" class="text-danger" style="font-size: 10px;"></span>
                        <input type="file" class="form-control" name="events_item_image_file[]"
                            id="events_item_image_${eventIndex}"
                            onchange="imageUploadWithCropping(this, 'events_item_image_preview_${eventIndex}', 'events_item_image_base64_${eventIndex}')"
                            size="575x445">
                    </div>
                </div>

                <button type="button" class="btn btn-secondary remove-event">Remove</button>
            </div>`;
        $('#event-fields').append(html);
        eventIndex++; // Increment the index for the next event
    });

    $(document).on('click', '.remove-event', function() {
        $(this).closest('.event-group').remove();
    });
</script>
