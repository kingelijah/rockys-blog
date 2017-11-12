 @extends('admin.app')

@section('main-content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- /.box -->
           <div class="box box-primary">
           <div class="box-header with-border">
              <h3 class="box-title">Add Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('category.store')}}">

            {{csrf_field()}}

             @include('include.message')

              <div class="box-body">
              <div class="col-md-6 col-md-offset-2">

                <div class="form-group">
                  <label for="name">Category name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter category">
                </div>
                
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('category.index')}}" class="btn btn-warning">Back</a>
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