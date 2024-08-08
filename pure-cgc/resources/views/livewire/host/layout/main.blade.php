	<div class="main">
		<h1>{{ app()->getLocale() =='ar' ? 'الاستضافات ' : 'hosting' }}</h1>
		<div class="main-agileinfo">
			<div id="owl-demo" class="owl-carousel owl-theme"><!-- owl-carousel -->
				@if (isset($hostings))
                    @foreach ($hostings as $hosting)
                    <div class="item">
                        <div class="pricing pricing">
                            <div class="pricing-top top" style="background-color: {{$hosting->color}} !important">
                                <h3>{{$hosting->name}}</h3>
                                <p>EGP {{$hosting->price}} / {{$hosting->time}}</p>
                            </div>
                            <div class="pricing-bottom">
                                @php
                                    $features=explode(',',$hosting->feature);
                                @endphp
                                @foreach ($features as $feature)
                                    <p>{{ $feature }}</p>
                                @endforeach
                                <p class="w3agile">-</p>
                                <div class="agileits-buy">
                                    <a  href="https://api.whatsapp.com/send?phone=+0201557778519&text=انا اريد ان اشتري هذا {{ $hosting->name }}" target="_blank" style="background-color: {{$hosting->color}} !important">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

			</div>

		</div>
	</div>
