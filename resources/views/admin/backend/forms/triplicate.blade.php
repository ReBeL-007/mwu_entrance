@include('admin.backend.layouts.head')
<style>
    .triplicate-table {
        margin-top: 3vh;
    }

    @media print {
        div.breakpage {
            page-break-before: always
        }
    }
    .space{
        border-bottom: 2px solid black;
        margin-bottom: 3vh;
        margin-top: 3vh;
    }

</style>
<body>
    @php
    $regular = [];
    $partial = [];
    $chance = [];
    foreach ($forms as $key => $form) {
    if($form->exam_type === 'Regular'){
    array_push($regular, $form);
    }elseif ($form->exam_type === 'Partial') {
    array_push($partial, $form);
    }else {
    array_push($chance, $form);
    }
    }
    @endphp
    @if(count($regular) > 0)
    <div class="print-header">
        <img id="mwu-logo" src="{{ asset('mwu-logo.png') }}" alt="Mid Western University">
        <div class="header">
            <div class="university-content">
                <div id="university">
                    <span>Mid-Western University</span>
                </div>
                <div id="office">
                    <span>Examinations Management Office</span>
                </div>
                <div id="address">
                    <span>Surkhet, Nepal</span>
                </div>
                <div id="college">
                    <span>Triplicate Regular</span>
                </div>
            </div>
        </div>
        <div style="width:100%">
            <div style="float:left">
                <div>
                    <span style="font-weight:bold;">Program : </span><span style="font-weight:bold;">{{ $college_data['program'] }}</span>
                </div>
                <div>
                    <span style="font-weight:bold;">College/Campus : </span><span style="font-weight:bold;">{{ $college_data['college'] }}</span>
                </div>
            </div>
            <div style="float:right">
                <div>
                    <span style="font-weight:bold;">Semester : </span><span style="font-weight:bold;">{{ $college_data['semester'] }}</span>
                </div>
                <div>
                    <span style="font-weight:bold;">Total No. of Student : </span><span style="font-weight:bold;">{{ count($regular) }}</span>
                </div>
            </div>
        </div>
    </div>
    <div>
        <table class="table table-striped triplicate-table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Student Name</th>
                    <th>Registration No</th>
                    <th>Symbol No</th>
                    @php
                    $count = 0;
                    foreach ($regular as $key => $form) {
                    $subjects = $form->subjects;
                    if(count($subjects)>$count){
                    $count = count($subjects);
                    }
                    }
                    @endphp
                    @for($i = 1; $i <= $count; $i++) <th>Subject {{ $i }}</th>
                        @endfor
                </tr>
            </thead>
            <tbody>
                @foreach($regular as $keys => $form)
                <tr>
                    <td>{{ $keys+1 }}</td>
                    <td>{{ $form->fname }} {{ $form->mname }} {{ $form->lname }}</td>
                    <td>{{ $form->regd_no }}</td>
                    <td>{{ $form->symbol_no }}</td>
                    @foreach($form->subjects as $key => $subject)
                    <td>{{ $subject->subject_code }}</td>
                    @endforeach
                    @for($i = 1; $i <= $count - count(json_decode($form->subject_codes)); $i++)
                        <td></td>
                        @endfor
                </tr>
                @endforeach
            </tbody>
        </table>
        @php
        $subjects = [];
        foreach($regular as $entry) {
        foreach ($entry->subjects as $key => $subject) {
        if(! in_array($subject, $subjects)) {
        array_push($subjects,$subject);
        }
        }
        }
        foreach ($subjects as $key => $subject) {
        $count = 0;
        foreach ($regular as $key => $entry) {
        foreach ($entry->subjects as $key => $regular_subject) {
        if ($regular_subject->title === $subject->title) {
        $count++;
        }
        }
        }
        $subject->count = $count;
        }
        @endphp
        <div class="space"></div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Student No.</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $key=> $subject)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $subject->subject_code }}</td>
                    <td>{{ $subject->title }}</td>
                    <td>{{ $subject->count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        @if(count($partial) > 0)
        <div class="breakpage"></div>
        <div class="print-header">
            <img id="mwu-logo" src="{{ asset('mwu-logo.png') }}" alt="Mid Western University">
            <div class="header">
                <div class="university-content">
                    <div id="university">
                        <span>Mid-Western University</span>
                    </div>
                    <div id="office">
                        <span>Examinations Management Office</span>
                    </div>
                    <div id="address">
                        <span>Surkhet, Nepal</span>
                    </div>
                    <div id="college">
                        <span>Triplicate Partial</span>
                    </div>
                </div>
            </div>
            <div style="width:100%">
                <div style="float:left">
                    <div>
                        <span style="font-weight:bold;">Program : </span><span style="font-weight:bold;">{{ $college_data['program'] }}</span>
                    </div>
                    <div>
                        <span style="font-weight:bold;">College/Campus : </span><span style="font-weight:bold;">{{ $college_data['college'] }}</span>
                    </div>
                </div>
                <div style="float:right">
                    <div>
                        <span style="font-weight:bold;">Semester : </span><span style="font-weight:bold;">{{ $college_data['semester'] }}</span>
                    </div>
                    <div>
                        <span style="font-weight:bold;">Total No. of Student : </span><span style="font-weight:bold;">{{ count($partial) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped triplicate-table">
            <tr>
                <th>SN</th>
                <th>Student Name</th>
                <th>Registration No</th>
                <th>Symbol No</th>
                @php
                $count = 0;
                foreach ($partial as $key => $form) {
                    $subjects = $form->subjects;
                    if(count($subjects)>$count){
                    $count = count($subjects);
                    }
                    }
                @endphp
                @for($i = 1; $i <= $count; $i++) <th>Subject {{ $i }}</th>
                    @endfor
            </tr>
            </thead>
            <tbody>
                @foreach($partial as $keys => $form)
                <tr>
                    <td>{{ $keys+1 }}</td>
                    <td>{{ $form->fname }} {{ $form->mname }} {{ $form->lname }}</td>
                    <td>{{ $form->regd_no }}</td>
                    <td>{{ $form->symbol_no }}</td>
                    @foreach($form->subjects as $key => $subject)
                    <td>{{ $subject->subject_code }}</td>
                    @endforeach
                    @for($i = 1; $i <= $count - count(json_decode($form->subject_codes)); $i++)
                        <td></td>
                        @endfor
                </tr>
                @endforeach
            </tbody>
        </table>
        @php
        $subjects = [];
        foreach($partial as $entry) {
        foreach ($entry->subjects as $key => $subject) {
        if(! in_array($subject, $subjects)) {
        array_push($subjects,$subject);
        }
        }
        }
        foreach ($subjects as $key => $subject) {
        $count = 0;
        foreach ($partial as $key => $entry) {
        foreach ($entry->subjects as $key => $partial_subject) {
        if ($partial_subject->title === $subject->title) {
        $count++;
        }
        }
        }
        $subject->count = $count;
        }
        @endphp
        <div class="space"></div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Student No.</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $key=> $subject)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $subject->subject_code }}</td>
                    <td>{{ $subject->title }}</td>
                    <td>{{ $subject->count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        @if(count($chance) > 0)
        <div class="breakpage"></div>
        <div class="print-header">
            <img id="mwu-logo" src="{{ asset('mwu-logo.png') }}" alt="Mid Western University">
            <div class="header">
                <div class="university-content">
                    <div id="university">
                        <span>Mid-Western University</span>
                    </div>
                    <div id="office">
                        <span>Examinations Management Office</span>
                    </div>
                    <div id="address">
                        <span>Surkhet, Nepal</span>
                    </div>
                    <div id="college">
                        <span>Triplicate Chance</span>
                    </div>
                </div>
            </div>
            <div style="width:100%">
                <div style="float:left">
                    <div>
                        <span style="font-weight:bold;">Program : </span><span style="font-weight:bold;">{{ $college_data['program'] }}</span>
                    </div>
                    <div>
                        <span style="font-weight:bold;">College/Campus : </span><span style="font-weight:bold;">{{ $college_data['college'] }}</span>
                    </div>
                </div>
                <div style="float:right">
                    <div>
                        <span style="font-weight:bold;">Semester : </span><span style="font-weight:bold;">{{ $college_data['semester'] }}</span>
                    </div>
                    <div>
                        <span style="font-weight:bold;">Total No. of Student : </span><span style="font-weight:bold;">{{ count($chance) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped triplicate-table">
            <tr>
                <th>SN</th>
                <th>Student Name</th>
                <th>Registration No</th>
                <th>Symbol No</th>
                @php
                $count = 0;
                foreach ($chance as $key => $form) {
                    $subjects = $form->subjects;
                    if(count($subjects)>$count){
                    $count = count($subjects);
                    }
                    }
                @endphp
                @for($i = 1; $i <= $count; $i++) <th>Subject {{ $i }}</th>
                    @endfor
            </tr>
            </thead>
            <tbody>
                @foreach($chance as $keys => $form)
                <tr>
                    <td>{{ $keys+1 }}</td>
                    <td>{{ $form->fname }} {{ $form->mname }} {{ $form->lname }}</td>
                    <td>{{ $form->regd_no }}</td>
                    <td>{{ $form->symbol_no }}</td>
                    @foreach($form->subjects as $key => $subject)
                    <td>{{ $subject->subject_code }}</td>
                    @endforeach
                    @for($i = 1; $i <= $count - count(json_decode($form->subject_codes)); $i++)
                        <td></td>
                        @endfor
                </tr>
                @endforeach
            </tbody>
        </table>
        @php
        $subjects = [];
        foreach($chance as $entry) {
        foreach ($entry->subjects as $key => $subject) {
        if(! in_array($subject, $subjects)) {
        array_push($subjects,$subject);
        }
        }
        }
        foreach ($subjects as $key => $subject) {
        $count = 0;
        foreach ($chance as $key => $entry) {
        foreach ($entry->subjects as $key => $chance_subject) {
        if ($chance_subject->title === $subject->title) {
        $count++;
        }
        }
        }
        $subject->count = $count;
        }
        @endphp
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Student No.</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $key=> $subject)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $subject->subject_code }}</td>
                    <td>{{ $subject->title }}</td>
                    <td>{{ $subject->count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

</body>
<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>
</html>
