@extends('layouts.admin')

@section('content')
   <div class="container">

      <div class="row justify-content-center">

         <div class="col-md-8 mt-4">

            <div class="card">

               {{-- Header --}}
               <div class="card-header d-flex justify-content-between">

                  {{-- Types Table Title --}}
                  <div class="col-9 fw-bold fs-3 text-primary">

                     {{ __('Add New Types') }}

                  </div>

                  {{-- Button to Types Table --}}
                  <div class="col-3 d-flex justify-content-end align-items-end">

                     <a type="button"
                        class="btn btn-outline-primary h-75 w-100 d-flex align-items-center justify-content-center"
                        href="{{ route('admin.types.index') }}">

                        <i class="fa-solid fa-angles-left"></i> Go to Types Table

                     </a>

                  </div>

               </div>

               {{-- Form Section --}}
               <section class="card-body">

                  <form class="border rounded p-3 my-4" action="{{ route('admin.types.store') }}" method="POST">
                     @csrf

                     <div class="row g-3">

                        {{-- Name Input --}}
                        <div class="col-12 mb-2">

                           <label for="name" class="form-label fw-bold">Project Name</label>
                           <input type="text"
                              class="form-control
                              @error('name')
                              is-invalid
                              @enderror"
                              id="name"
                              name="name"
                              value="{{ old('name') }}">

                           @error('name')
                              <div class="alert alert-danger mt-1">
                                 {{ $message }}
                              </div>
                           @enderror

                        </div>

                     </div>

                     <hr class="my-4">

                     {{-- Submit Button --}}
                     <div class="col-4">

                        <button class="w-100 btn btn-primary btn-lg mb-4" type="submit">Create</button>

                     </div>

                  </form>

               </section>

            </div>

         </div>

      </div>

   </div>
@endsection