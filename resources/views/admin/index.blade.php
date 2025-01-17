<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
    

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">

    @include('admin.footer')

           <!-- Contactberichten sectie -->
          <div class="contact-messages mt-4">
            <h2>Contact Messages</h2>

            @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table">
              <thead>
                <tr>
                  <th>name</th>
                  <th>E-mail</th>
                  <th>Message</th>
                  <th>Answered</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($messages as $message)
                  <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->message }}</td>
                    <td>{{ $message->answered ? 'Yes' : 'No' }}</td>
                    <td>
                      @if(!$message->answered)
                        <form action="{{ route('admin.contact_messages.reply', $message) }}" method="POST">
                          @csrf
                          <textarea name="reply" class="form-control" placeholder="Write your answer..." required></textarea>
                          <button type="submit" class="btn btn-primary mt-2">Send answer</button>
                        </form>
                      @else
                        <span class="text-success">Successfully answered</span>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Contactberichten sectie einde -->

        </div>
      </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{asset('/admin_template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admin_template/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('/admin_template/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admin_template/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('/admin_template/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admin_template/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admin_template/js/charts-home.js')}}"></script>
    <script src="{{asset('/admin_template/js/front.js')}}"></script>
  </body>
</html>
