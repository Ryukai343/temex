@extends('layouts/app')
@section('header_text')
    Objednávky
@endsection
@section('content')
<article>
    <div class="container py-3">
        <table id="ordersTable" class="table table-striped table-bordered table-sm">
            <thead>
            <tr>
                <th class="th-sm text-center">ID objednávky</th>
                <th class="th-sm text-center">Email</th>
                <th class="th-sm text-center">Cena</th>
                <th class="th-sm text-center">Status</th>
                <th class="th-sm text-center">Dátum vytvorenia</th>
                <th class="th-sm text-center">Detail objednávky</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td class="text-center">{{$order->id}}</td>
                    <td class="text-center">{{$order->email}}</td>
                    <td class="text-center">{{$order->total_price}}€</td>
                    <td class="text-center">{{$order->status}}</td>
                    <td class="text-center">{{$order->created_at}}</td>
                    <td class="text-center"><a href="{{route('order.detail', $order)}}" class="btn btn-primary btn-sm">Detail</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</article>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    let table = new DataTable('#ordersTable');
</script>
@endsection
