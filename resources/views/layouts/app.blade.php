<!DOCTYPE html>
<html lang="en">
<head>
 @include('layouts.sections.css')
</head>
<body>
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <div id="page-container" class="page-container fade page-without-sidebar page-header-fixed page-with-top-menu">

        @include('layouts.header')
        <div id="content" class="content">
            <div class="row">
                
  
                  @yield('content')

            
            </div>
        </div>
    </div>

    @include('layouts.sections.js')
    <!-- ================== BEGIN BASE JS ================== -->

</body>

</html>
