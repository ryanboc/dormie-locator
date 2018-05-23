@extends('layouts.adminLayout.admin_design')
@section('content');

<div id="content">
  <div id="content-header">
   
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Settings</a> </div>
    <h1>Map Settings</h1>
		 <a href="{{action('MapController@create')}}" class="btn btn-success">Create</a>
  </div>
  <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Dormitory List</h5>
            </div>
            <div class="widget-content nopadding">
               @if (\Session::has('success'))
			  <div class="alert alert-success">
				<p>{{ \Session::get('success') }}</p>
			  </div><br />
			 @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Logitude</th>
        <th>Latitude</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($maps as $map)
     
      <tr>
        <td>{{$map['id']}}</td>
        <td>{{$map['dormName']}}</td>
        <td>{{$map['long']}}</td>
        <td>{{$map['lat']}}</td>
        <td><a href="{{action('MapController@edit', $map['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('MapController@destroy', $map['id'])}}" method="post">
           {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
