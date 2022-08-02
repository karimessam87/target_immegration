@extends('layouts.backend-settings')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">


        <form action="{{route('settings.theme')}}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="form-group row">
                <div class="col-6">
                    <label class="form-label">Currency Code</label>
                    <input type="text" name="currency_code" value="{{$settings->currency_code}}" class="form-control">
                </div>
                <div class="col-6">
                    <label class="form-label">Currency Symbol</label>
                    <input type="text" name="currency_symbol" value="{{$settings->currency_symbol}}" class="form-control">
                </div>
            </div>
            <div class="submit-section">
                <button type="submit" class="btn btn-primary submit-btn">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection


