<!-- Menu List -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary form-card">
            <div class="card-header">
                <h3 class="card-title pt-2 pb-2">Menu List</h3>
            </div>
            <div class="card-body demo-vertical-spacing">
                <div class="form-group row mb-4">
                    <div class="col-md-12">
                        <div id="menu-fields">
                            @php
                                $menu_lists = old('menu_list', json_decode($homePage->menu_list ?? '[]', true));

                                $menu_count = count($menu_lists);
                            @endphp
                            @for ($i = 0; $i < $menu_count; $i++)
                                <div class="menu-group border p-3 mb-3">
                                    <div class="form-group mb-2">
                                        {!! Form::text('menu_list[]', $menu_lists[$i] ?? '', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter Menu List Name',
                                        ]) !!}
                                    </div>
                                    <button type="button" class="btn btn-secondary remove-menu">Remove</button>
                                </div>
                            @endfor
                        </div>
                        <button type="button" id="add-menu" class="btn btn-primary mt-2">Add
                            Menu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    // Menu List ==============================
    $('#add-menu').click(function() {
        let html = `
                <div class="menu-group border p-3 mb-3">
                    <div class="form-group mb-2">
                        <input type="text" name="menu_list[]" class="form-control" placeholder="Enter Menu List Name">
                    </div>
                    <button type="button" class="btn btn-secondary remove-menu">Remove</button>
                </div>`;
        $('#menu-fields').append(html);
    });

    $(document).on('click', '.remove-menu', function() {
        $(this).closest('.menu-group').remove();
    });
</script>
