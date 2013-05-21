@layout('layouts.default')

@section('content')
  	@if ($errors->has())
  		<div class="alert alert-info hidden-phone">
	    	<a class="close" data-dismiss="alert">×</a>
	    	<span>
			    {{ $errors->first('site_url',':message') }} </BR>
			    {{ $errors->first('site_review',':message') }}	</BR>
		    </span>
	    </div>	
	@endif

<div class="well">
	<h4>Update site's review</h4>
	{{ Form::open('site/update', 'PUT') }}   <!-- POST -> PUT -->
	{{ Form::hidden('id', $site->id) }}
		<p>
			{{ Form::label('site_url', 'Site URL') }}
			{{ Form::text('site_url', $site->site_url ) }}
		</p>
		<p>
			{{ Form::label('site_review', 'Review') }}
			{{ Form::textarea('site_review', $site->site_review, array('cols'=>'80')) }}
		</p>
		{{ Form::submit('Update site') }}
	{{ Form::close()}}
</div>	
@endsection