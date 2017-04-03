<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <form class="navbar-form navbar-right" action="{{  action('ProductConroller@search') }}" method="GET">
        
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
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>