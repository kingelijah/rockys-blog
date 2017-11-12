 @extends('admin.app')

@section('main-content')
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Permission</h3>
            </div>
            <form role="form" method="post" action="{{route('permission.update',$permissions->id)}}">

            {{csrf_field()}}
            {{method_field('PUT')}}

             @include('include.message')

              <div class="box-body">
              <div class="col-md-6 col-md-offset-3">

                <div class="form-group">
                  <label for="name"  >permission name</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{$permissions->name}}" placeholder="Enter permission">
                </div>
                <div class="form-group">
                  <label for="for">permission for</label>
                  <input type="text" class="form-control" id="for" name="for" value="{{$permissions->for}}" placeholder="for">
                </div>
                <div class="box-footer col-md-offset-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('permission.index')}}" class="btn btn-warning">Back</a>
              </div>
                </div>

              
          </div>
          </form>
        </div>
        <!-- /.col-->
      </div>
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection