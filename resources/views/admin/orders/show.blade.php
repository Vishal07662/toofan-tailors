
@extends('master')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div class="flex-1 p-6">
        <x-admin.form
            :entity="'orders'"
            :entityObject="$order"
            :title="$pageTitle"
            :action="'update'"
        >
            <x-form.input :name="'reference'" :label="'Order Unique Id'" 
            {{-- readonly class="hover:cursor-not-allowed" --}}
            >{{ $order->reference }}</x-form.input>
            <x-form.input :name="'phone'" :label="'Contact Phone'" value="">{{ $order->phone }}</x-form.input>
            <x-form.select :name="'order_state_id'" :label="'Order State'" :list="$orderStates" :selected="$order->order_state_id"/>
            <x-form.input :name="'total_paid'" :label="'Amount Paid'">{{ $order->total_paid }}</x-form.input>
            <x-form.input :name="'order_amount'" :label="'Order Amount'">{{ $order->order_amount }}</x-form.input>
            <x-form.textarea :name="'notes'" :label="'Notes'" :rows="3">{{ $order->notes }}</x-form.textarea>
            
        </x-admin.form>       
    </div>
@endsection
