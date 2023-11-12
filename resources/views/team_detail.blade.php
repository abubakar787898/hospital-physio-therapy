@extends('layouts.frontend.app')

@section('title', 'team-detail')
@push('meta')
    <meta name="title" content="{{ $team?->meta_title }}">
    <meta name="description" content="{{ $team?->meta_description }}">
    {{-- <meta name="description" content="Your dynamic meta description here"> --}}
    <!-- You can add other meta tags as needed -->
@endpush
{{-- @push('meta')
    <meta name="description" content="{{ $metaDescription }}">
    <!-- You can add other meta tags as needed -->
@endpush --}}
@push('css')
   
    <link href="{{ asset('assets/frontend/css/team/team-detail.css') }}" rel="stylesheet">
@endpush

@section('content')
{{-- <div class="hero_section">

    <div class="hero_title">
        <h1>Services We Offer You</h1>
    </div>

</div> --}}
<div class="blog_menu">

    <div  class="blog_head">
        <h1 style="color: rgb(56 121 145 / 90%); text-align:center; margin-top:10px;"  ><strong>Team Detail</strong></h1>

        {{-- <div class="crumbs">
            <li><a style="color: white" href="{{route('home')}}">Home</a></li>
            <li style="color: white">Team Detail</li>
        </div> --}}
    </div>

      

    <section>
        <div class="team_card-info">

          <div class="card_img">
            <img src="/image/{{ $team->image }}" alt="card_image" width="100%" height="100%">
          </div>

          <div class="card_content">

            <div class="title">
              <h2>{{ $team->title }}</h2>
            </div>

            <div class="detail">
              {{-- <h5>Discription :</h5> --}}
              <h5>{!! $team->description!!} Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione expedita suscipit fugit, adipisci labore nam et deleniti facere officia non enim, esse magni repudiandae veniam repellat natus dicta doloremque. Aut fuga maxime, delectus deserunt, amet impedit tempora nulla repellat quidem vitae, rem facere non sunt inventore excepturi obcaecati mollitia nobis. Repellendus, quod veritatis, nam eos voluptatibus cum quae tempore temporibus possimus optio iste facilis hic accusantium, est recusandae deserunt eligendi nobis quibusdam dolores reiciendis sequi atque perferendis. Totam possimus perspiciatis eligendi, reprehenderit dolores, error id facilis distinctio quibusdam, nisi enim eaque. Ab corporis, omnis deserunt aliquam natus repellendus asperiores magnam eligendi perferendis ad vitae aperiam amet animi cumque dolor adipisci numquam officia exercitationem fugit? Ratione, ipsum quo. Vitae labore accusantium dolorem, voluptates corporis beatae ipsa iusto, repellendus eius deleniti in reprehenderit numquam quaerat aliquid repudiandae illo minima nam cum voluptatum obcaecati? Maxime aperiam voluptatem blanditiis debitis, iste sunt laboriosam nam adipisci nisi rem labore architecto. Ducimus asperiores praesentium ab consectetur magnam. Doloribus blanditiis incidunt fuga odio porro nobis provident eum totam. Deleniti tempora velit assumenda odit dolor, recusandae similique amet quasi architecto excepturi vero dolorum nesciunt earum magni doloremque labore accusantium obcaecati ipsam quam laudantium modi fugit quas! Animi, aut accusamus. Nostrum voluptates nulla perspiciatis odit cum sed libero ducimus nemo corporis! Numquam dolore asperiores, laudantium, reiciendis pariatur incidunt consequuntur distinctio iusto totam repellendus obcaecati est quam doloremque! Deleniti fuga ad asperiores doloremque aliquid molestias. Tempora, harum. Recusandae perspiciatis aliquid quasi quibusdam, fuga eos ab voluptas nesciunt porro molestiae sint quod harum adipisci perferendis consectetur sit aut illum sed, cumque veniam temporibus repellat nostrum et quia? Ipsa voluptas cum in odio temporibus laboriosam esse deleniti rem dicta! Totam sint aliquam corporis tenetur. Nostrum deserunt, dolore quae iusto harum eum quis magnam aliquid nisi, sapiente ut eos voluptatum vel eveniet maiores culpa, est voluptatibus. Molestias temporibus dolorem, vel quaerat repudiandae dolores sint ipsum itaque, consequatur, voluptatum odio? Mollitia labore possimus ipsam rem numquam dolore. Recusandae natus in nostrum fuga laboriosam repudiandae voluptates, modi molestiae molestias eum? Blanditiis, provident aut. Similique excepturi molestiae quibusdam eum est repellat alias consectetur, placeat necessitatibus dolorum, doloremque itaque. Explicabo, sequi architecto possimus error assumenda facilis vitae modi iure molestias quaerat maiores ipsum! Aut, laboriosam necessitatibus repellendus ducimus quidem quaerat illum quia voluptas delectus earum maxime totam corporis quis est quasi fugiat veritatis consectetur similique modi saepe obcaecati iure expedita incidunt qui! Officia at aliquam consectetur laboriosam, architecto velit exercitationem, optio necessitatibus, sed aspernatur quisquam nisi laborum modi. Illo itaque necessitatibus distinctio quisquam suscipit saepe totam, beatae tenetur aut obcaecati voluptate eveniet accusamus similique natus illum optio praesentium labore deleniti sunt ut. Consequuntur laudantium voluptatibus temporibus, vitae eius perspiciatis vel qui molestiae. Nesciunt dolorem quibusdam quia suscipit maiores quisquam fuga officiis consequatur tempore enim at a aut itaque, fugit unde aliquid tenetur sunt, ullam, veniam odio quod molestiae. Iusto dolor magni cumque voluptatem incidunt inventore, mollitia, temporibus repellat quos facere blanditiis perspiciatis in dignissimos et quas facilis, vero expedita quibusdam eum rerum ex aut culpa dolores maxime! </h5>
            </div>

            {{-- <div class="benefits">
              <h5>Benefits :</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit debitis, nostrum odio tenetur quisquam tempora quia earum veniam error aliquid voluptatem in delectus perferendis ad!</p>
            </div> --}}
            <div class="links">
                @if (!empty($team->fb_link))
                    <a href="{{ $team->fb_link }}"  target="_blank"  class="card__btn"><i class="fa fa-brand fa-facebook"></i></a>
                @endif
                @if (!empty($team->youtube_link))
                    <a href="{{ $team->youtube_link }}"  target="_blank" class="card__btn"><i class="fa fa-brand fa-youtube"></i></a>
                @endif
                @if (!empty($team->linkedin_link))
                    <a href="{{ $team->linkedin_link }}"  target="_blank" class="card__btn"><i class="fa fa-brand fa-linkedin"></i></a>
                @endif
                @if (!empty($team->insta_link))
                    <a href="{{ $team->insta_link }}" target="_blank"  class="card__btn"><i class="fa fa-brand fa-instagram"></i></a>
                @endif
                @if (!empty($team->twitter_link))
                    <a href="{{ $team->twitter_link }}"  target="_blank" class="card__btn"><i class="fa fa-brand fa-twitter"></i></a>
                @endif
            </div>
            {{-- <div class="links">
              <a href="#" class="fa fa-brand fa-facebook"></a>
              <a href="#" class="fa fa-brand fa-twitter"></a>
              <a href="#" class="fa fa-brand fa-linkedin"></a>
              <a href="#" class="fa fa-brand fa-instagram"></a>
              <a href="#" class="fa fa-brands fa-behance"></a>
            </div> --}}

            <div class="card_btn">
              <a href="#">Book Now</a>
            </div>

            

          </div>

        </div>
      </section>
    
</div>


    @endsection

    @push('js')
    @endpush
