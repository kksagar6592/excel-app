<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>

<body>
	<h6> Import and Export Excel data to database
	</h6>
	<div class="container">
		<div class="card bg-light mt-3">
			<div class="card-header">
				Import and Export Excel
			</div>
			<div class="card-body">
				<form action="{{ route('import') }}"
					method="POST"
					enctype="multipart/form-data">
					@csrf
					<input type="file" name="file" class="form-control">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
					<br>
					<button class="btn btn-success">
						Import User Data
					</button>
					<a class="btn btn-warning"
					href="{{ route('export') }}">
							Export User Data
					</a>
				</form>
			</div>
		</div>
	</div>

</body>

</html>
