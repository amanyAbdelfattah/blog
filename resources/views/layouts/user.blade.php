@include('user.includes.header')
@include('user.includes.navbar')
{{-- @include('user.includes.pageheader') --}}

    
    @yield('content')

{{-- @include('user.includes.cstservice') --}}
@include('user.includes.footer')
@include('user.includes.mainscripts')
</body>
</html>