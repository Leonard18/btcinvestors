@extends('layouts.pages')

@section('headerContent')
   <meta name="description" content="FAQ - {{ config('app.name') }}">
   <title>{{ config('app.name') }} - FAQs</title>
@endsection

{{-- section for page header --}}
@section('page-name')
    Frequently Ask Questions
    {{-- @section('small-page-name', 'frequently ask questions') --}}
@endsection
{{-- end of section for page header --}}

@section('content')

    <section style="background: {{ env('APP_WHITE_COLOR') }}" class="p-5 container">
       <ul class="collapsible" data-collapsible="accordion">
         <li>
           <div class="collapsible-header active">
                <h4>When Do I get Paid</h4>
                <span class="ml-30"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
           <div class="collapsible-body">
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, quia laboriosam unde explicabo architecto, nostrum veniam blanditiis doloribus repudiandae a at saepe optio sed porro culpa quasi ad quis voluptatum sunt quisquam? Alias ratione optio rem eos tempore velit non.</p>
            </div>
         </li>
         <li>
            <div class="collapsible-header">
                <h4>When Do I get Paid</h4>
                <span class="ml-30"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
           <div class="collapsible-body">
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, quia laboriosam unde explicabo architecto, nostrum veniam blanditiis doloribus repudiandae a at saepe optio sed porro culpa quasi ad quis voluptatum sunt quisquam? Alias ratione optio rem eos tempore velit non.</p>
            </div>
         </li>
         <li>
            <div class="collapsible-header">
                <h4>When Do I get Paid</h4>
                <span class="ml-30"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
           <div class="collapsible-body">
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, quia laboriosam unde explicabo architecto, nostrum veniam blanditiis doloribus repudiandae a at saepe optio sed porro culpa quasi ad quis voluptatum sunt quisquam? Alias ratione optio rem eos tempore velit non.</p>
            </div>
         </li>
         <li>
            <div class="collapsible-header">
                <h4>When Do I get Paid</h4>
                <span class="ml-30"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
           <div class="collapsible-body">
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, quia laboriosam unde explicabo architecto, nostrum veniam blanditiis doloribus repudiandae a at saepe optio sed porro culpa quasi ad quis voluptatum sunt quisquam? Alias ratione optio rem eos tempore velit non.</p>
            </div>
         </li>
          <li>
            <div class="collapsible-header">
                <h4>When Do I get Paid</h4>
                <span class="ml-30"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
           <div class="collapsible-body">
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, quia laboriosam unde explicabo architecto, nostrum veniam blanditiis doloribus repudiandae a at saepe optio sed porro culpa quasi ad quis voluptatum sunt quisquam? Alias ratione optio rem eos tempore velit non.</p>
            </div>
         </li>

       </ul>
    </section>
    
@endsection

@section('footerContent')
    
@endsection