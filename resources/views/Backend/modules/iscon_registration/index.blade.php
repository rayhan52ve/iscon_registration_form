
@extends('Backend.layout.master')

@section('page_title','iscon List')

@section('content')
<div class="container-fluid m-4">
    <div class="row justify-content-center">
        
        <div class="col-xl-11 col-md-11">
            <div class="card m-2">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                    <h3><i class="fa-regular fa-calendar-days"></i>সদস্যদের তথ্য</h3>
                  </div>
                </div>
                    <div class="card-body">
                      {{-- @if(session()->has('msg'))
                        <div class="alert alert-{{session('cls')}}">
                          {{session('msg')}}
                        </div>
                      @endif --}}
                      <table class="table table-sm">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">নংঃ</th>
                            <th scope="col">নাম</th>
                            <th scope="col">মোবাইল নংঃ</th>
                            <th scope="col">মন্দিরের নামঃ</th>
                            <th scope="col">মন্দিরের সেবার ধরনঃ</th>
                            <th scope="col">ঠিকানাঃ</th>
                            <th scope="col">মন্দির অধ্যক্ষ / কাউন্সিলরের নামঃ</th>
                            <th scope="col">পূর্ব অভিজ্ঞতা</th>
                            <th scope="col">পেমেন্ট</th>
                            <th scope="col">অপশন</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $sl=1 @endphp
                          @foreach ($iscons as $iscon)
                          <tr>
                            
                            <td>{{$numto->bnNum($sl++)}}</td>
                            <td><b>{{$iscon->name}}<b></td>
                            <td>{{$iscon->phone}}</td>
                            <td>{{$iscon->mondir_name}}</td>
                            <td>{{$iscon->service}}</td>
                            <td>{{$iscon->address}}</td>
                            <td>{{$iscon->councillor}}</td>
                            <td>{!!$iscon->yesno ==1 ? "<strong class='text-success' >হ্যাঁ</strong>":"<strong class='text-danger' >না</strong>"!!}</td>
                            @if($iscon->payment==1)
                                <td><b>Bkash<b></td>
                              @elseif($iscon->paymant==2)
                                <td ><b>Nogod<b></td>
                              @else
                                <td ><b>Rocket<b></td>
                              @endif
                            <td>
                                <a href="{{route('iscon-reg.edit', $iscon)}}" class="btn btn-success btn-sm ml-1 mt-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form id="{{'form_'.$iscon->id}}" action="{{route('iscon-reg.destroy',$iscon->id)}}" method="post">
                                  @csrf
                                  {{-- @method('DELETE') --}}
                                  <button data-id="{{$iscon->id}}" class="delete btn btn-danger btn-sm ml-1 mt-1" type="submit" ><i class="fa-solid fa-trash-can"></i></button>
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

@if(session()->has('msg'))
@push('js')
  <script>
     Swal.fire({
        position: 'top-end',
        icon: '{{session('cls')}}',
        toast: 'true',
        title: '{{session('msg')}}',
        showConfirmButton: false,
        timer: 3000
      })
  </script>
@endpush
@endif


@push('js')
  <script>
    $('.delete').on('click',function(){
      let id = $(this).attr('data-id')
      // console.log(id)

        Swal.fire({
          title: 'Are you sure you want to delete?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $(`#form_${id}`).submit()

          }
        })
      })


      
  </script>
@endpush

@endsection

