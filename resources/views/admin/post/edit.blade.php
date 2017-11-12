  @extends('admin.app')

@section('main-content')
@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">

<script type="text/javascript" src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

@endsection
  <div class="content-wrapper">
  <div class="col-md-12">
    
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- /.box -->
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit post</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('post.update',$posts->id)}}" method="post" enctype="multipart/form-data">
            
            {{csrf_field()}}
            {{method_field('PUT')}}
               
               @include('include.message')

              <div class="box-body">
              <div class="col-md-6">

                <div class="form-group">
                  <label for="title">Post Title</label>
                 <input type="text" class="form-control" value="{{$posts->title}}" id="title" name="title" placeholder="Enter Title">
                </div>
                
                <div class="form-group">
                  <label for="subtitle">Subtitle</label>
                  <input type="text" class="form-control" value="{{$posts->subtitle}}" id="subtitle" name="subtitle" placeholder="Enter subtitle">
                </div>
                
                <div class="form-group">
                <label>select categories</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select category" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                @foreach ($categories as $category)
                
                 
                 
                 <option value="{{$category->id}}"

                   @foreach($posts->categories as $postcat)
                  @if($postcat->id == $category->id)
                       
                       selected

                  @endif
                  
                  @endforeach
                 >{{$category->name}}</option>
                @endforeach
                  
                </select>
              </div>
              @can('posts.view',Auth::user())

              <div class="checkbox">
                   <label><input type="checkbox" name="publish" @if($posts->publish == 1) checked  @endif >publish </label>
                   </div>
                   @endcan

                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" id="image" name="image" value="{{$posts->image}}">
                </div>

              
                </div>
            
            <div class="col-md-6">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Body</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                <textarea class="textarea" placeholder="Post body" name="body" id = "body"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$posts->body}}</textarea>
              
            </div>
          </div>
        </div>
               
               
                

                
                
              <!-- /.box-body -->

             
            
          </div>
          <div class="col-lg-6 col-md-offset-4">
          <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('post.index')}}" class="btn btn-warning">Back</a>
              </div>
              </div>
              </form>
       
        <!-- /.col-->
      </div>
      </div>

      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  </div>
  <script>
  $(document).ready(function(){
  $('.select2').select2()

   });
  </script>
  @endsection


