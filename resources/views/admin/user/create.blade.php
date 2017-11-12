 @extends('admin.app')

@section('main-content')
  <div class="content-wrapper">
    <section class="content">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Admin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('user.store')}}">

            {{csrf_field()}}

             @include('include.message')

              <div class="box-body">
              <div class="col-md-6 col-md-offset-2">

                <div class="form-group">
                  <label for="name">User name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter category">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="password">
                </div>
                <div class="form-group">
                  <label for="password_confirmation">Confirm password</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirm password">
                </div>                
                
                <div class="form-group">
                  <label>Assign role</label>
                  <div class="row">
                  @foreach($roles as $role)
                  <div class="col-lg-3">
                  <div class="checkbox">
                  <label><input type="checkbox" name="role[]" value="{{$role->id}}">{{$role->name}} </label>
                 </div>
                </div>
                  @endforeach
                </div>
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer col-md-offset-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('user.index')}}" class="btn btn-warning">Back</a>
              </div>
              </div>
                
          </div>
          </form>
        </div>
        
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection