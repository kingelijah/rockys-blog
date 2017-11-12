 @extends('admin.app')

@section('main-content')
  <div class="content-wrapper">
    <section class="content">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Admin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('user.update',$users->id)}}">

            {{csrf_field()}}
            {{method_field('PUT')}}

             @include('include.message')

              <div class="box-body">
              <div class="col-md-6 col-md-offset-2">

                <div class="form-group">
                  <label for="name">User Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="@if (old('name')){{old('name')}} @else{{$users->name}}@endif " >
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="@if (old('email')){{old('email')}} @else{{$users->email}}@endif " >
                </div>
                            
                
                <div class="form-group">
                  <label>Assign Role</label>
                  <div class="row">
                  @foreach($roles as $role)
                  <div class="col-lg-3">
                  <div class="checkbox">

                  <label><input type="checkbox" name="role[]" value="{{$role->id}}"
                   @foreach($users->roles as $userrole)
                    @if($userrole->id == $role->id)
                      checked
                    @endif
                   @endforeach
                  >{{$role->name}} </label>
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