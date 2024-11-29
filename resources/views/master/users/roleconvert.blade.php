@extends('layouts.app')

@php
//echo "<pre>";
//echo $userid;
//print_r($states);
//print_r($roles);
//echo "</pre>";
//exit;
@endphp

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
 
        <div class="card">
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                @include('layouts.flash-message')
                <!--begin::Card-->
                <div class="card card-custom">

                <div class="card-body">

                <form action="{{ url('save-role')}}" method="post">
                    @csrf
                    <input type="hidden" name="uid" value="{{$id}}">

                    <table class="table table-bordered table-checkable">

                            <tr>
                                <td title="Field #1">User ID</td>
                                <td title="Field #1">{{ $userid }}</td>
                            </tr>

                            <tr>
                                <td title="Field #1">Name</td>
                                <td title="Field #2">{{ $userName }}</td>
                            </tr>

                            <tr>    
                                <td title="Field #1">Select Role</td>    
                                <td title="Field #3">
                                    <select name="role_id" id="role_id">
                                        <option value = "">Select Role</option>
                                        @foreach($roles as $kk => $role)
                                            <option value = "{{$kk}}">{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                    </table>

                        <div id="reportsto" style="display:none;">    
                            <table cellspacing="20" cellpadding="30">
                                <tr>
                                    <td>Select State</td>    
                                    <td>
                                        <select name="st_code">
                                            <option value = "">Select State</option>
                                            @foreach($states as $mm => $state)
                                                <option value = "{{$mm}}">{{ $state }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div id="others" style="display:none;">    
                            <table cellspacing="20" cellpadding="30">
                                <tr>
                                    <td>Select State Manager</td>    
                                    <td>
                                        <select name="sm_code">
                                            <option value = "">Select State Manager</option>
                                            @foreach($sminfo as $nn => $sm)
                                                <option value = "{{$nn}}~~~{{$sm['role_id']}}">{{ $sm['role_id'] }} - {{ $sm['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>

                
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Assign Role">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            // alert("DDDDDDDDDDDDDDDDD");
            $('#role_id').change(function() {
                const aaa = $(this).val();
                // alert(aaa);
                if(aaa == 2){
                    $('#others').hide();
                    $('#reportsto').show();
                } else if(aaa == '') {
                    $('#others').hide();
                    $('#reportsto').hide();
                } else {
                    $('#reportsto').hide();
                    $('#others').show();
                }
            });
        });

    </script>
@endpush
