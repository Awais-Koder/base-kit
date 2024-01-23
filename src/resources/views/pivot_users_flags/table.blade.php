<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="pivot_users_flags-table">
            <thead>
            <tr>
                <th>User Id</th>
                <th>Isopenrightsidebar</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pivotUsersFlags as $pivotUsersFlags)
                <tr>
                    <td>{{ $pivotUsersFlags->user_id }}</td>
                    <td>{{ $pivotUsersFlags->isOpenRightSidebar }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['pivot_users_flags.destroy', $pivotUsersFlags->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('pivot_users_flags.show', [$pivotUsersFlags->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('pivot_users_flags.edit', [$pivotUsersFlags->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
{{-- @include('adminlte-templates::common.paginate', ['records' => $pivotUsersFlags]) --}}
        </div>
    </div>
</div>
