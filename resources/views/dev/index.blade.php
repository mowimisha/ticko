@extends('layouts.dev')

@section('title')
    ADMIN DASHBOARD
@endsection

@section('content')

<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <!-- Include this after the sweet alert js file -->
        @include('sweet::alert')



    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-users"></i>
                </span>
                @if (Auth::user()->hasRole('dev'))
                    <h3 class="kt-portlet__head-title">
                        Users
                    </h3>
                @elseif (Auth::user()->hasRole('admin'))
                    <h3 class="kt-portlet__head-title">
                        Posts
                    </h3>
                @elseif (Auth::user()->hasRole('buyer'))
                    <h3 class="kt-portlet__head-title">
                        My Tickets
                    </h3>
                @elseif (Auth::user()->hasRole('seller'))
                    <h3 class="kt-portlet__head-title">
                        My Tickets
                    </h3>
                @endif
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                        @if(Auth::user()->hasRole('dev'))
                            <a href="{{ url('new-user-dev') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New User
                            </a>
                        @elseif(Auth::user()->hasRole('admin'))
                            <a href="{{ url('new-post') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New Post
                            </a>
                        @elseif(Auth::user()->hasRole('seller'))
                            <a href="{{ url('new-ticket') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New Ticket
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
									UserID
								</th>
								<th>
									User Names
								</th>
								<th>
									Email
								</th>
								<th>
									Role
								</th>
								<th>
									Created By
								</th>
								<th>
									Updated By
								</th>
								<th>
									Created On
								</th>
								<th>
									Updated On
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
						@endif
                    </thead>
                    <tbody>
                        @if(Auth::user()->hasRole('dev'))
							@foreach($users->where("role", "!=", "dev") as $user)
                            <tr>
                                <td>{{ $user->id }}</td>

                                <td class="" tabindex="0">
                                    <div class="m-card-user m-card-user--sm">
                                        <div class="row">
                                            {{--  <div class="col-md-3">
                                                <div class="m-card-user__pic">
                                                <div class=""><img alt="" src="/images/avatar.png" width="40" height="40"><br>  </div>
                                        </div>
                                            </div>  --}}
                                            <div class="col-md-12">
                                                <div class="m-card-user__details">
                                            <span class="m-card-user__name">{{$user->name}}  {{$user->lastname}}</span>
                                        </div>
                                            </div>
                                        </div>


                                    </div>
                                </td>

                                <td>{{ $user->email }}</td>

                                <td>{{ $user->role }}</td>

                                <td>{{ $user->created_by }}</td>

                                <td>{{ $user->updated_by }}</td>

                                <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y - h:i:s') }}</td>

                                <td>{{ Carbon\Carbon::parse($user->updated_at)->format('d-m-Y - h:i:s') }}</td>

                                <td>

                                    {{-- <a href="{{ url('show-user-dev/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                        <i class="fa fa-eye"></i>
                                    </a> --}}

                                    <a href="{{ url('edit-user-dev/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{ url('delete-user-dev/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
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
						@else
				        @endif
                    </tbody>
                </table>

            <!--end: Datatable -->
        </div>
    </div>

</div>
<!-- end:: Content -->

@endsection
