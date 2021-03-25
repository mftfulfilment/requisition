@component('mail::message')
# Hello

The requistion made by  <b>{{ $data->name }}</b> from <b>{{ $data->Country }}</b> has been approved.

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
            <th>Item</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Cost</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data->requisitions as $key => $item)
        <tr>
            <td> {{ $key + 1 }} </td>
            <td>{{$item['Item']}}</td>
            <td>{{$item['description']}}</td>
            <td>{{$item['quantity']}}</td>
            <td>{{$item['cost']}}</td>
            <td class="amount">{{$item['total']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
