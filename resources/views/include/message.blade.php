 @if(count($errors) > 0)

  @foreach($errors->all() as $error)
                 
  <p class="alert alert-danger col-md-6 col-md-offset-4" > {{$error}}</p>
  @endforeach


   @endif 

   
   @if(session()->has('message'))

  
                 
  <p class="alert alert-success col-md-6 col-md-offset-4" " > {{ session ('message')}}</p>
  


   @endif