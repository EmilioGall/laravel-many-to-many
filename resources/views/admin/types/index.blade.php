@extends('layouts.admin')


@section('content')
   <div class="container">

      <div class="row justify-content-center">

         <div class="col-md-10 mt-4">

            <div class="card">

               {{-- Header --}}
               <div class="card-header d-flex justify-content-between">

                  {{-- Type Table Title --}}
                  <div class="col-9 fw-bold fs-3 text-primary">

                     {{ __('Types') }}

                  </div>

                  {{-- Button to Create New Type --}}
                  <div class="col-3 d-flex justify-content-end align-items-end">

                     <a type="button" class="btn btn-primary" href="{{ route('admin.types.create') }}">

                        <i class="fa-solid fa-plus me-1"></i> Add New Type

                     </a>

                  </div>

               </div>

               <div class="card-body">

                  <table class="table table-hover">

                     <thead>

                        <tr>
                           <th scope="col">Id</th>
                           <th scope="col">Slug</th>
                           <th scope="col">Name</th>
                           <th scope="col">Actions</th>
                        </tr>

                     </thead>

                     <tbody>

                        @foreach ($typesArray as $type)
                           <tr>

                              <td scope="row">#{{ $type['id'] }}</td>

                              <th>

                                 {{ $type['slug'] }}

                              </th>

                              <td>{{ $type['name'] }}</td>

                              <td class="d-flex gap-2">

                                 {{-- Modify Button --}}
                                 <a type="button" class="btn btn-outline-primary"
                                    href="{{ route('admin.types.edit', ['type' => $type['slug']]) }}">

                                    <i class="fa-regular fa-pen-to-square"></i>

                                 </a>

                                 {{-- Delete Button --}}
                                 <form action="{{ route('admin.types.destroy', ['type' => $type['slug']]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-danger">

                                       <i class="fa-regular fa-trash-can"></i>

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

      </div>

   </div>
@endsection
