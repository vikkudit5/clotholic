
@extends('admin.layouts.masterTable')
@section('content')

 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
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
                  <td>{{$category->status}}</td>
                  <td>X</td>
                </tr>
                @endforeach
               </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection