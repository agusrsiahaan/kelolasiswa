<table style="border: 1px solid #ddd">
	<thead>
		<tr>
			<th>Nama Lengkap</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>Rata-rata Nilai</th>
		</tr>
	</thead>
	<tbody>
		@foreach($siswa as $s)
		<tr>
			<td>{{$s->nama_lengkap()}}</td>
			<td>{{$s->jenis_kelamin}}</td>
			<td>{{$s->agama}}</td>
			<td>{{$s->rataNilai()}}</td>
		</tr>
		@endforeach
	</tbody>
</table>