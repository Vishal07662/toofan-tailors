@extends('master')

@section('header')
    @include('admin.header')
@endsection

@section('content')

    <x-admin.list.table
        :title="$pageTitle"
        :headers="['Id', 'Reference', 'Status', 'Amount', 'Paid', 'Actions']"
        :actions="[
            'add' => ['title' => '+ Add Order', 'route' => 'admin.orders.create', 'btn_color' => 'bg-blue']
        ]"
    >
        <x-admin.list.tbody
            :items="$orders"
            :rowCount="'6'"
            :itemIndexes="['id', 'reference', 'order_state_id' => ['type' => 'badge', 'data' => $orderStates], 'order_amount', 'total_paid']"
            :actions="['edit' => 'Edit', 'delete' => 'DELETE']"
            :listType="'orders'"
        />
    </x-admin.list.table>

@endsection
