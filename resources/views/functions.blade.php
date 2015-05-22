@extends('api-search::layout')

@section('content')

<div class="pure-g">

<div class="pure-u-1 pure-u-md-1-5">
<div class="pure-menu">
    <span class="pure-menu-heading">ダウンロード</span>
    <ul class="pure-menu-list">
        <li class="pure-menu-item"><a class="pure-menu-link" href="{{ Request::url() }}/names.csv"><i class="fa fa-download"></i> 名前のみ(CSV)</a></li>
    </ul>
</div>
</div>

<div class="pure-u-1 pure-u-md-4-5">
<table class="pure-table pure-table-bordered">
	<thead>
        <tr>
            <th>#</th>
            <th>名前</th>
            <th>シグネチャ</th>
        </tr>
	</thead>

	<tbody>
<?php $counter = 1; ?>
@foreach ($functions as $name => $info)
        <tr>
            <td rowspan="2">{{ $counter++ }}</td>
            <td>{{ $name }}</td>
            <td>{{ $info['signature'] }}</td>
        </tr>
        <tr>
            <td colspan="2"><pre>{{ $info['docblock'] }}</pre></td>
        </tr>
@endforeach
	</tbody>

</table>
</div>

</div>

@stop
