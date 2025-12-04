
<div class="rts-footer-copy-right v_1" style="background-color:#4B7E55;">
    <div class="container">
        <div class="row">
            <div class="rt-center">
                <p class="--p-xs text-white">
                    Luanda Financing Summit &copy; {{ date('Y') }} <br> All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- footer end -->


<!-- rts backto top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="
            transition: stroke-dashoffset 10ms linear 0s;
            stroke-dasharray: 307.919, 307.919;
            stroke-dashoffset: 307.919;
          ">
        </path>
    </svg>
</div>
<!-- rts back to top end -->

<div id="anywhere-home" class=""></div>

<!-- scripts -->
<!-- jquery js -->
<script src="/site/js/vendor/jquery.min.js"></script>
<!-- bootstrap 5.0.2 -->
<script src="/site/js/plugins/bootstrap.min.js"></script>
<!-- jquery ui js -->
<script src="/site/js/vendor/jquery-ui.js"></script>
<!-- wow js -->
<script src="/site/js/vendor/waw.js"></script>
<!-- mobile menu -->
<script src="/site/js/vendor/metismenu.js"></script>
<!-- magnific popup -->
<script src="/site/js/vendor/magnifying-popup.js"></script>
<!-- swiper JS 10.2.0 -->
<script src="/site/js/plugins/swiper.js"></script>
<!-- counterup -->
<script src="/site/js/plugins/counterup.js"></script>
<script src="/site/js/vendor/waypoint.js"></script>
<!-- isotop mesonary -->
<script src="/site/js/plugins/isotop.js"></script>
<script src="/site/js/plugins/imagesloaded.pkgd.min.js"></script>
<!-- isotop mesonary end-->
<script src="/site/js/plugins/resizer-sensor.js"></script>
<script src="/site/js/plugins/sticky-sidebar.js"></script>
<script src="/site/js/vendor/chroma.min.js"></script>
<script src="/site/js/plugins/twinmax.js"></script>
<!-- dymanic Contact Form -->
<script src="/site/js/plugins/contact.form.js"></script>
<script src="/site/js/plugins/nice-select.min.js"></script>
<!-- main Js -->
<script src="/site/js/main.js"></script>

@if (session('helpCreate'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Email enviado com sucesso!',
            showConfirmButton: true
        })
    </script>
@endif


@yield('JS')

</body>

</html>
