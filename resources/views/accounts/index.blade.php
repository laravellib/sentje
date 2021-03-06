@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header text-center">{{__('dashboard.dashboard')}}</div>

					<div class="card-body">
						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif
						@include('inc.dashboard_header')
						<table class="table table-striped table-hover">
							<thead>
							<tr>
								<th>{{__('account.name')}}</th>
								<th>{{__('account.account_number')}}</th>
								<th>{{__('account.created_at')}}</th>
								<th>{{__('account.action')}}</th>
							</tr>
							</thead>
							<tbody>
							@foreach($bankaccounts as $account)
								<tr>
									<td><a>{{decrypt($account->name)}}</a></td>
									<td>{{decrypt($account->account_number)}}</td>
									<td>{{date('d-m-Y', strtotime($account->created_at))}}</td>
									<td>
										<a href="/account/{{$account->id}}/edit" class="settings" title="Settings"
										   data-toggle="tooltip">{{__('account.edit')}}</a>
									</td>
								</tr>
							@endforeach
							<tr>
								<td colspan="5">{{$bankaccounts->links()}}</td>
							</tr>
							</tbody>
						</table>
							{!!Form::open(['action' => 'BankAccountController@exportAccount', 'method' => 'GET'])!!}
							{{Form::submit(__('account.account_export'), ['class' => 'btn btn-primary'])}}
							{!!Form::close()!!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
