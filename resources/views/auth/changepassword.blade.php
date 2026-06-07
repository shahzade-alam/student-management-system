 @extends('includes.master')
 @section('content')

     <div  id="profile-change-password">
         <!-- Change Password Form -->
         @if (session('success'))
             <div class="alert alert-success">
                 {{ session('success') }}
             </div>
         @endif

         @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif

         <form action="{{ route('change-passwordpost') }}" method="POST">
             @csrf
             <div class="row mb-3">
                 <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                 <div class="col-md-8 col-lg-9">
                     <input name="password" type="password" class="form-control" id="currentPassword" required>
                 </div>
             </div>

             <div class="row mb-3">
                 <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                 <div class="col-md-8 col-lg-9">
                     <input name="newpassword" type="password" class="form-control" id="newPassword" required>
                 </div>
             </div>

             <div class="row mb-3">
                 <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                 <div class="col-md-8 col-lg-9">
                     <input name="renewpassword" type="password" class="form-control" id="renewPassword" required>
                 </div>
             </div>

             <div class="text-center">
                 <button type="submit" class="btn btn-primary">Change Password</button>
             </div>
         </form>
         <!-- End Change Password Form -->

     </div>
     @include('sweetalert::alert')

 @endsection
