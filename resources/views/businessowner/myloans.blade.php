@extends('layouts.app')
@section('content')
    <div class="container" >
        <div class="row">
            <h1 class="text-center">My Loans</h1>
            <hr>
            <div class="col-md-10 col-md-offset-1">
                @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{ session('status') }}
                    </div>
                @endif
                <h2 style="color: darkblue">Pending Loans</h2><br>
                    <table class="table table-hover table-responsive" id="myloans_dt1">
                        <thead>
                            <tr>
                            <th>Loan Title</th>
                            <th>Loan Amount</th>
                            <th>Loan Duration</th>
                            <th>Loan Purpose</th>
                            <th>Interest Rate</th>
                            <th>Actions</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loans as $loan)
                            @if($loan->loan_status == '')
                        <tr>
                            <td>{{$loan->loan_title}}</td>
                            <td>{{$loan->loan_amount}}</td>
                            <td>{{$loan->loan_duration}}</td>
                            <td>{{$loan->loan_purpose}}</td>
                            <td></td>
                            <td>
                                <!--Approve Button-->
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#bo_myloans_approve">Approve</button>
                                <!--Model-->
                                <div class="modal fade" id="bo_myloans_approve" role="dialog">
                                    <div class="modal-dialog">
                                <!--Model Content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to approve?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form role="form" method="POST" action="{{ url('bo_loan_approve') }}">{{ csrf_field() }}
                                                    <input type="hidden" name="bo_loan_id" value="{{ $loan->id }}">
                                                    <button type="submit" id="myloan_accept" class="btn btn-danger btn-sm">Approve</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="myloan_approve_no">No</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </td>
                                <td>
                                <!--Reject Button-->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#bo_myloans_reject">Reject</button>
                                <!--Model-->
                                    <div class="modal fade" id="bo_myloans_reject" role="dialog">
                                        <div class="modal-dialog">
                                <!--Model Content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Confirmation</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to reject?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form role="form" method="POST" action="{{ url('bo_loan_reject') }}">{{ csrf_field() }}
                                                        <input type="hidden" name="bo_loan_id" value="{{ $loan->id }}">
                                                        <button type="submit" id="myloan_reject" class="btn btn-danger btn-sm">Reject</button>
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="myloan_reject_no">No</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                        </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <h2 style="color: darkblue">Accepted/Rejected Loans</h2><br>
                <table class="table table-hover table-responsive" id="myloans_dt2">
                    <thead>
                        <tr>
                        <th>Loan Title</th>
                        <th>Loan Amount</th>
                        <th>Loan Duration</th>
                        <th>Loan Purpose</th>
                        <th>Interest Rate</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($loans as $loan)
                        @if($loan->loan_status != '')
                            <tr>
                                <td>{{$loan->loan_title}}</td>
                                <td>{{$loan->loan_amount}}</td>
                                <td>{{$loan->loan_duration}}</td>
                                <td>{{$loan->loan_purpose}}</td>
                                <td></td>
                                <td>{{$loan->loan_status == '' ? 'Pending' : $loan->loan_status}}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection