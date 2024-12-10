<div class="main-panel">
    <div class="content-wrapper">

        @if(session()->has('message'))

        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        {{session()->get('message')}}
        
       </div>

        @endif

        <div class="row">

        </div>

        <div class="card2">
            @include('auth.updateinventory')
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->

</div>