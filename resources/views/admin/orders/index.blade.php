@extends('master')

@section('header')
    @include('admin.header')
@endsection

@section('content')

    <x-admin.list.table
        :title="$pageTitle"
        :headers="['Id','Reference','Customer','Status','Amount','Paid','Actions']"
        :actions="[
            'add' => ['title' => '+ Add Order', 'route' => 'admin.orders.create']
        ]"
    >
        <x-admin.list.tbody
            :items="$orders"
            :rowCount="7"
        />
    </x-admin.list.table>

@endsection
