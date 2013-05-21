@layout('layouts.default')

@section('content')
  	@if ($errors->has())
  		<div class="alert alert-info hidden-phone">
	    	<a class="close" data-dismiss="alert">×</a>
	    	<span>
			    {{ $errors->first('site_url',':messsage') }} </BR>
			    {{ $errors->first('site_review',':messsage') }}	</BR>			    
		    </span>
	    </div>	  
	@endif

<div class="well">
	<h4>Add new site</h4>
	{{ Form::open('site/create', 'POST') }}
		<p>
			{{ Form::label('site_url', 'Site URL') }}
			{{ Form::text('site_url', Input::old('site_url') ) }}
		</p>
		<p>
			{{ Form::label('site_review', 'Site review') }}
			{{ Form::textarea('site_review', Input::old('site_review'), array('cols'=>'80') ) }}
		</p>
		
		{{ Form::submit('Add new site') }}
	{{ Form::close()}}
</div>	
@endsection