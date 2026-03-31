
@extends('master')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div class="flex-1 p-6">
        <x-admin.form
            :entity="'users'"
            :entityObject="$user"
            :title="$pageTitle"
            :action="'update'"
        >
            <x-form.input :name="'name'" :label="'User Name'">{{ $user->name }}</x-form.input>
            <x-form.input :name="'email'" :label="'User Email'">{{ $user->email }}</x-form.input>
            <x-form.input :name="'password'" :label="'Password'" :type="'password'"></x-form.input>
            <x-form.input :name="'phone'" :label="'Contact Phone'">{{ $user->phone }}</x-form.input>
            <x-form.select :name="'role'" :label="'Role'" :list="$userRoles" :selected="$user->role"></x-form.input>
        </x-admin.form>       
    </div>
@endsection
