@extends('layout.template')
@section('container')
<h1>LIST</h1>
<a class="btn btn-primary " href="{{ route('user.create')}}"><i class="fa fa-pencil-alt"></i>Add New</a>
<table class="datatables display " style="width:100%;font-size:0.8rem">
    <thead>
        <tr align="center">
            <th>Action</th>
            <th>No</th>
            <th>Username</th>
            <th>NIK</th>
            <th>Full Name</th>
            <th>ROLE</th>
            <th>Phone</th>
            <th>Service Center</th>
            <th>Mobile Access</th>
            <th>Email</th>
            <th>ERP ID</th>
            <th>Create Date</th>
            <th>Active</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=1;?>
    @foreach($users as $p)
		<tr>
			<td align="center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-outline-primary " href="{{ route('user.edit', $p->id)}}"><i class="fa fa-pencil-alt"></i></a>
                  </div> 
                
                
               </td>
			<td align="center">{{ $i }}</td>
			<td>{{ $p->username }}</td>
			<td>{{ $p->nik }}</td>
			<td>{{ $p->fullname }}</td>
			<td>{{ $p->role_name }}</td>
			<td>{{ $p->phone }}</td>
			<td>{{ $p->organization_name }}</td>
			<td>{{ ($p->mobile_access==='0') ? 'No':'Yes' }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->erp_name }}</td>
            <td>{{ $p->created_at }}</td>
			<td>{{ ($p->active==='0') ? 'No':'Yes' }}</td>
		</tr>
        <?php $i++;?>
    @endforeach
   
</tbody>
</table>
@endsection