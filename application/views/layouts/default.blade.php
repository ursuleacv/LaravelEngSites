<!doctype html>
<html>
  
  <head>
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <link rel="stylesheet" href="https://app.divshot.com/css/divshot-util.css">
    <link rel="stylesheet" href="https://app.divshot.com/themes/united/bootstrap.min.css">
    <link rel="stylesheet" href="https://app.divshot.com/css/bootstrap-responsive.css">
    <script src="https://app.divshot.com/js/jquery.min.js"></script>
    <script src="http://english.aws.af.cm/public/js/jquery.watermark.js"></script>
    <!-- ##################   AJAX Search  ##################### -->
    <script type="text/javascript">  
    $(document).ready(function() {
    $("#faq_search_input").watermark("Begin Typing to Search");
    $("#faq_search_input").keyup(function()
    {
      var faq_search_input = $(this).val();
      var dataString = 'keyword='+ faq_search_input;
      if(faq_search_input.length>1)

      {
        $.ajax({
          type: "GET",
          url: "http://english.aws.af.cm/ajax-search.php",
          data: dataString,
          beforeSend:  function() {

            $('input#faq_search_input').addClass('loading');

          },
          success: function(server_response)
          {

            $('#searchresultdata').html(server_response).show();
            $('span#faq_category_title').html(faq_search_input);

            if ($('input#faq_search_input').hasClass("loading")) {
             $("input#faq_search_input").removeClass("loading");
           } 

         }
       });
        $('#valaravel').html(" ");
      }return false;
    });
  });
  
  </script>
<!-- ###################################################### -->
  </head>
  
  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="http://english.aws.af.cm/public/sites">Welcome to Learning English websites database!</a>
          <div class="navbar-content">
            <ul class="nav  pull-right">
              <li class="active">
               {{ HTML::link_to_route('new_site','New site') }}
              </li>              
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="page-header">
<!-- ####################### Searchbox ###################### -->
	<div class="prod-subsubhead" style="float:right; position:relative; ">
          <h4 id="faq_title"> <strong>Search : </strong> </h4>
	 <div class="faqsearchinputbox">
                  <!-- The Searchbox Starts Here  -->
                  <input  name="query" type="text" id="faq_search_input" />
                  <!-- The Searchbox Ends  Here  -->
                </div>
        </div>
<!-- ######################## Searchbox ends ###################### -->	
        <h1>Learning English websites</h1>
      </div>
      	@if (Session::has('message'))
			     <div class="alert alert-info hidden-phone">
	        	<a class="close" data-dismiss="alert">×</a>
	        	<span>
	          		{{ Session::get('message') }}
	      		</span>
	      	</div>
		    @endif

      <p class="lead">
        This website provides a collection of online resources for learning English, containing online English dictionaries, English tests, writing tips, listening practice, grammar lessons, vocabulary, idioms, quizzes, and video lessons. There are thousands of online resources designed to help learn English, from basic grammar lessons to creative essay writing. However, they are not in one place. They are somewhere on the Internet separately. And learning English involves various activities related to reading, writing, speaking and listening skills.        
      </p>
      
        @yield('content')
     
      <p class="text-info lead">This is a place where internet users can openly give opinions about their favorite and most used websites. Find out about online learning english services before you use it</p>

<!-- Disqus Comments start -->
    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'engsitesreview'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
<!--Comments end -->

    </div>
    <script src="https://app.divshot.com/js/bootstrap.min.js"></script>
  </body>

</html>