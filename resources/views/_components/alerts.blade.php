<script src="{{ asset('js/iziToast.js') }}"></script>

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            <script type="text/javascript">
                iziToast.error({
                    title: '!',
                    message: "{{ $error }}",
                    icon: '',
                    iconText: '',
                    iconColor: '',
                    iconUrl: null,
                    position: 'topRight',
                });
            </script>
        @endforeach
    </div>
@endif


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    <script>
        iziToast.success({
            title: 'OK',
            message: "{{ session('success') }}",
            icon: 'fa-check-circle',
            iconText: '',
            iconColor: '',
            iconUrl: null,
            position: 'topRight',
        });
    </script>
@endif

@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
    <script>
        iziToast.success({
            title: 'OK',
            message: "{{ session('info') }}",
            icon: 'fa-check-circle',
            iconText: '',
            iconColor: '',
            iconUrl: null,
            position: 'topRight',
        });
    </script>
@endif

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    <script>
        iziToast.success({
            title: 'OK',
            message: "{{ session('message') }}",
            icon: 'fa-check-circle',
            iconText: '',
            iconColor: '',
            iconUrl: null,
            position: 'topRight',
        });
    </script>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    <script>
        iziToast.error({
            title: 'Error',
            message: "{{ session('error') }}",
            icon: '',
            iconText: '',
            iconColor: '',
            iconUrl: null,
            position: 'topRight',
        });
    </script>
@endif
