<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login Form</title>
    <style>
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }

        .form-content {
            background-color: #f8f9fa;
            /* Light grey background */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <section class="form-container">
        <div class="col-6 col-md-4 form-content">
            <div class="p-3 p-md-4 p-xl-5">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-5">
                            <h2 class="h3">Login</h2>
                        </div>
                    </div>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="row gy-3 gy-md-4 overflow-hidden">
                        <div class="col-12">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                        <div class="mt-3">
                            <span>Don't have account?</span> <a href="{{ route('register') }}">Register</a>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success') || session('error'))
        @php
            $title = session('success') ? 'success' : 'error';
            $message = session('success') ? session('success') : session('error');
        @endphp

        <script>
            Swal.fire({
                title: '{{ ucfirst($title) }}',
                text: "{{ $message }}",
                icon: '{{ $title }}',
                confirmButtonColor: '#435ebe',
                confirmButtonText: 'Done',
                onConfirm: function() {
                    window.location.href = "{{ url()->current() }}";
                }
            })
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                title: 'error',
                text: "{{ $errors->first() }}",
                icon: 'error',
                confirmButtonColor: '#435ebe',
                confirmButtonText: 'Done'
            })
        </script>
    @endif
</body>

</html>
