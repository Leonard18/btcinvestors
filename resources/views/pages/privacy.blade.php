@extends('layouts.pages')

@section('headerContent')
   <meta name="description" content="Privacy Policy - {{ config('app.name') }}">
   <title>{{ config('app.name') }} - Privacy Policy</title>
@endsection

{{-- section for page header --}}
@section('page-name')
    Privacy Policy
    {{-- @section('small-page-name', 'privacy-policy') --}}
@endsection
{{-- end of section for page header --}}

@section('content')

    <section style="background: {{ env('APP_WHITE_COLOR') }}" class="p-5 container">
       <div>
           <h3>Who We Are...</h3>
           <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam facilis rerum quas ducimus ad dolorum, suscipit ratione aliquam quos eligendi deleniti repellendus aliquid voluptatum officia. Earum dolore praesentium nesciunt odio laborum ipsam iste ducimus quidem eius veritatis animi fugit rem hic incidunt nulla molestiae, necessitatibus aut ullam iusto ab nostrum.</p>
       </div>
       <div>
        <h3>More About Us...</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam facilis rerum quas ducimus ad dolorum, suscipit ratione aliquam quos eligendi deleniti repellendus aliquid voluptatum officia. Earum dolore praesentium nesciunt odio laborum ipsam iste ducimus quidem eius veritatis animi fugit rem hic incidunt nulla molestiae, necessitatibus aut ullam iusto ab nostrum.</p>
    </div>
    <div>
        <h3>What We Do...</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam facilis rerum quas ducimus ad dolorum, suscipit ratione aliquam quos eligendi deleniti repellendus aliquid voluptatum officia. Earum dolore praesentium nesciunt odio laborum ipsam iste ducimus quidem eius veritatis animi fugit rem hic incidunt nulla molestiae, necessitatibus aut ullam iusto ab nostrum.</p>
    </div>
    <div>
        <h3>Why Choose Us...</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam facilis rerum quas ducimus ad dolorum, suscipit ratione aliquam quos eligendi deleniti repellendus aliquid voluptatum officia. Earum dolore praesentium nesciunt odio laborum ipsam iste ducimus quidem eius veritatis animi fugit rem hic incidunt nulla molestiae, necessitatibus aut ullam iusto ab nostrum.</p>
    </div>
    <div>
        <h3>Our Connections...</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam facilis rerum quas ducimus ad dolorum, suscipit ratione aliquam quos eligendi deleniti repellendus aliquid voluptatum officia. Earum dolore praesentium nesciunt odio laborum ipsam iste ducimus quidem eius veritatis animi fugit rem hic incidunt nulla molestiae, necessitatibus aut ullam iusto ab nostrum.</p>
    </div>
    </section>
    
@endsection

@section('footerContent')
    
@endsection