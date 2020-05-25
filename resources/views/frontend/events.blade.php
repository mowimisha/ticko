<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ticko | Event Tickets & Merch One-stop</title>
  <link rel="shortcut icon" type="image/png" href="https://placehold.co/20x20.png" >
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../frontend/css/main.css" />
  <script src="../frontend/js/uikit.js"></script>
</head>

<body class="uk-background-body">

<header id="header">
	<div data-uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent ; top: #header">
	  <nav class="uk-navbar-container uk-letter-spacing-small uk-text-bold">
	    <div class="uk-container">
	      <div class="uk-position-z-index" data-uk-navbar>
	        <div class="uk-navbar-left">
	          <a class="uk-navbar-item uk-logo" href="{{ url('/') }}">Ticko</a>
	        </div>
	        <div class="uk-navbar-right">
	          <ul class="uk-navbar-nav uk-visible@m" data-uk-scrollspy-nav="closest: li; scroll: true; offset: 80">
                    <li ><a href="#">Shop</a></li>
                  <li >
                    <a href="#">Categories</a>
                    <div class="uk-navbar-dropdown">
                      <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li ><a href="#">Music Concerts</a></li>
                        <li ><a href="#">Movies</a></li>
                        <li ><a href="#">Breakfast Meeting</a></li>
                        <li ><a href="#">Gala</a></li>
                      </ul>
                    </div>
                  </li>
	            <li ><a href="#">Terms & Conditions</a></li>
	          </ul>
	          <div>
	            <a class="uk-navbar-toggle" data-uk-search-icon href="#"></a>
	            <div class="uk-drop uk-background-default" data-uk-drop="mode: click; pos: left-center; offset: 0">
	              <form class="uk-search uk-search-navbar uk-width-1-1">
	                <input class="uk-search-input uk-text-demi-bold" type="search" placeholder="Search..." autofocus>
	              </form>
	            </div>
	          </div>
	          <div class="uk-navbar-item">
	            <div><a class="uk-button uk-button-primary-light" href="{{ url('/login') }}">Login</a></div>
	          </div>
	          <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span
	            data-uk-navbar-toggle-icon></span></a>
	        </div>
	      </div>
	    </div>
	  </nav>
	</div>
	{{-- <div class="uk-container uk-container-large">
		<div class="uk-position-relative uk-visible-toggle uk-light uk-box-shadow-small uk-overflow-hidden uk-border-rounded"
			tabindex="-1" data-uk-slider="autoplay: true">
			<ul class="uk-slider-items uk-child-width-1-1">
				<li>
					<img src="https://placehold.co/1240x530" alt="Slide">
					<div class="uk-position-cover uk-overlay-light uk-flex uk-flex-right uk-flex-middle uk-padding-slide">
						<div class="uk-width-1-2@m">
							<h2 class="uk-heading-medium uk-letter-spacing-medium">Christmas Concerts in New York</h2>
							<p>
								<a class="hvr-forward" href="event.html" data-uk-icon="icon: arrow-right">Make it an Unforgettable Holiday Season</a>
							</p>
						</div>
					</div>
				</li>
				<li>
					<img src="https://placehold.co/1240x530" alt="Slide">
					<div class="uk-position-cover uk-overlay-light uk-flex uk-flex-middle uk-padding-slide">
						<div class="uk-width-1-2@m">
							<h2 class="uk-heading-medium uk-letter-spacing-medium">Product Management Conference</h2>
							<p>
								<a class="hvr-forward" href="event.html" data-uk-icon="icon: arrow-right">Coming to San Francisco</a>
							</p>
						</div>
					</div>
				</li>
			</ul>
			<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-previous
				data-uk-slider-item="previous"></a>
			<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-next
				data-uk-slider-item="next"></a>
		</div>
    </div> --}}



	{{-- <div class="uk-container">
		<div class="uk-background-secondary uk-light uk-border-rounded-large uk-header-banner uk-header-banner-events uk-position-relative
			uk-position-z-index uk-box-shadow-small" data-uk-scrollspy="cls: uk-animation-scale-up; repeat: true">
			<div class="uk-grid-small" data-uk-grid>
				<div class="uk-width-expand">
					<div class="uk-child-width-1-3@m uk-grid-small" data-uk-grid>
						<div>
							<label class="uk-form-label" for="where">Looking for</label>
							<input class="uk-input" type="text" placeholder="Anything">
						</div>
						<div>
							<label class="uk-form-label" for="where">In</label>
							<select class="uk-select" id="where">
								<option>Anywhere</option>
								<option>London</option>
								<option>New York</option>
								<option>Paris</option>
								<option>Berlin</option>
								<option>Miami</option>
							</select>
						</div>
						<div>
							<label class="uk-form-label" for="datepicker">When</label>
          		<input id="datepicker" class="uk-input" type="text" placeholder=" Any date" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="uk-width-auto uk-flex uk-flex-bottom">
					<a href="#" class="uk-icon-button" data-uk-icon="icon: search; ratio: 1.2"></a>
				</div>
			</div>
		</div>
	</div> --}}
