@extends('site_ms.layouts.app',['user_dashboard'=>1])

@section('content')

<script> // to delete wishlist items ....
    $(function () {
        $('.delet').on('click', function () {
          var name    = $(this).attr('name')
          var user_id = $(this).attr('user_id')
          var del_id = $(this).attr('del_id')


          if(confirm("Do you want to delete "+name+"?")) {
            var data = {"name":name,"user_id":user_id,"del_id":del_id};
            $.ajax({
                  type:'GET',
                  data: data,
                  url:'{{route("members.delete_gallery","delete")}}',
                  success: function (msg) {
                    $("#delete_msg").fadeOut();
                    $("#delete_msg").html(msg).fadeIn("slow");
                    $("#delete_msg").fadeOut();
                    $(".dis_ms_"+del_id).fadeOut();
                  }
              }); // end ajax call
          }
        });
    });
</script>
@include('includes.messages')
        <section class="pan-gallery"> 
      <div class="container">
        <h1 class="titlebold">Yogiswap <span>Gallery</span></h1>
        <p class="text">Here are some of our favorite photos of tribe members from all around the world.  Share yours !</p>
        <nav class="maptext">Go to Yogiswap gallery now<a href="{{ route('galleries.create','yogi-gallery') }}"><span>Submit Your Photos</span></a></nav>
      </div>
    </section>
    <section class="dat-gallery"> 
      <div class="container">
      <div id="delete_msg"> </div>
        <div class="row" style="min-height:300px">
        
@if (count($results))

    @foreach ($results as $result)
        
        <div class="col-sm-3 item-gal dis_ms_{{$result->id}}">
            <div class="in-gal">
            <a class="img-gal userimg delet"   value="Delete" name="<?=$result->name;?>" del_id="<?=$result->id;?>" user_id="2">
            <img src="{{img_chk_exist($result->img)}}" alt="{{ $result->name}}" title="{{ $result->name}}"><i class="fas fa-times times"></i></a>
              <h2>{{ $result->name}}</h2>
              <p></p><span>On : {{ date_only($result->created_at)}}</span>
            </div>
          </div>
    @endforeach 
          
   <ul class="pagination w-100">
      </ul>
    {{ $results->links() }}

@endif
        </div>
      </div>
    </section>

@endsection
