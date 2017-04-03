@extends('layout.master')
@section('title') Dashboard @endsection
@section('styles')
   <link href="{{ URL::to('css/app.css') }}" rel="stylesheet" type="text/css">
<style>
    table, th, td {
     border: 1px solid black;
     }
     table th {
         text-align: center;
     }
     th, td {
        padding: 15px;
        text-align: center;
    }
 </style>
@endsection

@section('section')

<div class="container">
    @include('dashboard.header')
    @if(isset($products))
        <table style="width:100%">
            <thead>
                <tr>
                    <th>שם הסופר</th>
                    <th>שם סניף</th>
                    <th>שם המוצר</th>
                    <th>קוד מוצר</th>
                    <th>מחיר</th>
                    <th>סטטוס</th>
                    <th>עודכן בתאריך</th>
                </tr>
            </thead>
            <tbody>
           <!--  isEmpty($product->shope())?$product->shope()->first()->shope_name:$shopes::findOrfail($product->shope_id)->first()->shope_name  -->
                    
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $shopes->where('id',$product->shope_id)->first()->shopeName  }}</td>
                        <td>{{ $shopes->where('id',$product->shope_id)->first()->branche  }}</td>
                        <td>{{ $product->ItemName }}</td>
                        <td>{{ $product->ItemCode }}</td>
                        <td>{{ $product->ItemPrice }} ש"ח</td>
                        <td>{{ $product->ItemStatus }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td><div class="btn btn-warning">ערוך</div></td>
                        <td><div class="btn btn-danger">מחק</div></td>
                    </tr>
                    @endforeach
               
            </tbody>
        </table>
    @endif
</div>

@endsection