</header>


<div class="uk-section uk-margin-top">
  <div class="uk-container">
    <div class="uk-grid-small uk-flex uk-flex-middle" data-uk-grid>
      <div class="uk-width-expand@m">
        <h2>Upcoming Events</h2>
      </div>
      <div class="uk-width-auto@m">
        <select class="uk-select uk-select-light">
          <option>Any Type</option>
          <option>Online</option>
          <option>Residential</option>
        </select>
      </div>
      <div class="uk-width-auto@m">
        <select class="uk-select uk-select-light">
          <option>Any Category</option>
          <option>Music</option>
          <option>Marketing</option>
          <option>Accounting</option>
          <option>Business</option>
          <option>Creative</option>
        </select>
      </div>
    </div>
    <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match uk-margin-medium-top" data-uk-grid>
        @foreach ($posts as $post)
                <div>
                    <div class="uk-card uk-card-small uk-card-default uk-card-hover uk-border-rounded-large uk-overflow-hidden">
                        <div class="uk-card-media-top uk-inline uk-light" style="height:350px !important;">
                            <img src="/uploads/posters/thumbnail/{{ $post->event_poster }}" alt="" style="height:350px !important;">
                            <div class="uk-position-cover uk-overlay-xlight"></div>
                            <div class="uk-position-small uk-position-top-left">
                                {{-- <span class="uk-label uk-text-bold uk-text-price">Ksh.{{ $post->charges }}</span> --}}
                            </div>
                            <div class="uk-position-small uk-position-top-right">
                                <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
                            </div>
                        </div>
                        <div class="uk-card-body">
                        <div data-uk-grid>
                            <div class="uk-width-auto uk-text-center">
                            <span class="uk-display-block uk-text-small uk-text-bold uk-text-primary uk-text-uppercase">Feb</span>
                            <span class="uk-display-block uk-h4 uk-margin-xsmall-top">2</span>
                            </div>
                            <div class="uk-width-expand">
                            <h3 class="uk-card-title">{{ $post->title }}</h3>
                            <p class="uk-text-muted uk-text-small">{{ $post->description }}</p><br>
                            <a href="#" class="uk-button uk-button-primary-preserve uk-button-medium ">Book Now</a>

                            </div>
                        </div>
                        </div>
                        <a href="{{ url('event-details/'.$post->id) }}" class="uk-position-cover"></a>
                    </div>
                </div>
        @endforeach
    </div>

    <div class="uk-text-center uk-margin-large-top">
      <div class="uk-text-primary"><span class="uk-margin-small-right"><img src="../frontend/img/loader.svg" alt="Loader" width="22" height="22" data-uk-svg></span> Loading More</div>
    </div>

  </div>
</div>


