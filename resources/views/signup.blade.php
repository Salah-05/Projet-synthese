<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <style>
        .gradient-custom {
/* fallback for old browsers */
background: #f093fb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}
    </style>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                  <form action="{{route('signup_store')}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-6 mb-4">
      
                        <div class="form-outline">
                          <label class="form-label" for="firstName">First and Last name</label>
                          <input type="text" name="name" id="firstName" class="form-control form-control-lg" />
                        </div>
                        @error('name')
                          <p>{{$message}}</p>
                        @enderror
      
                      </div>
                      <div class="col-md-6 mb-4">
      
                        <div class="form-outline">
                          <label class="form-label" for="lastName">email</label>
                          <input type="email" name="email" id="lastName" class="form-control form-control-lg" />
                        </div>
                        @error('email')
                          <p>{{$message}}</p>
                        @enderror
      
                      </div>
                    </div>
      
                    <div class="row">
                      <div class="col-md-6 mb-4 d-flex align-items-center">
      
                        <div class="form-outline datepicker w-100">
                          <label for="birthdayDate" class="form-label">Phone Number</label>
                          <input type="number" name="number" class="form-control form-control-lg" id="birthdayDate" />
                          @error('number')
                          <p>{{$message}}</p>
                        @enderror
                        </div>
                      
                      </div>
                     
                      <div class="col-md-6 mb-4 d-flex align-items-center">
      
                        <div class="form-outline datepicker w-100">
                          <label for="birthdayDate" class="form-label">address</label>
                          <input type="text" name="address" class="form-control form-control-lg" id="birthdayDate" />
                          @error('address')
                          <p>{{$message}}</p>
                        @enderror
                        </div>
                       
      
                      </div>

                    </div>
      
                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
      
                        <div class="form-outline">
                          <label class="form-label" for="emailAddress">city</label>
                          <input type="text" name="city" id="emailAddress" class="form-control form-control-lg" />
                        </div>
                        @error('city')
                        <p>{{$message}}</p>
                      @enderror
      
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
      
                        <div class="form-outline">
                          <label class="form-label" for="phoneNumber">country</label>
                          <input type="text" name="country" id="phoneNumber" class="form-control form-control-lg" />
                          @error('country')
                          <p>{{$message}}</p>
                        @enderror
                        </div>
                       
      
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
      
                        <div class="form-outline">
                          <label class="form-label" for="emailAddress">mot de pass</label>
                          <input type="password" name="password" id="emailAddress" class="form-control form-control-lg" />
                          @error('password')
                          <p>{{$message}}</p>
                        @enderror
                        </div>
                       
      
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
      
                        <div class="form-outline">
                          <label class="form-label" for="phoneNumber">confirmation de mot password</label>
                          <input type="password" name="password_confirmation" id="phoneNumber" class="form-control form-control-lg" />
                        </div>
                        @error('password_confirmation')
                        <p>{{$message}}</p>
                      @enderror
      
                      </div>
                    </div>
                    
                    <div class="mt-4 pt-2">
                      <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                    </div>
      
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @if ($errors->any())
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let errorMessage = "";
        @foreach($errors -> all() as $error)
        errorMessage += "- {{ $error }}<br>";
        @endforeach

        Swal.fire({
            icon: 'error',
            title: 'Tu dois verifier les valeurs des champs...',
            html: errorMessage,
            confirmButtonColor: '#0A758A'
        });
    </script>
    @endif
    <!-- errors -->

    <!-- end errors -->
    <!-- success -->
    @if (Session::has('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Inscription réussie',
            text: '{{ Session::get('
            success ')}}',
            confirmButtonColor: '#0A758A'
        });
    </script>
    @endif
</body>
</html>