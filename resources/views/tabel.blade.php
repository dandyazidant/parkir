@extends('default')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="text-center">
                <h2>Simulasi Parking</h2>
            </div>
            <div class="card">
                <div class="card-header">
                    {{-- <a href="{{ route('create') }}" class="btn btn-primary">Check In</a> --}}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCheckIn">
                        Check In
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCheckOut">
                        Check Out
                    </button>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nomor Polisi</th>
                                <th scope="col">Tanggal Masuk</th>
                                <th scope="col">Jam Masuk</th>
                                <th scope="col">Tanggal Keluar</th>
                                <th scope="col">Jam Keluar</th>
                                <th scope="col">Jenis Kendaraan</th>
                                <th scope="col">Biaya Parkir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parkir as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$item->nomor_polisi}}</td>
                                    <td>{{$item->tanggal_masuk}}</td>
                                    <td>{{$item->jam_masuk}}</td>
                                    <td>{{$item->tanggal_keluar}}</td>
                                    <td>{{$item->jam_keluar}}</td>
                                    <td>{{$item->jenis_kendaraan}}</td>
                                    <td>{{$item->biaya_parkir}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalCheckIn" tabindex="-1" aria-labelledby="modalCheckInLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalCheckInLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nomor_polisi">Nomor Polisi</label>
                            <input type="text" class="form-control" placeholder="Nomor Polisi" name="nomor_polisi" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="text" class="form-control" placeholder="Tanggal Masuk" name="tanggal_masuk"
                                value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jam_masuk">Jam Masuk</label>
                            <input type="text" class="form-control" placeholder="Jam Masuk" name="jam_masuk"
                                value="{{ \Carbon\Carbon::now()->format('H:i') }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kendaraan">Jenis Kendaraan</label>
                            <input type="text" class="form-control" placeholder="Jenis Kendaraan" name="jenis_kendaraan" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modalCheckOut" tabindex="-1" aria-labelledby="modalCheckOutLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalCheckOutLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('storecheckout')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nomor_polisi">Nomor Polisi</label>
                            <select name="nomor_polisi" id="nomor_polisi" class="form-control">
                                <option value="" selected disabled>--Pilih Nomor Polisi--</option>
                                @foreach ($parkir as $nopol)
                                    <option value="{{$nopol->id}}">{{$nopol->nomor_polisi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group col-6">
                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                <input type="text" class="form-control" placeholder="Tanggal Masuk" id="tanggal_masuk" name="tanggal_masuk"
                                    readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="jam_masuk">Jam Masuk</label>
                                <input type="text" class="form-control" placeholder="Jam Masuk" id="jam_masuk" name="jam_masuk"
                                readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_keluar">Tanggal Keluar</label>
                            <input type="date" class="form-control" placeholder="Tanggal Keluar" id="tanggal_keluar" name="tanggal_keluar">
                        </div>
                        <div class="form-group">
                            <label for="jam_keluar">Jam Keluar</label>
                            <input type="time" class="form-control" placeholder="Jam Keluar" id="jam_keluar" name="jam_keluar">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kendaraan">Jenis Kendaraan</label>
                            <input type="text" class="form-control" placeholder="Jenis Kendaraan" id="jenis_kendaraan" name="jenis_kendaraan" readonly>
                        </div>
                        <div class="form-group">
                            <label for="biaya_parkir">Biaya Parkir</label>
                            <input type="text" class="form-control" placeholder="Biaya Parkir" id="biaya_parkir" name="biaya_parkir" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#jam_keluar').on('change', function(){
                var jam_masuk  = $('#jam_masuk').val();
                var jam_keluar = $(this).val();
                var timeDiff = jam_keluar - jam_masuk; //in ms
                // strip the ms
                timeDiff /= 1000;

                // get seconds 
                var seconds = Math.round(timeDiff);
                console.log(seconds + " seconds");
                // console.log(jam);
            });
            $('#nomor_polisi').on('change',function(){
                var optionText = $("#nomor_polisi option:selected").val();
                console.log(optionText);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {id:optionText},
                    url: "{{ route('get_data') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#tanggal_masuk').val(data.tanggal_masuk);
                        $('#jam_masuk').val(data.jam_masuk);
                        $('#jenis_kendaraan').val(data.jenis_kendaraan);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });
        });
    </script>
@endsection
