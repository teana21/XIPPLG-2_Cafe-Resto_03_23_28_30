@extends('components.admin.layouts.app')

@section('title', 'Orders')

@section('content')

    <!-- Alert Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Responsive Table Product-->
    <div class="card pb-3 mt-4">
        <div class="flex px-3" style="display: flex; justify-content: space-between; align-items: center;">
            <h5 class="card-header ps-0">Table Order</h5>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>No Telepon</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $order->no_telp }}</td>
                            <td>Rp. {{ number_format($order->price, 0) }}</td>
                            <td>
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary">Selesai</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <!--/ Responsive Table -->

@endsection
