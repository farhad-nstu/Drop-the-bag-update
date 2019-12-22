<script src="{{ asset('js/front/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


<body data-rsssl=1 class="home page-template page-template-elementor_header_footer page page-id-21 wp-custom-logo site-header-sticky elementor-default elementor-template-full-width elementor-page elementor-page-21">
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content">Skip to content</a>



<div id="header-section" class="h-on-top no-transparent">		
	<header id="masthead" class="site-header header-full-width is-sticky no-scroll no-t h-on-top" role="banner">
		<div class="container">
			<div class="site-branding">
				<div class="site-brand-inner has-logo-img no-desc">
					<div class="site-logo-div">
						<a href="index.php" class="custom-logo-link  no-t-logo" rel="home" itemprop="url">
							<img width="181" height="40" src="https://dropthebag.com/wp-content/uploads/2019/11/DropTheBagLang.png" class="custom-logo" alt="" itemprop="logo" srcset="https://dropthebag.com/wp-content/uploads/2019/11/Zeichenfläche-1@2x.png 2x" />
						</a>
					</div>
				</div>				
			</div>
			<div class="header-right-wrapper">
				<a href="#0" id="nav-toggle">Menu<span></span></a>
				@auth
				<nav id="site-navigation" class="main-navigation" role="navigation">

					<ul class="onepress-menu">
						<li id="menu-item-33" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-21 current_page_item menu-item-33">
							<a href="{{ route('front.home') }}" aria-current="page">Drop the bag</a>
						</li>
						<li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25">
							<a href="{{ route('partner-subscription') }}">Partner – Subscription</a>
						</li>
						<li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25">
							<a data-toggle="modal" data-target="#myModal">Destination</a>
						</li>
						<li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25">
							<a href="{{ route('userOrderList') }}">Order</a>
						</li>


						<li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25" class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

						
					</ul>
				</nav>
				@else
				    <nav id="site-navigation" class="main-navigation" role="navigation">

				    	<ul class="onepress-menu">
				    		<li id="menu-item-33" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-21 current_page_item menu-item-33">
				    			<a href="{{ route('front.home') }}" aria-current="page">Drop the bag</a>
				    		</li>
				    		<li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25">
				    			<a href="{{ route('partner-subscription') }}">Partner – Subscription</a>
				    		</li>
				    		<li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25">
				    			<a data-toggle="modal" data-target="#myModal">Destination</a>
				    		</li>
				    		<li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25">
				    			<a href="{{ route('userOrderList') }}">Order</a>
				    		</li>
                             <li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25">
						    <a href="{{ route('login') }}">Login</a>
					        </li>
				    		
				    	</ul>
				    </nav>
			       @endauth
				<!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->
</div>


  <!-- The Modal -->