<div class="uk-section uk-margin-top">
  <div class="uk-container">
    <div class="uk-grid-small uk-flex uk-flex-middle" data-uk-grid>
      <div class="uk-width-expand@m">
        <h2>Featured Events</h2>
      </div>
      <div class="uk-width-auto@m">
        <select class="uk-select uk-select-light">
          <option>Any Type</option>
          <option>Online</option>
          <option>Residential</option>
        </select>
      </div>
      <div class="uk-width-auto@m">
        <select class="uk-select uk-select-light">
          <option>Any Category</option>
          <option>Music</option>
          <option>Marketing</option>
          <option>Accounting</option>
          <option>Business</option>
          <option>Creative</option>
        </select>
      </div>
    </div>
    <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match uk-margin-medium-top" data-uk-grid>
        @foreach ($posts as $post)
            @if ($post->feature_status == 'featured')
                <div>
                    <div class="uk-card uk-card-small uk-card-default uk-card-hover uk-border-rounded-large uk-overflow-hidden">
                        <div class="uk-card-media-top uk-inline uk-light">
                        <img src="https://placehold.co/640x380" alt="Course Title">
                        <div class="uk-position-cover uk-overlay-xlight"></div>
                        <div class="uk-position-small uk-position-top-left">
                            {{-- <span class="uk-label uk-text-bold uk-text-price">Ksh.{{ $post->charges }}</span> --}}
                        </div>
                        <div class="uk-position-small uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
                        </div>
                        </div>
                        <div class="uk-card-body">
                        <div data-uk-grid>
                            <div class="uk-width-auto uk-text-center">
                            <span class="uk-display-block uk-text-small uk-text-bold uk-text-primary uk-text-uppercase">Feb</span>
                            <span class="uk-display-block uk-h4 uk-margin-xsmall-top">2</span>
                            </div>
                            <div class="uk-width-expand">
                            <h3 class="uk-card-title">{{ $post->title }}</h3>
                            <p class="uk-text-muted uk-text-small">{{ $post->description }}</p><br>
                            <a href="#" class="uk-button uk-button-primary-preserve uk-button-medium ">Book Now</a>
                            </div>


                        </div>
                        </div>
                        <a href="{{ url('event-details/'.$post->id) }}" class="uk-position-cover"></a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <div class="uk-text-center uk-margin-large-top">
      <div class="uk-text-primary"><span class="uk-margin-small-right"><img src="../frontend/img/loader.svg" alt="Loader" width="22" height="22" data-uk-svg></span> Loading More</div>
    </div>

  </div>
</div>





<footer class="uk-section uk-section-secondary uk-section-medium">
	<div class="uk-container uk-text-muted">
		<div class="uk-child-width-1-2@s uk-child-width-1-3@m" data-uk-grid>
			<div>
				<h5>Company</h5>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-muted" href="#">About Us</a></li>
					<li><a class="uk-link-muted" href="#">Terms & Condition</a></li>
					<li><a class="uk-link-muted" href="#">Privacy</a></li>
				</ul>
			</div>
			<div>
				<h5>Contact</h5>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-muted" href="#">+254-718573435</a></li>
					<li><a class="uk-link-muted" href="#">info@ticko.co.ke</a></li>
					<li><a class="uk-link-muted" href="#">vendor@ticko.co.ke</a></li>
				</ul>
			</div>
			<div>
				<div class="uk-margin">
					<a href="#" class="uk-logo">Ticko</a>
				</div>
				<div class="uk-margin uk-text-small">
					<p>&copy {{ date('Y') }} Ticko Solutions Limited</p>
				</div>
				<div class="uk-margin">
					<div data-uk-grid class="uk-child-width-auto uk-grid-small">
						<div class="uk-first-column">
							<a href="#" data-uk-icon="icon: facebook" class="uk-icon-link uk-icon"
								target="_blank"></a>
						</div>
						<div>
							<a href="#" data-uk-icon="icon: instagram" class="uk-icon-link uk-icon"
								target="_blank"></a>
						</div>
						<div>
							<a href="#" data-uk-icon="icon: mail" class="uk-icon-link uk-icon"
								target="_blank"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
  <div class="uk-offcanvas-bar">
    <a class="uk-logo" href="#">Sprin</a>
    <button class="uk-offcanvas-close" type="button" data-uk-close="ratio: 1.2"></button>
    <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-medium-top uk-text-center">
      <li ><a href="#">Courses</a></li>
      <li class="uk-active"><a href="#">Events</a></li>
      <li ><a href="#">Course</a></li>
      <li ><a href="#">Event</a></li>
      <li ><a href="#">Search</a></li>
      <li ><a href="#">Sign In</a></li>
      <li ><a href="#">Sign Up</a></li>
    </ul>
    <div class="uk-margin-medium-top">
      <a class="uk-button uk-width-1-1 uk-button-primary-light" href="sign-up.html">Sign Up</a>
    </div>
    <div class="uk-margin-medium-top uk-text-center">
      <div data-uk-grid class="uk-child-width-auto uk-grid-small uk-flex-center">
        <div>
          <a href="https://twitter.com/" data-uk-icon="icon: twitter" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://www.facebook.com/" data-uk-icon="icon: facebook" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://www.instagram.com/" data-uk-icon="icon: instagram" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://vimeo.com/" data-uk-icon="icon: vimeo" class="uk-icon-link" target="_blank"></a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/datepicker.js"></script>


</body>

</html>
