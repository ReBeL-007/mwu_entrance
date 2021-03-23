@extends('layouts.app')

@section('content')
<div class="container">
    @include('admin.backend.includes.messages')
    @if(session('message'))
    {{session('message')}}
    @endif
    <div class="row justify-content-center">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-form">
                @if(isset($data))
                <thead>
                    <tr>
                        <th>
                            Symbol No.
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Faculty
                        </th>
                        <th>
                            Level
                        </th>
                        <th>
                            Program
                        </th>
                        @if($data->payment_method == 1)
                        <th>
                            eSewa Status
                        </th>
                        @endif
                        <th>
                            Verification Status
                        </th>
                        <th>
                            Action
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>                    
                         <td>
                            {{$data->symbol_no}} 
                         </td>
                         <td>
                         {{ $data->fname ?? '' }} {{ $data->mname ?? '' }} {{ $data->lname ?? '' }}
                         </td>
                         <td>
                            {{$data->faculties->name}} 
                         </td>
                         <td>
                            {{$data->levels->name}} 
                         </td>
                         <td>
                            {{$data->course->name ?? ''}} 
                         </td>
                         @if($data->payment_method == 1)
                         <td>
                            @if($data->esewa_status == 0)
                            <span class="badge badge-warning">Pay to finalize registration</span>
                            @elseif($data->esewa_status == 1)
                            <span class="badge badge-success">Paid</span>
                            @endif
                         </td>
                         @endif
                         <td>
                            @if($data->is_verified == 0)
                            <span class="badge badge-info">Pending</span>
                            @elseif($data->is_verified == 1)
                            <span class="badge badge-success">Approved</span>
                            @endif
                         </td>
                         <td>
                        @if($data->payment_method == 1)
                            @if($data->esewa_status == 0)
                            <?php
                            $url = "https://esewa.com.np/epay/main";
                            $esewa_data =[
                                'amt'=> $data->colleges->form_charge,
                                'pdc'=> 0,
                                'psc'=> 0,
                                'txAmt'=> 0,
                                'tAmt'=> $data->colleges->form_charge,
                                'pid'=> $data->pid,
                                'scd'=> $data->colleges->merchant_no,
                                'su'=> route('admin.forms.fraud-check',$data->id),
                                'fu'=> route('home')
                            ];
                            
                                $curl = curl_init($url);
                                curl_setopt($curl, CURLOPT_POST, true);
                                curl_setopt($curl, CURLOPT_POSTFIELDS, $esewa_data);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                $response = curl_exec($curl);
                                curl_close($curl);
                                ?>
                                <form action="<?php echo $url?>" method="POST">
                                    @csrf
                                    <input value="<?php echo $esewa_data['tAmt']?>" name="tAmt" type="hidden">
                                    <input value="<?php echo $esewa_data['amt']?>" name="amt" type="hidden">
                                    <input value="<?php echo $esewa_data['txAmt']?>" name="txAmt" type="hidden">
                                    <input value="<?php echo $esewa_data['psc']?>" name="psc" type="hidden">
                                    <input value="<?php echo $esewa_data['pdc']?>" name="pdc" type="hidden">
                                    <input value="<?php echo $esewa_data['scd']?>" name="scd" type="hidden">
                                    <input value="<?php echo $esewa_data['pid']?>" name="pid" type="hidden">
                                    <input value="<?php echo $esewa_data['su']?>" type="hidden" name="su">
                                    <input value="<?php echo $esewa_data['fu']?>" type="hidden" name="fu">
                                    <input type="submit" class="btn btn-xs btn-primary" value="Pay with esewa">
                                   
                                </form>
                            @endif
                        @endif
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.forms.print-student-details', $data->id) }}" target="_blank" style="margin:5px 0px;" >
                                Get Form
                            </a> 
                            <a class="btn btn-xs btn-success <?PHP echo ($data->is_verified == '0')? 'disabled': ''; ?>" href="{{ route('admin.forms.print', $data->id) }}" target="_blank" style="margin:5px 0px;" >
                                Get Card
                            </a>
                         </td> 
                    </tr>
                </tbody>
                @elseif(isset($exam))
                <thead>
                    <tr>
                        <th>
                            Symbol No.
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Faculty
                        </th>
                        <th>
                            Level
                        </th>
                        <th>
                            Program
                        </th>
                        @if($exam->payment_method == 1)
                        <th>
                            eSewa Status
                        </th>
                        @endif
                        <th>
                            Verification Status
                        </th>
                        <th>
                            Action
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>                    
                         <td>
                            {{$exam->symbol_no}} 
                         </td>
                         <td>
                         {{ $exam->fname ?? '' }} {{ $exam->mname ?? '' }} {{ $exam->lname ?? '' }}
                         </td>
                         <td>
                            {{$exam->faculties->name}} 
                         </td>
                         <td>
                            {{$exam->levels->name}} 
                         </td>
                         <td>
                            {{$exam->course->name ?? ''}} 
                         </td>
                         @if($exam->payment_method == 1)
                         <td>
                            @if($exam->esewa_status == 0)
                            <span class="badge badge-warning">Pay to finalize registration</span>
                            @elseif($exam->esewa_status == 1)
                            <span class="badge badge-success">Paid</span>
                            @endif
                         </td>
                         @endif
                         <td>
                            @if($exam->is_verified == 0)
                            <span class="badge badge-info">Pending</span>
                            @elseif($exam->is_verified == 1)
                            <span class="badge badge-success">Approved</span>
                            @endif
                         </td>
                         <td>
                        @if($exam->payment_method == 1)
                            @if($exam->esewa_status == 0)
                            <?php
                            $url = "https://esewa.com.np/epay/main";
                            $esewa_data =[
                                'amt'=> $exam->colleges->form_charge,
                                'pdc'=> 0,
                                'psc'=> 0,
                                'txAmt'=> 0,
                                'tAmt'=> $exam->colleges->form_charge,
                                'pid'=> $exam->pid,
                                'scd'=> $exam->colleges->merchant_no,
                                'su'=> route('admin.forms.fraud-check',$exam->id),
                                'fu'=> route('home')
                            ];
                            
                                $curl = curl_init($url);
                                curl_setopt($curl, CURLOPT_POST, true);
                                curl_setopt($curl, CURLOPT_POSTFIELDS, $esewa_data);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                $response = curl_exec($curl);
                                curl_close($curl);
                                ?>
                                <form action="<?php echo $url?>" method="POST">
                                    @csrf
                                    <input value="<?php echo $esewa_data['tAmt']?>" name="tAmt" type="hidden">
                                    <input value="<?php echo $esewa_data['amt']?>" name="amt" type="hidden">
                                    <input value="<?php echo $esewa_data['txAmt']?>" name="txAmt" type="hidden">
                                    <input value="<?php echo $esewa_data['psc']?>" name="psc" type="hidden">
                                    <input value="<?php echo $esewa_data['pdc']?>" name="pdc" type="hidden">
                                    <input value="<?php echo $esewa_data['scd']?>" name="scd" type="hidden">
                                    <input value="<?php echo $esewa_data['pid']?>" name="pid" type="hidden">
                                    <input value="<?php echo $esewa_data['su']?>" type="hidden" name="su">
                                    <input value="<?php echo $esewa_data['fu']?>" type="hidden" name="fu">
                                    <input type="submit" class="btn btn-xs btn-primary" value="Pay with esewa">
                                   
                                </form>
                            @endif
                        @endif
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.exams.print-student-details', $exam->id) }}" target="_blank" style="margin:5px 0px;" >
                                Get Form
                            </a> 
                            <a class="btn btn-xs btn-success <?PHP echo ($exam->is_verified == '0')? 'disabled': ''; ?>" href="{{ route('admin.exams.print', $exam->id) }}" target="_blank" style="margin:5px 0px;" >
                                Get Card
                            </a>
                         </td> 
                    </tr>
                </tbody>
                @else
                <div class="">
                    <a href="{{route('admin.forms.create')}}">Entrance Form</a>
                </div>
                <div class="">
                    <a href="{{route('admin.exams.create')}}">Exam Form</a>
                </div>
                 @endif
            </table>
    </div>
</div>
@endsection
