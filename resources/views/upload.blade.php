<!doctype html>
<html lang="en">
  <head>
    <title>Laravel 6 - Multiple Images Upload </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
      <div class="container mt-5">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12 m-auto">
            <form action="{{ url('upload-images') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card shadow">
                        <div class="card-header bg-success">
                            <h5 class="text-white"> Laravel 6 Multiple Images Upload </h5>
                        </div>
                        <div class="card-body">

                            <!-- print success message after file upload  -->
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif

                            @if(session()->has('uploadedImages'))

                                @foreach(session()->get('uploadedImages')  as $in)
                                    <tr>
                                            <td>{{ $in }}</td>
                                    </tr>
                                @endforeach

                            @endif


                            <label for="images"> Images </label>
                                <div class="form-group">
                                    <input type="file" name="images[]" class="form-control" id="images" multiple/>
                                    {!! $errors->first('images', '<small class="text-danger">:message</small>') !!}
                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Upload Images </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
