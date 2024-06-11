@extends('admin.layout.index')

@section('content')
    <div class="card rounded-full p-2">
        <input type="text" wire:model="search" class="form-control w-25" placeholder="Search....">
        <div class="card-body">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Id Transaksi</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nilai Trx</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $x => $item)
                        <tr class="align-middle">
                            <td>{{ ++$x }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->code_transaksi }}</td>
                            <td>{{ $item->nama_customer }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->total_harga }}</td>
                            <td>
                                <span class="align-middle {{ $item->status === 'Paid' ? 'badge bg-success text-white' : 'badge bg-danger text-white' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination d-flex flex-row justify-content-between">
                <div class="showData">
                    Data ditampilkan {{ $data->count() }} dari {{ $data->total() }}
                </div>
                <div>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>

    <h1>Transactions Report</h1>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Id Transaksi</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nilai Trx</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $x => $transaction)
            <tr>
                <td>{{ ++$x }}</td>
                <td>{{ $transaction->created_at }}</td>
                <td>{{ $transaction->code_transaksi }}</td>
                <td>{{ $transaction->nama_customer }}</td>
                <td>{{ $transaction->alamat }}</td>
                <td>{{ $transaction->total_harga }}</td>
                <td>
                    <span class="align-middle {{ $transaction->status === 'Paid' ? 'badge bg-success text-white' : 'badge bg-danger text-white' }}">
                        {{ $transaction->status }}
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
