<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Upload Answer</title>
    <link rel="stylesheet" href="{{ asset('css/tus.css') }}">
    <link href="{{ asset('/backend/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <form class="upload-form">
                <input type="file">
                <p>Drag your files here or click in this area.</p>
            </form>
        </div>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" style="display: none;">
            <symbol id="wave">
                <path d="M420,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C514,6.5,518,4.7,528.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H420z"></path>
                <path d="M420,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C326,6.5,322,4.7,311.5,2.7C304.3,1.4,293.6-0.1,280,0c0,0,0,0,0,0v20H420z"></path>
                <path d="M140,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C234,6.5,238,4.7,248.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H140z"></path>
                <path d="M140,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C46,6.5,42,4.7,31.5,2.7C24.3,1.4,13.6-0.1,0,0c0,0,0,0,0,0l0,20H140z"></path>
            </symbol>
        </svg>
        <div class="box d-none" id="loading">
            <div class="percent">
                <div class="percentNum" id="count">0</div>
                <div class="percentB">%</div>
            </div>
            <div id="water" class="water">
                <svg viewBox="0 0 560 20" class="water_wave water_wave_back">
                    <use xlink:href="#wave"></use>
                </svg>
                <svg viewBox="0 0 560 20" class="water_wave water_wave_front">
                    <use xlink:href="#wave"></use>
                </svg>
            </div>
        </div>
        <div class="row" style="position: absolute;bottom: 20vh;">
            <div class="span4">
                <button class="btn btn-success stop btn-pause" id="toggle-btn">start upload</button>
            </div>
        </div>
    </div>
    <div class="progress progress-striped progress-success">
        <div class="bar" style="width: 0%;"></div>
    </div>
</body>
<script src="{{ asset('/backend/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{ asset('js/tus.js') }}"></script>
<script src="{{ asset('js/tus.custom.js') }}"></script>
<script>
    function uploaded() {
        $.ajax({
            url: "{{ route('admin.answers.uploaded') }}"
            , method: "POST"
            , dataType: 'json'
            , data: {
                hash: '{{ $answer->hash }}'
                , filename: filename
            , }
            , headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
            , success: function() {
                $(window).attr('location', "{{ route('admin.answers.index') }}");
            }
        , });
    }

</script>
</body>

</html>
