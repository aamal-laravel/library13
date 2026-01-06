<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
    <div class="wrapper">
        @include('layouts.sidebar')
        <div class="main">
            @include('layouts.nav')
			<main class="content">
                @session('success')
                    <div class="alert alert-success">{{ session()->get('success')}}</div>
                @endsession
                @session('error')
                    <div class="alert alert-danger">{{ session()->get('error')}}</div>
                @endsession
                @yield('content')
            </main>
            @include('layouts.footer')
        </div>
    </div>
	<script src="{{asset('dashboard-assets/js/app.js')}}"></script>

</body>

</html>
