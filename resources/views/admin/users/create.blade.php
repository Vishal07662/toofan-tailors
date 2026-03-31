
@extends('master')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div class="flex-1 p-6">
        <x-admin.form
            :entity="'users'"
            :title="$pageTitle"
        >
            <x-form.input :name="'name'" :label="'User Name'" value=""/>
            <x-form.input :name="'email'" :label="'User Email'" value=""/>
            <x-form.input :name="'password'" :label="'Password'" :type="'password'" value=""/>
            <x-form.input :name="'phone'" :label="'Contact Phone'" value=""/>
            <x-form.select :name="'role'" :label="'Role'" :list="$userRoles"/>
        </x-admin.form>       
    </div>
@endsection
