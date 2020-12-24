@extends('admin.backend.layouts.master')

@section('title','Home')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    @foreach($subjects as $subject)
    @if( $subject->status != 'expired')
    <div class="col-3">
        <a href="{{ route('admin.answers.create') }}">
            <div class="card card h-100">
                <h5 class="card-header bg-{{ $subject->status }}" style="color:white !important;">{{ $subject->subject_code }} &nbsp;{{ $subject->title }}</h5>
                <div class="card-body bg-{{ $subject->status }} " style="color:white !important;">
                    <div class="text-align-center">{{ $subject->timeRemaining }}</div><br>
                    <div class="row">
                        <span class="col-md-4" style="font-size: 4rem;">
                            @if ($subject->status === 'warning')
                            <i class="fas fa-exclamation-triangle"></i>
                            @elseif($subject->status === 'danger')
                            <i class="fas fa-skull-crossbones"></i>
                            @else
                            <i class="fas fa-exclamation"></i>
                            @endif</span>
                        <span class="card-text text-center col-md-8">
                            <p> {{ $subject->grade->program->title }}</p>
                        <p>{{ $subject->grade->title }}</p><br>
                        <p>{{ $subject->description }}</p>
                    </div>
                Submit Answer !
                </div>
            </div>
        </a>
    </div>
    @endif
    @endforeach
</div>
</div>
@endsection
