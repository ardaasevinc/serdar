@if (session('success'))
    <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-2" style="width: 70%;">
        {{-- <div id="successToast" class="toast align-items-center text-white border-0 w-100 px-3" role="alert"
            aria-live="assertive" aria-atomic="true" style="background-color: #0057BE;"> --}}
            <div id="successToast" class="toast align-items-center text-white border-0 w-100 px-3" role="alert"
                aria-live="assertive" aria-atomic="true"
                style="background: linear-gradient(to right, #FF2A78, #FF7643, #C8B524);">
                <div class="d-flex">
                    <div class="toast-body d-flex align-items-center">
                        <img src="{{ asset('success.svg') }}" alt="Success Icon" class="me-2" width="24" height="24">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>

       <script>
    document.addEventListener("DOMContentLoaded", function () {
        var successToast = new bootstrap.Toast(document.getElementById('successToast'), {
            delay: 30000 // 30 saniye
        });
        successToast.show();
    });
</script>

@endif