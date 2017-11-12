 @extends('admin.app')

@section('main-content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
            
    <!-- Main content -->
    <section class="content">
    <div class="box box-primary">
    <div class="box-header with-border">
                <h3 class="box-title">Edit roles</h3>
            </div>
      <div class="row">
        <div class="col-md-12">
          <!-- /.box -->
           
            <!-- form start -->
            <form role="form" method="post" action="{{route('role.update',$roles->id)}}">

            {{csrf_field()}}
            {{method_field('PUT')}}

             @include('include.message')

              <div class="box-body">
              <div class="col-md-6 col-md-offset-3">

                <div class="form-group">
                  <label for="name"  >Role name</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{$roles->name}}" placeholder="Enter role">
                </div>
                <div class="col-md-6">
                  <label for="name">posts permissions</label>
                  @foreach($permissions as $permission)
                  
                  @if($permission->for== 'post')
                   
                   <div class="checkbox">
                   <label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                     @foreach($roles->permissions as $rolepermit)
                    @if($rolepermit->id == $permission->id)
                      checked
                    @endif
                    @endforeach
                    >{{$permission->name}} </label>
                   </div>
                  
                  @endif
                  
                  @endforeach
                 </div>
                  <div class="col-md-6">
                  <label for="name">users permissions</label>
                  
                  @foreach($permissions as $permission)
                 
                  @if($permission->for== 'user')
                   
                   <div class="checkbox">
                   <label><input type="checkbox" name="permission[]" value="{{$permission->id}}" 
                    @foreach($roles->permissions as $rolepermit)
                    @if($rolepermit->id == $permission->id)
                      checked
                    @endif
                    @endforeach
                   >{{$permission->name}} </label>
                   </div>
                  
                  @endif
                  
                  @endforeach
                </div>
                <div class="col-md-12 col-md-offset-3 ">
                 <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('role.index')}}" class="btn btn-warning">Back</a>
              </div>
              </div>

                </div>
                
              <!-- /.box-body -->

              
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