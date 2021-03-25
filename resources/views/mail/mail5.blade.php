@component('mail::message')
# Hello

Kindly confirm that you have requisitioned for the following items:

<hr>
<style>
    .table {
        --bs-table-bg: transparent;
        --bs-table-striped-color: #212529;
        --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
        --bs-table-active-color: #212529;
        --bs-table-active-bg: rgba(0, 0, 0, 0.1);
        --bs-table-hover-color: #212529;
        --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        vertical-align: top;
        border-color: #dee2e6;
    }

    table {
        caption-side: bottom;
        border-collapse: collapse;
    }
</style>

<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>No.</th>
            <th>Requisition_id</th>
            <th>orderID</th>
            <th>from</th>
            <th>to</th>
            <th>airtime</th>
            <th>amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data->requests as $key => $orderID)
        <tr>
            <td> {{ $key + 1 }} </td>
            <td>{{$orderID['requisition_id']}}</td>
            <td>{{$orderID['orderID']}}</td>
            <td>{{$orderID['from']}}</td>
            <td>{{$orderID['to']}}</td>
            <td>{{$orderID['airtime']}}</td>
            <td>{{$orderID['amount']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
