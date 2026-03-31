
@extends('master')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div class="flex-1 p-6">
        <x-admin.form
            :entity="'orders'"
            :title="$pageTitle"
        >
            <x-form.input :name="'reference'" :label="'Order Unique Id'" value=""/>
            <x-form.input :name="'phone'" :label="'Contact Phone'" value=""/>
            <x-form.select :name="'order_state_id'" :label="'Order State'" :list="$orderStates"/>
            <x-form.input :name="'total_paid'" :label="'Amount Paid'" value=""/>
            <x-form.input :name="'order_amount'" :label="'Order Amount'" value=""/>
            <x-form.textarea :name="'notes'" :label="'Notes'" :rows="3" value=""/>
            
        </x-admin.form>       
    </div>
@endsection
