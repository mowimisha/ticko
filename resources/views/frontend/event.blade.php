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

<body >

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
                    <li ><a href="index.html">Shop</a></li>
                  <li >
                    <a href="#">Categories</a>
                    <div class="uk-navbar-dropdown">
                      <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li ><a href="event.html">Music Concerts</a></li>
                        <li ><a href="search.html">Movies</a></li>
                        <li ><a href="sign-in.html">Breakfast Meeting</a></li>
                        <li ><a href="sign-up.html">Gala</a></li>
                      </ul>
                    </div>
                  </li>
	            <li ><a href="index.html">Terms & Conditions</a></li>
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
	<div class="uk-container uk-container-large">
		<div class="uk-box-shadow-small uk-overflow-hidden uk-border-rounded uk-inline uk-background-center-center
		uk-background-cover uk-background-norepeat uk-background-blend-overlay uk-overlay-blend"
		style="background-image: url('../frontend/img/bg2.jpeg'); width:100%;" >
			<div class="uk-padding-large uk-margin-bottom">
				<div data-uk-grid>
					<div class="uk-width-expand@m uk-flex uk-flex-middle uk-light">
						<div>
							<a class="uk-text-demi-bold hvr-back" href="{{ url('/') }}"><span class="uk-margin-small-right"
								data-uk-icon="icon: arrow-left; ratio: 1.4"></span>Back</a>
							<h2 class="uk-heading-small uk-letter-spacing-medium">{{ $posts->title}}</address>
							{{-- <p data-uk-lightbox><a class="uk-text-demi-bold hvr-forward"
								href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4740.819266853735!2d9.99008871708242!3d53.550454675412404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3f9d24afe84a0263!2sRathaus!5e0!3m2!1sde!2sde!4v1499675200938"
								data-caption="Conference location" data-type="iframe">
								<span class="uk-margin-small-right" data-uk-icon="icon: location; ratio: 1.2"></span>View Map</a></p> --}}
						</div>
					</div>
					<div class="uk-width-1-3@m uk-flex uk-flex-middle uk-flex-right">
						<div class="uk-card uk-card-default uk-card-body uk-width-1-1 uk-border-rounded-large">
							<h3 class="uk-card-title">Date and Time</h3>
							{{-- <time class="uk-text-muted" datetime="2020-07-07 08:00">Saturday, July 7 2020 at 8:00 AM</time> --}}
                            <time class="uk-text-muted" datetime="2020-07-07 08:00">{{ $posts->dates }}</time><br><br>
                        <a href="{{ url('/buyer-register') }}" class="uk-button uk-button-primary-preserve uk-button-large uk-width-1-1">Book Now</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>


<div class="uk-section">
  <div class="uk-container">
    <div class="uk-grid-large" data-uk-grid>
        <div class="uk-width-expand@m">
            <div class="uk-article">
                <img src="/uploads/posters/large/{{ $posts->event_poster }}" alt="" width="600" height="600">
            </div>
        </div>

        <div class="uk-width-1-3@m">
        <h4>Description</h4>
        <p>{{ $posts->description }}</p>


        <h3>Event Location</h3>
        <img class="uk-border-rounded" src="https://placehold.co/600x430" alt="Location">
        <address>{{ $posts->location }}</address>
        <p data-uk-lightbox><a class="uk-text-demi-bold uk-link-muted"
          href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4740.819266853735!2d9.99008871708242!3d53.550454675412404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3f9d24afe84a0263!2sRathaus!5e0!3m2!1sde!2sde!4v1499675200938"
          data-caption="Conference location" data-type="iframe">
          <span class="uk-margin-small-right" data-uk-icon="icon: location; ratio: 1.2"></span>View Map</a></p>



        <h3>Share Event</h3>
				<div class="uk-margin">
					<div data-uk-grid class="uk-child-width-auto uk-grid-small">
						<div>
							<a href="#" data-uk-icon="icon: facebook" class="uk-icon-button facebook" target="_blank"></a>
						</div>
						<div>
							<a href="#" data-uk-icon="icon: linkedin" class="uk-icon-button linkedin" target="_blank"></a>
						</div>
						<div>
							<a href="#" data-uk-icon="icon: twitter" class="uk-icon-button twitter" target="_blank"></a>
						</div>
					</div>
				</div>
      </div>
    </div>

    <div class="uk-grid-large" id="book-tickets" data-uk-grid>
        <div class="uk-width-expand@m">
            <div class="uk-article">
                <h3>Choose your tickets</h3>
                <table class="uk-table uk-table-striped" >
                    <thead>
                        <tr>
                            <th class="text-uppercase">Type</th>
                            <th class="text-uppercase">Price</th>
                            <th class="text-uppercase">Quantity</th>
                            <th class="text-uppercase">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts->charges as $charge)
                            <tr>
                                <th id="category" scope="row">
                                    {{ $charge['category'] }}
                                </th>
                                <td>
                                    <input id="price" value="{{ $charge['price'] }}" disabled style="border:none; background: transparent;">
                                </td>
                                <td>
                                    <select id="quantity" name="quantity" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </td>
                                <td>
                                    <input id="subtotal" value="" disabled style="border:none; background: transparent; font-size:14px; font-weight:600;">
                                </td>
                            </tr>
                        @endforeach



                        <tr class="total-row">
                            <th></th>
                            <td></td>
                            <td>
                                Total
                            </td>
                            <td>
                                <input id="totalprice" value="" disabled style="border:none; background: transparent; font-size:14px; font-weight:600;">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
  </div>
