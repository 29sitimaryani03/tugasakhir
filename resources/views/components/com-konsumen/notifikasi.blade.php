@push('js')
    @foreach (['success', 'danger', 'warning', 'info'] as $status)
        @if (session($status))
            @if ($status == 'success')
                <script>
                    Swal.fire({
                        title: '',
                        text: '{{ session($status) }}',
                        icon: '{{ $status }}',
                        timer: 1500,
                        timerProgressBar: true,
                        showConfirmButton: false
                    })
                </script>
            @else
                <script>
                    Swal.fire({
                        title: '',
                        text: '{{ session($status) }}',
                        icon: '{{ $status }}',
                        timer: 1500,
                        timerProgressBar: true,
                        showConfirmButton: false
                    })
                </script>
            @endif
        @endif
    @endforeach

@endpush
