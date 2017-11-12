 @extends('admin.app')

@section('main-content')
  <div class="content-wrapper">
    <section class="content">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create roles</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('role.store')}}">

            {{csrf_field()}}

             @include('include.message')

              <div class="box-body">
              <div class="col-md-6 col-md-offset-2">

                <div class="form-group">
                  <label for="name">Role title</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="role ">
                </div>

                
                <div class="col-md-6">
                  <label for="name">posts permissions</label>
                  @foreach($permissions as $permission)
                  
                  @if($permission->for== 'post')
                   
                   <div class="checkbox">
                   <label><input type="checkbox" name="permissions[]" value="{{$permission->id}}" >{{$permission->name}} </label>
                   </div>
                  
                  @endif
                  
                  @endforeach
                 </div>
                  <div class="col-md-6">
                  <label for="name">users permissions</label>
                  
                  @foreach($permissions as $permission)
                 
                  @if($permission->for== 'user')
                   
                   <div class="checkbox">
                   <label><input type="checkbox" name="permissions[]" value="{{$permission->id}}" >{{$permission->for}} </label>
                   </div>
                  
                  @endif
                  
                  @endforeach
                </div>

                

                
                
              <!-- /.box-body -->
               <div class="col-md-12 col-md-offset-2">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('role.index')}}" class="btn btn-warning">Back</a>
              </div>
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