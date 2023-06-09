<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
          </ul>
          <div class="d-flex ms-auto text-white">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </nav>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card bg-success text-white">
                  <div class="card-body">
                    <h5>Withdraw</h5>
                    <h2>$ <span id="current-withdraw">{{ $withdraw }}</span></h2>
                  </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-3">
                <div class="card bg-warning text-white">
                  <div class="card-body">
                    <h5>Balance</h5>
                    <h2>$ <span id="current-balance">{{Auth::user()->balance}}</span></h2>
                  </div>
                </div>
              </div>
        </div>
    </div>

    <div class="container">
        <div class="row text-center justify-content-md-center">
          <div class="col-6">
            @livewire('with-draw')
          </div>
        </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  @livewireScripts
</html>