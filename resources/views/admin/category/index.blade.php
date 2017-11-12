@extends('admin.app')
@section('main-content')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"

<script type="text/javascript" src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
 <script>
 
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@endsection

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">categories</h3>
          @can('users.create',Auth::user())
           <a href="{{route('category.create')}}" class="col-md-offset-4 btn btn-success" >Add New</a>
           @endcan
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S/N</th>
                  <th>category</th>
                  @can('users.create',Auth::user())
                  <th>Edit</th>
                  <th>Delete</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                
                 
                 <td>{{$loop->index +1}}</td>
                  <td>{{$category->name}}</td>
                  @can('users.create',Auth::user())
                  <td><a href="{{route('category.edit',$category->id)}}"><span  class="glyphicon glyphicon-edit"></span></a></td>
                  <form id="delete-form-{{$category->id}}" method="post" action="{{route('category.destroy',$category->id)}}" style="display: none">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}


                  </form>
                  <td><a href="" onclick="if (confirm('Are you sure you want to delete?')){

                    event.preventDefault();document.getElementById('delete-form-{{$category->id}}').submit();
                  }
                    else {
                      event.preventDefault();


                    } "><span class="glyphicon glyphicon-trash" ></span></a></td>

               
                  @endcan
                </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection