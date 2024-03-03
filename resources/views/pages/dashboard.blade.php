@extends('layout.layoutdashboard')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('contentdashboard')
 <section class="max-w-screen-xl mx-auto mt-5">
    @csrf
    <div class="flex flex-wrap flex-container" id="exploredata">
       </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
@endsection
@push('footerjsexternal')
    <script src="/javascript/explore.js"></script>
@endpush
