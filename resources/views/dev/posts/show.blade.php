@extends('layouts.dev')

@section('title')
    Posts
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
                    <i class="flaticon-users"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Posts
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                        @if(Auth::user()->hasRole('dev'))
                            <a href="{{ url('new-post-dev') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New Post
                            </a>
                        @elseif(Auth::user()->hasRole('admin'))
                            <a href="{{ url('new-post') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New Post
                            </a>
                        @elseif(Auth::user()->hasRole('seller'))
                            <a href="{{ url('new-post') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New Post
                            </a>
                        @else
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
									PostID
								</th>
								<th>
									Title
								</th>
                                <th>
                                    Category
                                </th>
								<th>
									Location
								</th>
								<th>
									Charges
								</th>
								<th>
									Status
								</th>
								<th>
									Featured
								</th>
								<th>
									Created On
								</th>
								<th>
									Action
								</th>
                            </tr>
                        @elseif(Auth::user()->hasRole('admin'))
							<tr>
								<th>
									PostID
								</th>
								<th>
									Title
								</th>
                                <th>
                                    Category
                                </th>
								<th>
									Location
								</th>
								<th>
									Charges
								</th>
								<th>
									Status
								</th>
								<th>
									Featured
								</th>
								<th>
									Created On
								</th>
								<th>
									Action
								</th>
                            </tr>
                        @elseif(Auth::user()->hasRole('seller'))
							<tr>
								<th>
									PostID
								</th>
								<th>
									Title
								</th>
                                <th>
                                    Category
                                </th>
								<th>
									Location
								</th>
								<th>
									Charges
								</th>
								<th>
									Status
								</th>
								<th>
									Featured
								</th>
								<th>
									Created On
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
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>

                                    <td>{{ $post->title }}</td>

                                    <td>{{ $post->category }}</td>

                                    <td>{{ $post->location }}</td>

                                    <td>{{ $post->charges }}</td>

                                    @if($post->status == 'active')
                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">{{ $post->status }}</span></span></td>
                                    @else
                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ $post->status }}</span></span></td>
                                    @endif

                                    @if($post->feature_status == 'featured')
                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">{{ $post->feature_status }}</span></span></td>
                                    @else
                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ $post->feature_status }}</span></span></td>
                                    @endif

                                    <td>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y - h:i:s') }}</td>

                                    <td>

                                        <a href="{{ url('edit-post-dev/'.$post->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                    </button>
                                    </td>
                                </tr>
                            @endforeach
                        @elseif(Auth::user()->hasRole('admin'))
                            @foreach($posts as $post)
                                @if ($post->created_by == Auth::user()->email)
                                    <tr>
                                        <td>{{ $post->id }}</td>

                                        <td>{{ $post->title }}</td>

                                        <td>{{ $post->category }}</td>

                                        <td>{{ $post->location }}</td>

                                        <td>{{ $post->charges }}</td>

                                        @if($post->status == 'active')
                                            <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">{{ $post->status }}</span></span></td>
                                        @else
                                            <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ $post->status }}</span></span></td>
                                        @endif

                                        @if($post->feature_status == 'featured')
                                            <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">{{ $post->feature_status }}</span></span></td>
                                        @else
                                            <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ $post->feature_status }}</span></span></td>
                                        @endif

                                        <td>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y - h:i:s') }}</td>

                                        <td>

                                            <a href="{{ url('edit-post-dev/'.$post->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                                <i class="fa fa-edit"></i>
                                            </a>


                                        </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @elseif(Auth::user()->hasRole('seller'))
                            @foreach($posts as $post)
                                @if ($post->created_by == Auth::user()->email)
                                    <tr>
                                        <td>{{ $post->id }}</td>

                                        <td>{{ $post->title }}</td>

                                        <td>{{ $post->category }}</td>

                                        <td>{{ $post->location }}</td>

                                        <td>{{ $post->charges }}</td>

                                        @if($post->status == 'active')
                                            <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">{{ $post->status }}</span></span></td>
                                        @else
                                            <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ $post->status }}</span></span></td>
                                        @endif

                                        @if($post->feature_status == 'featured')
                                            <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">{{ $post->feature_status }}</span></span></td>
                                        @else
                                            <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ $post->feature_status }}</span></span></td>
                                        @endif

                                        <td>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y - h:i:s') }}</td>

                                        <td>
                                            <a href="{{ url('edit-post-dev/'.$post->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                                <i class="fa fa-edit"></i>
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
