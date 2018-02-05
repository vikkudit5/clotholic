
@extends('admin.layouts.masterTable')
@section('content')



 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category List</h3>
              <div id="message"></div>

               @if (Session::get('message'))
                   <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">
                                            ×
                       </button>
                      {{ Session::get('message') }}
                  </div>
           @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Si</th>
                  <th>Category Name</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($categoryList as $category)
                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->name}}
                  </td>
                  <td><img src="upload/category/{{$category->image}}" style="width: 50px;height: 50px;"></td>
                  <form method="post">
                     <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

                    <td>
                      <div class="form-group radio-green">
                        <input name="status" class="enable" id="{{ $category->id }}" type="radio" @if($category->status == 0) {{ "checked" }} @endif  >
                      <label for="hidden">Enable</label>
                      </div>
                         <!--Radio group-->
                      <div class="form-group radio-green">
                        <input name="status" class="disable" type="radio" id="{{ $category->id }}" @if($category->status == 1) {{ "checked" }} @endif>
                        <label for="live">Disable</label>
                      </div>

                   </td>
                </form>
                  <td>
                      <span class="glyphicon glyphicon-trash categoryDelete" id="{{ $category->id }}"></span>
                      &nbsp;&nbsp;
                      <a href="category/{{ $category->id }}/edit">
                        <span class="glyphicon glyphicon-edit"></span>
                      </a>
                  </td>
                </tr>
                @endforeach
               </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection