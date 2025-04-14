<!-- Call Delivery Number -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary form-card">
            <div class="card-header">
                <h3 class="card-title pt-2 pb-2">Call Delivery Number</h3>
            </div>
            <div class="card-body demo-vertical-spacing">
                <div class="form-group row mb-4">
                    {!! Form::label('call_delivery_number', 'Call Delivery Number', [
                        'class' => 'control-label required-star',
                    ]) !!}
                    {!! Form::text('call_delivery_number', old('call_delivery_number', $homePage->call_delivery_number ?? ''), [
                        'class' => 'form-control required',
                        'placeholder' => 'Enter Delivery Number',
                    ]) !!}
                </div>
            </div>
        </div>
    </div>
</div>
