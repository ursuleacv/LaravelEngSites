@layout('layouts.default')

@section('content')
<div class="text-info lead" > Total sites:  {{ $total_sites }} </div>

	<div id="searchresultdata"></div>
	<div id="valaravel">
	@foreach($sites->results as $site)
    @if($site->published)
<!-- ###################################################### -->
	
	    <div class="well">
           <h4>
             <b>URL: </b>  {{ $site->site_url }}
            </h4>
            <p> <b>Review</b> </p>
            <p> {{ $site->site_review }} </p>            
            <p>Visit the site: {{ HTML::link($site->site_url, $site->site_url) }} </p>
            <p>
              <!-- | {{ HTML::link_to_route('edit_site', 'Edit site', array($site->id)) }} | -->
              <!-- {{ HTML::link_to_route('delete_site', 'Delete site', array($site->id)) }} |  -->
            </p>

        </div>
	
<!-- ###################################################### -->
    @endif       
	@endforeach
	
	<?php echo $sites->links(); ?>	
	</div> <!-- valaravel / se inlocuieste tot divul cu "" -->

	
    

@endsection