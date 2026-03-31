@extends('master')

@section('header')
    @include('admin.header')
@endsection

@section('content')

    <x-admin.list.table
        :title="$pageTitle"
        :headers="['Id', 'Name', 'Email', 'Role', 'Phone', 'Actions']"
        :actions="[
            'add' => ['title' => '+ Add User', 'route' => 'admin.users.create', 'btn_color' => 'bg-blue']
        ]"
    >
        <x-admin.list.tbody
            :items="$users"
            :rowCount="'6'"
            :itemIndexes="['id', 'name', 'email', 'role' => ['type' => 'text', 'data' => $userRoles], 'phone']"
            :actions="['edit' => 'Edit', 'delete' => 'DELETE']"
            :listType="'users'"
        />
    </x-admin.list.table>

@endsection
