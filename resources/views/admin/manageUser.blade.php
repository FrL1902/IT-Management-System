@extends('layout.layout')

@section('content')

@section('manageuserbutton', 'active')
@section('showmanageuser', 'show')
@section('manageuser', 'active')

<div class="main-panel">
    <div class="content">
        ini buat manage user / udah bisa view, ga tau tombol editnya enaknya buat apa
        <div class="page-inner">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Manage User Accounts</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Account Role</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Account Role</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach ($user as $data)
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->level }}</td>
                                            @section('lemparID')
                                                <input type="hidden" class="form-control" name="userIdHidden"
                                                    value="{{ $data->name }}">
                                            @endsection
                                            <td>
                                                <div class="form-button-action">

                                                    {{-- <form method="post" action="/tex">
                                                        @csrf
                                                        <button type="button" data-toggle="tooltip" title=""
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit User">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </form> --}}


                                                    <button type="button" class="btn btn-link btn-primary btn-lg"
                                                        data-toggle="modal" data-target="#userUpdateModal"
                                                        data-original-title="Edit User">
                                                        <i class="fa fa-edit"></i>
                                                    </button>


                                                    <!-- Modal -->
                                                    <div class="modal fade" id="userUpdateModal" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        Modal title</h5>

                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="post" action="/tex">
                                                                    @csrf

                                                                    @yield('lemparID')

                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Username </label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Username" aria-label=""
                                                                                aria-describedby="basic-addon1"
                                                                                name="usernameform" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        {{-- ini gak tau knp tapi yg btn secondarynya yg buat nutup harus ditambahin "type="button"", terus yg dibawahnya yg buat save ngga. aneh bat dah. kalo ga gini ntar error 401 ato apa gt --}}
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if (auth()->user()->id == $data->id)
                                                        <a href="#">
                                                            <i class="fas fa-user mt-3 text-danger"
                                                                data-toggle="tooltip"
                                                                data-original-title="Cannot delete yourself">
                                                            </i>
                                                        </a>
                                                    @else
                                                        <a href="/deleteUser/{{ $data->id }}">
                                                            <i class="fa fa-times mt-3 text-danger"
                                                                data-toggle="tooltip" data-original-title="Delete User">
                                                            </i>
                                                        </a>

                                                        {{-- DIBAWAH INI CUMA BUAT PERCOBAAN DULU YG BUG FOREACH DATA CUMA KEBACA SEKALI DOANG. INI UDH BENER, NANTI DITERUSIN BESOK AE --}}
                                                        <button type="button" class="btn btn-danger"
                                                            data-target="#deleteModal{{ $data->id }}"
                                                            data-toggle="modal">Delete
                                                            Item</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModal{{ $data->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Modal title</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to
                                                                            delete?{{ $data->name }}</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            id="close-modal">No</button>
                                                                        <button type="button"
                                                                            class="btn btn-danger">Yes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- SAMPE SINI --}}
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
