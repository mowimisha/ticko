@extends('layouts.dev')

@section('title')
    Tickets
@endsection

@section('content')

<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <script src="../js/sweetalert2.all.js"></script>

        <!-- Include this after the sweet alert js file -->
        @if (Session::has('sweet_alert.alert'))
            <script>
                swal({!! Session::get('sweet_alert.alert') !!});
            </script>
        @endif

    @foreach ($tickets as $ticket)
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">

            <div class="kt-portlet__head-toolbar kt-portlet__head-lg">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__body-actions" style="margin-left:  200px;"">
                        @if (Auth::user()->hasRole('dev'))
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="">
                                        <strong> Batch No : {{ $ticket['batch_no'] }} </strong>
                                    </h5>
                                </div>
                            </div>
                        @elseif (Auth::user()->hasRole('seller'))
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="">
                                        <strong> Batch No : {{ $ticket['batch_no'] }} </strong>
                                    </h5>
                                </div>
                            </div>
                        @endif
                    </div>
                    &nbsp;&nbsp;
                    <div class="kt-portlet__body-actions" style="margin-left:  200px;">
                        @if (Auth::user()->hasRole('dev'))
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>
                                        Booked <span class="kt-badge kt-badge--success kt-badge--inline"> {{ $active_tickets }} </span> &nbsp;&nbsp;&nbsp;
                                        Deactivated <span class="kt-badge kt-badge--danger kt-badge--inline"> {{ $inactive_tickets }} </span>
                                    </h5>
                                </div>
                            </div>
                        @elseif (Auth::user()->hasRole('seller'))
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>
                                        Booked <span class="kt-badge kt-badge--success kt-badge--inline"> {{ $active_tickets }} </span> &nbsp;&nbsp;&nbsp;
                                        Deactivated <span class="kt-badge kt-badge--danger kt-badge--inline"> {{ $inactive_tickets }} </span>
                                    </h5>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">


            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        @if(Auth::user()->hasRole('dev'))
                            <tr>
                                <th>
                                    ID
                                </th>

                                <th>
                                    Event
                                </th>

                                <th>
                                    Code
                                </th>
                                <th>
                                    Ticket Status
                                </th>

                                <th>
                                    Validated by
                                </th>

                                <th>
                                    Validated On
                                </th>

                                <th>
                                    Booked by
                                </th>

                                <th>
                                    Buyer Email
                                </th>

                                <th>
                                    Buyer Phone
                                </th>

                                <th>
                                    Bought Via
                                </th>
                                <th>
                                    Bought On
                                </th>
                            </tr>
                        @elseif(Auth::user()->hasRole('admin'))
                            <tr>
                                <th>
                                    ID
                                </th>

                                <th>
                                    Event
                                </th>

                                <th>
                                    Code
                                </th>
                                <th>
                                    Ticket Status
                                </th>

                                <th>
                                    Validated by
                                </th>

                                <th>
                                    Validated On
                                </th>

                                <th>
                                    Booked by
                                </th>

                                <th>
                                    Buyer Email
                                </th>

                                <th>
                                    Buyer Phone
                                </th>

                                <th>
                                    Bought Via
                                </th>
                                <th>
                                    Bought On
                                </th>
                            </tr>
                        @elseif(Auth::user()->hasRole('seller'))
                            <tr>
                                <th>
                                    ID
                                </th>

                                <th>
                                    Event
                                </th>

                                <th>
                                    Code
                                </th>
                                <th>
                                    Ticket Status
                                </th>

                                <th>
                                    Validated by
                                </th>

                                <th>
                                    Validated On
                                </th>

                                <th>
                                    Booked by
                                </th>

                                <th>
                                    Buyer Email
                                </th>

                                <th>
                                    Buyer Phone
                                </th>

                                <th>
                                    Bought Via
                                </th>
                                <th>
                                    Bought On
                                </th>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @if(Auth::user()->hasRole('dev'))
                            @foreach($ticket['ticket_info'] as $value)
                                <tr>

                                    <td>{{ $value['id'] }}</td>

                                    <td>{{ $value['event_title'] }}</td>

                                    <td>{{ $value['crypt_text'] }}</td>

                                    @if($value['ticket_status'] == '')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--unified-info kt-badge--lg kt-badge--inline"> {{ $value['ticket_status'] }} </span></span></td>
                                    @elseif($value['ticket_status'] == 'booked')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--success kt-badge--lg kt-badge--inline"> {{ $value['ticket_status'] }} </span></span></td>
                                    @elseif($value['ticket_status'] == 'deactivated')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--danger kt-badge--lg kt-badge--inline"> {{ $value['ticket_status'] }} </span></span></td>
                                    @else
                                    @endif

                                    <td>{{ $value['validated_by'] }}</td>

                                    <td>{{ $value['validated_on'] }}</td>

                                    <td>{{ $value['booked_by'] ['firstname'] }} {{ $value['booked_by'] ['lastname'] }}</td>

                                    <td>{{ $value['booked_by'] ['email'] }}</td>

                                    <td>{{ $value['booked_by'] ['phone'] }}</td>

                                    <td>{{ $value['booked_by'] ['payment_mode'] }}</td>

                                    <td>{{ $value['booked_by'] ['booking_date'] }}</td>

                                </tr>
                            @endforeach
                        @elseif(Auth::user()->hasRole('admin'))
                            @foreach($ticket['ticket_info'] as $value)
                                <tr>

                                    <td>{{ $value['id'] }}</td>

                                    <td>{{ $value['event_title'] }}</td>

                                    <td>{{ $value['crypt_text'] }}</td>

                                    @if($value['ticket_status'] == '')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--unified-info kt-badge--lg kt-badge--inline"> {{ $value['ticket_status'] }} </span></span></td>
                                    @elseif($value['ticket_status'] == 'booked')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--success kt-badge--lg kt-badge--inline"> {{ $value['ticket_status'] }} </span></span></td>
                                    @elseif($value['ticket_status'] == 'deactivated')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--danger kt-badge--lg kt-badge--inline"> {{ $value['ticket_status'] }} </span></span></td>
                                    @else
                                    @endif

                                    <td>{{ $value['validated_by'] }}</td>

                                    <td>{{ $value['validated_on'] }}</td>

                                    <td>{{ $value['booked_by'] ['firstname'] }} {{ $value['booked_by'] ['lastname'] }}</td>

                                    <td>{{ $value['booked_by'] ['email'] }}</td>

                                    <td>{{ $value['booked_by'] ['phone'] }}</td>

                                    <td>{{ $value['booked_by'] ['payment_mode'] }}</td>

                                    <td>{{ $value['booked_by'] ['booking_date'] }}</td>

                                </tr>
                            @endforeach
                        @elseif(Auth::user()->hasRole('seller'))
                            @foreach($ticket['ticket_info'] as $value)
                                <tr>

                                    <td>{{ $value['id'] }}</td>

                                    <td>{{ $value['event_title'] }}</td>

                                    <td>{{ $value['crypt_text'] }}</td>

                                    @if($value['ticket_status'] == '')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--unified-info kt-badge--lg kt-badge--inline"> {{ $value['ticket_status'] }} </span></span></td>
                                    @elseif($value['ticket_status'] == 'booked')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--success kt-badge--lg kt-badge--inline"> {{ $value['ticket_status'] }} </span></span></td>
                                    @elseif($value['ticket_status'] == 'deactivated')
                                        <td data-field="Status" class=""><span style="width: 110px;"><span class="kt-badge kt-badge--danger kt-badge--lg kt-badge--inline"> {{ $value['ticket_status'] }} </span></span></td>
                                    @else
                                    @endif

                                    <td>{{ $value['validated_by'] }}</td>

                                    <td>{{ $value['validated_on'] }}</td>

                                    <td>{{ $value['booked_by'] ['firstname'] }} {{ $value['booked_by'] ['lastname'] }}</td>

                                    <td>{{ $value['booked_by'] ['email'] }}</td>

                                    <td>{{ $value['booked_by'] ['phone'] }}</td>

                                    <td>{{ $value['booked_by'] ['payment_mode'] }}</td>

                                    <td>{{ $value['booked_by'] ['booking_date'] }}</td>

                                </tr>
                            @endforeach
						@else
				        @endif
                    </tbody>
                </table>

            <!--end: Datatable -->
            @endforeach
        </div>
    </div>

</div>
<!-- end:: Content -->

@endsection
