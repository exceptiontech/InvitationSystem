<!DOCTYPE html>
{{--  <head lang="{{ str_replace('_', '-', app()->getLocale()) }}">  --}}
    <html lang="en">


    <head>
@include('admin.layouts.head')

<livewire:styles />

@include('admin.layouts.header')
@yield('header')
@include('admin.layouts.header_mnu')
@include('admin.layouts.sidebar')

@yield('content')

{{--  @include('admin.layouts.user_mnus')  --}}
<livewire:scripts />
@stack('scripts')
@livewireScripts


@include('admin/layouts/footer')
{{--  @yield('footer')  --}}
</body>
</html>
