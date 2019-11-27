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



    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-file"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Tickets
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                        @if(Auth::user()->hasRole('dev'))
                            <a href="{{ url('new-ticket-dev') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New Tickets
                            </a>
                        @elseif(Auth::user()->hasRole('admin'))
                            <a href="{{ url('new-ticket') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New Tickets
                            </a>
                        @elseif(Auth::user()->hasRole('seller'))
                            <a href="{{ url('new-ticket') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New Tickets
                            </a>
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
									Batch No
								</th>

								<th>
									Reference ID
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Event
                                </th>
								<th>
									Created
								</th>
								<th>
									Action
								</th>
                            </tr>
                        @elseif(Auth::user()->hasRole('admin'))
							<tr>
								<th>
									 ID
								</th>

								<th>
									Batch No
								</th>

								<th>
									Reference ID
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Event
                                </th>
								<th>
									Created
								</th>
								<th>
									Action
								</th>
							</tr>
                        @elseif(Auth::user()->hasRole('seller'))
							<tr>
								<th>
									 ID
								</th>

								<th>
									Batch No
								</th>

								<th>
									Reference ID
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Event
                                </th>
								<th>
									Created
								</th>
								<th>
									Action
								</th>
							</tr>
                        @else
                        @endif
                    </thead>
                    <tbody>
                        @if(Auth::user()->hasRole('dev'))
							@foreach($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>

                                <td>{{ $ticket->batch_no }}</td>

                                <td>{{ $ticket->reference_id }}</td>

                                <td>{{ $ticket->quantity }}</td>

                                <td>{{ $ticket->event_name }}</td>

                                <td>{{ Carbon\Carbon::parse($ticket->created_at)->format('d-m-Y - h:i:s') }}</td>

                                <td>

                                    <a href="{{ url('show-ticket-dev/'.$ticket->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{ url('delete-ticket-dev/'.$ticket->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                </button>
                                </td>
                            </tr>
                            @endforeach
                        @elseif(Auth::user()->hasRole('admin'))
                            @foreach($tickets as $ticket)
                                @if ($ticket->created_by == Auth::user()->email)
                                    <tr>
                                        <td>{{ $ticket->id }}</td>

                                        <td>{{ $ticket->batch_no }}</td>

                                        <td>{{ $ticket->reference_id }}</td>

                                        <td>{{ $ticket->quantity }}</td>

                                        <td>{{ $ticket->event_name }}</td>

                                        <td>{{ Carbon\Carbon::parse($ticket->created_at)->format('d-m-Y - h:i:s') }}</td>

                                        <td>

                                            <a href="{{ url('show-ticket-dev/'.$ticket->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                        </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @elseif(Auth::user()->hasRole('seller'))
                            @foreach($tickets as $ticket)
                                @if ($ticket->created_by == Auth::user()->email)
                                    <tr>
                                        <td>{{ $ticket->id }}</td>

                                        <td>{{ $ticket->batch_no }}</td>

                                        <td>{{ $ticket->reference_id }}</td>

                                        <td>{{ $ticket->quantity }}</td>

                                        <td>{{ $ticket->event_name }}</td>

                                        <td>{{ Carbon\Carbon::parse($ticket->created_at)->format('d-m-Y - h:i:s') }}</td>

                                        <td>

                                            <a href="{{ url('show-ticket-dev/'.$ticket->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                        </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
				        @endif
                    </tbody>
                </table>

            <!--end: Datatable -->
        </div>
    </div>

</div>
<!-- end:: Content -->

@endsection
