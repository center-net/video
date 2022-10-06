@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#videos"])
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>{{!empty($title)?$title:''}}</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('videos')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('videos/'.$videos->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('videos/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$videos->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$videos->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$videos->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['videos.destroy', $videos->id]
						]) !!}
						{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						<a class="btn btn-default btn-flat" data-dismiss="modal">{{trans('admin.cancel')}}</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		@endpush
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
										
{!! Form::open(['url'=>aurl('/videos/'.$videos->id),'method'=>'put','id'=>'videos','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12">
    <div class="form-group">
        {!! Form::label('title',trans('admin.title'),['class'=>'control-label']) !!}
        {!! Form::text('title', $videos->title ,['class'=>'form-control','placeholder'=>trans('admin.title')]) !!}
    </div>
</div>
<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12 videourl">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="'videourl'">{{ trans('admin.videourl') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        {!! Form::file('videourl',['class'=>'custom-file-input','placeholder'=>trans('admin.videourl'),"accept"=>it()->acceptedMimeTypes("video"),"id"=>"videourl"]) !!}
                        {!! Form::label('videourl',trans('admin.videourl'),['class'=>'custom-file-label']) !!}
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="padding-top: 30px;">
            <div class="row">
                <div class="col-md-6">
                    @include("admin.show_video",["video"=>$videos->videourl])
                </div>
                <div class="col-md-6">
                    <a href="{{ it()->url($videos->videourl) }}" target="_blank"><i class="fa fa-download fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12 image">
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="'image'">{{ trans('admin.image') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        {!! Form::file('image',['class'=>'custom-file-input','placeholder'=>trans('admin.image'),"accept"=>it()->acceptedMimeTypes("image"),"id"=>"image"]) !!}
                        {!! Form::label('image',trans('admin.image'),['class'=>'custom-file-label']) !!}
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2" style="padding-top: 30px;">
            @include("admin.show_image",["image"=>$videos->image])
        </div>
    </div>
</div>

</div>
		<!-- /.row -->
		</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save_back') }}</button>
{!! Form::close() !!}
</div>
</div>
@endsection