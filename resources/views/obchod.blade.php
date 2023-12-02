@extends('layouts/app')
@section('content')
    <article>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Picture</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->picture }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </article>
@endsection
