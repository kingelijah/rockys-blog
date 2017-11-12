 @extends('admin.app')

@section('main-content')
  <div class="content-wrapper">
    <section class="content">
     <div class="row">
    
        <div class="col-md-12">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Permission</h3>
            </div>
            <form role="form" method="post" action="{{route('permission.store')}}">

            {{csrf_field()}}

             @include('include.message')

              <div class="box-body">
              <div class="col-md-6 col-md-offset-2">

                <div class="form-group">
                  <label for="name">name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="permission name">
                </div>
                <div class="form-group">
                  <label for="for">for</label>
                  <input type="text" class="form-control" name="for" id="for" placeholder="permission for">
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer col-md-offset-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('permission.index')}}" class="btn btn-warning">Back</a>
              </div>
              </div>
                
          </div>
          </form>
        </div>
        </div>
        </div>
        </div>
        
        <!-- /.col-->
      </div>
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection