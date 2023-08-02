
@extends('Backend.layout.master')

@section('page_title','Create-category')

@section('content')
<div class="container-fluid col-xl-5 col-md-5 mt-5">
    <div class="row justify-content-center">
        <div class="card m-4">
            <div class="card-header">
              <h3>রেজিস্ট্রেসন ফর্ম</h3>
            </div>
                <div class="card-body">
                    @if($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
                    <form class="form" method="POST" action="{{route('iscon-reg.store')}}">
                      @csrf
                        <label class="control-label" for="name">নামঃ</label>  
                        <input name="name" type="text" class="form-control" value="{{old('name')}}">
                        
                        <label class="control-label" for="phone">মোবাইল নংঃ</label>  
                        <input name="phone" type="text" class="form-control" value="{{old('phone')}}">
                        
                        <label class="control-label" for="mondir_name">মন্দিরের নামঃ</label>  
                        <input name="mondir_name" type="text" class="form-control" value="{{old('mondir_name')}}">
                        
                        <label class="control-label" for="service">মন্দিরের সেবার ধরনঃ</label>  
                        <input name="service" type="text" class="form-control" value="{{old('service')}}">
                        
                        <label class="control-label" for="address">ঠিকানাঃ</label>  
                        <input name="address" type="text" class="form-control" value="{{old('address')}}">
                        
                        <label class="control-label" for="councillor">মন্দির অধ্যক্ষ / কাউন্সিলরের নামঃ</label>  
                        <input name="councillor" type="text" class="form-control" value="{{old('councillor')}}">

                        <p>আপনি কি পূর্বে এ ধরনের ক্যাম্প এ অংশগ্রহন করেছেন ?</p>
                       <input type="radio" id="yes" name="yesno" value="1">
                       <label for="yes">হ্যাঁ</label><br>
                       <input type="radio" id="no" name="yesno" value="2">
                       <label for="no">না</label><br>
                       
                        <p>রেজিস্ট্রেসন ফি (১৫০০/=) পাঠানোর মাধ্যমঃ</p>
                       <input type="radio" id="bkash" name="payment" value="1">
                       <label for="bkash">বিকাশ <u>০১৭৩৪৬৮৭২৬০<u></label>
                       <input type="radio" id="nogod" name="payment" value="2">
                       <label for="nogod">নগদ <u>০১৭৩৪৬৮৭২৬০<u></label><br>
                       <input type="radio" id="rocket" name="payment" value="3">
                       <label for="rocket">রকেট <u>০১৭৩৪৬৮৭২৬০<u></label><br>
                       
                        <div class="card-footer mt-3">
                            <input class="btn btn-outline-primary form-control" type="submit" value="সাবমিট করুন">
                        </div>
                        </form> 
                </div>
            
        </div>
    </div>
        
</div>  
@endsection

