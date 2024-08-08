<div>
@if (count($parteners))
    <div class="brand-one">
        <div class="container">
            <div class="heading-bx text-center">
                <h2 class="title mb-0">{{__('ms_lang.Success Partners')}}</h2>
            </div>

            <div class="brand-one__carousel owl-theme owl-none custom-nav owl-carousel">
                @foreach ($parteners as $partener )
                <div class="item">
                    <a @if($partener->link !='') href="{{$partener->link}}" target="_blank" @endif>  <img loading="lazy" src="{{img_chk_exist($partener->img)}}" alt="{{ app()->getLocale() == 'ar' ? @$partener->name : @$partener->name_en }}" title="{{ app()->getLocale() == 'ar' ? @$partener->name : @$partener->name_en }}" /> </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endif
</div>
