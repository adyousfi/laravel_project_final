<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
  </head>
  <body>
   @include('admin.header')
    </header>
    @include('admin.sidebar')


    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2>Manage users</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Formulier voor het aanmaken van een nieuwe gebruiker -->
                <div class="mb-3">
                <form action="{{ route('admin.createUser') }}" method="POST" class="mb-3">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">Confirm password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="usertype">Role</label>
                            <select id="usertype" name="usertype" class="form-control" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Make User/Admin</button>
                    </form>
                

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->usertype) }}</td>
                                <td>
                                    <form action="{{ url('/admin/toggle/' . $user->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-warning">
                                            {{ $user->usertype == 'admin' ? 'Make a user' : 'Make admin' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{ asset('/admin_template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin_template/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/admin_template/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admin_template/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('/admin_template/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admin_template/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admin_template/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admin_template/js/front.js') }}"></script>
  </body>
</html>