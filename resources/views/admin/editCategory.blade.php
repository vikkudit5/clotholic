
@extends('admin.layouts.master')
@section('content')

 <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
             @if (Session::get('message'))
                   <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">
                                            ×
                       </button>
                      {!! Session::get('message') !!}
                  </div>
           @endif


            <form role="form" action="/updateCategory" method="post" id="updateForm" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="text" class="form-control" id="name" value="{{$editCategory->name}}" placeholder="Enter Category" name="name">
                </div>

                 <p>@if ($errors->has('name'))<p class="help-block" style="color: #CA0606">{!!$errors->first('name')!!}</p>@endif
                
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="image" name="image">
                    <p>@if ($errors->has('image'))<p class="help-block" style="color: #CA0606">{!!$errors->first('image')!!}</p>@endif

                    @if(!empty($editCategory->image))
                    <img src="{{ url('/') }}/upload/category/{{$editCategory->image}}" style="width: 50px;height: 50px;">
                    @endif

                    <input type="hidden" id="updateId" name="updateId" value="{{$editCategory->id}}" name="updateId">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="update">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->



  @endsection