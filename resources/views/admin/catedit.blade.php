@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h3>Редактировать</h3>
                    <form action="{{ route('cat.update', ['id'=>$cats->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @include('admin.parts.formCatEdit')
                        <input type="submit" value="Редактировать" class="btn btn-outline-success">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection