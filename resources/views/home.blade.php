@extends('layouts.app')
@section('styles')
    @parent
@endsection

@section('content')
    <div class = "body-wrapper">
        <div class = "text-header">
            Top - 3 most valuable coins
        </div>
        <table width="100%">
            <thead>
                <tr>
                    <th width = '5%'>№</th>
                    <th width = '15%'>Icon</th>
                    <th width = '30%'>Name</th>
                    <th width = '30%'>Price</th>
                    <th width = '20%'>Daily change %</th>
                </tr>
            </thead>
            <tbody>
                @php($count = count($coins))
                @for($i = 0;$i<$count;$i++)
                    @php($coin = $coins[$i])
                    <tr>
                        <td>
                            {{$i}}
                        </td>
                        <td>
                            <img src="{{$coin['img']}}" alt = "{{$coin['name']}}" class = "img-responsive" />
                        </td>
                        <td>
                            {{$coin['name']}}
                        </td>
                        <td>
                            {{$coin['price']}}
                        </td>
                        <td>
                            {{$coin['daily_change']}}
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
@endsection