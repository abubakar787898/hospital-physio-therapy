 <!-- footer  -->

 <footer>

    <div class="footer_end">

      <div class="footer_list">

        <div class="list_first">
          <a href="index.html">
            <img src="{{ asset('assets/frontend/images/logo real.png') }}" alt="" width="120px" height="100px">
          </a>
          <h3>Physio-Therapy</h3>
      </div>

        <div class="list_sec">
          <h3>Explore More</h3>
          <a href="index.html">About</a>
          <a href="Services/services.html">Services</a>
          <a href="Book Now/Book Now.html">Book Now</a>
          <a href="Contact/contact.html">Contact</a>
          <a href="FAQ/FAQ.html">FAQ</a>
        </div>
  
        <div class="list_third">
          <h3>Read More</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus nihil pariatur, hic perspiciatis reprehenderit magni, veniam nesciunt tempora natus quisquam iure nostrum quod eligendi eum labore aut eos aliquid consectetur.

          </p>
        </div>
        
      </div>
    </div>

  </footer>

  <!-- icons  -->
  <div class="footer_icons">
    <a href="#"><i class="fa fa-brand fa-facebook"></i></a>
    <a href="#"><i class="fa fa-brand fa-twitter"></i></a>
    <a href="#"><i class="fa fa-brand fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-brand fa-instagram"></i></a>
  </div>
{{-- <footer>

    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                   
                    <p class="copyright">{{ env('APP_NAME') }} @ {{ date('Y') }}. All rights reserved.</p>
                    <p class="copyright"><strong> Developed &amp; <i class="far fa-heart"></i> by </strong>
                        <a href="https://www.itsourcecode.com" target="_blank">Itsourcecode</a></p>
                    <ul class="icons">
                        <li><a target="_blank" href="https://www.facebook.com/cip.fahim.me"><i class="ion-social-facebook-outline"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/CipFahim"><i class="ion-social-twitter-outline"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/cip.fahim/"><i class="ion-social-instagram-outline"></i></a></li>
                        <li><a target="_blank" href="https://www.youtube.com/programmingkit"><i class="ion-social-youtube-outline"></i></a></li>
                    </ul>

                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">
                    <h4 class="title"><b>CATAGORIES</b></h4>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <h4 class="title"><b>SUBSCRIBE</b></h4>
                    <div class="input-area">
                        <form method="POST" action="{{ route('subscriber.store') }}">
                            @csrf
                            <input class="email-input" name="email" type="email" placeholder="Enter your email">
                            <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</footer> --}}