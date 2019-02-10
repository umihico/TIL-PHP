@extends('layout.app')

@section('content')
	<div class="container">
		@if ($errors->any())

		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					error!!!
				</div>

				<div class="panel-body">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>

				</div>
			</div>
		</div>
		
		@endif
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Schedule
				</div>

				<div class="panel-body">
					<form action="/add" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">Name</label>

							<div class="col-sm-6">
								<input type="text" name="name" class="form-control" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">Date</label>

							<div class="col-sm-6">
								<input type="text" name="date" class="form-control" value="YYYYMMDD">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-plus"></i>スケジュールを追加する
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>



			<div class="panel panel-default">
				<div class="panel-heading">
					Search Schedule
				</div>

				<div class="panel-body">
					<form action="/search" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">Date</label>

							<div class="col-sm-6">
								<input type="text" name="date" class="form-control" value="YYYYMMDD">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-plus"></i>スケジュールを検索する
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			@if (count($schedules) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						{{ $content_table_name }}
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Name</th>
								<th>Date</th>
							</thead>
							<tbody>
								@foreach ($schedules as $schedule)
									<tr>
										<td class="table-text"><div>{{ $schedule->name }}</div></td>
										<td class="table-text"><div>{{ $schedule->date }}</div></td>


										<td>
											<form action="/del_schedule" method="POST">

												<input type="hidden" name="id" value="{{ $schedule->id }}">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" class="btn btn-danger">
													<i class="fa fa-trash"></i>削除
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
