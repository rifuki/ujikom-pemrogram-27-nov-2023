<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <header class="header">
            <ul>
                <li><a href="/guru">Guru</a></li>
                <li><a href="/siswa">Siswa</a></li>
                <li><a href="/nilai">Nilai</a></li>
            </ul>
        </header>
        @yield('content')
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#kd_matpel').on('change', function(){
            var selectedText = $(this).find(':selected').data('nama');
            $('#nm_matpel').val(selectedText);
        });
    });
</script>
</html>