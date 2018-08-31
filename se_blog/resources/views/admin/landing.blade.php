@extends('layouts.master')

@section('content')

   <div class="container-fluid">
       <div class="container">

           <div class="row">

               <div class="col-md-8">

                   @foreach($blogs as $blog)

                       <div class="entity_wrapper">
                           <div class="entity_title">
                               <h1><a href="{{url('blog/'.$blog->id)}}" target="_self">{{$blog->title}}</a>
                               </h1>
                           </div>
                           <!-- entity_title -->

                           <div class="entity_meta">
                               <a href="#">{{$blog->created_at}}</a>, by: <a href="#">{{$blog->user->name}}</a>
                           </div>
                           <!-- entity_meta -->



                           <div class="entity_thumb">
                               <img class="img-responsive" src="{{asset('assets/img/category_img_top.jpg" alt="feature-top')}}">
                           </div>
                           <!-- entity_thumb -->

                                <div class="widget_body">
                                    <button class="btn blue" onclick="window.location='{{ url("/blog/".$blog->id) }}'">View</button>
                                    <button class="btn purple" onclick="window.location='{{ url("/blog/update/".$blog->id) }}'">Edit</button>



                                    <button class="btn red" onclick="deleteBlog()">Delete</button>
                                    <form id="delete-form-{{$blog->id}}" action="{{ url('/blog/'.$blog->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        {{--<input type="submit" class="btn btn-danger btn-sm" href="{{ url('/blog/'.$blog->id)}}" value="Delete" onclick="return confirm('Are You Sure To Delete This Item? ')">--}}
                                    </form>
                                    <script>
                                       function deleteBlog(){

                                           if(confirm('Are You Sure To Delete This Item? ')){
                                               document.getElementById('delete-form-{{$blog->id}}').submit();
                                           };

                                        }
                                    </script>
                                </div>




                       </div>
               @endforeach

               <!-- entity_wrapper -->

               </div>

               <div class="col-md-4">

                   <div class="widget m30">
                       <div class="widget_title widget_black">
                           <h2><a href="#">Reports</a></h2>
                       </div>
                       <div class="widget_body"><img class="img-responsive left" src="assets/img/reader.jpg" alt="Generic placeholder image">

                           <p>This function will export web sites statistices to excel file</p>


                           <button class="btn green">Generate Report</button>
                       </div>
                   </div>
               </div>
           </div>





       </div>
   </div>


    @endsection