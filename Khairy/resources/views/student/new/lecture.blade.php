@extends('student.layouts.exam-app')
@section('css')

<link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/jstree/jstree.css')}}" />

<link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/plyr/plyr.css')}}" />




@stop
@section('content')


<div class="row">
    <!-- Video Player -->
    <div class="col-12 mb-4">
      <div class="card">
        <h5 class="card-header">{{$lecture->lessonsection->name}}</h5>
        <div class="card-body">

            @if($lecture->type == 3)
            <video class="w-100" poster="{{$lecture->lessonsection->lesson->image ? $lecture->lessonsection->lesson->image : asset('admin/assets/img/pages/app-academy-tutor-1.png')}}" id="plyr-video-player" >
            <source src="https://drive.google.com/uc?export=preview&id={{$lecture->type == 3 ? $lecture->video_google_id : ''}}" type="video/mp4"  data-plyr-config='{"quality": ["low", "medium", "high"]}' />
          </video>

          @elseif($lecture->type == 2)
          <embed src="{{ $lecture->content }}" type="application/pdf" width="100%"
            height="600px" />

            @elseif($lecture->type == 1)

            <img src="{{ $lecutre->content }}" alt="image" style=" max-width: 100%;
            height: auto;">

            @endif
        </div>
      </div>
    </div>
</div>



@stop
@section('js')


<script src="{{asset('admin/assets/vendor/libs/jstree/jstree.js')}}"></script>

<script src="{{asset('admin/assets/js/extended-ui-treeview.js')}}"></script>

<script src="{{asset('admin/assets/vendor/libs/plyr/plyr.js')}}"></script>

<script src="{{asset('admin/assets/js/extended-ui-media-player.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Plyr without quality options in the constructor
        const player = new Plyr('#plyr-video-player');

        // Add event listener for quality change
        player.on('qualitychange', event => {
            console.log('Quality changed to', event.detail.quality);
        });
    });
</script>

</body>
</html>


@stop
