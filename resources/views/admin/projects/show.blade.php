@extends('layouts.admin')

@section('content')
   <div class="container">

      <div class="row justify-content-center">

         <div class="col-md-8 mt-4">

            <div class="card">

               {{-- Header --}}
               <div class="card-header d-flex justify-content-between">

                  {{-- Project Overview Title --}}
                  <div class="col fw-bold fs-3 text-primary">

                     {{ __('Project overview') }}

                  </div>

                  {{-- Buttons --}}
                  <div class="col d-flex gap-2 justify-content-end align-items-end">

                     {{-- Modify Button --}}
                     <a type="button" class="btn btn-outline-primary"
                        href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">

                        <i class="fa-regular fa-pen-to-square"></i>

                     </a>

                     {{-- Button to Projects Table --}}
                     <a type="button" class="btn btn-outline-primary d-flex align-items-center justify-content-center"
                        href="{{ route('admin.projects.index') }}">

                        <i class="fa-solid fa-angles-left"></i> Go to Projects Table

                     </a>

                  </div>

               </div>

               <div class="card-body">

                  <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg">

                     <div class="d-flex flex-column justify-content-between h-100 p-5 pb-3 text-white text-shadow-1">

                        <div class="row">

                           <div class="col-12 col-md-6 mb-4">

                              <h3 class="display-6 lh-1 fw-bold">{{ $project->title }}</h3>

                           </div>

                           <div class="col-12 col-md-6 justify-content-end">

                              <div class="d-flex gap-3 justify-content-end">
   
                                 @foreach ($project->technologies as $tech)
                                    <span class="badge" style="background-color:{{ $tech->color }}">
                                       {{ $tech->name }}
                                    </span>
                                 @endforeach
   
                              </div>

                           </div>

                        </div>

                        <ul class="d-flex flex-column justify-content-end list-unstyled mb-0">

                           <li>
                              <h4 class="fs-3 fw-bold">Project Type: <em
                                    class="fs-4 fw-lighter">{{ $project->type?->name ? $project->type?->name : ' --- ' }}</em>
                              </h4>
                           </li>

                           <li>
                              <h4 class="fs-3 fw-bold">Project Id: <em class="fs-4 fw-lighter">#{{ $project->id }}</em>
                              </h4>
                           </li>

                           <li>
                              <h4 class="fs-3 fw-bold">Slug: <em class="fs-4 fw-lighter">{{ $project->slug }}</em>
                              </h4>
                           </li>

                        </ul>

                        <div>
                           <h4 class="fs-3 fw-bold">Description:</h4>
                           <p><em class="fs-4 fw-lighter">{{ $project->description }}</em></p>
                        </div>

                     </div>

                  </div>

               </div>

            </div>

         </div>

      </div>

   </div>
@endsection
