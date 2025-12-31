@if (session()->has('success') || session()->has('error'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        @php
            $isSuccess = session()->has('success');
            $bgColor = $isSuccess ? 'text-bg-success' : 'text-bg-danger';
            $icon = $isSuccess ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill';
            $message = $isSuccess ? session('success') : session('error');
            $title = $isSuccess ? 'Sucesso!' : 'Erro!';
        @endphp

        <div id="statusToast" class="toast align-items-center {{ $bgColor }} border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-2">
                    <i class="bi {{ $icon }} fs-5"></i>
                    <div>
                        <strong class="d-block">{{ $title }}</strong>
                        {{ $message }}
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script type="module">
        const toastEl = document.getElementById('statusToast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    </script>
@endif