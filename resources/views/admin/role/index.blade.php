  @extends('admin.app')
@section('main-content')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"

<script type="text/javascript" src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
 

@endsection

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">roles</h3>
           <a href="{{route('role.create')}}" class="col-md-offset-5 btn btn-success" >Add New</a>
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
                  <th>role name</th>
                  <th>permissions</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>

                <tbody>
                 @foreach($roles as $role)
                <tr>
               
                 
                 <td>{{$loop->index +1}}</td>

                  <td>{{$role->name}}</td>
                  
                  <td>
                   @foreach($role->permissions as $perm)
                  {{$perm->name}},
                   @endforeach
                  </td>

                  <td><a href="{{route('role.edit',$role->id)}}"><span  class="glyphicon glyphicon-edit" ></span></a></td>

                  <form id="delete-form-{{$role->id}}" method="post" action="{{route('role.destroy',$role->id)}}" style="display: none">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}

                     

                  </form>
                 
                 <td><a href="" onclick="if (confirm('Are you sure you want to delete?')){

                     event.preventDefault();document.getElementById('delete-form-{{$role->id}}').submit();
                  }
                    else {
                      event.preventDefault();


                    } "><span class="glyphicon glyphicon-trash" ></span></a></td>

               
                  
                </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
       
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection