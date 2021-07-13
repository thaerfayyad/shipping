@extends('layouts.app')

@section('content')
<!-- Slider Start -->
  <div class="homepage-slides-wrapper">
    <div class="owl-carousel homepage-slides text-center">
      <!-- Slider item1 start-->
      <div class="single-slide-item slider-overlay slide-bg-1">
        <div class="item-table">
          <div class="item-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <h3>نحن فخورون</h3>
                  <h2>أن تكون دائما على الطلب</h2>
                  <p>أبجد هوز هو مجرد دمية النص من الطباعة والتنضيد الصناعة. وكان أبجد هوز نص الدمية القياسية في هذه الصناعة من أي وقت مضى منذ 1500s.</p>
                  <a href="{{url('contacts')}}" class="wshipping-button slide-btn">ااتصل بنا</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Slider item1 end-->

      <!-- Slider item2 start-->
      <div class="single-slide-item slider-overlay slide-bg-2">
        <div class="item-table">
          <div class="item-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <h3>نحن نشطون</h3>
                  <h2>لشحن المنتج الخاص بك موثوق به</h2>
                  <p>أبجد هوز هو مجرد دمية النص من الطباعة والتنضيد الصناعة. وكان أبجد هوز نص الدمية القياسية في هذه الصناعة من أي وقت مضى منذ 1500s.</p>
                  <a href="#" class="wshipping-button slide-btn">الحصول على اقتباس مجاني</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Slider item2 end-->
    </div>
  </div>
  <!-- Slider End -->

  <!-- Service start -->
  <div class="wshipping-content-block">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
          <div class="section-title wow fadeInUp">
            <h2>خدماتنا</h2>
            <p>أبجد هوز هو مجرد دمية النص من الطباعة والتنضيد الصناعة.</p>
          </div>
        </div>
      </div>
      <div class="row">
          @foreach($services as $service)
              @if(LaravelLocalization::setLocale()=='ar')
                <div class="col-12 col-lg-4">
                  <div class="single-service-item wow fadeInUp">
                    <div class="service-item-bg service-bg-1"> <img src="/storage/img/{{$service->img}}" alt="{{$service->title}}"  class="rounded" width="350" height="250">
                    </div>
                    <div class="service-content"><br><br><br>
                      <h4>{{$service->title}}</h4>
                      <p>{{$service->des_ar}}.</p>

                    </div>
                  </div>
                </div>
              @else
                  <div class="col-12 col-lg-4">
                      <div class="single-service-item wow fadeInUp">
                          <div class="service-item-bg service-bg-1"> <img src="/storage/img/{{$service->img}}" alt="user" class="rounded-circle" width="250" height="250">
                          </div>
                          <div class="service-content"><br><br><br>
                              <h4>{{$service->label}}</h4>
                              <p>{{$service->des_en}}.</p>

                          </div>
                      </div>
                  </div>
              @endif
          @endforeach

      </div>
    </div>
  </div>
  <!-- Service End -->

  <!-- we peovide start -->
  <div class="wshipping-content-block provided-block text-center">
    <div class="item-table">
      <div class="item-tablecell">
        <div class="container">
          <div class="row">
            <div class="col-12 wow fadeInUp">
              <h3 class="text-uppercase">نحن نقدم</h3>
              <h1 class="text-uppercase">أفضل البحر وخدمات الشحن الجوي</h1>
              <h2>لكتاب الشحن الخاص بك من أي بلد</h2>
              <a href="{{url('contacts')}}" class="wshipping-button cta-btn">اتصل بنا</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- we provide end -->

  <!-- Why Choose start -->
  <div class="wshipping-content-block">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-4 wow fadeInLeft"> <img src="assets/images/why-choose-us.jpg" alt=""/> </div>
        <div class="col-12 col-lg-4">
          <div class="why-choose-us-content wow fadeInUp">
            <h3 class="heading3-border text-uppercase">لماذا أخترتنا</h3>
            <p>هناك العديد من الاختلافات من الممرات من أبجد هوز المتاحة، ولكن الغالبية عانت تغيير في شكل ما، عن طريق النكتة حقن.</p>
            <p>نقطة استخدام أبجد هوز هو أنه يحتوي على توزيع طبيعي أكثر أو أقل من الحروف، بدلا من استخدام 'المحتوى هنا، المحتوى هنا'، مما يجعلها تبدو وكأنها قابلة للقراءة الإنجليزية. العديد من حزم النشر المكتبي والمحررين صفحة ويب الآن استخدام لوريم إيبسوم كنص النموذج الافتراضي، والبحث عن "لوريم إيبسوم" سوف تكشف العديد من المواقع على شبكة الإنترنت لا تزال في مهدها. </p>
            <a href="" title="" class="readmore-btn">اقرأ أكثر <i class="fa fa-angle-right"></i></a> </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="why-choose-us wow fadeInRight">
            <div class="why-choose-us-icon"> <i class="far fa-handshake"></i> نحن موثوق به </div>
            <div class="why-choose-us-icon"> <i class="fa fa-unlock-alt"></i> أفضل الأمن </div>
            <div class="why-choose-us-icon"> <i class="far fa-thumbs-up"></i> ضمان 100% </div>
            <div class="why-choose-us-icon"> <i class="fas fa-map-marker-alt"></i> موقع سريع </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- why choose End -->
  <!-- Service process start -->
  <div class="wshipping-content-block service-process">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
          <div class="section-title">
            <h2>عملية الخدمة لدينا</h2>
            <p>أبجد هوز هو مجرد دمية النص من الطباعة والتنضيد الصناعة.</p>
          </div>
        </div>
      </div>
      <div class="process-row">
        <div class="process-step">
          <div class="process-icon"> <span>1</span> <img src="assets/images/process-icon1.png" alt=""/> </div>
          <p>حدد الشحن</p>
        </div>
        <div class="process-step">
          <div class="process-icon"> <span>2</span> <img src="assets/images/process-icon2.png" alt=""/> </div>
          <p>إنشاء فاتورة</p>
        </div>
        <div class="process-step">
          <div class="process-icon"> <span>3</span> <img src="assets/images/process-icon3.png" alt=""/> </div>
          <p>دفع امن</p>
        </div>
        <div class="process-step">
          <div class="process-icon"> <span>4</span> <img src="assets/images/process-icon4.png" alt=""/> </div>
          <p>توصيل سريع</p>
        </div>
      </div>
    </div>
  </div>
  <!-- service process start -->

  <!-- Get Quote start -->
  <div class="wshipping-content-block home-quote">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 wow fadeInLeft">
          <h2>الحصول على أسعار مجاني</h2>
          <h6>ونحن دائما استخدام أفضل وأسرع الأساطيل</h6>
          <div class="quote-form">
            <form data-toggle="validator" action="index.html">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <input class="form-control" data-error="Please enter name field." id="inputName" placeholder="الاسم الكامل" type="text" required />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <input type="email" class="form-control" id="inputEmail" placeholder="بريد الالكتروني" required />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="inputMobile" placeholder="التليفون المحمول" required />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="DestinationFrom" placeholder="الوجهة من" required />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="DestinationTo" placeholder="الوجهة إلى" required />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="ShippingType" placeholder="نوع الشحن" required />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <div class="datepicker-group">
                      <input type="text" class="form-control datetimepicker1" placeholder="تاريخ" />
                      <div class="datepicker-icon"><i class="fa fa-calendar-alt"></i></div>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <textarea class="form-control text-area" data-error="Please enter Message." id="textMessage" placeholder="رسالة" required></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <button class="wshipping-button cta-btn" type="submit">أرسل لنا اقتباس</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Get quote End -->

  <!-- Latest blog start -->
  <div class="wshipping-content-block pb40">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-title wow fadeInUp">
            <h2>آخر مشاركة المدونة</h2>
            <p>أبجد هوز هو مجرد دمية النص من الطباعة والتنضيد الصناعة.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-4">
          <div class="blog-item wow fadeInUp">
            <div class="blog-item-bg blog-bg-1"></div>
            <div class="blog-content">
              <h3>الشحن الحاويات جميع النقل الدولي</h3>
              <div class="blog-post-by">
                <ul>
                  <li><i class="fa fa-calendar"></i>18 مارس 2017</li>
                  <li><i class="fa fa-user"></i>بواسطة المشرف</li>
                </ul>
              </div>
              <p>لوريم إيبسوم دولور سيت أميت، كونسكتيتور أديبيسشينغ إليت. إينيان كومودو ليغولا إغيت دولور إينينزا. كوم سوسييس ناتوك بيناتيبوس إت ماغنيس ديس بارتورينت مونتيس، ناسيتور ريديكولوس موس.</p>
              <a href="" title="" class="readmore-btn">اقرأ أكثر <i class="fa fa-angle-right"></i></a> </div>
          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="blog-item wow fadeInUp">
            <div class="blog-item-bg blog-bg-2"></div>
            <div class="blog-content">
              <h3>أبجد هوز هو مجرد دمية النص من الطباعة.</h3>
              <div class="blog-post-by">
                <ul>
                  <li><i class="fa fa-calendar"></i>18 مارس 2017</li>
                  <li><i class="fa fa-user"></i>بواسطة المشرف</li>
                </ul>
              </div>
              <p>لوريم إيبسوم دولور سيت أميت، كونسكتيتور أديبيسشينغ إليت. إينيان كومودو ليغولا إغيت دولور إينينزا. كوم سوسييس ناتوك بيناتيبوس إت ماغنيس ديس بارتورينت مونتيس، ناسيتور ريديكولوس موس.</p>
              <a href="" title="" class="readmore-btn">اقرأ أكثر <i class="fa fa-angle-right"></i></a> </div>
          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="blog-item wow fadeInUp">
            <div class="blog-item-bg blog-bg-3"></div>
            <div class="blog-content">
              <h3>جميع الحاويات الشحن هي النقل الدولي</h3>
              <div class="blog-post-by">
                <ul>
                  <li><i class="fa fa-calendar"></i>18 مارس 2017</li>
                  <li><i class="fa fa-user"></i>بواسطة المشرف</li>
                </ul>
              </div>
              <p>لوريم إيبسوم دولور سيت أميت، كونسكتيتور أديبيسشينغ إليت. إينيان كومودو ليغولا إغيت دولور إينينزا. كوم سوسييس ناتوك بيناتيبوس إت ماغنيس ديس بارتورينت مونتيس، ناسيتور ريديكولوس موس.</p>
              <a href="" title="" class="readmore-btn">اقرأ أكثر <i class="fa fa-angle-right"></i></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Latest blog End -->

  <!-- Counter start -->
  <div class="wshipping-content-block counter-section">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="counter-block"> <span class="counter-icon"><i class="fa fa-folder-open"></i></span>
            <p><span class="counter" data-count="578">0</span> تم تنفيذ المشروع</p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="counter-block"> <span class="counter-icon"><i class="fas fa-users"></i></span>
            <p><span class="counter" data-count="347">0</span> العملاء الدائمين</p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="counter-block"> <span class="counter-icon"><i class="fa fa-truck"></i></span>
            <p><span class="counter" data-count="128">0</span> المركبات المملوكة</p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="counter-block"> <span class="counter-icon"><i class="fa fa-male"></i></span>
            <p><span class="counter" data-count="67">0</span> دعم الأعضاء</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Counter End -->

  <!-- News &amp; Testimonials Start -->
  <div class="wshipping-content-block news-testimonial-block">
    <div class="container wow fadeInUp">
      <div class="row">
        <!-- Latest News Start -->
        <div class="col-12 col-lg-5">
          <h3 class="heading3-border text-uppercase">أحدث الأخبار</h3>
          <div class="latest-news-section mt0 wow fadeInUp">
            <div class="news-date"> <span>فبراير</span>28 </div>
            <h4>عنوان الخبر</h4>
            <div class="news-post-by"><span>المشرف</span> بواسطة</div>
            <p>أبجد هوز هو مجرد دمية النص من الطباعة والتنضيد الصناعة.</p>
          </div>
          <div class="latest-news-section wow fadeInUp">
            <div class="news-date"> 23<span>Mar</span> </div>
            <h4>عنوان الخبر</h4>
            <div class="news-post-by"><span>المشرف</span> بواسطة</div>
            <p>أبجد هوز هو مجرد دمية النص من الطباعة والتنضيد الصناعة.</p>
          </div>
        </div>
        <!-- Latest News End -->

        <!-- Testimonial start -->
        <div class="col-12 col-lg-7 home-testimonial">
          <h3 class="heading3-border text-uppercase">شهادة</h3>
          <div class="owl-carousel testimonial">
            <div class="testimonial-item">
              <div class="row">
                <div class="col-md-5">
                  <div class="testimonial-img-bg"></div>
                </div>
                <div class="col-md-7">
                  <div class="testimonial-content">
                    <p>أبجد هوز هو مجرد دمية النص من الطباعة والتنضيد الصناعة. وكان أبجد هوز نص الدمية القياسية في هذه الصناعة من أي وقت مضى منذ 1500s.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial-item">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                  <div class="testimonial-img-bg"></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                  <div class="testimonial-content">
                    <p>إيبسوم هو مجرد نص وهمية للطباعة وتنضيد الصناعة. وكان أبجد هوز نص الدمية القياسية في هذه الصناعة من أي وقت مضى منذ 1500s، عندما طابعة غير معروفة.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Testimonial end -->
      </div>
    </div>
  </div>
  <!-- News & Testimonials End -->

  <!-- Our client start -->
  <div class="wshipping-content-block client-block pt0">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="heading3-border text-uppercase">لدينا عميل قيمة</h3>
        </div>
        <div class="owl-carousel our-client">
          <div class="client-item"><img src="assets/images/client-1.jpg" alt=""/></div>
          <div class="client-item"><img src="assets/images/client-2.jpg" alt=""/></div>
          <div class="client-item"><img src="assets/images/client-3.jpg" alt=""/></div>
          <div class="client-item"><img src="assets/images/client-4.jpg" alt=""/></div>
          <div class="client-item"><img src="assets/images/client-5.jpg" alt=""/></div>
          <div class="client-item"><img src="assets/images/client-6.jpg" alt=""/></div>
          <div class="client-item"><img src="assets/images/client-1.jpg" alt=""/></div>
          <div class="client-item"><img src="assets/images/client-2.jpg" alt=""/></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Our client end -->
@endsection
