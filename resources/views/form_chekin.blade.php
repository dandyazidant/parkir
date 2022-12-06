@extends('default')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="text-center">
                <h2>Simulasi Parking</h2>
            </div>
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="name@example.com">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
