@extends('layouts.adminLayout.admin_design')
@section('content');

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Settings</a> </div>
    <h1>Map Settings</h1>
		
  </div>
  <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            @if(Session::has('flash_message_error'))
			<div class="alert alert-error alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong>{!! session('flash_message_error') !!}</strong>
			</div>
		@endif
		@if(Session::has('flash_message_success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong>{!! session('flash_message_success') !!}</strong>
			</div>
		@endif
              <h5>Add Dormitory</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{action('MapController@update', $id)}}"> {{ csrf_field() }}
              <input name="_method" type="hidden" value="PATCH">
                <div class="control-group">
                  <label class="control-label">Dorm Name</label>
                  <div class="controls">
                    <input type="text" name="dorm_name" id="dorm_name" value="{{$maps->dormName}}"/>
                    <span id="chkPwd"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">longitude</label>
                  <div class="controls">
                    <input type="text" name="longitude" id="longitude" value="{{$maps->long}}" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Latitude</label>
                  <div class="controls">
                    <input type="text" name="Latitude" id="Latitude" value="{{$maps->lat}}"  />
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Update Map" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
