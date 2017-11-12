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
          <h3 class="box-title">Posts</h3>

         @can('posts.create',Auth::user())

           <a href="{{route('post.create')}}" class="col-md-offset-5 btn btn-success" >Add New</a>
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
                  <th>Title</th>
                  <th>subtitle</th>
                  <th>Time Created</th>
                   @can('posts.update',Auth::user())
                  <th>Edit</th>
                  @endcan
                   @can('posts.delete',Auth::user())
                  <th>Delete</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                
                 
                 <td>{{$loop->index +1}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->subtitle}}</td>
                  <td>{{$post->created_at->toFormattedDateString()}}</td>
                   @can('posts.update',Auth::user())
                  <td><a href="{{route('post.edit',$post->id)}}"><span  class="glyphicon glyphicon-edit" ></span></a></td>
                  @endcan
                   @can('posts.delete',Auth::user())
                  <form id="delete-form-{{$post->id}}" method="post" action="{{route('post.destroy',$post->id)}}" style="display: none">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}


                  </form>
                  <td><a href="" onclick="if (confirm('Are you sure you want to delete?')){

                    event.preventDefault();document.getElementById('delete-form-{{$post->id}}').submit();
                  }
                    else {
                      event.preventDefault();


                    } "><span class="glyphicon glyphicon-trash" ></span></a></td>

                @endcan
                  
                </tr>
                @endforeach
                </tbody>
              </table>
              {{$posts->links()}}
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        
      </div>
      <!-- /.box -->
   
    </section>
    <!-- /.content -->
  </div>


@endsection