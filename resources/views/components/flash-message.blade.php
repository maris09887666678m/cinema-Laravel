@if (session()->has('success') || session()->has('error'))
    <div id="flash-message" x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
        class="fixed top-12 start-50 translate-middle-x z-50 w-100 max-w-xs p-4 mb-4"
        role="alert">
        
        @if (session()->has('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill flex-shrink-0 me-2" style="font-size: 1.5rem;"></i>
                <div>
                    {{ session('success') }}
                </div>
              
            </div>
        @else
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-x-circle-fill flex-shrink-0 me-2" style="font-size: 1.5rem;"></i>
                <div>
                    {{ session('error') }}
                </div>
                 </div>
        @endif
    </div>
@endif