</div>

<div class="uk-section uk-section-muted">
  <div class="uk-container">
    <h3>Other Events You May Like</h3>
    <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match uk-margin-medium-top" data-uk-grid>
        @foreach ($events as $post)
            @if ($post->id != $posts->id)
                <div>
                    <div class="uk-card uk-card-small uk-card-default uk-card-hover uk-border-rounded-large uk-overflow-hidden">
                        <div class="uk-card-media-top uk-inline uk-light">
                        <img src="/uploads/posters/thumbnail/{{ $post->event_poster }}" alt="">

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
                            <p class="uk-text-muted uk-text-small">{{ $post->description }}</p>
                            </div>
                        </div>
                        </div>
                        <a href="{{ url('event-details/'.$post->id) }}" class="uk-position-cover"></a>
                    </div>
                </div>
                @endif
        @endforeach
    </div>
  </div>
</div>

<footer class="uk-section uk-section-secondary uk-section-large">
	<div class="uk-container uk-text-muted">
		<div class="uk-child-width-1-2@s uk-child-width-1-5@m" data-uk-grid>
			<div>
				<h5>Company</h5>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-muted" href="#">Marketing Tools</a></li>
					<li><a class="uk-link-muted" href="#">Presentations</a></li>
					<li><a class="uk-link-muted" href="#">Professionals</a></li>
					<li><a class="uk-link-muted" href="#">Appointments</a></li>
					<li><a class="uk-link-muted" href="#">Stores</a></li>
				</ul>
			</div>
			<div>
				<h5>Community</h5>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-muted" href="#">Webinars</a></li>
					<li><a class="uk-link-muted" href="#">Developers</a></li>
					<li><a class="uk-link-muted" href="#">Platforms</a></li>
					<li><a class="uk-link-muted" href="#">Workshops</a></li>
					<li><a class="uk-link-muted" href="#">Local Meetups</a></li>
				</ul>
			</div>
			<div>
				<h5>Join Us</h5>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-muted" href="#">Our Initiatives</a></li>
					<li><a class="uk-link-muted" href="#">Giving Back</a></li>
					<li><a class="uk-link-muted" href="#">Communities</a></li>
					<li><a class="uk-link-muted" href="#">Youth Program</a></li>
					<li><a class="uk-link-muted" href="#">Charity</a></li>
				</ul>
			</div>
			<div>
				<h5>Contact</h5>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-muted" href="#">Contact Form</a></li>
					<li><a class="uk-link-muted" href="#">LinkedIn</a></li>
					<li><a class="uk-link-muted" href="#">Facebook</a></li>
					<li><a class="uk-link-muted" href="#">Instagram</a></li>
					<li><a class="uk-link-muted" href="#">Visit Us</a></li>
				</ul>
			</div>
			<div>
				<div class="uk-margin">
					<a href="#" class="uk-logo">Sprin</a>
				</div>
				<div class="uk-margin uk-text-small">
					<p>Made by a <a href="https://drifter.works/" target="_blank">Drifter</a> in Guatemala City.</p>
				</div>
				<div class="uk-margin">
					<div data-uk-grid class="uk-child-width-auto uk-grid-small">
						<div class="uk-first-column">
							<a href="https://www.facebook.com/" data-uk-icon="icon: facebook" class="uk-icon-link uk-icon"
								target="_blank"></a>
						</div>
						<div>
							<a href="https://www.instagram.com/" data-uk-icon="icon: instagram" class="uk-icon-link uk-icon"
								target="_blank"></a>
						</div>
						<div>
							<a href="mailto:info@blacompany.com" data-uk-icon="icon: mail" class="uk-icon-link uk-icon"
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
    <a class="uk-logo" href="index.html">Sprin</a>
    <button class="uk-offcanvas-close" type="button" data-uk-close="ratio: 1.2"></button>
    <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-medium-top uk-text-center">
      <li ><a href="index.html">Courses</a></li>
      <li ><a href="events.html">Events</a></li>
      <li ><a href="course.html">Course</a></li>
      <li class="uk-active"><a href="event.html">Event</a></li>
      <li ><a href="search.html">Search</a></li>
      <li ><a href="sign-in.html">Sign In</a></li>
      <li ><a href="sign-up.html">Sign Up</a></li>
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



<script>


    var price = document.getElementById("price");
    var category = document.getElementById("category");
    var quantity = document.getElementById("quantity");
    var subtotal = document.getElementById("subtotal");


    quantity.addEventListener("change", function() {
        console.log(price.value);
        calcsubtotal = (price.value * quantity.value);

        subtotal.value = calcsubtotal;
        totalprice.value = calcsubtotal;
   });

</script>


</body>

</html>
