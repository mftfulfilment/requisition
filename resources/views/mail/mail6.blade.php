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

<a class="btn btn-primary" href="{{ $url_2 }}"
    style="background: #0d6efd;border: 1px solid transparent;padding: .375rem .75rem;font-size: 1rem;border-radius: .25rem;color: #fff;cursor: pointer;text-decoration: none;">Approve</a>
<a class="btn btn-primary" href="{{ $url_1 }}"
    style="background: #b02a37;border: 1px solid transparent;padding: .375rem .75rem;font-size: 1rem;border-radius: .25rem;color: #fff;cursor: pointer;text-decoration: none;">Reject</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
