@component('mail::message')
# Hello

Kindly review the requistion from  <b>{{ $data->name }}</b>


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

<table class="table tabl">
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
        @foreach ($data->requisitions as $item)
        <tr>
            <td>1</td>
            <td>{{$item['Item']}}</td>
            <td>{{$item['description']}}</td>
            <td>{{$item['quantity']}}</td>
            <td>{{$item['cost']}}</td>
            <td class="amount">{{$item['total']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>



<a class="btn btn-primary" href="{{ $url_2 }}"
    style="background: #0d6efd;border: 1px solid transparent;padding: .375rem .75rem;font-size: 1rem;border-radius: .25rem;color: #fff;cursor: pointer;text-decoration: none;">Approve</a>
<a class="btn btn-primary" href="{{ $url_1 }}"
    style="background: #b02a37;border: 1px solid transparent;padding: .375rem .75rem;font-size: 1rem;border-radius: .25rem;color: #fff;cursor: pointer;text-decoration: none;">Reject</a>


{{-- @component('mail::button', ['url' => $url_1])
Reject
@endcomponent

@component('mail::button', ['url' => $url_2])
Approve
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
