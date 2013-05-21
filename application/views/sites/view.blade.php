@layout('layouts.default')

@section('content')	
	<div class="well">
        <h4>URL: {{ $site->site_url }} </h4>
        <p>Review: {{ $site->site_review }} </p>
        <p>Visit the site: {{ HTML::link($site->site_url, $site->site_url) }} </p>
        <p>
              {{ HTML::link_to_route('edit_site', 'Edit site', array($site->id)) }} 
              <!-- {{ HTML::link_to_route('delete_site', 'Delete site, array($site->id)) }} |  -->
        </p>        
    </div>
@endsection