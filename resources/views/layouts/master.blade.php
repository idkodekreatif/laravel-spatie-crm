<!DOCTYPE html>
<html lang="en">

<x-dashboard.head :title="$title" />

<body class="g-sidenav-show  bg-gray-100">

    <x-dashboard.asside />

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <x-dashboard.nav />

        <div class="container-fluid py-4">
            {{-- content --}}
            <div class="modal fade" id="modal_action" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
            </div>

            {{ $slot }}

            {{-- loader --}}
            <div class="preloader" style="visibility:hidden;">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>

            <x-dashboard.footer />
        </div>
    </main>

    <x-dashboard.scripts />
</body>

</html>