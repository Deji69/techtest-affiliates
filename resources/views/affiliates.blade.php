<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Affiliates</title>
	</head>
	<body>
		<table>
			<thead><tr>
				<th>ID</th>
				<th>Name</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Distance</th>
			</tr></thead>
			<tbody>
				@foreach ($affiliates as $affiliate)
					<tr>
						<td>{{ $affiliate->id }}</td>
						<td>{{ $affiliate->name }}</td>
						<td>{{ $affiliate->latitude }}</td>
						<td>{{ $affiliate->longitude }}</td>
						<td>{{ $affiliate->getDistanceFromOffice() }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</body>
</html>
