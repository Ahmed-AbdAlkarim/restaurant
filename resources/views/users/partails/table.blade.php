<div class="card-datatable table-responsive">
    
        <table class="table table-bordered table-striped">
        <thead class="table-dark">
                <tr>
                    <th>{{trans('site.id')}}</th>
                    <th>{{trans('site.name')}}</th>
                    <th>{{trans('site.email')}}</th>
                    <th>{{trans('site.contact')}}</th>
                    <th>{{trans('site.role')}}</th>
                    <th>{{trans('site.status')}}</th>
                    <th>{{trans('site.action')}}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->contact }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->status }}</td>
                    <td style="white-space: nowrap;">
                        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-warning btn-sm">
                            {{ trans('site.edit') }}
                        </a>
                        <a href="{{ route('admin.users.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">
                            {{ trans('site.delete') }}
                        </a>
                    </td>



                </tr>
            @endforeach
        </tbody>
        </table>
    </div>