<div class="modal modal-city show" id="myModal" tabindex="-1" role="dialog" data-title-failed="Problem finding storages in the city selected:" data-title-default="Choose your city" aria-modal="true">
    <div class="modal-dialog modal-lg city-dialog">
      	<div class="modal-content" role="document">

      		<div class="city-navigate d-sm-none">
                <a href="#" class="city-link">A</a>
            
                <a href="#" class="city-link">B</a>
            
                <a href="#" class="city-link">C</a>
            
                <a href="#" class="city-link">D</a>
            
                <a href="#" class="city-link">E</a>
            
                <a href="#" class="city-link">F</a>
            
                <a href="#" class="city-link">G</a>
            
                <a href="#" class="city-link">H</a>
            
                <a href="#" class="city-link">I</a>
            
                <a href="#" class="city-link">J</a>
            
                <a href="#" class="city-link">K</a>
            
                <a href="#" class="city-link">L</a>
            
                <a href="#" class="city-link">M</a>
            
                <a href="#" class="city-link">N</a>
            
                <a href="#" class="city-link">O</a>
            
                <a href="#" class="city-link">P</a>
            
                <a href="#" class="city-link">Q</a>
            
                <a href="#" class="city-link">R</a>
            
                <a href="#" class="city-link">S</a>
            
                <a href="#" class="city-link">T</a>
            
                <a href="#" class="city-link">V</a>
            
                <a href="#" class="city-link">W</a>
            
                <a href="#" class="city-link">Y</a>
            
                <a href="#" class="city-link">Z</a>
            
                <a href="#" class="city-link">Ł</a>
            
        	</div>
        
	        <!-- Modal body -->
	        <div class="modal-body">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h2 class="city-title">Choose your city</h2>
  				<div class="city-wrap" id="destinationsList" style="max-height: 1938.33px;">
            
	            	<p class="city-character" data-name="#letter-A">A</p>
	            
	            
	                <!-- <a class=" city-name" href="destination.php?city=amsterdam">Amsterdam</a> -->
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'amsterdam'] ) }}">Amsterdam</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'ancona'] ) }}">Ancona</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'athens'] ) }}">Athens</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'agrigento'] ) }}">Agrigento</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'atlanta'] ) }}">Atlanta </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'adelaide'] ) }}">Adelaide</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'antwerp'] ) }}">Antwerp</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'auckland'] ) }}">Auckland</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'alicante'] ) }}">Alicante</a>
	            
	                
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'austin'] ) }}">Austin</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'antibes'] ) }}">Antibes</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'alessandria'] ) }}">Alessandria</a>
	            
	        
	            	<p class="city-character" data-name="#letter-B">B</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'barcelona'] ) }}">Barcelona</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'boston'] ) }}">Boston</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'budapest'] ) }}">Budapest</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'berlin'] ) }}">Berlin</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bratislava'] ) }}">Bratislava</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'braga'] ) }}">Braga</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bologna'] ) }}">Bologna</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bari'] ) }}">Bari</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bergamo'] ) }}">Bergamo</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bilbao'] ) }}">Bilbao</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'aires'] ) }}">Buenos Aires</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'aires'] ) }}">Brighton</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'belgrade'] ) }}">Belgrade</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bangkok'] ) }}">Bangkok</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'brindisi'] ) }}">Brindisi</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'brussels'] ) }}">Brussels</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bordeaux'] ) }}">Bordeaux</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bristol'] ) }}">Bristol</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bath'] ) }}">Bath</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'birmingham'] ) }}">Birmingham</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'belfast'] ) }}">Belfast </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'buffalo'] ) }}">Buffalo</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bucharest'] ) }}">Bucharest</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'brisbane'] ) }}">Brisbane</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'balneario-camboriu'] ) }}">Balneário Camboriú</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bellinzona'] ) }}">Bellinzona</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bournemouth'] ) }}">Bournemouth</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bergen'] ) }}">Bergen</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'brescia'] ) }}">Brescia</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'benalmadena'] ) }}">Benalmádena</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bonn'] ) }}">Bonn</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'blackpool'] ) }}">Blackpool</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'busan'] ) }}">Busan</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'bremen'] ) }}">Bremen</a>
	            
	        
	            	<p class="city-character" data-name="#letter-C">C</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'chicago'] ) }}">Chicago</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cadiz'] ) }}">Cádiz</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'copenhagen'] ) }}">Copenhagen</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'catania'] ) }}">Catania</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cancun'] ) }}">Cancun</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cagliari'] ) }}">Cagliari</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cardiff'] ) }}">Cardiff</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cambridge'] ) }}">Cambridge</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'como'] ) }}">Como</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'czestochowa'] ) }}">Częstochowa</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'christchurch'] ) }}">Christchurch</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cefalu'] ) }}">Cefalù</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cannes'] ) }}">Cannes</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cordoba'] ) }}">Cordoba</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'caserta'] ) }}">Caserta</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cologne'] ) }}">Cologne</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cluj-napoca-7'] ) }}">Cluj Napoca</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cork'] ) }}">Cork</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'chester'] ) }}">Chester</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cape-town'] ) }}">Cape Town</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cremona'] ) }}">Cremona</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'crawley'] ) }}">Crawley</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'cebu'] ) }}">Cebu</a>
	            
	        
	            	<p class="city-character" data-name="#letter-D">D</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'dublin'] ) }}">Dublin</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'denver'] ) }}">Denver</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'dubrovnik'] ) }}">Dubrovnik</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'denia'] ) }}">Denia</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'dunedin'] ) }}">Dunedin</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'decatur'] ) }}">Decatur GA</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'dusseldorf'] ) }}">Düsseldorf</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'dallas'] ) }}">Dallas</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'dortmund'] ) }}">Dortmund</a>
	            
	        
	            	<p class="city-character" data-name="#letter-E">E</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'edinburgh'] ) }}">Edinburgh</a>
	            
	        
	            	<p class="city-character" data-name="#letter-F">F</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'florence'] ) }}">Florence</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'faro'] ) }}">Faro</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'ferrara'] ) }}">Ferrara</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'fremantle'] ) }}">Fremantle</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'frankfurt-main'] ) }}">Frankfurt am Main </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'favignana'] ) }}">Favignana</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'funchal'] ) }}">Funchal</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'fuengirola'] ) }}">Fuengirola</a>
	            
	        
	            	<p class="city-character" data-name="#letter-G">G</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'genoa'] ) }}">Genoa</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'glasgow'] ) }}">Glasgow</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'granada'] ) }}">Granada</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'gdansk'] ) }}">Gdansk</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'geneva'] ) }}">Geneva</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'grosseto'] ) }}">Grosseto</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'girona'] ) }}">Girona</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'gijon'] ) }}">Gijón</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'galway'] ) }}">Galway</a>
	            
	        
	            	<p class="city-character" data-name="#letter-H">H</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'helsinki'] ) }}">Helsinki</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'hong-kong'] ) }}">Hong Kong</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'honolulu'] ) }}">Honolulu</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'hamburg'] ) }}">Hamburg</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'hamilton'] ) }}">Hamilton</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'havana'] ) }}">Havana</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'hanmer-spring'] ) }}">Hanmer Spring </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'harrogate'] ) }}">Harrogate </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'hanoi'] ) }}">Hanoi</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'ho-chi-minh'] ) }}">Ho Chi Minh</a>
	            
	        
	            	<p class="city-character" data-name="#letter-I">I</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'ibiza'] ) }}">Ibiza</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'inglewood'] ) }}">Inglewood </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'istanbul'] ) }}">Istanbul</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'incheon'] ) }}">Incheon</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'isola-del-giglio'] ) }}">Isola del Giglio </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'il-gzira'] ) }}">Il Gzira</a>
	            
	        
	            	<p class="city-character" data-name="#letter-J">J</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'jersey-city'] ) }}">Jersey City</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'jerusalem'] ) }}">Jerusalem</a>
	            
	        
	            	<p class="city-character" data-name="#letter-K">K</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'krakow'] ) }}">Kraków</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'kathmandu'] ) }}">Kathmandu</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'kazan'] ) }}">Kazan</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'kuala-lumpur'] ) }}">Kuala Lumpur</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'katowice'] ) }}">Katowice</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'kiev'] ) }}">Kiev</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'kryvyi-rih'] ) }}">Kryvyi Rih</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'kaunas'] ) }}">Kaunas</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'kota-kinabalu'] ) }}">Kota Kinabalu</a>
	            
	        
	            	<p class="city-character" data-name="#letter-L">L</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'london'] ) }}">London</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'los-angeles'] ) }}">Los Angeles</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'lisbon'] ) }}">Lisbon</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'lecce'] ) }}">Lecce</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'lucca'] ) }}">Lucca</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'latina'] ) }}">Latina</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'liverpool'] ) }}">Liverpool</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'lyon'] ) }}">Lyon</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'leeds'] ) }}">Leeds</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'las-vegas'] ) }}">Las Vegas</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'las-palmas'] ) }}">Las Palmas</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'la-spezia'] ) }}">La Spezia</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'luxembourg'] ) }}">Luxembourg</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'lucerne'] ) }}">Lucerne</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'l-hospitalet-de-llobregat'] ) }}">L'Hospitalet de Llobregat</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'ljubljana'] ) }}">Ljubljana</a>
	            
	        
	            	<p class="city-character" data-name="#letter-M">M</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'milan'] ) }}">Milan</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'montreal'] ) }}">Montreal</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'madrid'] ) }}">Madrid</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'miami'] ) }}">Miami</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'manchester'] ) }}">Manchester</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'mantua'] ) }}">Mantua</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'malaga'] ) }}">Málaga</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'melbourne'] ) }}">Melbourne</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'makati'] ) }}">Makati</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'moscow'] ) }}">Moscow</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'montpellier'] ) }}">Montpellier</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'manila'] ) }}">Manila</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'maribor'] ) }}">Maribor</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'munich'] ) }}">Munich</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'modena'] ) }}">Modena</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'monza'] ) }}">Monza</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'marseille'] ) }}">Marseille</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'matera'] ) }}">Matera</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'mariehamn'] ) }}">Mariehamn </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'marbella'] ) }}">Marbella</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'maglie'] ) }}">Maglie </a>
	            
	        
	            	<p class="city-character" data-name="#letter-N">N</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'new-york'] ) }}">New York</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'new-orleans'] ) }}">New Orleans</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'naples'] ) }}">Naples</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'nice'] ) }}">Nice</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'nashville'] ) }}">Nashville</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'nottingham'] ) }}">Nottingham</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'newport-beach'] ) }}">Newport Beach</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'norwich'] ) }}">Norwich</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'newcastle'] ) }}">Newcastle </a>
	            
	        
	            	<p class="city-character" data-name="#letter-O">O</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'oslo'] ) }}">Oslo</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'ottawa'] ) }}">Ottawa</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'oxford'] ) }}">Oxford</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'orlando'] ) }}">Orlando</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'oviedo'] ) }}">Oviedo</a>
	            
	        
	            	<p class="city-character" data-name="#letter-P">P</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'paris'] ) }}">Paris</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'prague'] ) }}">Prague</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'porto'] ) }}">Porto</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'pisa'] ) }}">Pisa</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'pescara'] ) }}">Pescara</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'palermo'] ) }}">Palermo</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'pompei'] ) }}">Pompei</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'philadelphia'] ) }}">Philadelphia</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'palma-de-mallorca'] ) }}">Palma de Mallorca</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'parma'] ) }}">Parma</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'portland'] ) }}">Portland </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'pamplona'] ) }}">Pamplona</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'penang'] ) }}">Penang</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'pavia'] ) }}">Pavia</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'phuket'] ) }}">Phuket</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'pattaya'] ) }}">Pattaya</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'padua'] ) }}">Padua</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'perugia'] ) }}">Perugia</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'poznan'] ) }}">Poznań</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'pasay'] ) }}">Pasay</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'perth'] ) }}">Perth</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'portsmouth'] ) }}">Portsmouth</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'perpignan'] ) }}">Perpignan</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'porto-belo'] ) }}">Porto Belo</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'polignano-a-mare'] ) }}">Polignano a Mare </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'pula'] ) }}">Pula</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'papeete'] ) }}">Papeete</a>
	            
	        
	            	<p class="city-character" data-name="#letter-Q">Q</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'queenstown'] ) }}">Queenstown</a>
	            
	        
	            	<p class="city-character" data-name="#letter-R">R</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'rome'] ) }}">Rome</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'rio-de-janeiro'] ) }}">Rio de Janeiro</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'rotterdam'] ) }}">Rotterdam</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'rimini'] ) }}">Rimini</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'reggio-calabria'] ) }}">Reggio Calabria</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'riga'] ) }}">Riga</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'ravenna'] ) }}">Ravenna</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'ragusa'] ) }}">Ragusa</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'rovaniemi'] ) }}">Rovaniemi</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'raleigh'] ) }}">Raleigh</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'rijeka'] ) }}">Rijeka</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'rotorua'] ) }}">Rotorua</a>
	            
	        
	            	<p class="city-character" data-name="#letter-S">S</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'sydney'] ) }}">Sydney</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'san-francisco'] ) }}">San Francisco</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 's-o-paulo'] ) }}">São Paulo</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'seattle'] ) }}">Seattle</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'seville'] ) }}">Seville</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'salerno'] ) }}">Salerno</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'split'] ) }}">Split</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'sofia'] ) }}">Sofia</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'san-diego'] ) }}">San Diego</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'saint-petersburg'] ) }}">Saint Petersburg</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'seoul'] ) }}">Seoul</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'stockholm'] ) }}">Stockholm</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'santander'] ) }}">Santander</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'singapore'] ) }}">Singapore</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'san-antonio'] ) }}">San Antonio</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'sheffield'] ) }}">Sheffield</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'santiago-de-compostela'] ) }}">Santiago de Compostela </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'syracuse'] ) }}">Syracuse</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'sorrento'] ) }}">Sorrento</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'surfers-paradise'] ) }}">Surfers Paradise</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'strasbourg'] ) }}">Strasbourg </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'sitges'] ) }}">Sitges</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'southampton'] ) }}">Southampton</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'salisbury'] ) }}">Salisbury </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'szczecin'] ) }}">Szczecin</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'setubal'] ) }}">Setubal </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'stuttgart'] ) }}">Stuttgart</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'san-rafael'] ) }}">San Rafael </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'sarajevo'] ) }}">Sarajevo</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'skopje'] ) }}">Skopje</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'san-carlos-de-bariloche'] ) }}">San Carlos de Bariloche</a>
	            
	        
	            	<p class="city-character" data-name="#letter-T">T</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'turin'] ) }}">Turin</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'trapani'] ) }}">Trapani</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'trieste'] ) }}">Trieste</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'toulouse'] ) }}">Toulouse </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'treviso'] ) }}">Treviso</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'toronto'] ) }}">Toronto</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'tallinn'] ) }}">Tallinn</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'tokyo'] ) }}">Tokyo</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'tarragona'] ) }}">Tarragona</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'trento'] ) }}">Trento</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'thessaloniki'] ) }}">Thessaloniki</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'torun'] ) }}">Toruń </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'trogir'] ) }}">Trogir</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'tenerife'] ) }}">Tenerife</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'tampa'] ) }}">Tampa</a>
	            
	        
	            	<p class="city-character" data-name="#letter-V">V</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'vancouver'] ) }}">Vancouver</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'venice'] ) }}">Venice</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'verona'] ) }}">Verona</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'valencia'] ) }}">Valencia</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'vilnius'] ) }}">Vilnius</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'valletta'] ) }}">Valletta</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'vienna'] ) }}">Vienna</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'vicenza'] ) }}">Vicenza</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'vieste'] ) }}">Vieste</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'versailles'] ) }}">Versailles</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'vancouver-usa'] ) }}">Vancouver USA</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'vilanova-i-la-geltru'] ) }}">Vilanova i la Geltrù </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'varese'] ) }}">Varese</a>
	            
	        
	            	<p class="city-character" data-name="#letter-W">W</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'warsaw'] ) }}">Warsaw</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'washington-dc'] ) }}">Washington DC</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'wroclaw'] ) }}">Wroclaw</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'windermere'] ) }}">Windermere </a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'wellington'] ) }}">Wellington</a>
	            
	        
	            	<p class="city-character" data-name="#letter-Y">Y</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'york'] ) }}">York</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'yerevan'] ) }}">Yerevan</a>
	            
	        
	            	<p class="city-character" data-name="#letter-Z">Z</p>
	            
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'zurich'] ) }}">Zurich</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'zagreb'] ) }}">Zagreb</a>
	            
	                <a class=" city-name" href="{{ route('city.destination', ['city' => 'zadar'] ) }}">Zadar</a>
	            
	        
	            	<p class="city-character" data-name="#letter-Ł">Ł</p>
	            
	            
	            	<a class=" city-name" href="{{ route('city.destination', ['city' => 'lodz'] ) }}">Łódź</a>
    

	    		</div>
			</div>
		</div>
	</div>
</div>