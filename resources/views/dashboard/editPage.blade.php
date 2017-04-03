@extends('layout.master')
@section('title') Dashboard @endsection
@section('styles')
   <link href="{{ URL::to('css/app.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('section')

<div class="container">
<form class="navbar-form navbar-right" action="{{  action('ProductConroller@update') }}" method="POST">
        
        @if(isset($shopes))
        <select name="shopeName" class="form-control">
          <option>שם הסופר</option>
          @foreach($shopes as $shope)
            <option value="{{ $shope->shopeName }}">{{ $shope->shopeName }}</option>
          @endforeach
        </select>
        @endif
        <div class="form-group">
          <input type="text" name="ItemCode" class="form-control" placeholder="קוד פריט">
        </div>
         <div class="form-group">
          <input type="text" name="branche" class="form-control" placeholder="שם הסניף">
        </div>
        <div class="form-group">
          <input type="text" name="ItemStatus" class="form-control" placeholder="סטטוס">
        </div>
        <div class="form-group">
          <input type="text" name="freeSearch" class="form-control" placeholder="חיפוש חופשי">
        </div>
        <button type="submit" class="btn btn-default">חפש</button>
      </form>
</div>

@endsection